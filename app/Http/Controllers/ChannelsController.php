<?php

namespace App\Http\Controllers;

use App\Channel;

use Session;

use Illuminate\Http\Request;

class ChannelsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function __construct()
     {

       return $this->middleware('admin');

     }

    public function index()

    {
        //
        return view('channels.index')->with('channels', Channel::all());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('channels.create');

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
        $this->validate($request, [

            'channel' => 'required'

        ]);

        Channel::create([

            'title' => $request->channel,

            'slug' => str_slug($request->channel)

        ]);

        Session::flash('success', 'channel created');

        return redirect()->route('channels.index');

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
        return view('channels.edit')->with('channel', Channel::find($id));

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
        $channel = Channel::find($id);

        $channel->title = $request->channel;

        $channel->slug = slug($request->channel);

        $channel->save();

        Session::flash('sucess', 'has been updated');

        return redirect()->route('channels.index');

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
        Channel::destroy($id);

        // $channel->delete();

        Session::flash('danger', 'this channel has been delted');

        return redirect()->route('channels.index');
    }
}
