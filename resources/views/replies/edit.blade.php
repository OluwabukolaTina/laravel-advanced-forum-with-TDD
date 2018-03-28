@extends('layouts.app')

@section('content')

@include('includes.errors')

            <div class="panel panel-default">
                <div class="panel-heading text-center">Update A Reply</div>

                <div class="panel-body">
                    <form method="post" action="{{ route('reply.update', ['id' => $reply->id]) }}">
                        
                        {{ csrf_field() }}

                    <div class="form-group">
                        
                        <label for="content">Edit your reply?</label>

                        <textarea name="content" id="content" cols="10" rows="7" class="form-control"> {{ $reply->content }} </textarea>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-success pull-right">Update Reply</button>
                    </div>
                    </form>
                </div>
            </div>
@endsection
