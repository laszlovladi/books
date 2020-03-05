<div class="container">
  <h1>{{$bookshop->name}}</h1>
  <h3>{{$bookshop->city}}</h3><br>  
  <form action="{{ action('BookshopController@addBook', [$bookshop->id]) }}" method="post">
    @csrf
    <select name="book"  id="">
      @foreach ($books as $book)
        <option value="{{$book->id}}">{{$book->title}}</option>
      @endforeach
    </select>
    <button type="submit">Add</button>
  </form><br>
  
  <h3>Books in the bookshop:</h3>

  @foreach ($bookshop->books as $book)
    <strong>{{$book->authors}}</strong><br>
    {{$book->title}}<br>
    <form action="{{ action('BookshopController@removeBook', [$bookshop->id]) }}" method="post">
      @csrf
      <input type="hidden" name="book" value="{{ $book->id }}">
      <button type="submit">Remove form the bookshop</button>
    </form><br>
  @endforeach
</div>