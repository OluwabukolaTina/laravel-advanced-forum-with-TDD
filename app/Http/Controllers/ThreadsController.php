<?php

namespace App\Http\Controllers;

use App\Channel;

use App\Filters\ThreadFilters;

use App\Thread;

use Illuminate\Http\Request;

class ThreadsController extends Controller
{

    public function __construct()
    {

        $this->middleware('auth')->except(['index', 'show']);

    }

    //
    public function index(Channel $channel, ThreadFilters $filters)
    {

        // if($channel->exists)

        // {

        //     $threads = $channel->threads()->latest();

        // } else {

        //     $threads = Thread::latest();
        
        // }

        $threads = $this->getThreads($channel, $filters);
    	return view('threads.index', compact('threads'));
    
    }

    public function create()
    
    {

        return view('threads.create');

    }

    public function show($channelId, Thread $thread)
    {

    	return view('threads.show', compact('thread'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
           
            'title' => 'required',

            'body' => 'required',

            'channel_id' => 'required|exists:channels,id'

        ]);

        $thread = Thread::create([

            'user_id' => auth()->id(),

            'title' => request('title'),

            'channel_id' => request('channel_id'),

            'body' => request('body')

        ]);

        return redirect($thread->path());

        // dd(request()->all());
    }

    protected function getThreads(Channel $channel, ThreadFilters $filters)
    {
        $threads = Thread::latest()->filter($filters);
        if ($channel->exists) {
            $threads->where('channel_id', $channel->id);
        }
        return $threads->get();
    }

    // protected function getThreads(Channel $channel)
    // {

    //     if($channel->exists)
        
    //     {
            
    //     $threads = $channel->threads()->latest(); 
                   
    //     } 

    //     else 

    //     {

    //     $threads = Thread::latest();

    //     }

    //     //if for by
    //     // if ($username = request('by')) {
    //     //     $user = \App\User::where('name', $username)->firstOrFail();

    //     //     $threads->where('user_id', $user->id);
    //     // }

    //     $threads = $threads->get();

    //     return $threads;

    // }
}
