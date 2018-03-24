@extends('layouts.app')

@section('content')

@section('title', 'Create Channel')

@include('includes.errors')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Add A New Channel</div>

                <div class="panel-body">
                    <form action="{{ route('channels.store') }}" method="post">

                        {{ csrf_field() }}

                        <div class="form-group">
                            <label>Channel</label>
                            <input type="text" name="channel" class="form-control">
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
