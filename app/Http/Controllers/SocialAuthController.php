<?php

namespace App\Http\Controllers;

use Auth;

use Socialite;

use App\User;

use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    //
    public function redirectToGithub()
    {

      return Socialite::driver('github')->redirect();

    }

    public function handleGithubCallback()
    {

       $githubUser = Socialite::driver('github')->user();

       // dd($githubUser);

       $user = User::createOrFindSocialLogin($githubUser);

       Auth::login($user);

       return redirect('/threads');

    }

}
