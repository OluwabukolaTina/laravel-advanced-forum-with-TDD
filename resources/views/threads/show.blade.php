@extends('layouts.app')

@section('content')
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-md-8 col-md-offset-2">
				
				<div class="panel panel-default">
					
					<div class="panel-heading">

						<a href="#">{{ $thread->creator->name }} </a> posted 

						{{ $thread->title }}

					</div>

					<div class="panel-body">
						{{ $thread->body }}
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			
			<div class="col-md-8 col-md-offset-2">
		
				@foreach ($thread->replies as $reply )

					@include ('threads.reply')

				@endforeach

			</div>

		</div>

		@auth

		<div class="row">
			
			<div class="col-md-8 col-md-offset-2">
		
				<form method="post" action="{{ $thread->path() . '/replies' }}">

					{{ csrf_field() }}
					
					<!-- <label for="body"> Body</label> -->
					<textarea name="body" class="form-control" id="body" placeholder=" Hey,  {{ Auth::user()->name }} , got something to say??" rows="5"></textarea>

					<br>

    			<div class="form-group">
    				
    				<button type="submit" class="btn btn-default">Submit</button>

    			</div>
    			
				</form>

			</div>
		
		</div>

		@else

			<p class="text-center"> Please <a href=" {{ route('login') }}"> sign in</a> to perform in this discussion</p>

		@endauth

	</div>

@endsection
