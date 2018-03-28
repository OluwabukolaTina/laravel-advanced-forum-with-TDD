<!-- @if (count($errors))

    <ul class="list-group">

      @foreach ($errors->all() as $error)

      <li class="list-group-item text-danger">{{ $error }} </li>

      @endforeach

    </ul>

@endif
 -->

 @if (count($errors))

    <div class="container">
    	
    	<ul class="list-group">

      @foreach ($errors->all() as $error)

      <li class="list-group-item text-danger">{{ $error }} </li>

      @endforeach

    </ul>
    
    </div>

@endif
