<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        $transactions = $user->transactions()->orderBy('created_at', 'desc')->get();
        
        // Calculate Voucher Eligibility
        $totalMeals = $transactions->count();
        $voucherAvailable = ($totalMeals > 0 && $totalMeals % 10 == 0);
        $nextVoucherAt = (ceil(($totalMeals + 1) / 10) * 10);
        $mealsToNextVoucher = $nextVoucherAt - $totalMeals;

        return view('profile.edit', compact('user', 'transactions', 'voucherAvailable', 'totalMeals', 'mealsToNextVoucher'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        /** @var \App\Models\User $user */
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
    }

    // Simulate QR Scan
    public function scanQr()
    {
        $user = Auth::user();
        
        /** @var \App\Models\User $user */
        $totalTransactions = $user->transactions()->count();
        $newCount = $totalTransactions + 1;
        $isMilestone = ($newCount % 10 == 0);

        Transaction::create([
            'user_id' => $user->id,
            'is_milestone' => $isMilestone
        ]);

        $message = "Transaction recorded!";
        if ($isMilestone) {
            $message .= " Congratulations! You've reached " . $newCount . " meals. You earned a 20% Discount Voucher!";
        }

        return redirect()->route('profile.edit')->with('success', $message);
    }
}
