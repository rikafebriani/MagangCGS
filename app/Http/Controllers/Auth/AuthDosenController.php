<?php

namespace App\Http\Controllers\Auth;

use App\Rules\DosenKode;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthDosenController extends Controller
{
    /**
     * Instantiate a new LoginRegisterController instance.
     */
    public function __construct()
    {
        $this->middleware('guest')->except([
            'logout', 'dashboard'
        ]);
    }

    /**
     * Display a login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('auth.login_dosen');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'dosen_kode' => ['required', new DosenKode],
            'password' => 'required'
        ]);

        if (Auth::guard('dosen')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dosen.dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'dosen_kode' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('dosen_kode');
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('pages.dosen.index');
        }

        return redirect()->route('dosen.login')
            ->withErrors([
                'dosen_kode' => 'Please login to access the dashboard.',
            ])->onlyInput('dosen_kode');
    }

    /**
     * Log out the user from application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('dosen.login')
            ->withSuccess('You have logged out successfully!');;
    }
}