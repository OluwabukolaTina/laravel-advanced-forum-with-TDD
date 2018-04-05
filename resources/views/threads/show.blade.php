@extends('layouts.app')

@section('content')
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-md-8">
				
				<div class="panel panel-default">
					
					<div class="panel-heading">

						<a href="{{ route('profile', $thread->creator ) }}">{{ $thread->creator->name }} </a> posted 

						{{ $thread->title }}

					</div>

					<div class="panel-body">
						{{ $thread->body }}
				
					</div>
				
				</div>

 @foreach ($replies as $reply)
                    @include ('threads.reply')
                @endforeach


				{{ $replies->links() }}

		@auth

				<form method="post" action="{{ $thread->path() . '/replies' }}">

					{{ csrf_field() }}
					
					<!-- <label for="body"> Body</label> -->

					<div class="form-group">
					<textarea name="body" class="form-control" id="body" placeholder=" Hey,  {{ Auth::user()->name }} , got something to say??" rows="5"></textarea>

					</div>
    				
    				<button type="submit" class="btn btn-default">Submit</button>

    			
				</form>

		@else

			<p class="text-center"> Please <a href=" {{ route('login') }}"> sign in</a> to perform in this discussion</p>

		@endauth

</div>

<div class="col-md-4">

	<div class="panel panel-default">
					
					
					<div class="panel-body">
						
						<p>
							
							This thread was published {{ $thread->created_at->diffForHumans() }} by <a href="#"> {{ $thread->creator->name }} </a> and has {{ $thread->replies_count }} {{ str_plural('comment',$thread->replies_count )}}.
						</p>
					</div>
				
				</div>
	
</div>

</div>

</div>


@endsection
