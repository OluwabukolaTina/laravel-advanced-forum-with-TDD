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

    			return redirect()->route('dashboard');
    		
    		}

    			return redirect()->route('forum');

    	}

    	//if mot successful
    	return redirect()->back();

    }

     /**
     * Redirect the user to the GitHub authentication page.
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider()
    {
        return Socialite::driver('github')->redirect();
    }

    /**
     * Obtain the user information from GitHub.
     *
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        // $userSocial = Socialite::driver('github')->user();

        // //check i fuser exists and login
        // $user = User::where('email', $userSocial->user['email'])->first();

        // if($user)
        // {

        //     if(Auth::loginUsingId($user->id)) 
        //         {

        //             return redirect()->route('home');

        //         }
        // }

        // //else sign user in
        // $userSignUp = User::create([

        //     'name' => $userSocial->user['name'],

        //     'email' => $userSocial->user['email'],

        //     'avatar' => $userSocial->avatar
        // ]);

        // //log the user in
        // if($userSignUp) 
        // {

        //     if(Auth::loginUsingId($userSignUp->id))
        //         {

        //             return redirect()->route('home');
        //         }
        // }
        $user = Socialite::driver('github')->stateless()->user();

         $user->name;
    }




}
