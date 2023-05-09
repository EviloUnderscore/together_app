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

    public function getActivityById($id) {
        $activity = Activity::with('category', 'user')->find($id);

        return Inertia::render('ActivityDetails', [
            'activity' => $activity
        ]);
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
