@extends('layouts.app')

@section('content')
	
	<div class="container">
		
		<div class="row">
			
			<div class="col-md-8 col-md-offset-2">
				
				<div class="panel panel-default">
					
					<div class="panel-heading">Create A new thread</div>

					<div class="panel-body">
						
						<form action="/threads" method="">

							{{ csrf_field() }}
							
							<div class="form-group">
								<label for="title">Title</label>
							<input type="text" class="form-control" name="title">

							</div>

							<div class="form-group">

								<label for="body">Content</label>
								
								<textarea name="body" rows="8" id="body" class="form-control"></textarea>
							</div>

							<button type="submit" class="btn btn-success">Add Thread</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection
