<!-- display sm up -->
<div class="d-sm-none d-flex justify-content-beetwen">
  <div>
    <a class="btn btn-link" href="/home/bag" >
      <image src="{{ asset('images/bag.png') }}" tittle="bag" width="100%"/><br>
      Túi
    </a>
  </div>
    <div> 
    <a class="btn btn-link" href="{{ route('home.farm') }}" >
      <image src="{{ asset('images/farm.png') }}" tittle="bag" width="100%" height="50px"/><br>
      Cánh Đồng
    </a>
  </div>
  <div>
    <a class="btn btn-link" href="home/pet" >
      <image class="mx-auto" src="{{ asset('images/pig.png') }}" tittle="bag" width="100%"/><br>
      Vật Nuôi
    </a>
  </div>
  <div>
    <a class="btn btn-link" href="home/shop" >
      <image  src="{{ asset('images/shop.png') }}" tittle="bag" width="100%"/><br>
      Cửa Hàng
    </a>
  </div>
</div>
<!--  display sm down -->
<div class="d-none d-sm-block">
<div class="d-flex justify-content-beetwen">
  <div>
    <a class="btn btn-link" href="home/bag" >
      <image src="{{ asset('images/bag.png') }}" tittle="bag" width="80%" height="100px"/><br>
      Túi
    </a>
  </div>
    <div> 
    <a class="btn btn-link" href="home/farm" >
      <image src="{{ asset('images/farm.png') }}" tittle="bag" width="80%" height="100px"/><br>
      Cánh Đồng
    </a>
  </div>
  <div>
    <a class="btn btn-link" href="home/pet" >
      <image class="mx-auto" src="{{ asset('images/pig.png') }}" tittle="bag" width="80%" height="100px"/><br>
      Vật Nuôi
    </a>
  </div>
  <div>
    <a class="btn btn-link" href="home/shop" >
      <image  src="{{ asset('images/shop.png') }}" tittle="bag" width="80%" height="100px"/><br>
      Cửa Hàng
    </a>
  </div>
</div>
</div>