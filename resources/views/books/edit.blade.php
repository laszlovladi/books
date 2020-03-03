<form action="/books/{{$book->id}}/edit" method="post">
  @csrf  {{-- csrf token prevents form 419 eror--}}
  <label>Title:</label>
  <input tipe="text" name="title" value="{{$book->title}}"><br>
  <label>Authors:</label>
  <input tipe="text" name="authors" value="{{$book->authors}}"><br>
  <label>Url:</label>
  <input tipe="text" name="image" value="{{$book->image}}"><br>
  <label>Publisher:</label>
  <select name="publisher"><br>
    {{-- {{ use App\Publisher; $publishers = Publisher::all();}} --}}
    @foreach ($publishers as $p)
      <option value="{{$p->id}}"      >{{$p->name}}</option>    
    @endforeach
  </select><br>
  <label>Genre:</label>
  <select name="genre"><br>
    {{-- {{ use App\Publisher; $publishers = Publisher::all();}} --}}
    @foreach ($genres as $g)
      <option value="{{$g->id}}"      >{{$g->name}}</option>    
    @endforeach
  </select><br>
  <input type="submit"><br>
</form>