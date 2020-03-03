<form action="/genres" method="post">
  @csrf  {{-- csrf token prevents form 419 eror--}}
  <label>Name:</label>
  <input tipe="text" name="name"><br>
  <input type="submit"><br>
</form>