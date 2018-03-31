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
		
				<h2>Hello</h2>

				<form method="post" action="{{ $thread->path() . '/replies' }}">

					{{ csrf_field() }}
					
					<!-- <label for="body"> Body</label> -->
					<textarea name="body" class="form-control" id="body" placeholder="what do you wanna say?..." rows="5"></textarea>

    			<button type="submit" class="btn btn-default">Submit</button>
    			
				</form>

			</div>
		
		</div>

		@else

			<p class="text-center"> Please <a href=" {{ route('login') }}"> sign in</a> to perform in this discussion</p>

		@endauth

	</div>

@endsection
