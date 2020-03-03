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
      <label for="">Your name:</label><br>
      <input type="name" name="name" value="{{ old('name') }}" id=""><br>
      <label for="">Your email:</label><br>
      <input type="email" name="email" value="{{ old('email') }}" id=""><br>
      <label for="">Your review:</label><br>
      <textarea name="text" id="" cols="30" rows="10" >{{ old('text') }}</textarea><br>
      <button type="submit">Send</button><br>
    </form>
    <h3>Reviews</h3>
    @foreach ($reviews as $review)
      <h6>{{$review->name}} ({{$review->email}}) {{$review->created_at}}</h6>
      <p>{{$review->review}}</p>

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