<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Balance;
use App\Models\User;

class BalanceController extends Controller
{
    public function index($userId)
    {
        $user = User::findOrFail($userId);
        $balance = Balance::where('user_id', $userId)->first();
        return view('admin.user-balance', compact('user', 'balance'));
    }

    public function update(Request $request, $userId)
    {
        $request->validate([
            'wallet_balance' => 'required|numeric',
            'investment_balance' => 'required|numeric',
        ]);
        $balance = Balance::firstOrCreate(['user_id' => $userId]);
        $balance->wallet_balance = $request->wallet_balance;
        $balance->investment_balance = $request->investment_balance;
        $balance->save();
        return redirect()->back()->with('success', 'Balances updated successfully.');
    }
}
