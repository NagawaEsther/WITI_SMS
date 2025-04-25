<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
// use App\Mail\PasswordChangedMail;


class ChangePasswordController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'password_current' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = Auth::user();

        if (!Hash::check($request->password_current, $user->password)) {
            return back()->withErrors(['password_current' => 'Current password is incorrect.']);
        }

        $user->update(['password' => Hash::make($request->password)]);
        Mail::to($user->email)->send(new \App\Mail\PasswordChangedMail($user));

        return back()->with('status', 'Password successfully updated!');
    }
}

