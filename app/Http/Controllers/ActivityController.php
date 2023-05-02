<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Activity;
use App\Models\Category;

class ActivityController extends Controller
{

    public function getActivitiesWithDistance() {
        
        $activities = Activity::with('category', 'user')->get();

        return Inertia::render('Dashboard', [
            'activities' => $activities,
            'categories' => Category::all(),
        ]);
    }

    public function getActivityById($id) {
        $activity = Activity::with('category', 'user')->find($id);

        return Inertia::render('ActivityDetails', [
            'activity' => $activity
        ]);
    }
}
