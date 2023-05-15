<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Activity;

class ActivityController extends Controller
{

    // Get all activities within a 100km radius
    public function getActivitiesWithDistance(Request $request) {
        
        $activities = Activity::with('category', 'user')->get();
        $filtered_activites = [];

        foreach($activities as $activity){
            $activity->distance = round($this->computeDistance(
                $request->latitude, 
                $request->longitude, 
                $activity->lat,
                $activity->long), 2);

            if ($activity->distance <= 100){
                array_push($filtered_activites, $activity);
            }
        }
        return response()->json($filtered_activites);
    }

    public function getActivityById(Request $request) {
        $activity = Activity::with('category', 'user')->find($request->id);

        $activity->distance = round($this->computeDistance(
            $request->latitude, 
            $request->longitude, 
            $activity->lat,
            $activity->long), 2);

        return Inertia::render('ActivityDetails', [
            'activity' => $activity
        ]);
    }

    public function store(Request $request){
        
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://api.openweathermap.org/geo/1.0/direct?q=".$request->location."&limit=1&appid=b68afb69c2607c15cb4f6bf022f17e25",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "",
            CURLOPT_REFERER => "http://127.0.0.1:8000"
        ]);

        $response = curl_exec($curl);
        $error = curl_error($curl);
        curl_close($curl);

        $coords = json_decode($response, true);

        $date = $request->date;
        $timestamp = strtotime($date); // Convert ISO 8601 date to Unix timestamp
        $formatted_date = date('Y-m-d H:i:s', $timestamp);
        $request->merge([
            'date' => $formatted_date,
            'lat' => $coords[0]['lat'],
            'long' => $coords[0]['lon'],
        ]);

        $request->validate([
            'name' => 'required|max:255',
            'user_id' => 'integer',
            'category_id' => 'integer'
        ]);
        $input = $request->all();

        Activity::create($input);
        return redirect()->route('dashboard')->with('success', 'Resource added successfully');
    }

    //Compute distance between two earth point based on latitude and longitude (in KM)
    private function computeDistance($userLatitude, $userLongitude, $activityLatitude, $activityLongitude){
        $earth_radius = 6371;

        $userLat = deg2rad($userLatitude);
        $userLong = deg2rad($userLongitude);

        $activityLat = deg2rad($activityLatitude);
        $activityLong = deg2rad($activityLongitude);

        $deltaLat = $activityLat - $userLat;
        $deltaLong = $activityLong - $userLong;

        $a = sin($deltaLat/2) * (sin($deltaLat/2)) + cos($userLat) * cos($activityLat) * sin($deltaLong/2) * sin($deltaLong/2);
        $c = 2 * atan2(sqrt($a), sqrt(1-$a));

        return $earth_radius * $c;
    }
}
