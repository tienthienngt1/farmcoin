@extends('layouts.app')

@section('content')
<div class="container-fluid">
  <a class="mt_5" href="{{ route('home') }}">
      <image src="{{ asset('images/exit.png') }}" tittle="bag" width="14%"/>
</a>
    <div class="card bg-none mt-5">
      <div class="card-header">
        <center>
          <h1>Túi</h1>  
        </center>
      </div>
      <div class="card-body">
        @foreach($bag)
        <form method="post">
          <image src="{{ asset('images/exit.png') }}" width="20%" title="" />
          <input class="btn btn-link" type="submit" name="sell" value="Bán" />
          <p>số lượng: 12</p>
        </form>
        @endforeach
      </div>
    </div>
</div>

@endsection