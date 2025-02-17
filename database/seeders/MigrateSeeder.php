<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\UserInfo;

class MigrateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $userinfo = [
            ["1indonesiafurniture@gmail.com","Miftaqun Nur Ramadhan","628995441128","3320070905880010","nu_member2","32272","male","Accountant","< 14,000,000","indonesia","Aceh"],
            ["abdulhadi06413@gmail.com","Abdul Hadi","85729861246","3320070508660000","nu_member1","24324","male","Gardener","< 14,000,000","indonesia","Central Java"],
            ["ach.rohidin2@gmail.com","Rohidin","6281313654488","3279041006840000","nu_member1","30843","male","Accountant","< 14,000,000","indonesia","West Java"],
            ["achtton99@gmail.com62","Hartomo","6282134760047","357840909660003","nu_member2","24359","male","Real estate agent","14,000,000 ~ 42,000,000","indonesia","Daerah Istimewa Yogyakarta"],
            ["addin_w@yahoo.co.id","Wahyuddin","6285299557004","6405080806840000","nu_member1","30841","male","Accountant","< 14,000,000","indonesia","Others"],
            ["adeabdul6@gmail.com","Abdullah dede","6285716936676","3172020306840010","nu_member2","","male","Bus driver","14,000,000 ~ 42,000,000","indonesia","Jakarta Raya"],
            ["adeirma131278@gmail.com","Ade Irma suryani","6282299241216","3276055312780000","nu_member1","28837","female","Hairdresser","< 14,000,000","indonesia","West Java"],
            ["Adi_bengky@yahoo.com","Bambang Adi Suprayitno","6281399392090","3174092312730000","nu_member1","27021","male","Accountant","< 14,000,000","indonesia","Jakarta Raya"],
            ["agungbayukelik@gmail.com","Agung Bayu Arimbatmoko","6281393886699","3372051006650000","nu_member1","24021","male","Lawyer","14,000,000 ~ 42,000,000","indonesia","Central Java"],
            ["agus2setianto@gmail.com","Agus Setianto","81322500525","3277020108610010","nu_member2","22494","male","Real estate agent","14,000,000 ~ 42,000,000","indonesia","West Java"],
            ["akangisa84@gmail.com","Risa Kuswara","6287711451525","3204291508840010","nu_member2","30909","male","Accountant","14,000,000 ~ 42,000,000","indonesia","West Java"],
            ["akhyas8908@gmail.com","akhmad yasin","6285714958908","3173081002700000","nu_member2","25609","male","Electrician","14,000,000 ~ 42,000,000","indonesia","Jakarta Raya"],
            ["albiyandb@gmail.com","Albiyan dwi bhaskara","6281330769130","3573050108910000","nu_member1","33246","male","Shop assistant","14,000,000 ~ 42,000,000","indonesia","Bali"],
            ["aldi.ahmat77@gmail.com","ALDI AHMAT MALIK M","6281219734493","3275060505770040","nu_member1","28250","male","Journalist","< 14,000,000","indonesia","Jakarta Raya"],
            ["aldi.maland77@gmail.com","ALDI AHMAT MALIK M","81219734493","32750506050770000","nu_member1","28250","male","Accountant","281,000,000 ~ 422,000,000","indonesia","Jakarta Raya"],
            ["almar.nurhadi83@gmail.com","Almar nurhadi","89638320234","3273111111830000","nu_member2","30631","male","Architect","14,000,000 ~ 42,000,000","indonesia","Jakarta Raya"],
            ["alponti4618@gmail.com","Muhammad Syamlan","6287803389690","3175042006720010","nu_member2","26470","male","Travel agent","< 14,000,000","indonesia","Jakarta Raya"],
            ["altaf.bhay@gmail.com","Altaf Bhay","6285648319789","3578050312890000","nu_member2","32579","male","Accountant","< 14,000,000","indonesia","East Java"],
            ["alvin.kasim@gmail.com","Alvin kaim","62811822670","3173051011780000","nu_member2","28804","male","Translator","14,000,000 ~ 42,000,000","indonesia","Jakarta Raya"],
            ["aminmiftahulaziz@gmail.com","Amin Miftahul Aziz","6282324817626","3320071004750010","nu_member1","27494","male","Carpenter","< 14,000,000","indonesia","Others"],
            ["aminuddinmpd58@gmail.com","Aminuddin","6285896333729","3375012010580000","nu_member1","21478","male","Teacher","14,000,000 ~ 42,000,000","indonesia","Central Java"],
            ["an.nugrahaputra@gmail.com","Aan Nugraha","82125215453","2105012107860000","nu_member1","31614","male","Accountant","70,000,000 ~ 140,000,000","indonesia","Riau Islands"],
            ["andy@cakexp.com","Andy Ong","601837737378","778388848484","nu_member1","35412","male","Waiter/Waitress","70,000,000 ~ 140,000,000","indonesia","Aceh"],
            ["andy@yahoo.com","Andy","88888881","88888881","nu_member1","","male","","< 14,000,000","indonesia"],
            ["andyoba@gmail.com","Andy Ong Ban Aik","60122076467","790623075455","nu_member1","29029","male","Accountant","14,000,000 ~ 42,000,000","indonesia","North Sumatra"],
            ["andyz1774@gmail.com","Hj. Yusnimar","62895334128443","3510165707450000","nu_member2","16635","female","Chef/Cook","< 14,000,000","indonesia","East Java"],
            ["anisaalmira7585@gmail.com","Syamsul Ma Arif","62895358666147","3172020710910000","nu_member2","33429","male","Actor / Actress","14,000,000 ~ 42,000,000","indonesia","Jakarta Raya"],
            ["anwardh05@gmail.com","Anwar","6285272003555","1404040809010000","nu_member1","37142","male","Architect","< 14,000,000","indonesia","Riau"],
            ["ar7117369@gmail.com","Aulia rahmatullah","6283171032948","1371071309920000","nu_member2","33860","male","Secretary","< 14,000,000","indonesia","West Sumatra"],
            ["arahcoin45@gmail.com","Almira Inezia Sukmono","6288232847301","3307096211930000","nu_member1","34295","female","Baker","< 14,000,000","indonesia","Central Java"],
            ["ariefsupriadi638@gmail.com","Arief Supriadi","81280034162","1808010610990000","nu_member2","","male","Actor / Actress","14,000,000 ~ 42,000,000","indonesia","Lampung"],
            ["arifin602257@gmail.com","ARIFIN","82310692257","3307031501880000","nu_member1","32157","male","Accountant","< 14,000,000","indonesia","East Java"],
            ["arruby@yahoo.com","Rusdi","62811771974","2105011003740000","nu_member1","27098","male","Teacher","70,000,000 ~ 140,000,000","indonesia","Riau Islands"],
            ["artantyo75@gmail.com","Budi Kusmartantyo","6285728126668","3311081803750000","nu_member2","27471","male","Waiter/Waitress","< 14,000,000","indonesia","Central Java"],
            ["azizahshofiyyatul@gmail.com","Shofiyyatul azizah","6285864453445","3204065209980000","nu_member1","36050","female","Teacher","< 14,000,000","indonesia","Central Java"],
            ["azkasgt123@gmail.com","m nurul azka","6285813551311","3375012305960000","nu_member2","35208","male","Cleaner","42,000,000 ~ 70,000,000","indonesia","Central Java"],
            ["Bekduganteng11@gmail.com","Moh Abumansur Junaidi","6282350230442","3501091207870000","nu_member2","32118","male","Factory worker","< 14,000,000","indonesia","East Java"],
            ["bem60114@gmail.com","Kevin Ang","6584484990","S1234566j","nu_member2","","male","","< 14,000,000","indonesia"],
            ["benoya892@ymail.com","Benny Bintang Prayoga","87886743189","3210110509890060","nu_member1","32756","male","Accountant","< 14,000,000","indonesia","Jakarta Raya"],
            ["bigisgis@gmail.com","Sabbichis","6289609415101","3320020807890010","nu_member1","32697","male","Designer","< 14,000,000","indonesia","Central Java"],
            ["bintangsemesta2019@gmail.com","YUSUF BINTANG SEMESTA SS","62895334129487","3510160805090000","nu_member2","39941","male","Accountant","< 14,000,000","indonesia","East Java"],
            ["budisulistiyono1972@gmail.com","Budi Sulistiyono","81225755325","3320032201720000","nu_member1","26320","male","Teacher","< 14,000,000","indonesia","Central Java"],
            ["butun8229@gmail.com","Muhamad Mujrifin","6285732030382","","nu_member1","","male","Teacher","< 14,000,000","indonesia","East Java"],
            ["byma2349@gmail.com","Widiawan arianto","6285866665997","3307060801740000","nu_member1","27242","male","Waiter/Waitress","< 14,000,000","indonesia","Central Java"],
            ["cahkratonsolo@gmail.com","Budiantoro","6281391376900","3372031307670000","nu_member2","24666","male","Accountant","< 14,000,000","indonesia","Central Java"],
            ["candrasusetyo54@gmail.com","Candra susetyo utomo","6285748546539","3509111201800000","nu_member1","29232","male","Teacher","< 14,000,000","indonesia","East Java"],
            ["cepia47@gmail.com","Cepi Andriana","6287877243056","3203071111860000","nu_member1","31727","male","Factory worker","42,000,000 ~ 70,000,000","indonesia","West Java"],
            ["cvsumberurip.cs@gmail.com","Suliyono","6281221828973","7371091002720000","nu_member1","26574","male","Accountant","< 14,000,000","indonesia","South Sulawesi"],
            ["dadi.sampoerno@gmail.com","Dadi Sampurno","628156080245","3273230602630000","nu_member1","23048","male","Farmer","14,000,000 ~ 42,000,000","indonesia","West Java"],
            ["danisja06@gmail.com","Dani sanjaya","6288221649469","3324181209950000","nu_member1","34954","male","Farmer","< 14,000,000","indonesia","Central Java"],
            ["dede_kokoronotomo@yahoo.com","Dede Suhendra","6282273124919","1209200502910000","nu_member1","33360","male","Accountant","< 14,000,000","indonesia","West Sumatra"],
            ["dedynyamuk03@gmail.com","Dedy hariyanto","6289636792016","3275060106750020","nu_member1","27400","male","Mechanic","< 14,000,000","indonesia","West Java"],
            ["deksoedh57@gmail.com","Made Sudarsana","82146469606","5108092111570000","nu_member1","44521","male","Cleaner","< 14,000,000","indonesia","Bali"],
            ["didinahmads347@gmail.com","Didin Ahmad syehabudin","6287708263944","3214100908930000","nu_member2","34220","male","Mechanic","< 14,000,000","indonesia","West Java"],
            ["dita.anggraeni1702@gmail.com","Dita","6285320579642","3508205711990000","nu_member1","36481","female","Farmer","< 14,000,000","indonesia","East Java"],
            ["dodibizkaryadi@gmail.com","Dodi Karyadi","6285223325499","3278070508560000","nu_member2","20672","male","Pharmacist","< 14,000,000","indonesia","West Java"],
            ["domitae32@gmail.com","Dominikus Tae Mau","6282144884544","5321010908840000","nu_member2","30903","male","Waiter/Waitress","< 14,000,000","indonesia","East Nusa Tenggara"],
            ["donnybali99@yahoo.co.id","I kadek sudiarta","6281805321927","5171011204700000","nu_member2","25906","male","Factory worker","< 14,000,000","indonesia","Bali"],
            ["dwi62968@gmail.com","Dwi nugroho","6281231240696","3515062907680000","nu_member2","25048","male","Factory worker","< 14,000,000","indonesia","East Java"],
            ["eengjunaidi40@gmail.com","eeng junaedi","81340447423","7103161708870000","nu_member2","32006","male","Cleaner","< 14,000,000","indonesia","Lampung"],
            ["ekosetiawan49@rocketmail.com","Eko Setiawan","628985778991","","nu_member2","33258","male","Electrician","< 14,000,000","indonesia","West Java"],
            ["elviedy007@gmail.com","Anwar","6285260638508","1107062509910000","nu_member2","33506","male","Travel agent","14,000,000 ~ 42,000,000","indonesia","Aceh"],
            ["enangsuharna1977@gmail.com","ENANG SUHARNA","82199218768","3211200410770000","nu_member1","28402","male","Accountant","< 14,000,000","indonesia","Jakarta Raya"],
            ["erwinirvandi15@gmail.com","Erwin Irvandi Putra","6283165486522","6171052904980010","nu_member2","44315","male","Accountant","< 14,000,000","indonesia","West Kalimantan"],
            ["f3r4.backup@gmail.com","Fera","6281540876481","3573014902700000","nu_member2","25608","female","Accountant","14,000,000 ~ 42,000,000","indonesia","East Java"],
            ["fauzi.fz1988@gmail.com","Pauji","85890480034","3276030811880000","nu_member1","32365","male","Waiter/Waitress","< 14,000,000","indonesia","West Java"],
            ["fauziapriansah8@gmail.com","Fauzi apriansah","85773102670","3271041204900010","nu_member1","32975","male","Mechanic","< 14,000,000","indonesia","Jakarta Raya"],
            ["ferian2994@gmail.com","ferian dwi cahyo","81548335118","3373042907940000","nu_member2","34544","male","Photographer","< 14,000,000","indonesia","Central Java"],
            ["fidiyantdwi2312@gmail.com","Dwi fidiyanto","85877253389","3307092312800000","nu_member1","29578","male","Taxi driver","14,000,000 ~ 42,000,000","indonesia","Central Java"],
            ["fikriimanula@gmail.com","FIKRI IMAAH","6281354704412","3504022612950000","nu_member1","35059","male","Factory worker","< 14,000,000","indonesia","East Java"],
            ["fini.bwi11@gmail.com","FINI DIA AGUSTIN","8123490422","3510165606940000","nu_member2","34501","female","Chef/Cook","< 14,000,000","indonesia","East Java"],
            ["fortunestar79@gmail.com","BIMO ADI SAPUTRO","6289527142823","3308101101800000","nu_member2","29231","male","Accountant","14,000,000 ~ 42,000,000","indonesia","Central Java"],
            ["gearjangkrik@gmail.com","Satria Azriell","6287842436189","","nu_member1","37661","male","Factory worker","< 14,000,000","indonesia","West Java"],
            ["giangultom@gmail.com","Sugiyanto","6281259996387","3578301204770000","nu_member2","28227","male","Taxi driver","< 14,000,000","indonesia","East Java"],
            ["ginanjarramdham920@gmail.com","Ginanjar Ramdhan Mahmud","6281910234562","3273042506840000","nu_member1","30858","male","Accountant","< 14,000,000","indonesia","West Java"],
            ["gusagungok@gmail.com","IDA BAGUS PUTU AGUNG","6285339251719","5104030204800000","nu_member2","29255","male","Journalist","14,000,000 ~ 42,000,000","indonesia","Bali"],
            ["halimmulyana9@gmail.com","Halim Mulyana","6281394079789","3175030110600000","nu_member1","22190","male","Accountant","14,000,000 ~ 42,000,000","indonesia","West Java"],
            ["hansmechanic4@gmail.com","Sri hananto","6282265564535","3307092709770000","nu_member2","28395","male","Mechanic","< 14,000,000","indonesia","Central Java"],
            ["harryssaputra51@gmail.com","Harrys saputra","6281317469753","3172020911900000","nu_member1","33127","male","Cleaner","< 14,000,000","indonesia","Jakarta Raya"],
            ["hartoto1232@gmail.com","Hartoto","6285648867768","3525100812620000","nu_member1","22988","male","Waiter/Waitress","< 14,000,000","indonesia","Others"],
            ["heraldaguw@gmail.com","Herald aguw","6289695314296","7102022006860000","nu_member2","31583","male","Electrician","70,000,000 ~ 140,000,000","indonesia","North Sulawesi"],
            ["hfikat@gmail.com","Taufik Hidayat","6287876868272","3205112709910000","nu_member2","33143","male","Waiter/Waitress","42,000,000 ~ 70,000,000","indonesia","East Java"],
            ["iirwansyah832@gmail.com","Irwansyah","6285667648760","1401121501780000","nu_member1","28505","male","Mechanic","14,000,000 ~ 42,000,000","indonesia","Riau"],
            ["imandenarfatea@gmail.com","imandenarfatea@gmail.com","85778499997","3271042504840020","nu_member2","30797","male","Cleaner","< 14,000,000","indonesia","Central Java"],
            ["imronrosyadi2775@gmail.com","Imron Rosyadi","6285105353987","3674062706750000","nu_member2","27572","male","Farmer","< 14,000,000","indonesia","Banten"],
            ["indiansyah1@yahoo.com","Iman nurdiansyah","6282234537788","3507162907850000","nu_member1","31257","male","Accountant","< 14,000,000","indonesia","East Java"],
            ["indira.savitri14@yahoo.co.id","Kadek Indira Savitri","6281517104154","5104035406000000","nu_member2","36691","female","Scientist","< 14,000,000","indonesia","Bali"],
            ["indriyani@gmail.com","Siti Masyayu","6285348874889","6202096103800000","nu_member1","29528","female","Teacher","< 14,000,000","indonesia","Kalimantan Tengah"],
            ["iqbaljaelani64@gmail.com","Suhitarini Putri","6287819950903","3175074320690000","nu_member2","25479","female","Software Engineer","281,000,000 ~ 422,000,000","indonesia","Jakarta Raya"],
            ["irnanovita2@gmail.com","Irna novita","6285244059441","9171056911740000","nu_member2","27362","female","Nurse","14,000,000 ~ 42,000,000","indonesia","East Java"],
            ["isarrich@gmail.com","Humisar Sihite","6285776442862","3175100901680000","nu_member2","25082","male","Author","14,000,000 ~ 42,000,000","indonesia","Jakarta Raya"],
            ["ismailhipo01@gmail.com","Ismail","6285382378007","1806202004770000","nu_member1","28235","male","Accountant","< 14,000,000","indonesia","Lampung"],
            ["ivan@yahoo.com","Ivan","88888882","88888882","nu_member1","","male","","< 14,000,000","indonesia"],
            ["iwanaziez@gmail.com","I A Siswanto s","6285101743970","3510162705740000","nu_member1","27176","male","Architect","< 14,000,000","indonesia","East Java"],
            ["jannuassanni@gmail.com","JAENUDIN","6281291615219","3328051304940000","nu_member2","33725","male","Chef/Cook","< 14,000,000","indonesia","Central Java"],
            ["jasgundhul@gmail.com","Yusri Ansyah","6281558212775","3507112306750000","nu_member2","27568","male","Travel agent","14,000,000 ~ 42,000,000","indonesia","Central Java"],
            ["jerry.tang@segnel.com","Tang Chu Ching","6594881645","8989898989","nu_member1","","male","","< 14,000,000","indonesia"],
            ["jerry@yahoo.com","Jerry","88888880","88888880","nu_member1","","male","","< 14,000,000","indonesia"],
            ["jerrytang@cubeneko.com","Jerry","60122892559","890611055555","nu_member1","","male","","< 14,000,000","indonesia"],
            ["jhonhendri00012@gmail.com","jhonhendri","6285284443838","1673052503740000","nu_member2","","male","Taxi driver","< 14,000,000","indonesia","South Sumatra"],
            ["jonindra68@gmail.com","Jon Indra","6281363326768","2172020506680000","nu_member2","24994","male","Accountant","< 14,000,000","indonesia","Riau Islands"],
            ["jubaidah809@gmail.com","Siti Jubaidah","6285891171626","3201295411790000","nu_member2","","female","Teacher","< 14,000,000","indonesia","West Java"],
            ["julitatrisma@gmail.com","Trisma julita","82285679288","","nu_member1","34795","female","Waiter/Waitress","< 14,000,000","indonesia","West Sumatra"],
            ["JUNAIDIcpay2020@gmail.com","Junaidi","6285249148143","6271031207680000","nu_member2","25179","male","Accountant","< 14,000,000","indonesia","Kalimantan Tengah"],
            ["kafirijaljiwani@gmail.com","Kafi Rijal jiwani","6283146531907","7408011702040000","nu_member1","38034","male","Mechanic","< 14,000,000","indonesia","Central Java"],
            ["kamilahlulu23@gmail.com","Lulu Nurul Kamilah","6288801817881","3273034104870000","nu_member2","31868","female","Accountant","14,000,000 ~ 42,000,000","indonesia","West Java"],
            ["kangagus.bwi@gmail.com","AGUS SUSIANTO","82132493538","3510161608660000","nu_member2","24335","male","Mechanic","< 14,000,000","indonesia","East Java"],
            ["kelly@gmail.com","kelly","12358964","12358964","nu_member1","","male","","< 14,000,000","indonesia"],
            ["kristianhartarto0606@gmail.com","kristian","6282333743975640","6471030402610000","nu_member1","22373","male","Mechanic","< 14,000,000","indonesia","East Java"],
            ["kristinahs317@gmail.com","Kristina","6283875977493","3674036405640000","nu_member1","23521","female","Accountant","14,000,000 ~ 42,000,000","indonesia","Banten"],
            ["kurdiimam667@gmail.com","Sodiq","85738293208","3571012304710000","nu_member1","26046","male","Designer","< 14,000,000","indonesia","East Java"],
            ["lanz@yahoo.com","Lanz","88888883","88888883","nu_member1","","male","","< 14,000,000","indonesia"],
            ["lanzchan@gmail.com","Lanz Chan","123456","123456","nu_member2","","male","","< 14,000,000","indonesia"],
            ["lektik.bwi11@gmail.com","SUKIYATI","81216413910","3510167006660060","nu_member2","24288","female","Chef/Cook","< 14,000,000","indonesia","East Java"],
            ["lunacellebi@gmail.com","Hamba Allah","6289670023558","","nu_member2","","male","Accountant","> 704,000,000","indonesia","Aceh"],
            ["lusoyongquan@gmail.com","luso","102199449","12345678","nu_member1","32477","male","Accountant","< 14,000,000","indonesia","Aceh"],
            ["lynnkuok@gmail.com","Lynn Kuok","","","nu_member2","","male","","< 14,000,000","indonesia"],
            ["m.faiz.khoirur@gmail.com","M. Faiz Khoirur Rizky","6283183899698","2171111505999000","nu_member1","36295","male","Mechanic","42,000,000 ~ 70,000,000","indonesia","Riau Islands"],
            ["madimadi1274@gmail.com","Ahmadi","6285842779772","3404141201740000","nu_member1","27364","male","Tailor","< 14,000,000","indonesia","Daerah Istimewa Yogyakarta"],
            ["mahmudinjepara1@gmail.com","Mahmudin","6281338763249","3320070605790000","nu_member1","29011","male","Gardener","< 14,000,000","indonesia","East Java"],
            ["mapala31@gmail.com","M Noor Efendi","6289688238855","3524252004950000","nu_member2","34809","male","Designer","< 14,000,000","indonesia","East Java"],
            ["mas.adiwibowo2769@gmail.com","Adi Wibowo","6282378904300","1701050704730000","nu_member1","26761","male","Mechanic","< 14,000,000","indonesia","Bengkulu"],
            ["max_jm3@yahoo.com","Ivan Fan","6598373909","S7340775C","nu_member1","26976","male","Dustman/Refuse collector","> 704,000,000","indonesia","Bali"],
            ["medansuka252525@gmail.com","MUHAMMAD YUSUF","6282163245665","1207051304840000","nu_member1","30785","male","Teacher","< 14,000,000","indonesia","North Sumatra"],
            ["meganurhayati050@gmail.com","Nurhayati","895331741877","3276034407710000","nu_member1","26030","female","Cleaner","< 14,000,000","indonesia","East Java"],
            ["mesakpanie1505@gmail.com","Mesak Panie","81329608961","5371031505860010","nu_member2","31486","male","Accountant","< 14,000,000","indonesia","East Nusa Tenggara"],
            ["mhbaihaqi@yahoo.com","Muhammad Baihaqi","6285775614970","1171072412890000","nu_member1","32866","male","Real estate agent","< 14,000,000","indonesia","West Java"],
            ["midiand4f@gmail.com","midian syaputra","6282374041989","1701020205890000","nu_member2","32630","male","Electrician","< 14,000,000","indonesia","Bengkulu"],
            ["mito.bwi11@gmail.com","Hadi Sumito","62895334129231","3510161503830000","nu_member2","30390","male","Chef/Cook","< 14,000,000","indonesia","East Java"],
            ["mmmicromaximum@gmail.com","Ahmad fajri","62816975279","3522073008840000","nu_member1","30924","male","Photographer","< 14,000,000","indonesia","East Java"],
            ["mshodiqin25@gmail.com","M Shodiqin","6285648015845","3517190209610000","nu_member1","22321","male","Butcher","42,000,000 ~ 70,000,000","indonesia","East Java"],
            ["mucas_brs@yahoo.com","Mochammad Mukhlas","6281936940714","3514142007730000","nu_member1","26865","male","Accountant","< 14,000,000","indonesia","East Java"],
            ["muhammadfauzibinzou@gmail.com","Muhammad fauzi bunzou","6285710006440","371021411860003","nu_member2","31730","male","Teacher","< 14,000,000","indonesia","West Java"],
            ["namira2030@gmail.com","Mira Casmirah","6281462274321","3279046508690000","nu_member1","25441","female","Accountant","< 14,000,000","indonesia","West Java"],
            ["netin.marketing@gmail.com","Andri Sani","6281214126685","3277020501870010","nu_member1","31782","male","Software Engineer","< 14,000,000","indonesia","West Java"],
            ["ngojanktatank.19@gmail.com","Mustatang","6285247054615","6402021902850000","nu_member2","31097","male","Accountant","< 14,000,000","indonesia","East Kalimantan"],
            ["nilachandracahyani@gmail.com","Nila Candra Cahyani","85735667108","3505116102980000","nu_member1","35847","female","Shop assistant","< 14,000,000","indonesia","East Java"],
            ["nilasuyanti621@gmail.com","Nila suyanti","6282387256974","1371086609740000","nu_member2","27298","female","Accountant","< 14,000,000","indonesia","Others"],
            ["nilawatieka989@gmail.com","Eka nilawati","89604820218","3276045208950000","nu_member1","34923","female","Accountant","< 14,000,000","indonesia","Jakarta Raya"],
            ["nj02051997@gmail.com","Nurjanah","87732970191","3276074205970000","nu_member1","35466","female","Waiter/Waitress","< 14,000,000","indonesia","West Java"],
            ["novan9sg@gmail.com","Novantri Zakariya","6281617774586","3216181411000000","nu_member1","36844","male","Waiter/Waitress","< 14,000,000","indonesia","West Java"],
            ["noviatika_putri@yahoo.com","Novi atika qusnasari putri","6289513231648","5171036411960000","nu_member1","35393","female","Baker","< 14,000,000","indonesia","Bali"],
            ["nrs.bwi@gmail.com","NURMAINI RAHMANIAH","6281336192427","3510165105740000","nu_member2","27160","female","Teacher","< 14,000,000","indonesia","East Java"],
            ["nurlelawati449@gmail.com","Nurlelawati","6287748687155","3271065210780010","nu_member2","28834","female","Teacher","< 14,000,000","indonesia","West Java"],
            ["nurul.citrafm@gmail.com","Nurul Hidayati","6281368332622","1673076812800000","nu_member1","29583","female","Teacher","70,000,000 ~ 140,000,000","indonesia","South Sumatra"],
            ["nusohandoko01@gmail.com","NusoHandoko","81342665026","3525141110620000","nu_member2","44298","male","Taxi driver","< 14,000,000","indonesia","East Java"],
            ["osupri429@gmail.com","Supriono","62818831981","3172050809811000","nu_member1","29807","male","Lawyer","< 14,000,000","indonesia","Jakarta Raya"],
            ["paknabil153@gmail.com","Agus prastiyo","85290339366","3318072209890000","nu_member1","32773","male","Teacher","< 14,000,000","indonesia","West Java"],
            ["pedrasnuri@gmail.com","Fery Haryanto","6285269478904","1802171202770000","nu_member1","28461","male","Mechanic","< 14,000,000","indonesia","Lampung"],
            ["psupriasa@gmai.com","Putu Supriasa","82339295554","5108093112640140","nu_member2","","male","Hairdresser","14,000,000 ~ 42,000,000","indonesia","Bali"],
            ["pujionoendik@gmail.com","Endik pujiono","6285812232475","3505110506800000","nu_member1","29347","male","Accountant","< 14,000,000","indonesia","East Java"],
            ["putriilkom@gmail.com","PUTRIE CHRISTIANTI SEPTIA","6282217611284","3207156409880000","nu_member2","32410","female","Teacher","< 14,000,000","indonesia","West Java"],
            ["putudanaarjana8@gmail.com","I putu dana arjans","6281337639469","5171030507560000","nu_member2","20582","male","Policeman/Policewoman","< 14,000,000","indonesia","Bali"],
            ["ramac1996@gmail.com","Ramadan fadilah","628889344979","3276051302960000","nu_member2","35108","male","Designer","< 14,000,000","indonesia","East Java"],
            ["regalia.star@gmail.com","Vhegy dwinata","6282177107477","1771071609930000","nu_member2","34228","male","Taxi driver","< 14,000,000","indonesia","Bengkulu"],
            ["rickypunyaokta@gmail.com","Rieky","6281283532089","1671091001890000","nu_member1","32782","male","Taxi driver","< 14,000,000","indonesia","Others"],
            ["rikoantono86436@gmail.com","Gerhad Irianto","6281333220549","3515181907650000","nu_member2","23942","male","Florist","< 14,000,000","indonesia","East Java"],
            ["rinita.astuti2802@gmail.com","Rinita Astuti","628128647964","3216196802740000","nu_member1","","male","","< 14,000,000","indonesia"],
            ["ririsurahman10@gmail.com","Riri surahman","6285813092730","1804112508970000","nu_member1","35667","male","Accountant","< 14,000,000","indonesia","Banten"],
            ["riyadisugenk1974@gmail.com","Sugeng Riyadi","6281249413400","1404151710740000","nu_member2","27319","male","Architect","42,000,000 ~ 70,000,000","indonesia","Central Java"],
            ["robinolajer@gmail.com","AHMAD ROBANI","6281227094757","3374032511690000","nu_member2","25532","male","Actor / Actress","14,000,000 ~ 42,000,000","indonesia","Central Java"],
            ["rthoqif@gmail.com","Thopan Wismadihardjo","6285770281504","3174101806790000","nu_member2","29024","male","Cleaner","70,000,000 ~ 140,000,000","indonesia","Banten"],
            ["rudy.citrafm@gmail.com","Rudy Setiyono","8117104535","1673072201770000","nu_member1","28147","male","Journalist","42,000,000 ~ 70,000,000","indonesia","South Sumatra"],
            ["rukhinm5@gmail.com","Masrukhin","61281081542777800","3305123112710000","nu_member1","26298","male","Teacher","< 14,000,000","indonesia","Central Java"],
            ["rushdi8585@gmail.com","Rusdianto","6285278728585","3275030403860010","nu_member2","31475","male","Travel agent","70,000,000 ~ 140,000,000","indonesia","West Java"],
            ["s4s24karat@gmail.com","Tasir","81808227449","3172042003710000","nu_member2","26012","male","Fisherman","14,000,000 ~ 42,000,000","indonesia","Jakarta Raya"],
            ["samokogogo@gmail.com","Gogo Tri Samoko","6285355404978","3201130505690000","nu_member1","25328","male","Politician","< 14,000,000","indonesia","Riau"],
            ["sandiputtra7@gmail.com","Wasno","6285368991204","160821207570002","nu_member1","21161","male","Accountant","< 14,000,000","indonesia","Aceh"],
            ["saptay70@gmail.com","I gusti ketut sapta yoga","6288219088586","5102052606700000","nu_member2","25745","male","Chef/Cook","14,000,000 ~ 42,000,000","indonesia","Bali"],
            ["sendekal22@gmail.com","Sayidin","81808297571","3302212404870000","nu_member1","31891","male","Waiter/Waitress","< 14,000,000","indonesia","Central Java"],
            ["sendy.majafara@yahoo.co.uk","Sendy Majafara","62895411752766","1171021008810000","nu_member1","29808","male","Travel agent","70,000,000 ~ 140,000,000","indonesia","Aceh"],
            ["setiatilysagus@gmail.com","Lys agus setiati","6281293091667","3276054508680000","nu_member1","44256","female","Travel agent","42,000,000 ~ 70,000,000","indonesia","Jakarta Raya"],
            ["sharychemonk8@gmail.com","sawal Kusnun","6282291213293","7210061806850000","nu_member2","31216","male","Accountant","< 14,000,000","indonesia","North Sulawesi"],
            ["singgihfreedom@gmail.com","Singgih purwanto","82313245600","3320061406740000","nu_member1","27194","male","Journalist","< 14,000,000","indonesia","East Java"],
            ["sitimasanah43@gmail.com","Siti Mas'anah","82336174665","3318205111650000","nu_member1","24057","female","Teacher","< 14,000,000","indonesia","Central Java"],
            ["sri.bwi11@gmail.com","Sri Agustin","62895334128498","3510165108860000","nu_member2","31635","female","Chef/Cook","< 14,000,000","indonesia","East Java"],
            ["stkhodijah7476@gmail.com","St Khodijah, S.Sos, S.Pd.","6289681487973","3173054704760010","nu_member2","27857","male","Accountant","< 14,000,000","indonesia","Jakarta Raya"],
            ["subagia58@gmail.com","I MADE SUBAGIA,SPdKn","6281338193132","5108092005580000","nu_member1","21325","male","Accountant","< 14,000,000","indonesia","Bali"],
            ["sukarja@gmail.com","Sukarja","62817817042","3173051503730000","nu_member2","26738","male","Designer","< 14,000,000","indonesia","Jakarta Raya"],
            ["suryasemesta2017@gmail.com","AHMAD SURYA SEMESTA SS","62895334129247","3510160308060000","nu_member2","38784","male","Accountant","< 14,000,000","indonesia","East Java"],
            ["syakirasyakir@gmail.com","Syakira Hilwa","6289646805781","3173055604060000","nu_member2","38823","female","Lecturer","< 14,000,000","indonesia","Jakarta Raya"],
            ["tampahkletong@gmail.co","Suyanto","6285804422334","3520110201920000","nu_member1","33635","male","Bus driver","< 14,000,000","indonesia","East Java"],
            ["tardianatatang86@gmail.com","Tatang Tardiana","6287720471123","3214140902880000","nu_member1","32182","male","Lifeguard","140,000,000 ~ 281,000,000","indonesia","West Java"],
            ["tatikwijayati974@gmail.com","Tatik wijanti","6285764131387","1608035011860000","nu_member1","31696","female","Cleaner","< 14,000,000","indonesia","West Sumatra"],
            ["thomasaditiya112@gmail.com","Thomas","6287704541167","6371040103010010","nu_member2","36951","male","Pharmacist","< 14,000,000","indonesia","South Kalimantan"],
            ["timotiusmichael@gmail.com","Michael Timotius","6281292580885","3172040805920000","nu_member2","33821","male","Model","< 14,000,000","indonesia","Jakarta Raya"],
            ["toink.as@gmail.com","Aris setiyanto","6289507747407","3275123107800000","nu_member1","29433","male","Farmer","< 14,000,000","indonesia","West Java"],
            ["toknwok@gmail.com","Agung Suwito","6281299116878","3172011008851000","nu_member2","31269","male","Software Engineer","< 14,000,000","indonesia","West Java"],
            ["tomytri93@gmail.com","tomy tri nur oktaviyan","82249386275","3276022910930010","nu_member2","34271","male","Waiter/Waitress","< 14,000,000","indonesia","Jakarta Raya"],
            ["tshananto67@gmail.com","Sri Hananto","6281319430218","3505122205670000","nu_member2","24614","male","Politician","< 14,000,000","indonesia","East Java"],
            ["via.bwi11@gmail.com","Vina Istiawati Agustin","62895334128516","3510165008000000","nu_member2","36748","female","Secretary","< 14,000,000","indonesia","East Java"],
            ["warasumantri@gmail.com","warsa sumantri","6289634501325","3271051608830020","nu_member2","30544","male","Accountant","< 14,000,000","indonesia","East Kalimantan"],
            ["wdjaloe@gmail.com","Jalu Widibyo","6287862313363","5171040501770000","nu_member2","28130","male","Designer","70,000,000 ~ 140,000,000","indonesia","Bali"],
            ["witjakawit@gmail.com","Witjaksono","6281383335516","3275042009810020","nu_member1","29849","male","Politician","> 704,000,000","indonesia","Banten"],
            ["www.riniagennasa07@gmail.com","Rini Widoastutik","6285735482719","3520084712900000","nu_member1","33066","female","Shop assistant","< 14,000,000","indonesia","East Java"],
            ["yansah2112@gmail.com","yanuarius sah","6281905250069","3276022101710000","nu_member2","25954","male","Accountant","< 14,000,000","indonesia","East Java"],
            ["yanwiad54@gmail.com","Wayan Wiadnyana","62817560666","5104032008540000","nu_member2","19956","male","Accountant","70,000,000 ~ 140,000,000","indonesia","Bali"],
            ["yepejualan@gmail.com","yan palapa","62811887654","5171021701740000","nu_member1","27046","male","Photographer","14,000,000 ~ 42,000,000","indonesia","Bali"],
            ["yosephiskandar@gmail.com","Yoseph Iskandar","6285901646660","3214010612690000","nu_member1","25366","male","Accountant","< 14,000,000","indonesia","West Java"],
            ["yudhydyk@gmail.com","Yudi Arrahman","82146469595","2101091704790000","nu_member2","28962","male","Accountant","< 14,000,000","indonesia","Riau Islands"],
            ["yudo1001@gmail.com","ROY YUDONO SIREGAR","6281317562133","3175021001720010","nu_member2","26308","male","Taxi driver","14,000,000 ~ 42,000,000","indonesia","Jakarta Raya"],
            ["yuntaberedar50@gmail.com","Yunta kamandanu","5653331428711","5171041506750000","nu_member2","27560","male","Designer","14,000,000 ~ 42,000,000","indonesia","Bali"],
            ["zakkipandawa@gmail.com","Moh.nursalim almuzakki","6282228399174","3518061110930000","nu_member1","34253","male","Waiter/Waitress","< 14,000,000","indonesia","East Java"],
            
        ];


    

        foreach ($userinfo as $key => $value) {
            $userinfo = UserInfo::where('phone', '+'.$value[2])->first();
            $nric = UserInfo::where('nric', $value[3])->first();
            $email = User::where('email', $value[0])->first();

            if($userinfo == null && $nric== null){

                if($email == null){
                    $newUser = User::create([
                        "name" => $value[1] ?? "",
                        "email" => $value[0] ?? "",
                        "tag" => "user",
                    ]);

                    UserInfo::create([
                        "user_id" => $newUser->id,
                        "phone" => '+'.$value[2] ?? "",
                        "nric" => $value[3] ?? "",
                        "nu_member" => $value[4] ?? "",
                        "gender" => $value[6] ?? "",
                        "occupation" => $value[7] ?? "",
                        "income" => $value[8] ?? "",
                        "country" => $value[9] ?? "",
                        "state" => $value[10] ?? "",
                    ]);
                }else{
                    UserInfo::create([
                        "user_id" => $email->id,
                        "phone" => '+'.$value[2] ?? "",
                        "nric" => $value[3] ?? "",
                        "nu_member" => $value[4] ?? "",
                        "gender" => $value[6] ?? "",
                        "occupation" => $value[7] ?? "",
                        "income" => $value[8] ?? "",
                        "country" => $value[9] ?? "",
                        "state" => $value[10] ?? "",
                    ]);
                }
            }
        }
    }
}
