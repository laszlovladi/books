<form action="/books-orm" method="post" enctype="multipart/form-data">
  @csrf  {{-- csrf token prevents form 419 eror--}}
  <label>Title:</label><br>
  <input type="text" name="title"><br>
  <label>Authors:</label><br>
  <input type="text" name="authors"><br>
  <label>Image</label><br>
  <input type="file" name="image_file"><br>
  <label>Publisher:</label><br>
  <select name="publisher"><br>
    {{-- {{ use App\Publisher; $publishers = Publisher::all();}} --}}
    @foreach ($publishers as $p)
      <option value="{{$p->id}}">{{$p->name}}</option>    
    @endforeach
  </select><br>
  <input type="submit"><br>
</form>