@extends('layouts.app')

@section('content')

@foreach($discussions as $d)

    <div class="panel panel-default">
        
        <div class="panel-heading">
            
            <img src="{{ $d->user->avatar }}" alt="" width="40px" height="40px">&nbsp;&nbsp;&nbsp;

<!--                         <a href="{{ route('channel', ['slug' => $d->channel->title ]) }}" class="pull-right btn btn-default">{{ $d->channel->title }} </a> -->

            <span> {{ $d->user->name }}, <b>{{ $d->created_at->diffForHumans() }} </b></span>

            <a href="{{ route('discussion', ['slug' => $d->slug ]) }}" class="btn btn-default pull-right btn-xs" style="margin-left: 9px;"> View </a>

            @if($d->hasBestAnswer())

                            <span class="btn btn pull-right btn-success btn-xs">CLOSED</span>

            @else

                                            <span class="btn btn pull-right btn-danger btn-xs">OPEN</span>
            @endif

        </div>

        <div class="panel-body">

            <h4 class="text-center">
            
                <b>{{ $d->title }}</b>

            </h3>

            <p class="text-center">
                
                {{ str_limit($d->content, 39)}}
            
            </p>

        </div>

        <div class="panel-footer">
            
            <span>
                
                {{ $d->replies->count() }} Replies
            
            </span>

            <!-- add tne categories each belong ot here -->

                                    <a href="{{ route('channel', ['slug' => $d->channel->title ]) }}" class="pull-right btn btn-default">{{ $d->channel->title }} </a>

        </div>

    </div>

@endforeach

    <div class="text-center">
        
        {{ $discussions->links() }}
 
    </div>

@endsection
