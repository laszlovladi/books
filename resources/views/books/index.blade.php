{{-- <h1>Hello world!</h1>
<p>Hello {{ $name }} {{ $surname }} from php</p>   <!-- filename.blade.php -->
p// echo 'Hello ' . $name . ' ' . $surname . ' from php'; ?>
{{-- <p> Hello php// echo $name ?> ?php // echo $surname ?> from php </p>  <!--    //htmlspecialchars() is NEEDED!!!     --> --}}

{{-- <p>{{ $comment }}</p> --}}
{{-- <p>{!! $comment !!}</p> --}}

<!-- HTML comment is shown in the page -->
{{--  This comment will not be present in the rendered HTML  --}}

{{-- @if($age >= 18)
  <p> Ok, you are old enough </p>
@else
  <p> You are too young </p>
@endif --}}

@foreach ($books as $book)
  @include('books.show')

@endforeach