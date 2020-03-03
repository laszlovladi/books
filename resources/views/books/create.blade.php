<form action="/books-orm" method="post">
  @csrf  {{-- csrf token prevents form 419 eror--}}
  <label>Title:</label>
  <input tipe="text" name="title"><br>
  <label>Authors:</label>
  <input tipe="text" name="authors"><br>
  <label>Url:</label>
  <input tipe="text" name="image"><br>
  <label>Publisher:</label>
  <select name="publisher"><br>
    {{-- {{ use App\Publisher; $publishers = Publisher::all();}} --}}
    @foreach ($publishers as $p)
      <option value="{{$p->id}}">{{$p->name}}</option>    
    @endforeach
  </select><br>
  <input type="submit"><br>
</form>