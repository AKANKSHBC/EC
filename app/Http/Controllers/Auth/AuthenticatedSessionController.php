<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function googleProvider() 
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback() {

        $user = Socialite::driver('google')->user();

    
        $this->providerLogin($user);

        return redirect()->route('home');

    }

    public function githubProvider() 
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubCallback() {

        $user = Socialite::driver('github')->user();

        $this->providerLogin($user);

        return redirect()->route('home');
        
    }

    protected function providerLogin($data) {

        $user = User::where('email','=', $data->email)->first();

        if (!$user) {
            $user = new User();
            $user->name = $data->name;
            $user->email = $data->email;
            $user->password = Hash::make("password");
            $user->save();
        }

        Auth::login($user);

    }
}
