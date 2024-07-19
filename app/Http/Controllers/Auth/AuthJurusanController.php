<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\UserName;
use Illuminate\Support\Facades\Auth;

class AuthJurusanController extends Controller
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
        return view('auth.login_jurusan');
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
            'user_name' => ['required', new UserName],
            'password' => 'required'
        ]);

        if (Auth::guard('jurusan')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('jurusan.dashboard')
                ->withSuccess('You have successfully logged in!');
        }

        return back()->withErrors([
            'user_name' => 'Your provided credentials do not match in our records.',
        ])->onlyInput('user_name');
    }


    public function dashboard()
    {
        if (Auth::check()) {
            return view('pages.jurusan.index');
        }

        return redirect()->route('jurusan.login')
            ->withErrors([
                'user_name' => 'Please login to access the dashboard.',
            ])->onlyInput('user_name');
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
        return redirect()->route('jurusan.login')
            ->withSuccess('You have logged out successfully!');;
    }
}
