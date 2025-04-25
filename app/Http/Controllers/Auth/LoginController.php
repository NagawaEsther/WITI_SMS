<?php

namespace App\Http\Controllers\Auth;




// use App\Http\Controllers\Controller;
// use App\Http\Controllers\Auth\Request;
// use App\Providers\RouteServiceProvider;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request; // ✅ Correct Request
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    // protected $redirectTo = RouteServiceProvider::HOME;
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Handle post-authentication redirection.
     */
    protected function authenticated(Request $request, $user)
    {
        if ($user->role_id == 1) {  // Admin
            return redirect()->route('home');
        } elseif ($user->role_id == 2) {  // Student
            return redirect()->route('student_dashboard');
        }

        return redirect()->route('login');
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
