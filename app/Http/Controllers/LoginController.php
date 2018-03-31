<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;

use Socialite;

class LoginController extends Controller
{
    //
    public function login(Request $request)
    {

    	// dd(request()->all());

    	if(Auth::attempt([

    		'email' => $request->email,

    		'password' => $request->password
    	
    	]))

    	{

    		$user = User::where('email', $request->email)->first();

    		if($user->is_admin())
    		{

    			return redirect()->route('threads');
    		
    		}

    			return redirect()->route('threads');

    	}

    	//if mot successful
    	return redirect()->back();

    }

     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback($provider)
    {
        $userSocial = Socialite::driver($provider)->stateless()->user();

        //check i fuser exists and login
        $user = User::where('email', $userSocial->user['email'])->first();

        if($user)
        {

            if(Auth::loginUsingId($user->id)) 
                {

                    return redirect()->route('forum');

                }
        }

        //else sign user in
        $userSignUp = User::create([

            'name' => $userSocial->user['name'],

            'email' => $userSocial->user['email'],

            'avatar' => $userSocial->avatar
        ]);

        //log the user in
        if($userSignUp) 
        {

            if(Auth::loginUsingId($userSignUp->id))
                {

                    return redirect()->route('forum');
                }
        }
        // $user = Socialite::driver($provider)->stateless()->user();

        //  $user->name;
    }




}
