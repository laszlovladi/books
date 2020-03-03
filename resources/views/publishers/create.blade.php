<form action="/publishers" method="post">
  @csrf  {{-- csrf token prevents form 419 eror--}}
  <input tipe="text" name="title">
  <input type="submit">
</form>