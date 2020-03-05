{{-- {{ request()->route()->action['controller'] }}<br> --}}
@if(request()->route()->action['controller'] == "App\Http\Controllers\BookORMController@show")
  {{-- <a href="{{ action('BookORMController@index') }}" style="text-decoration: none"> --}}
    {{$book->title}} <br>  
    {{$book->authors}}  <br> 
    <img src="{{$book->image}}"/> <br> 
    {{$book->publisher->name}}  <br> 
    {{$book->genre->name}}  <br> 
    <a href="{{ action('BookORMController@index') }}" style="text-decoration: none">
      <button>Back to list</button>
    </a><br>
    <form action="/cart/add" method="post">
      @csrf
      <input type="hidden" name="book_id" value="{{$book->id}}">
      <input type="submit" value="Add to cart">
    </form><br><br>
    @auth
      <h3>Leave a review</h3>
      @if (count($errors) > 0)
      <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                  <li style="color: red">{{ $error }}</li>
              @endforeach
          </ul>
      </div>
      @endif
      
      @if(Session::has('success_message'))
      <div class="alert alert-success"  style="color: green">
        {{ Session::get('success_message') }}
      </div>
      @endif
      <form action="{{ action('ReviewController@store', [$book->id]) }}" method="post">
        @csrf
        <input type="name" name="name" disabled value="{{ Auth::user()->name }}" id=""><br>
        <input type="email" name="email" disabled value="{{ Auth::user()->email }}" id=""><br>
        <label for="">Your review:</label><br>
        <textarea name="text" id="" cols="30" rows="10" >{{ old('text') }}</textarea><br>
        <button type="submit">Send</button><br>
      </form>
      <h3>Reviews</h3>
      @foreach ($reviews as $review)
        <h6>{{$review->user->name}} {{$review->created_at}}</h6>
        <p>{{$review->review}}</p>

        @can('admin')
          <form action="{{ action('ReviewController@delete', $review->id) }}" method="post">
            @method('delete')
            @csrf
            <input type="submit" value="delete">
          </form>
        @endcan
      @endforeach
    @else

    @endauth
    @guest
      <h2>Please <a href="{{ route('login') }}">login</a> to leave reviews</h2>
    @endguest

    <form action="{{ action('BookORMController@addBookshop', [$book->id]) }}" method="post">
      @csrf
      <select name="bookshop"  id="">
        @foreach ($bookshops as $bookshop)
          <option value="{{$bookshop->id}}">{{$bookshop->name}}</option>
        @endforeach
      </select>
      <button type="submit">Add</button>
    </form><br>
    
    <h3>Available in bookshops:</h3>
  
    @foreach ($book->bookshops as $bookshop)
      <strong>{{$bookshop->name}}</strong><br>
      {{$bookshop->city}}<br>
      <form action="{{ action('BookORMController@removeBookshop', [$book->id]) }}" method="post">
        @csrf
        <input type="hidden" name="bookshop" value="{{ $bookshop->id }}">
        <button type="submit">Remove bookshop</button>
      </form><br>
    @endforeach
  

<br>
@elseif (request()->route()->action['controller'] == "App\Http\Controllers\BookORMController@index") 
  <a href="{{ action('BookORMController@show', [$book->id]) }}" style="text-decoration: none">
    {{$book->title}} <br>  
    {{$book->authors}}  <br> 
    <img src="{{$book->image}}"/> <br> 
    {{$book->publisher->name}}  <br> 
    {{$book->genre->name}}  <br> 
  </a><br>
    <form action="/cart/add" method="post">
      @csrf
      <input type="hidden" name="book_id" value="{{$book->id}}">
      <input type="submit" value="Add to cart">
    </form><br>
<br>
<br>
@endif