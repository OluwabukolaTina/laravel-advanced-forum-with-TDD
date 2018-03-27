@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        
        <div class="panel-heading">
            
            <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;

            <span> {{ $d->user->name }}, <b>{{ $d->created_at->diffForHumans() }} </b></span>

            @if($d->isBeingWatchedByAuthUser())

                        <a href="{{ route('discussion.unwatch', ['id' => $d->id ]) }}" class="btn btn-default btn-xs pull-right"> UnWatch </a>

            @else

                        <a href="{{ route('discussion.watch', ['id' => $d->id ]) }}" class="btn btn-default btn-xs pull-right"> Watch </a>

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

        </div>

        <!-- <div class="panel-footer">
            
            <p>
                
                {{ $d->replies->count() }} Replies
            </p>
        </div> -->

        <div class="panel-footer">
            
            <span>
                
                {{ $d->replies->count() }} Replies
            
            </span>

            <!-- add tne categories each belong ot here -->

            <a href="{{ route('channel', ['slug' => $d->channel->title ]) }}" class="pull-right btn btn-default">{{ $d->channel->title }} </a>

        </div>

    </div>

    @foreach($d->replies as $r)

    	<div class="panel panel-default">
        
        <div class="panel-heading">
            
            <img src="{{ $r->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;

            <span> {{ $r->user->name }}, <b>{{ $r->created_at->diffForHumans() }} </b></span>

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
    			
    			<textarea name="reply" id="reply" cols="10" rows="8" class="form-control" placeholder="what do you have to say..."></textarea>
    		
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
