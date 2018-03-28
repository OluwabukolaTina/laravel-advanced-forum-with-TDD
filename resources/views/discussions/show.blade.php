@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        
        <div class="panel-heading">
            
            <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;

            <span> {{ $d->user->name }}, (<b>{{ $d->user->points }}</b> points), <b>{{ $d->created_at->diffForHumans() }} </b></span>

            @if($d->hasBestAnswer())

                            <span class="btn btn pull-right btn-success btn-xs">CLOSED</span>

            @else

                                            <span class="btn btn pull-right btn-danger btn-xs">OPEN</span>
            @endif

            @if(Auth::id() == $d->user->id)

                <a href="{{ route('discussion.edit', ['slug' => $d->slug ]) }}" class="btn btn-default btn-xs pull-right btn-info" style="margin-right: 8px;"> Edit </a>
                
            @endif

            @if($d->isBeingWatchedByAuthUser())

                        <a href="{{ route('discussion.unwatch', ['id' => $d->id ]) }}" class="btn btn-default btn-xs pull-right" style="margin-right: 8px;"> UnWatch </a>

            @else

                        <a href="{{ route('discussion.watch', ['id' => $d->id ]) }}" class="btn btn-default btn-xs pull-right" style="margin-right: 8px;"> Watch </a>

            @endif

        </div>

        <div class="panel-body">

            <h3 class="text-center">
            
                <b>{{ $d->title }}</b>

            </h3>

            <hr>

            <p class="text-center">
                
                {{ $d->content }}
            
            </p>

            <hr>
            
            @if($bestAnswer)

            <div class="text-center" style="padding: 40px">

                <h2 class="text-center">Best Answer</h2> 

                <div class="panel panel-success">
                    
                    <div class="panel-heading">
                        
                                    <img src="{{ $bestAnswer->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;

            <span> {{ $bestAnswer->user->name }} (<b>{{ $bestAnswer->user->points }}</b> points)</span>

                    </div>

                <div class="panel-body">
                    
                    {{ $bestAnswer->content }}

                </div>

                </div>

            </div>

            @endif

        </div>

        <div class="panel-footer">
            
            <span>
                
                {{ $d->replies->count() }} Replies
            
            </span>

        </div>

    </div>

    @foreach($d->replies as $r)

    	<div class="panel panel-default">
        
        <div class="panel-heading">
            
            <img src="{{ $r->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;

            <span> {{ $r->user->name }}, <b> {{ $r->user->points }} points </b> created <b>{{ $r->created_at->diffForHumans() }} </b></span>

            @if(!$bestAnswer)

                @if(Auth::id() == $d->user->id)

                    <a href="{{ route('reply.best', ['id' => $r->id]) }}" class="btn btn-xs btn-info pull-right">Markas Best Answer</a>

                @endif

            @endif

        </div>

        <div class="panel-body">

            <p>
                
                {{ $r->content }}
            
            </p>

        </div>

        <div class="panel-footer">
            
            @if($r->isLikedByAuthUser())

            <a href="{{ route('reply.unlike', ['id' => $r->id ]) }}" class="btn btn-danger btn-xs">Unlike  <span class="badge">{{ $r->likes->count() }}</a>

            @else

            <a href="{{ route('reply.like', ['id' => $r->id ]) }}" class="btn btn-success btn-xs">Like <span class="badge">{{ $r->likes->count() }}</span></a>

            @endif
        
        </div>

    </div>

    @endforeach

    <div class="panel panel-default">
    	
    	<div class="panel-body">

            @if(Auth::check())
    		
    		<form action="{{ route('discussion.reply', ['id' => $d->id]) }}" method="post">
    			
    			{{ csrf_field() }}

    		<div class="form-group">

    			<label for="reply">Leave a reply</label>
    			
    			<textarea name="reply" id="reply" cols="10" rows="8" class="form-control" placeholder="what do you have to say..."> {{ old('reply') }}</textarea>
    		
    		</div>

    		<div class="form-group">
    			<button type="submit" class="btn pull-right">Submit</button>
    		</div>
    		</form>

            @else

            <div class="text-center">
                
                <a href="{{ route('login') }}" style="text-decoration: none;"><h1>Sign In to Leave A Reply</h1></a>
            
            </div>



            @endif
    	</div>
    </div>


@endsection
