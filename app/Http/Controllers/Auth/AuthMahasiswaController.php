<?php

namespace App\Http\Controllers\Auth;

use App\Rules\MahasiswaNim;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthMahasiswaController extends Controller
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
        return view('auth.login_mahasiswa');
    }

    /**
     * Authenticate the user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        // dd($request->all());
        $credentials = $request->validate([
            'mahasiswa_nim' => ['required', new MahasiswaNim],
            'password' => 'required'
        ]);
        // dd($credentials);

        if (Auth::guard('mahasiswa')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('mahasiswa.dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'mahasiswa_nim' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('mahasiswa_nim');
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('pages.mahasiswa.index');
        }

        return redirect()->route('mahasiswa.login')
            ->withErrors([
                'mahasiswa_nim' => 'Please login to access the dashboard.',
            ])->onlyInput('mahasiswa_nim');
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
        return redirect()->route('mahasiswa.login')
            ->withSuccess('You have logged out successfully!');;
    }
}
