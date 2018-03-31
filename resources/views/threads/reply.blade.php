<div class="panel panel-default">
					
					<div class="panel-heading">
					
					<a href="#" style="text-decoration: none;">{{ $reply->owner->name}}</a>
					 said	{{ $reply->created_at }}

					</div>

					<div class="panel-body">
						{{ $reply->body }}
					</div>
				
				</div>