<form action="{{ action('BookshopController@store') }}" method="post">
  @csrf
  <h2>Create a bookshop</h2>
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

  <label for="">Bookshop name:</label>
  <input type="text" name="name" value="{{ old('name')}}" id=""><br>
  <label for="">City:</label>
  <input type="text" name="city" value="{{ old('city')}}" id=""><br>
  <button type="submit">Save</button>
</form>