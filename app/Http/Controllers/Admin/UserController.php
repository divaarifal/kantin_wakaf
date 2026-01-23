<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'customer')->withCount('transactions')->get();
        
        // Calculate achievements
        foreach ($users as $user) {
            $user->vouchers_earned = floor($user->transactions_count / 10);
            $user->progress = ($user->transactions_count % 10) * 10;
        }

        return view('admin.users.index', compact('users'));
    }

    public function destroy(User $user)
    {
        // Prevent deleting other admins if logic changes, though query filters for 'customer'
        if ($user->role !== 'customer') {
             return redirect()->route('admin.users.index')->with('error', 'Cannot delete admin users via this panel.');
        }

        $user->delete();
        return redirect()->route('admin.users.index')->with('success', 'User deleted successfully.');
    }
}
