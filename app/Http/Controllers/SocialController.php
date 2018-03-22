<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
 
use App\User;

// use Auth;

// use Exception;

// use SocialAuth;

use Socialite;




// use Laravel\Socialite\Facades\Socialite;
use Session;

 use GuzzleHttp\Client;
class SocialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function auth()
    {
        
        // return SocialAuth::authorize($provider);
        
        return Socialite::driver('github')->redirect();
        // return Socialite::with('github')->redirect();

    }

    public function callback(User $user){

        // SocialAuth::login($provider, function($user, $details){

        // $user = Socialite::driver($provider)->user();
               // $user = Socialite::driver('github')->stateless()->user();

        $user = Socialite::with('github')->user();

            dd($user);

            $user->avatar = $details->avatar;

            $user->email = $details->email;

            $user->name = $details->full_name;

            $user->save();

        return redirect('/');

    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
