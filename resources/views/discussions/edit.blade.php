@extends('layouts.app')

@section('content')

@include('includes.errors')

            <div class="panel panel-default">
                <div class="panel-heading text-center">Update A Discussion</div>

                <div class="panel-body">
                    <form method="post" action="{{ route('discussion.update', ['id' => $discussion->id]) }}">
                        
                        {{ csrf_field() }}

                    <div class="form-group">
                        
                        <label for="content">What doyou have in mind?</label>

                        <textarea name="content" id="content" cols="10" rows="7" class="form-control"> {{ $discussion->content }}</textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right">Update Discussion</button>
                    </div>
                    </form>
                </div>
            </div>
@endsection
