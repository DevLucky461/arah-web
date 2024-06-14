<?php

namespace App\Http\Controllers\Mobile;

use App\Jobs\SendFCM;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use App\Models\UserInfo;
use App\Models\Message;
use App\Models\ScheduleMessage;
use App\Events\ChatEvent;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class MessageController extends Controller
{
    public function viewMessage(Request $request)
    {
        //token //UUID
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->UUID == "") {
            return response()->json(array(
                "success" => false,
                "message" => "UUID Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();

        $messages = Message::where([
            ['UUID', "=", $request->UUID],
            ['user_id', '!=', $user->id],
        ])
            ->get();

        $unread_time = null;
        foreach ($messages as $message) {
            $status = $message->status;
            $ids = explode(" ", $status);
            if (!in_array($user->id, $ids)) {
                if ($status == "")
                    $message->status = $user->id;
                else
                    $message->status = $status . " " . $user->id;
                $message->save();
                if ($request->isFirst != null && $request->isFirst &&
                    ($unread_time == null || $unread_time > $message->created_at))
                    $unread_time = $message->created_at;
            }
        }

        $scheduleDatas = ScheduleMessage::where([
            ["schedulemessages.UUID", "=", $request->UUID],
            ["schedulemessages.user_id", "=", $user->id],
        ])
            ->select("schedulemessages.id", "schedulemessages.UUID", "schedulemessages.message", "schedulemessages.message_type",
                "schedulemessages.message_datetime", "schedulemessages.created_at", 'users.name as sender_name', 'user_info.phone', 'users.image')
            ->leftJoin('users', 'users.id', '=', 'schedulemessages.user_id')
            ->leftJoin('user_info', 'user_info.user_id', '=', 'users.id');

        $messageInfos = Message::where("messages.UUID", $request->UUID)
            ->select("messages.id", "messages.UUID", "messages.message", "messages.message_type", DB::raw("null as message_datetime"),
                "messages.created_at", 'users.name as sender_name', 'user_info.phone', 'users.image')
            ->leftJoin('users', 'users.id', '=', 'messages.user_id')
            ->leftJoin('user_info', 'user_info.user_id', '=', 'users.id')
            ->union($scheduleDatas)
            ->get();

        return response()->json(array(
            "success" => true,
            "unread_time" => $unread_time,
            "message" => $messageInfos,
        ));
    }

    public function getMessage(Request $request)
    {
        //message_type //message //token //UUID
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->message == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Message Required"
            ));
        } else if ($request->message_type == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Message Type Required"
            ));
        } else if ($request->UUID == "") {
            return response()->json(array(
                "success" => false,
                "message" => "UUID Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();
        $userInfo = UserInfo::where('user_id', $user->id)->first();

        $fcm_msg = null;
        $fcm_img = null;

        if ($request->hasFile('message')) {
            $file = $request->file('message');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            //$path = Storage::putFileAs('photos', $file , $fileName);
            if ($request->message_type == "image") {
                $file->move(public_path('storages/images'), $fileName);
                $message = Message::create([
                    "user_id" => $user->id,
                    "UUID" => $request->UUID,
                    "message" => '/storages/images/' . $fileName,
                    "message_type" => $request->message_type,
                    "status" => "",
                ]);

                $fcm_msg = 'New media message';
                $fcm_img = URL::to('/') . '/storages/images/' . $fileName;
            }

            if ($request->message_type == "file") {
                $file->move(public_path('storages/files'), $fileName);
                $message = Message::create([
                    "user_id" => $user->id,
                    "UUID" => $request->UUID,
                    "message" => '/storages/files/' . $fileName,
                    "message_type" => $request->message_type,
                    "status" => "",
                ]);

                $fcm_msg = 'New media message';
            }
        }

        if ($request->message_type == "text") {
            $textMessage = $this->filter_bad_words($request->message);

            $message = Message::create([
                "user_id" => $user->id,
                "UUID" => $request->UUID,
                "message" => $textMessage,
                "message_type" => $request->message_type,
                "status" => "",
            ]);

            $fcm_msg = $textMessage;
        }

        $fcm_users = Room::leftJoin('users', 'users.id', '=', 'rooms.user_id')
            ->where('rooms.UUID', $request->UUID)
            ->where('users.fcm_token', '!=', null)
            ->where('users.fcm_token', '!=', '')
            ->where('rooms.rooms_notification', 'on')
            ->select([
                'users.fcm_token',
            ])
            ->get();

        $data = [];
        $data['user_phone'] = $userInfo->phone;
        $data['user_image'] = $user->image;
        $data["sender_name"] = $user->name;
        $data["message"] = $message->message;
        $data["message_type"] = $message->message_type;
        $data["UUID"] = $message->UUID;
        $data["created_at"] = $message->created_at->toDateTimeString();

        foreach ($fcm_users as $fcm_user)
            SendFCM::dispatch($fcm_user->fcm_token, $user->name, $fcm_msg, $data, $fcm_img);

        event(new ChatEvent($data));
        return response()->json(array(
            "success" => true,
            "message" => "Message Send"
        ));
    }

    public function deleteMessage(Request $request)
    {
        //token //message_id
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        }

        if ($request->message_id == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Message ID Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();

        $message = Message::where('id', $request->message_id)->where('user_id', $user->id)->first();

        if ($message->message_type == "message") {

            Message::where('id', $request->message_id)->delete();

        } else if ($message->message_type == "image") {

            $pathFile = explode('/', $message->message);
            $end = end($pathFile);

            if (file_exists(public_path('storages/images/' . $end))) {
                unlink(public_path('storages/images/' . $end));
            }

            Message::where('id', $request->message_id)->delete();
        } else if ($message->message_type == "file") {
            $pathFile = explode('/', $message->message);
            $end = end($pathFile);

            if (file_exists(public_path('storages/files/' . $end))) {
                unlink(public_path('storages/files/' . $end));
            }

            Message::where('id', $request->message_id)->delete();
        }

        return response()->json(array(
            "success" => true,
            "message" => "Message Deleted"
        ));
    }

    public function schedule_message(Request $request)
    {
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->UUID == "") {
            return response()->json(array(
                "success" => false,
                "message" => "UUID Required"
            ));
        } else if ($request->message == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Message Required"
            ));
        } else if ($request->message_type == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Message Type Required"
            ));
        } else if ($request->datetime == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Date Time Required"
            ));
        }

        $user = JWTAuth::parseToken()->authenticate();

        if ($request->hasFile('message')) {
            $file = $request->file('message');
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            //$path = Storage::putFileAs('photos', $file , $fileName);
            if ($request->message_type == "schedule_image") {
                $file->move(public_path('storages/images'), $fileName);
                $message = ScheduleMessage::create([
                    "user_id" => $user->id,
                    "UUID" => $request->UUID,
                    "message" => '/storages/images/' . $fileName,
                    "message_type" => $request->message_type,
                    "message_datetime" => Carbon::parse($request->datetime)
                ]);
            }

            if ($request->message_type == "schedule_file") {
                $file->move(public_path('storages/files'), $fileName);
                $message = ScheduleMessage::create([
                    "user_id" => $user->id,
                    "UUID" => $request->UUID,
                    "message" => '/storages/files/' . $fileName,
                    "message_type" => $request->message_type,
                    "message_datetime" => Carbon::parse($request->datetime)
                ]);
            }
        }

        if ($request->message_type == "schedule_text") {
            ScheduleMessage::create([
                "user_id" => $user->id,
                "UUID" => $request->UUID,
                "message" => $request->message,
                "message_datetime" => Carbon::parse($request->datetime),
                "message_type" => $request->message_type
            ]);
        }

        return response()->json(array(
            "success" => true,
            "message" => "Message saved"
        ));
    }

    public function filter_bad_words($message)
    {
        $words = ["anjing", "anying", "anjeng", "hanying", "nying", "anjay", "hanjay", "anjayani", "anjir", "ajg", "anjg", "anjim",
            "anjm", "babi", "monyt", "mnyet", "monyet", "kunyuk", "bajingan", "banjigan", "bjgn", "bajgn", "bajingn", "asu", "bangsat",
            "bgst", "bangst", "bngsat", "pantek", "brengsek", "brgsk", "sompret", "kopet", "dancok", "jancok", "jancuk", "juancok", "jiancok",
            "jiancuk", "hancok", "djancuk", "djancok", "cuk", "cok", "janck", "jnck", "dampot", "jamput", "jampot", "jaset", "juaset", "jasit",
            "juasit", "ibo", "paneki", "bagudung", "cicing", "kampret", "kmpret", "kmprt", "kamprt", "celeng", "sundal", "kenthir", "kentir", "gondes",
            "kobam", "mabok", "cipuak", "nyipuak", "toket", "tokt", "titit", "tytyd", "titid", "tocil", "tokcil", "toge", "kontol", "ktl", "kntl", "kntol",
            "kontl", "memek", "mmek", "meki", "cuki", "cukimah", "pantat", "pntat", "ngntot", "ngentot", "ngentod", "entot", "entod", "ewe", "ewek", "ewa ewi",
            "ewita", "ngewe", "ngeue", "eue", "bo", "colmek", "onani", "perek", "pecun", "bispak", "bencong", "banci", "jablay", "homo", "maho", "lesbi", "lesbian",
            "ayam kampus", "bokep", "pepek", "mamas", "jembut", "mbut", "jembi", "puki", "pukimai", "sange", "sangue", "sngue", "snge", "ngamer", "pelakor", "pecun",
            "vcs", "obel", "ngemut", "emut", "coli", "grepe", "ngaceng", "ngacg", "ngcng", "sepong", "open bo", "nganu", "hiya hiya", "hiyaa hiyaa", "hiyahiya",
            "hiya2", "wanita nakal", "cewe nakal", "cewek nakal", "abg nakal", "otong", "ml", "icip", "diicip", "bobo bareng", "bobar", "perawanin", "dugem", "ena ena",
            "mastur", "masturbasi", "mstrbs", "pijet plusplus", "pijet++", "pijet plus2", "ons", "telanjang", "bugil", "peler", "sumpel", "jilmek", "wot", "cipok",
            "nyipok", "jilboobs", "jilbobs", "nonggeng", "nonggengin", "tungging", "nungging", "rangsang", "cekerbabat", "cupang", "ngocok", "nyembul", "pap", "lonte",
            "sodok", "nyodok", "selangkangan", "ngeres", "desah", "mendesah", "ngedesah", "desahan", "bego", "goblok", "gblk", "goblk", "gblok", "idiot", "geblek", "orgil",
            "orang gila", "gendeng", "sinting", "sintng", "snting", "tlol", "tolol", "sarap", "udik", "payah", "pyh", "payh", "kamseupay", "kampungan", "kampungn",
            "alay", "ababil", "dudul", "dodol", "lambemu", "somplak", "pea", "peâ€™a", "bungul", "lengob", "oto", "beleng", "naskleng", "hts", "caper", "hs", "crot", "nyabo", "nyabu",
            "norak", "buta", "budek", "bolot", "jelek", "pincang", "tuli", "bacot", "cocot", "cotba", "cabe-cabean", "bantet", "cebol", "ceking", "gembrot", "bintit",
            "dukun", "sesajen", "ngelem", "goden", "ngondek", "lekong", "waria", "setan", "keparat", "iblis", "dajal", "dajjal", "dakjal", "ngehe", "bejad", "bejat",
            "gembel", "tai", "tae", "taik", "taek", "pret", "jihad", "kafir", "jahanam", "pelet", "pesugihan", "beungeut", "kehed", "jurig", "belis", "koplak", "koplok", "lepet",
            "kimbek", "kreak", "getek", "congok", "bengak", "loak", "cina", "bodat", "angek", "bedangklik", "celat", "cadel", "cingcong", "getek", "bedomak", "gedabak",
            "mentel", "mengkek", "mentiko", "belagu", "pesong", "pekak", "sengak", "4r5e", "5h1t", "5hit", "a55", "anal", "anus", "ar5e", "arrse", "arse", "ass", "ass-fucker",
            "asses", "assfucker", "assfukka", "asshole", "assholes", "asswhole", "a_s_s", "b!tch", "b00bs", "b17ch", "b1tch", "ballbag", "balls", "ballsack", "bastard", "beastial",
            "beastiality", "bellend", "bestial", "bestiality", "bi+ch", "biatch", "bitch", "bitcher", "bitchers", "bitches", "bitchin", "bitching", "bloody", "blow job", "blowjob",
            "blowjobs", "boiolas", "bollock", "bollok", "boner", "boob", "boobs", "booobs", "boooobs", "booooobs", "booooooobs", "breasts", "buceta", "bugger", "bum", "bunny fucker",
            "butt", "butthole", "buttmunch", "buttplug", "c0ck", "c0cksucker", "carpet muncher", "cawk", "chink", "cipa", "cl1t", "clit", "clitoris", "clits", "cnut", "cock",
            "cock-sucker", "cockface", "cockhead", "cockmunch", "cockmuncher", "cocks", "cocksuck", "cocksucked", "cocksucker", "cocksucking", "cocksucks", "cocksuka",
            "cocksukka", "cok", "cokmuncher", "coksucka", "coon", "cox", "crap", "cum", "cummer", "cumming", "cums", "cumshot", "cunilingus", "cunillingus", "cunnilingus", "cunt",
            "cuntlick", "cuntlicker", "cuntlicking", "cunts", "cyalis", "cyberfuc", "cyberfuck", "cyberfucked", "cyberfucker", "cyberfuckers", "cyberfucking", "d1ck", "damn",
            "dick", "dickhead", "dildo", "dildos", "dink", "dinks", "dirsa", "dlck", "dog-fucker", "doggin", "dogging", "donkeyribber", "doosh", "duche", "dyke", "ejaculate",
            "ejaculated", "ejaculates", "ejaculating", "ejaculatings", "ejaculation", "ejakulate", "fuck", "fucker", "f4nny", "fag", "fagging", "faggitt", "faggot", "faggs",
            "fagot", "fagots", "fags", "fanny", "fannyflaps", "fannyfucker", "fanyy", "fatass", "fcuk", "fcuker", "fcuking", "feck", "fecker", "felching", "fellate", "fellatio",
            "fingerfuck", "fingerfucked", "fingerfucker", "fingerfuckers", "fingerfucking", "fingerfucks", "fistfuck", "fistfucked", "fistfucker", "fistfuckers", "fistfucking",
            "fistfuckings", "fistfucks", "flange", "fook", "fooker", "fuck", "fucka", "fucked", "fucker", "fuckers", "fuckhead", "fuckheads", "fuckin", "fucking", "fuckings",
            "fuckingshitmotherfucker", "fuckme", "fucks", "fuckwhit", "fuckwit", "fudge packer", "fudgepacker", "fuk", "fuker", "fukker", "fukkin", "fuks", "fukwhit", "fukwit",
            "fux", "fux0r", "f_u_c_k", "gangbang", "gangbanged", "gangbangs", "gaylord", "gaysex", "goatse", "God", "god-dam", "god-damned", "goddamn", "goddamned", "hardcoresex",
            "hell", "heshe", "hoar", "hoare", "hoer", "homo", "hore", "horniest", "horny", "hotsex", "jack-off", "jackoff", "jap", "jerk-off", "jism", "jiz", "jizm", "jizz", "kawk",
            "knob", "knobead", "knobed", "knobend", "knobhead", "knobjocky", "knobjokey", "kock", "kondum", "kondums", "kum", "kummer", "kumming", "kums", "kunilingus", "l3i+ch",
            "l3itch", "labia", "lmfao", "lust", "lusting", "m0f0", "m0fo", "m45terbate", "ma5terb8", "ma5terbate", "masochist", "master-bate", "masterb8", "masterbat*", "masterbat3",
            "masterbate", "masterbation", "masterbations", "masturbate", "mo-fo", "mof0", "mofo", "mothafuck", "mothafucka", "mothafuckas", "mothafuckaz", "mothafucked",
            "mothafucker", "mothafuckers", "mothafuckin", "mothafucking", "mothafuckings", "mothafucks", "mother fucker", "motherfuck", "motherfucked", "motherfucker",
            "motherfuckers", "motherfuckin", "motherfucking", "motherfuckings", "motherfuckka", "motherfucks", "muff", "mutha", "muthafecker", "muthafuckker", "muther",
            "mutherfucker", "n1gga", "n1gger", "nazi", "nigg3r", "nigg4h", "nigga", "niggah", "niggas", "niggaz", "nigger", "niggers", "nob", "nob jokey", "nobhead", "nobjocky",
            "nobjokey", "numbnuts", "nutsack", "orgasim", "orgasims", "orgasm", "orgasms", "p0rn", "pawn", "pecker", "penis", "penisfucker", "phonesex", "phuck", "phuk", "phuked",
            "phuking", "phukked", "phukking", "phuks", "phuq", "pigfucker", "pimpis", "piss", "pissed", "pisser", "pissers", "pisses", "pissflaps", "pissin", "pissing", "pissoff",
            "poop", "porn", "porno", "pornography", "pornos", "prick", "pricks", "pron", "pube", "pusse", "pussi", "pussies", "pussy", "pussys", "rectum", "retard", "rimjaw", "rimming",
            "shit", "s.o.b.", "sadist", "schlong", "screwing", "scroat", "scrote", "scrotum", "semen", "sex", "sh!+", "sh!t", "sh1t", "shag", "shagger", "shaggin", "shagging", "shemale",
            "shi+", "shit", "shitdick", "shite", "shited", "shitey", "shitfuck", "shitfull", "shithead", "shiting", "shitings", "shits", "shitted", "shitter", "shitters", "shitting",
            "shittings", "shitty", "skank", "slut", "sluts", "smegma", "smut", "snatch", "son-of-a-bitch", "spac", "spunk", "s_h_i_t", "t1tt1e5", "t1tties", "teets", "teez", "testical",
            "testicle", "tit", "titfuck", "tits", "titt", "tittie5", "tittiefucker", "titties", "tittyfuck", "tittywank", "titwank", "tosser", "turd", "tw4t", "twat", "twathead",
            "twatty", "twunt", "twunter", "v14gra", "v1gra", "vagina", "viagra", "vulva", "w00se", "wang", "wank", "wanker", "wanky", "whoar", "whore", "willies", "willy", "xrated",
            "xxx"];

        $filterCount = sizeof($words);

        for ($i = 0; $i < $filterCount; $i++) {
            $message = preg_replace_callback('/\b' . $words[$i] . '\b/i', function ($matches) {
                return str_repeat('*', strlen($matches[0]));
            }, $message);
        }

        return $message;
    }
}
