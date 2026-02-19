<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SharedPost;

class HomeController extends Controller
{
    public function homepage()
    {
        $posts = SharedPost::orderBy('created_at', 'desc')->get();
        return view('home.homepage', compact('posts'));
    }
}
