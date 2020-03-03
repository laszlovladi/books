<h1>Cart</h1>
@foreach ($cart_items as $cart_item)
    {{-- {{$cart_item}} <br> --}}
    <img src="{{$cart_item->book->image}}">  <br>
    Book: {{$cart_item->book->title}}  <br>
    Publisher: {{$cart_item->book->publisher->name}}  <br>
    Count: {{$cart_item->count}}<br><br>  
@endforeach