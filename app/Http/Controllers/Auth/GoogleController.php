<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::firstOrCreate(
                ['email' => $googleUser->getEmail()],
                [
                    'name' => $googleUser->getName(),
                    'password' => bcrypt(str()->random(24)), // Senha gerada aleatoriamente
                ]
            );

            Auth::login($user);

            return redirect()->route('home')->with('success', 'Login realizado com sucesso!');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['msg' => 'Erro ao autenticar com o Google.']);
        }
    }
}
