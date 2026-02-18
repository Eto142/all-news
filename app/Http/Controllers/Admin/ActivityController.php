<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Activity;
use App\Models\User;

class ActivityController extends Controller {

    public function edit(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'type' => 'required|string|max:255',
        ]);
        $activity = Activity::findOrFail($id);
        $activity->description = $request->description;
        $activity->status = $request->status;
        $activity->time = $request->time;
        $activity->type = $request->type;
        $activity->save();
        return response()->json(['success' => true]);
    }
    public function index($userId)
    {
        $user = User::findOrFail($userId);
        $activities = Activity::where('user_id', $userId)->latest()->get();
        return view('admin.user-activities', compact('user', 'activities'));
    }

    public function store(Request $request, $userId)
    {
        $request->validate([
            'description' => 'required|string|max:255',
            'status' => 'required|string|max:100',
            'time' => 'required|string|max:100',
            'type' => 'required|in:inflow,outflow,null',
        ]);
        Activity::create([
            'user_id' => $userId,
            'description' => $request->description,
            'status' => $request->status,
            'time' => $request->time,
            'type' => $request->type,
        ]);
        return redirect()->back()->with('success', 'Activity added successfully.');
    }

    public function destroy($id)
    {
        $activity = Activity::findOrFail($id);
        $activity->delete();
        return redirect()->back()->with('success', 'Activity deleted successfully.');
    }
}
