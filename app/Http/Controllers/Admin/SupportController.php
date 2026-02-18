<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;
use App\Models\User;

class SupportController extends Controller
{
    // List all users with support messages
    public function index()
    {
        $users = User::whereHas('supports')->with(['supports' => function($q) {
            $q->latest();
        }])->get();
        return view('admin.support.index', compact('users'));
    }

    // Show chat with a specific user
    public function chat($userId)
    {
        $user = User::findOrFail($userId);
        $messages = Support::where('user_id', $userId)->orderBy('created_at')->get();
        return view('admin.support.chat', compact('user', 'messages'));
    }

    // Send a message as admin
    public function send(Request $request, $userId)
    {
        $request->validate([
            'message' => 'required|string|max:2000',
        ]);
        $support = Support::create([
            'user_id' => $userId,
            'message' => $request->message,
            'is_admin' => true,
        ]);
        return response()->json(['success' => true, 'message' => $support]);
    }

    // Fetch messages for AJAX
    public function fetch($userId)
    {
        $messages = Support::where('user_id', $userId)->orderBy('created_at')->get();
        return view('admin.support.partials.messages', compact('messages'))->render();
    }

    // Edit admin message
    public function edit(Request $request, $id)
    {
        $support = Support::findOrFail($id);
        if (!$support->is_admin) {
            abort(403);
        }
        $request->validate(['message' => 'required|string|max:2000']);
        $support->message = $request->message;
        $support->save();
        return response()->json(['success' => true]);
    }

    // Delete admin message
    public function delete($id)
    {
        $support = Support::findOrFail($id);
        if (!$support->is_admin) {
            abort(403);
        }
        $support->delete();
        return response()->json(['success' => true]);
    }
}
