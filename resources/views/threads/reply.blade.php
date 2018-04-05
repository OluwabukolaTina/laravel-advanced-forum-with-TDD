<div class="panel panel-default">
					
					<div class="panel-heading">

						<div class="level">
					
					<h5 class="flex">
					
					<a href="{{ route('profile', $reply->owner ) }}" style="text-decoration: none;">{{ $reply->owner->name}}</a>
					 said	{{ $reply->created_at->diffForHumans() }}
					</h5>

					 <div>


					 	<form action="/replies/{{ $reply->id }}/favorites" method="post">

					 	{{ csrf_field() }}

					 	<button type="submit" class="btn btn-success" {{ $reply->isFavorited() ? 'disabled' : '' }}>
					 		
					 		{{ $reply->favorites_count }} {{ str_plural('Favorite', $reply->favorites_count ) }}

					 	</button>
					 		
					 	</form>
					 </div>

					</div>

				</div>

					<div class="panel-body">
						{{ $reply->body }}
					</div>
				
</div>