@extends('layouts.app')

@section('content')

@section('title', 'Create Channel')

@include('includes.errors')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading"Edit Channel: {{ $channel->title }} "</div>

                <div class="panel-body">
                    <form action="{{ route('channels.update', ['channel' => $channel->id]) }}" method="post">

                        {{ csrf_field() }}

                        {{ method_field('PUT') }}

                        <div class="form-group">
                            <label>Channel</label>
                            <input type="text" name="channel" value="{{ $channel->title }}" class="form-control">
                        </div>

                        <div class="form-group">
                            <div class="text-center">
                                <button class="btn btn-success" type="submit">
                                    Add Channel
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
