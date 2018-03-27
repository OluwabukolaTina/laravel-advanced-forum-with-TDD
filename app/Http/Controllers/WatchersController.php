<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WatchersController extends Controller
{

	public function __construct()
	{

		return $this->middleware('auth');

	}
    //
    public function watch($id)
    {

    	Watcher::create([

    		'discussion_id' => $id,

    		'user_id' => Auth::id()

    	]);

    	Session::flash('success', 'you are now watching this discussion');

    	return redirect()->back();
    }

    public function unwatch($id)
    {

    	$watcher = Watcher::where('discussion_id', $id)->where('user_id', Auth::id());

    	$watcher->delete();

    	Session::flash('success', 'you are not watching this discussion anymore');

    	return redirect()->back();
    }
}
