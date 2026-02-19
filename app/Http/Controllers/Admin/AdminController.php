<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function adminChangePassword()
    {
        return view('admin.auth.change-password');
    }

    public function adminUpdatePassword(\Illuminate\Http\Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $admin = \Illuminate\Support\Facades\Auth::guard('admin')->user();

        if (!\Illuminate\Support\Facades\Hash::check($request->current_password, $admin->password)) {
            return back()->with('error', 'Current password does not match.');
        }

        $admin->password = \Illuminate\Support\Facades\Hash::make($request->new_password);
        $admin->save();

        return back()->with('status', 'Password changed successfully.');
    }

    public function index (){

          // User Statistics
        $newUsersCount = User::where('created_at', '>=', Carbon::now()->subDays(7))->count();
        $totalUsers = User::count();

        // Total Shared Posts
        $totalSharedPosts = \App\Models\SharedPost::count();

         // Recent Activity
        $recentUsers = User::latest()->take(5)->get();
        $result = User::latest()->paginate(10);


        return view('admin.home', compact(
            'newUsersCount',
            'totalUsers',
            'totalSharedPosts',
            'result',
            'recentUsers',
        ));
     
    }

}
