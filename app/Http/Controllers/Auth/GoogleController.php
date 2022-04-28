<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleController extends Controller
{
    public function handle_google_redirect(){
        return Socialite::driver('google')->redirect();
    }
    public function handle_google_callback(){

    //     $user = Socialite::driver('google')->user();
    //  dd($user);
        $googleUser = Socialite::driver('google')->user();
        // dd($googleUser->token);
        
        $user = User::where('google_id', $googleUser->id)->first();
          
        if ($user) {
            $user->update([
                'google_token' => $googleUser->token,
            ]);
        } else {
            $user = User::create([
                'name' => $googleUser->name,
                'email' => $googleUser->email,
                'google_id' => $googleUser->id,
                'google_token' => $googleUser->token,
                
            ]);
        }
     
        Auth::login($user);
     
        return redirect('/posts');
    }
}
