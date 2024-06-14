<?php

namespace App\Http\Controllers\Mobile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Mosque;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class MosqueController extends Controller
{
    public function view_mosque(Request $request)
    {
        if ($request->token == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Token Required"
            ));
        } else if ($request->latitude == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Latitude Required"
            ));
        } else if ($request->longitude == "") {
            return response()->json(array(
                "success" => false,
                "message" => "Longitude Required"
            ));
        }

        $mosque = Mosque::all();
        $mosqueData = [];

        //dd($mosque);
        foreach ($mosque as $key => $value) {
            $mosqueData[$key]['mosque_name'] = $value->mosque_name;
            $mosqueData[$key]['mosque_image'] = $value->mosque_image;
            $mosqueData[$key]['latitude'] = $value->latitude;
            $mosqueData[$key]['longitude'] = $value->longitude;
            $mosqueData[$key]['distance'] = round($this->distance($request->latitude, $request->longitude, $value->latitude, $value->longitude, "K"), 2);
        }

        return response()->json(array(
            "success" => true,
            "mosque" => $mosqueData,
        ));
    }

    public function distance($lat1, $lon1, $lat2, $lon2, $unit)
    {
        if (($lat1 == $lat2) && ($lon1 == $lon2)) {
            return 0;
        } else {
//            Log::error('https://maps.googleapis.com/maps/api/distancematrix/json?key=' .
//                env('MAP_KEY', 'AIzaSyD75pkY60-dnbhTQQ6JC2gmhtP6pH6t-ZM') .
//                '&origins=' . $lat1 . ',' . $lon1 . '&destinations=' . $lat2 . ',' . $lon2 . '&mode=driving');
//            $response = Http::get('https://maps.googleapis.com/maps/api/distancematrix/json?key=' .
//                env('MAP_KEY', 'AIzaSyD75pkY60-dnbhTQQ6JC2gmhtP6pH6t-ZM') .
//                '&origins=' . $lat1 . ',' . $lon1 . '&destinations=' . $lat2 . ',' . $lon2 . '&mode=driving');
//            Log::error($response);
//            Log::error($response['rows']['elements']['distance']['value']);
            $theta = $lon1 - $lon2;
            $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) + cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
            $dist = acos($dist);
            $dist = rad2deg($dist);
            $miles = $dist * 60 * 1.1515;
            $unit = strtoupper($unit);

            if ($unit == "K") {
                return ($miles * 1.609344);
            } else if ($unit == "N") {
                return ($miles * 0.8684);
            } else {
                return $miles;
            }
        }
    }
}
