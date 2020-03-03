
      <h1>{{$genre->name}}</h1> <br><br>
      @foreach ($genre->books as $g)
        Title:  {{$g->title}}<br>
        Authors:  {{$g->authors}}<br>
        <img src="{{$g->image}}" alt=""><br><br>
      @endforeach
      {{-- {{$genre->books}} <br>   --}}
      <a href="{{ action('GenreController@index') }}">
        <button>Back to list</button>
      </a><br>
