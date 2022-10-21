<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;

class AuthenticationController extends Controller
{
    // Login Cover
    public function login()
    {
        $pageConfigs = ['blankPage' => true];

        return view('admin.authentication.login', ['pageConfigs' => $pageConfigs]);
    }

    // Register cover
    public function register()
    {
        $pageConfigs = ['blankPage' => true];

        return view('admin.authentication.register', ['pageConfigs' => $pageConfigs]);
    }

    // Forgot Password cover
    public function forgot_password()
    {
        $pageConfigs = ['blankPage' => true];

        return view('admin.authentication.forgot-password', ['pageConfigs' => $pageConfigs]);
    }

    // Reset Password cover
    public function reset_password()
    {
        $pageConfigs = ['blankPage' => true];

        return view('admin.authentication/reset-password', ['pageConfigs' => $pageConfigs]);
    }

    // email verify cover
    public function verify_email()
    {
        $pageConfigs = ['blankPage' => true];

        return view('admin.authentication/verify-email', ['pageConfigs' => $pageConfigs]);
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('admin.auth.login');
    }


    public function createUser(RegisterRequest $request)
    {
        $admin = Admin::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::guard('admin')->loginUsingId($admin->id);

        return redirect()->route('admin.dashboard');
    }

    public function postLogin(LoginRequest $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->has('remember');
        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $request->session()->regenerate();
            return redirect()->intended('admin');
        }

        return back();
    }
}
