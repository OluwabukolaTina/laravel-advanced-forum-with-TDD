@extends('layouts.app')

@section('content')

@include('includes.errors')

            <div class="panel panel-default">
                <div class="panel-heading text-center">Create a new discussion</div>

                <div class="panel-body">
                    <form method="post" action="{{ route('discussions.store') }}">
                        
                        {{ csrf_field() }}

                    <div class="form-group">

                        <label for="channel_id">Pick the channel</label>
                        
                        <select name="channel_id" id="channel_id" class="form-control">
                            @foreach($channels as $channel)

                            <option value="{{ $channel->id }}"> {{ $channel->title }}</option>

                            @endforeach
                        
                        </select>
                   
                    </div>

                    <div class="form-group">
                        <label for="title">Title</label>

                        <input type="text" name="title" class="form-control" value="{{ old('title') }}">

                    </div>

                    <div class="form-group">
                        
                        <label for="content">What doyou have in mind?</label>

                        <textarea name="content" id="content" cols="10" rows="7" class="form-control"> {{ old('content') }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right">Create Discussion</button>
                    </div>
                    </form>
                </div>
            </div>
@endsection
