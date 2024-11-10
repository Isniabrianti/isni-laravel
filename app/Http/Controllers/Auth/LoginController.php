<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
        Log::info('Session Data: ', session()->all());

    }

    // Proses login menggunakan email dan password
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended($this->redirectTo);
        }

        return redirect()->back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    // Redirect ke Google OAuth
    public function redirectToGoogle()
    {
        Log::info('Redirecting to dashboard after login.');
        return Socialite::driver('google')
            ->with(['prompt' => 'select_account'])
            ->redirect();
    }

    // Callback dari Google OAuth
    public function handleGoogleCallback()
    {
        try {
            Log::info('Handling Google callback');
            $user = Socialite::driver('google')->stateless()->user();
            Log::info('User data from Google: ' . $user->getEmail());

            $findUser = User::where('email', $user->getEmail())->first();

            if ($findUser) {
                Log::info('User found: ' . $findUser->email);
                Auth::login($findUser);
            } else {
                Log::info('User not found, creating new user');
                $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id' => $user->getId(),
                    'password' => bcrypt('123456dummy')
                ]);

                Auth::login($newUser);
            }
            return redirect()->route('dashboard'); 

        } catch (\Exception $e) {
            Log::error('Error during Google login: ' . $e->getMessage());
            return redirect()->route('login')->withErrors('Login failed: ' . $e->getMessage());
        }
    }

    
    public function redirectToTelegram()
    {
        return Socialite::driver('telegram')->redirect(); 
    }

    public function handleTelegramCallback($telegramUsername)
    {
        $user = User::where('telegram_username', $telegramUsername)->first();

        if (!$user) {
            
            $user = User::create([
                'telegram_username' => $telegramUsername,
                'name' => $telegramUsername, 
                'password' => bcrypt(Str::random(8)), 
            ]);

            auth()->login($user);
        } else {
            auth()->login($user);
        }
        return redirect()->route('dashboard');
    }


    
    // Proses logout
    public function logout()
    {
        Auth::logout();
        session()->flush();
        return redirect('/login');
    }
    
    protected $redirectTo = '/dashboard'; 

}
