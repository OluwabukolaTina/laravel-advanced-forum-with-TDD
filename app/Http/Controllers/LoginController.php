<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\User;

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

    			return redirect()->route('home');

    	}

    	//if mot successful
    	return redirect()->back();

    }




}
