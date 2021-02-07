
  <!-- display sm up -->
<div class="d-sm-none">
  <div class="d-flex justify-content-beetwen" style="height:100px">
    <a href="#" class="float_right">
    <div style="position: absolute">
      <image src="{{ asset('images/card.png') }}" tittle="bag" width="20%"/>
    </div>
    <span class="text-center" style="position: relative; color: #6b3b07; left: 20px; top: 3px; font-size: 16px">
      Mua <br> Đất
    </span>
    </a>
  </div>
  <div class="d-flex justify-content-beetwen">
  
  <!--========≠==≠=1=≠====≠≠=-->
  
    <div>
      @isset($getFarm)
      @isset($getVet)
      @php
      $time1 = '';
      $icon1 = '';
      $icon2 = '';
      $icon3 = '';
      $icon4 = '';
      if(isset($getFarm->farm1s->field1)){
       $time1 = strtotime($getFarm->farm1s->field1Time)-strtotime(\Carbon\Carbon::now());
      };
        foreach($getVet as $vet){
          if($vet->id == $getFarm->farm1s->field1){
           $icon1 = $vet->icon;
          }
          if($vet->id == $getFarm->farm1s->field2){
           $icon2 = $vet->icon;
          }
          if($vet->id == $getFarm->farm1s->field3){
           $icon3 = $vet->icon;
          }
          if($vet->id == $getFarm->farm1s->field4){
           $icon4 = $vet->icon;
          }
        }
      @endphp
      @if($getFarm->farm1s->field1 !== null)
        @if($time1 > 0)
        <div id="harvest1">
          <image src="{{ asset('images/sapling.png') }}" tittle="icon" width="100%" height="70px"/><br>
          <i class="far fa-clock mr-1"></i><span style="font-size:9px" id="clock1"></span>
        </div>
        @else
          <form method="post" action = "{{ route('farm.select.post',['id'=>'1']) }}">
            @csrf
            <image tittle="image" src="{{ asset($icon1) }}" width="100%" height="70px"/><br>
            <input type="submit" class="btn btn-link" value="Thu hoạch" name="harvest"/>
          </form>
        @endif
      @else
          
      <form method="post" action = "{{ route('farm.select.post',['id'=>'1']) }}">
        @csrf
        <image src="{{ asset('images/farm.png') }}" tittle="bag" width="100%" height="70px"/><br>
        <input type="submit" class="btn btn-link" name="plant" value="Gieo hạt" />
      </form>
      @endif
    </div>
  
  <!--========≠==≠2==≠====≠≠=-->
  
    <div>
      @php
        $time2 = "";
        if(isset($getFarm->farm1s->field2Time)){
          $time2 = strtotime($getFarm->farm1s->field2Time)-strtotime(\Carbon\Carbon::now());
        };
      @endphp
      @if($getFarm->farm1s->field2 !== null)
        @if($time2 > 0)
        <div id="harvest2">
          <image src="{{ asset('images/sapling.png') }}" tittle="bag" width="100%" height="70px"/><br>
          <i class="far fa-clock mr-1"></i><span style="font-size:9px" id="clock2"></span>
        </div>
        @else
          <form method="post" action = "{{ route('farm.select.post',['id'=>'2']) }}">
            @csrf
            <image src="{{ asset($icon2) }}" tittle="bag" width="100%" height="70px"/><br>
            <input type="submit" class="btn btn-link" value="Thu hoạch" name="harvest"/>
          </form>
        @endif
      @else
          
      <form method="post" action = "{{ route('farm.select.post',['id'=>'2']) }}">
        @csrf
        <image src="{{ asset('images/farm.png') }}" tittle="bag" width="100%" height="70px"/><br>
        <input type="submit" class="btn btn-link" name="plant" value="Gieo hạt" />
      </form>
      @endif
    </div>
  
  <!--========≠==3≠==≠====≠≠=-->
  
  <div>
      @php
        $time3 = "";
        if(isset($getFarm->farm1s->field3Time)){
         $time3 = strtotime($getFarm->farm1s->field3Time)-strtotime(\Carbon\Carbon::now());
       }
      @endphp
      @if($getFarm->farm1s->field3 !== null)
        @if($time3 > 0)
        <div id="harvest3">
          <image src="{{ asset('images/sapling.png') }}" tittle="bag" width="100%" height="70px"/><br>
          <i class="far fa-clock mr-1"></i><span style="font-size:9px" id="clock3"></span>
        </div>
        @else
          <form method="post" action = "{{ route('farm.select.post',['id'=>'3']) }}">
            @csrf
            <image src="{{ asset($icon3) }}" tittle="bag" width="100%" height="70px"/><br>
            <input type="submit" class="btn btn-link" value="Thu hoạch" name="harvest"/>
          </form>
        @endif
      @else
          
      <form method="post" action = "{{ route('farm.select.post',['id'=>'3']) }}">
        @csrf
        <image src="{{ asset('images/farm.png') }}" tittle="bag" width="100%" height="70px"/><br>
        <input type="submit" class="btn btn-link" name="plant" value="Gieo hạt" />
      </form>
      @endif
    </div>
  
  <!--========≠==4≠==≠====≠≠=-->
  
  <div>
      @php
        $time4 = "";
        if(isset($getFarm->farm1s->field4Time)){
          $time4 = strtotime($getFarm->farm1s->field4Time)-strtotime(\Carbon\Carbon::now());
        }
      @endphp
      @if($getFarm->farm1s->field4 !== null)
        @if($time4 > 0)
        <div id="harvest4">
          <image src="{{ asset('images/sapling.png') }}" tittle="bag" width="100%" height="70px"/><br>
          <i class="far fa-clock mr-1"></i><span style="font-size:9px" id="clock4"></span>
        </div>
        @else
        <div id="harvest"></div>
          <form method="post" action = "{{ route('farm.select.post',['id'=>'4']) }}">
            @csrf
            <image src="{{ asset($icon4) }}" tittle="bag" width="100%" height="70px"/><br>
            <input type="submit" class="btn btn-link" value="Thu hoạch" name="harvest"/>
          </form>
        @endif
      @else
        
      <form method="post" action = "{{ route('farm.select.post',['id'=>'4']) }}">
        @csrf
        <image src="{{ asset('images/farm.png') }}" tittle="bag" width="100%" height="70px"/><br>
        <input type="submit" class="btn btn-link" name="plant" value="Gieo hạt" />
      </form>
      @endif
    @endisset
    @endisset
  </div>
  
</div>

</div>

<script>
//=====================================
var time1 = {{ strtotime($getFarm->farm1s->field1Time) }};
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
          <image src="{{ asset($icon1) }}" tittle="bag" width="100%" height="70px"/><br>
          <input type="submit" class="btn btn-link" value="Thu hoạch" name="harvest"/>
        </form>
    `;
  }
}, 1000);

//=====================================
var time2 = {{ strtotime($getFarm->farm1s->field2Time) }};
var x2 = setInterval(function() {
  var a2 = new Date().getTime() ;
  var now2 = Math.floor(a2 / 1000);
  var sum2 = time2 - now2 ;
  var days2 = Math.floor(sum2 / (60 * 24 * 60));
  var hours2 = Math.floor((sum2 % (60 * 24 * 60)) / ( 60 * 60 ));
  var minutes2 = Math.floor(((sum2 % (60 * 24 * 60)) % ( 60 * 60 )) / 60);
  var seconds2 = Math.floor(((sum2 % (60 * 24 * 60)) % ( 60 * 60 )) % 60);
  document.getElementById("clock2").innerHTML = days2 + "d" + hours2 + "h" + minutes2 + "m" + seconds2 + "s";
  if (sum2 < 0) {
    clearInterval(x2);
    document.getElementById("harvest2").innerHTML = `
      <form method="post" action = "{{ route('farm.select.post',['id'=>'2']) }}">
        @csrf
        <image src="{{ asset($icon2) }}" tittle="bag" width="100%" height="70px"/><br>
        <input type="submit" class="btn btn-link" value="Thu hoạch" name="harvest"/>
      </form>
    `;
  }
}, 1000);

//=====================================
var time3 = {{ strtotime($getFarm->farm1s->field3Time) }};
var x3 = setInterval(function() {
  var a3 = new Date().getTime() ;
  var now3 = Math.floor(a3 / 1000);
  var sum3 = time3 - now3 ;
  var days3 = Math.floor(sum3 / (60 * 24 * 60));
  var hours3 = Math.floor((sum3 % (60 * 24 * 60)) / ( 60 * 60 ));
  var minutes3 = Math.floor(((sum3 % (60 * 24 * 60)) % ( 60 * 60 )) / 60);
  var seconds3 = Math.floor(((sum3 % (60 * 24 * 60)) % ( 60 * 60 )) % 60);
  document.getElementById("clock3").innerHTML = days3 + "d" + hours3 + "h" + minutes3 + "m" + seconds3 + "s";
  if (sum3 < 0) {
    clearInterval(x3);
  document.getElementById("harvest3").innerHTML = `
    <form method="post" action = "{{ route('farm.select.post',['id'=>'3']) }}">
      @csrf
      <image src="{{ asset($icon3) }}" tittle="bag" width="100%" height="70px"/><br>
      <input type="submit" class="btn btn-link" value="Thu hoạch" name="harvest"/>
    </form>
  `;
  }
}, 1000);

//=====================================
var time4 = {{ strtotime($getFarm->farm1s->field4Time) }};
var x4 = setInterval(function() {
  var a4 = new Date().getTime() ;
  var now4 = Math.floor(a4 / 1000);
  var sum4 = time4 - now4 ;
  var days4 = Math.floor(sum4 / (60 * 24 * 60));
  var hours4 = Math.floor((sum4 % (60 * 24 * 60)) / ( 60 * 60 ));
  var minutes4 = Math.floor(((sum4 % (60 * 24 * 60)) % ( 60 * 60 )) / 60);
  var seconds4 = Math.floor(((sum4 % (60 * 24 * 60)) % ( 60 * 60 )) % 60);
  document.getElementById("clock4").innerHTML = days4 + "d" + hours4 + "h" + minutes4 + "m" + seconds4 + "s";
  if (sum4 < 0) {
    clearInterval(x4);
  document.getElementById("harvest4").innerHTML = `
  <form method="post" action = "{{ route('farm.select.post',['id'=>'4']) }}">
    @csrf
    <image src="{{ asset($icon4) }}" tittle="bag" width="100%" height="70px"/><br>
    <input type="submit" class="btn btn-link" value="Thu hoạch" name="harvest"/>
  </form>
  `;
  }
}, 1000);
    
</script>
