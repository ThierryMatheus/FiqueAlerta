<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class LoginGoogleController extends Controller
{
    //
    public function redirectToProvider() {
        return Socialite::driver('google')->redirect();
    }

    public function handleProviderCallback() {
        $google = Socialite::driver('google')->user();

        $user = User::where('google_id', $google->id)->first();

        if ($user) {
            $user->update([
                'google_token' => $google->token,
                'google_refresh_token' => $google->refreshToken,
            ]);
        } else {
            $user = User::create([
                'name' => $google->name,
                'email' => $google->email,
                'google_id' => $google->id,
            ]);
        }

        Auth::login($user);

        return redirect('/dashboard');
    }
}
