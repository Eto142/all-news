<?php
// Relocate MembershipUpgradeController to Admin namespace

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

class MembershipUpgradeController extends \App\Http\Controllers\Controller
{
	/**
	 * Handle membership upgrade request from user.
	 */
	public function storeUpgradeRequest(Request $request)
	{
		$request->validate([
			'new_membership' => 'required|string',
			'amount' => 'required|numeric|min:0',
		]);

		$user = auth()->user();
		// Check for pending upgrade
		$pending = \App\Models\MembershipUpgrade::where('user_id', $user->id)->where('status', 0)->first();
		if ($pending) {
			return response()->json(['status' => 'error', 'message' => 'You have a pending upgrade request.'], 422);
		}

		\App\Models\MembershipUpgrade::create([
			'user_id' => $user->id,
			'previous_membership' => $user->membership_type ?? null,
			'new_membership' => $request->new_membership,
			'amount' => $request->amount,
			'status' => 0, // 0 = pending
		]);

		// Optionally, you can trigger a notification or mail here

		return response()->json(['status' => 'success', 'message' => 'We have received your request. We will send you a response via mail.']);
	}

	/**
	 * Admin: List all membership upgrade requests.
	 */
	public function adminIndex()
	{
		$upgrades = \App\Models\MembershipUpgrade::with('user')->latest()->paginate(20);
		return view('admin.membership_upgrades.index', compact('upgrades'));
	}

	/**
	 * Admin: Approve a membership upgrade request.
	 */
	public function adminApprove($id)
	{
		$upgrade = \App\Models\MembershipUpgrade::findOrFail($id);
		$upgrade->status = 1;
		$upgrade->approved_at = now();
		$upgrade->save();
		// Optionally update user's membership_type
		if ($upgrade->user) {
			$upgrade->user->membership_type = $upgrade->new_membership;
			$upgrade->user->save();
		}
		return redirect()->route('admin.upgrades.index')->with('status', 'Upgrade approved.');
	}

	/**
	 * Admin: Reject a membership upgrade request.
	 */
	public function adminReject($id)
	{
		$upgrade = \App\Models\MembershipUpgrade::findOrFail($id);
		$upgrade->status = 2; // 2 = rejected
		$upgrade->save();
		return redirect()->route('admin.upgrades.index')->with('status', 'Upgrade rejected.');
	}
}
