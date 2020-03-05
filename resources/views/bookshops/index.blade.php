<a href="{{ action('BookshopController@create') }}">Create new bookshop</a><br><br>

<h2>Bookshop list</h2>
@foreach ($bookshops as $bookshop)
  {{$bookshop->id}} {{$bookshop->name}} {{$bookshop->city}}<br>  

@endforeach