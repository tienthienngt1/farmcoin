@extends('layouts.app')

@section('content') 

<div>
  <div style="height:100px">
    <a href="{{ route('home') }}">
          <image src="{{ asset('images/exit.png') }}" tittle="bag" width="14%"/>
    </a>
  </div>
  
  <div class="row justify-content-center">
  <!--========≠==≠=1=≠====≠≠=-->
  
  <div class="col-3">
   <image src="{{asset('images/fence.png')}}" title="fence" width="100%"/>
    
  </div>
  
  <div class="col-3">
    
   <image src="{{asset('images/fence.png')}}" title="fence" width="100%"/>
  </div>
  
  <div class="col-3">
   <image src="{{asset('images/fence.png')}}" title="fence" width="100%"/>
    
  </div>
  
  <div class="col-3">
   <image src="{{asset('images/fence.png')}}" title="fence" width="100%"/>
    
  </div>
  
  </div>
 
  <div class="d-flex justify-content-beetwen">
   <image src="{{asset('images/fence.png')}}" title="fence" width="50%"/>
   <image src="{{asset('images/fence.png')}}" title="fence" width="50%"/>
  </div>
</div>

<script>
//=====================================
var time1 = 10;
var x1 = setInterval(function() {
  var a1 = new Date().getTime() ;
  var now1 = Math.floor(a1 / 1000);
  var sum1 = time1 - now1 ;
  var days1 = Math.floor(sum1 / (60 * 24 * 60));
  var hours1 = Math.floor((sum1 % (60 * 24 * 60)) / ( 60 * 60 ));
  var minutes1 = Math.floor(((sum1 % (60 * 24 * 60)) % ( 60 * 60 )) / 60);
  var seconds1 = Math.floor(((sum1 % (60 * 24 * 60)) % ( 60 * 60 )) % 60);
  document.getElementById("clock1").innerHTML = days1 + "d" + hours1 + "h" + minutes1 + "m" + seconds1 + "s";
  if (sum1 < 0) {
    clearInterval(x1);
    document.getElementById("harvest1").innerHTML = `
       <form method="post" action = "{{ route('farm.select.post',['id'=>'1']) }}">
          @csrf
          <image src="{{ asset('') }}" tittle="bag" width="100%" height="70px"/><br>
          <input type="submit" class="btn btn-link" value="Thu hoạch" name="harvest"/>
        </form>
    `;
  }
}, 1000);
</script>

@endsection