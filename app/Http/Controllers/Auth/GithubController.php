<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class GithubController extends Controller
{
    public function handle_github_redirect(){
        return Socialite::driver('github')->redirect();
    }

    public function handle_github_callback(){
        $githubUser = Socialite::driver('github')->user();

    $user = User::where('github_id', $githubUser->id)->first();
      
    if ($user) {
        $user->update([
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);
    } else {
        $user = User::create([
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'github_token' => $githubUser->token,
        ]);
    }
 
    Auth::login($user);
 
    return redirect('/posts');
    }
}
