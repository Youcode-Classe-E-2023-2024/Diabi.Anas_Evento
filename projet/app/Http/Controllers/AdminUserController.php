<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    public function index()
    {
        $black_hover = 'Manage users';
        $users = User::All(); // Fetch all users with their roles

        return view('manageUsers', compact('users', 'black_hover'));
    }

    public function assignRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);
        $user->roles()->sync($request->roles);

        return redirect()->route('manageUsers')->with('success', 'Roles assigned successfully');
    }
    public function delete($userId)
    {
        $user = User::findOrFail($userId);
        $user->delete();

        return redirect()->route('manageUsers')->with('success', 'User deleted successfully');
    }

    public function toggleBanStatus($userId)
    {
        $user = User::findOrFail($userId);
        $isBanned = !$user->is_banned; // Toggle the current status

        $user->update(['is_banned' => $isBanned]); // Update the is_banned column based on the toggled status

        $message = $isBanned ? 'User banned successfully' : 'User unbanned successfully';

        return redirect()->route('manageUsers')->with('success', $message);
    }

    public function editRole($userId)
    {

        $user = User::with('role')->findOrFail($userId);
        $roles = Role::all();
        $black_hover = 'Manage users';

        return view('editUserRole', compact('user', 'roles', 'black_hover'));
    }

    public function updateRole(Request $request, $userId)
    {
        $user = User::findOrFail($userId);

        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);

        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect()->route('manageUsers')->with('success', 'User role updated successfully');
    }
}
