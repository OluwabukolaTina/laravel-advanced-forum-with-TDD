<?php

namespace App\Http\Controllers;

use App\Discussion;

use Auth;

use Session;

use Illuminate\Http\Request;

class DiscussionsController extends Controller
{

    public function __construct()
    {

    	$this->middleware('auth')->except(['show']);
    
    }

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
        return view('discuss');
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
        // dd($request->all());
        $r = request();

        $this->validate($r, [

            'channel_id' => 'required',

            'title' => 'required',

            'content' => 'required'
        
        ]);

        $discussion = Discussion::create([

            'channel_id' => $r->channel_id,

            'title' => $r->title,

            'content' => $r->content,

            'user_id' => Auth::id(),

            'slug' => str_slug($r->title)

        ]);

        Session::flash('success', 'sucessfully created');

        //redirect the discussion jusrt created

        return redirect()->route('discussion', ['slug' => $discussion->slug]);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $discussion = Discussion::where('slug', $slug)->first();

        //using the replies r/ship
        $bestAnswer = $discussion->replies()->where('best_answer', 1)->first();

        //pass the best replies here
        return view('discussions.show')->with('d', $discussion)
                                        ->with('bestAnswer', $bestAnswer);
    
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
