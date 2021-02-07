@extends('layouts.app')

@section('content')
<form method="post">
  @csrf
  name
  <input type="text" name="name" /><br>
  email
  <input type="text" name="email" /><br>
  passw
  <input type="text" name="password" /><br>
  <input type="submit" name="submit" value="gửi"/>
</form>
@isset($getVet)
@foreach($getVet as $getVet)
{{ $getVet -> name }}
@endforeach
fjffnnd
@endisset
@endsection