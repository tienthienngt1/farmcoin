@extends('layouts.app')

@section('content') 
@php 
$handle = json_decode($user->role);
@endphp
  <div style="height:100px">
    <a href="{{ route('home') }}">
        <image src="{{ asset('images/exit.png') }}" tittle="bag" width="14%"/>
    </a>
  </div>
  <div class="row mb-5 justify-content-center">
    <a href ="1" class="btn @if($id == 1) active @endif btn-outline-primary">Nông trại</a>
    <a href ="2" class="btn @if($id == 2) active @endif btn-outline-primary">Thú cưng</a>
  </div>
  <!--========≠==≠=1=≠====≠≠=-->
  
  @if($id==1)
  @foreach($getVet as $pet)
  <div class="row">
    <div class="col-3">
      <image src="{{asset($pet->icon)}}" title="{{$pet->name}}" width="60%"/>
      <span> 
      <span><h3> {{$pet->name}} </h3></span>
    </div>
    <div class="col-6" style="color:#5f2c16">
      <p>Giá mua: <span style="color:#6c2304">{{$pet->cost}}TH</span></p>
      <p>Thời gian: {{$pet->time}}h</p>
      <p>Lời: {{$pet->sell/1000}}TH</p>
    </div>
    <div class="col-3">
      @if((int)$handle->levelFarm >= (int)$pet->id)
      <button class="btn btn-success" style="opacity:50%">Đã Sở Hữu</button>
      @elseif($handle->levelFarm + 1 == $pet->id)
      <form class="a" method="post" action="{{ route('shop.store') }}" />
        @csrf
        <input class="btn btn-primary" type="submit" name="buy" value="Mở khoá" />
        <input type="hidden" name="id" value="{{$id}}" />
        <input type="hidden" name="cost" value="{{$pet->cost}}" />
        <input type="hidden" name="name" value="{{$pet->name}}" />
      </form>
      @else
      <button class="btn btn-primary" style="opacity:50%">Chưa Mở</button>
      @endif
    </div>
  </div>
  <hr>
  @endforeach
  @endif
  <!--========≠==≠=1=≠====≠≠=-->
  
  @if($id==2)
  @foreach($pet as $pet)
  <div class="row">
    <div class="col-3">
      <image src="{{asset($pet->path)}}" title="chicken" width="60%"/>
      <span> 
      <span><h3> {{$pet->name}} </h3></span>
    </div>
    <div class="col-6" style="color:#5f2c16">
      <p>Giá mua: <span style="color:#6c2304">{{$pet->cost}}TH</span></p>
      <p>Thời gian: {{$pet->time}}h</p>
      <p>Lời: {{$pet->sell/1000}}TH</p>
    </div>
    <div class="col-3">
      @if((int)$handle->levelPet >= (int)$pet->id)
      <button class="btn btn-success" style="opacity:50%">Đã Sở Hữu</button>
      @elseif($handle->levelPet +1 == $pet->id)
      <form method="post" action="{{ route('shop.store') }}">
        @csrf
        <input type="hidden" name="id" value="{{$id}}" />
        <input type="hidden" name="cost" value="{{$pet->cost}}" />
        <input type="hidden" name="name" value="{{$pet->name}}" />
        <input id="a" class="btn btn-primary" type="submit" name="buy" value="Mở khoá" />
      </form>
      @else
      <button class="btn btn-primary" style="opacity:50%">Chưa Mở</button>
      @endif
    </div>
  </div>
  <hr>
  @endforeach
  @endif
  <!--========≠==≠=2=≠====≠≠=-->
  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    
  <script>
   $(document).ready(function() {
    $(".a").click(function () {
        $(".a").removeClass("active");
        $(this).addClass("active");     
    });
   });
  </script>
    
  <script>
   $(document).ready(function() {
    $("#a").click(function(event) {
        if( !confirm('Are you sure that you want to submit the form') ) {
            event.preventDefault();
        }
    });
});
  </script>
  
@endsection