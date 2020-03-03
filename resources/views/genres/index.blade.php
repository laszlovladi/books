
@foreach ($genres as $genre)
    <a href="{{ action('GenreController@show',[$genre->id]) }}" style="text-decoration: none">
      {{$genre->name}} <br>  
    </a><br>

@endforeach