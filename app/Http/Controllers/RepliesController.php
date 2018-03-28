<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Notification;

use App\Discussion;

use App\Reply;

use App\User;

use Auth;

use Session;

class RepliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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

    public function reply($id)
    {

        $d = Discussion::find($id);

        $reply = Reply::create([

            'discussion_id' => $id,

            'user_id' => Auth::id(),

            'content' => request()->reply

        ]);

        $watchers = array();

        //get them here, watchers property being acccessed
        foreach($d->watchers as $watcher):

            //id pf the persons that liked, like is an instance of the like.php
            array_push($watchers, User::find($watcher->user_id));

        endforeach;

        //pass the discussion
        Notification::send($watchers, new \App\Notifications\NewReplyAdded($d));

        Session::flash('success', 'you have replied to this topic');

        return redirect()->back();
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
