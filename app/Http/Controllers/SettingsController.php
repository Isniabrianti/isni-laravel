<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SettingsController extends Controller
{
    public function settings()
    {
        return view('settings');
    }

    public function updateAccountSettings(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        $user = Auth::user();

        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('settings')->with('success', 'Pengaturan akun berhasil diperbarui.');
    }
}
