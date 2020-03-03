{{-- {{ request()->route()->action['controller'] }}<br> --}}
@if(request()->route()->action['controller'] == "App\Http\Controllers\PublisherController@show")
  <a href="{{ action('PublisherController@index') }}" style="text-decoration: none">
    <h3> {{$publisher->name}} </h3> <br>  
    @foreach($books as $book)
      {{$book->title}} <br>  
      {{$book->authors}}  <br> 
      <img src="{{$book->image}}"/> <br> <br>
    @endforeach
  </a><br>
@elseif (request()->route()->action['controller'] == "App\Http\Controllers\PublisherController@index") 
  <a href="{{ action('PublisherController@show', [$publisher->id]) }}" style="text-decoration: none">
    {{$publisher->name}} <br>  
  </a><br>
@endif