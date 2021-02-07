@extends('layouts.app')

@section('content')
<div class="card">
  
  <a class="text-primary p-3" href="/forum/{{ request ()->route('id') }}"><i class="fas mr-2 fa-angle-double-left"></i>Quay về</a>
  
<div class="card-header">
  <div class="card-body row">
    <div class="col-3 col-md-1">
      @guest
      @else
      {!! Avatar::create($data->name)->setFontSize(20)->setDimension(50)->toSvg() !!}
      @endguest
    </div>
    <div class="col-9 col-md-11">
      <dl>
        <h4>{{ $data->name }}</h4>
        <dd>
          {{ $data->tittle }} >>>
        </dd>
        <dd>
          {{ $data->content }}
        </dd>
      </dl>
      <dl>
        <small>{{ \carbon\carbon::parse($data->created_at)->diffForHumans() }}</small>
      </dl>
      
      @if($check_like !== null)
      <form method="post" action="">
        @csrf
          <i class="fas fa-thumbs-up text-primary"></i>
        <input type="submit" name="dislike" class="btn btn-link" value="Bỏ thích" />&nbsp<span class="text-primary">{{ $data->like }}</span>
      </form>
      @else
      <form method="post" action="">
        @csrf
          <i class="fas fa-thumbs-up"></i>
        <input type="submit" name="like" class="btn btn-link text-success" value="Thích" />&nbsp{{ $data->like }}
      </form>
      @endif
      
    </div>
  </div>
  <form method="POST" action="">
    @csrf
      <div class="form-group row">
        <label for="content" class="col-md-4 col-form-label text-md-right">{{ __(' Nội dung') }}</label>
        <div class="col-md-6">
           <textarea class="@error('content') is-invalid @enderror" autofocus id="content" name="content" rows="4" style="min-width: 100%" ></textarea>
          @error('content')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>
      </div>
      <div class="form-group row mb-0">
        <div class="col-md-8 offset-md-4">
          <button id ="reg" type="submit" class="btn btn-primary" onclick="snipper()">
            Trả lời
          </button>
        </div>
      </div>
    </form>
</div>
@isset($comment)
@foreach($comment as $c)
<div class="card-body" style="padding:0px 5px">
  <div class="card-body row">
    <div class="col-3 col-md-1">
      @guest
      @else
      {!! Avatar::create($c->name)->setFontSize(20)->setDimension(50)->toSvg() !!}
      @endguest
    </div>
    <div class="col-9 col-md-11">
      <dl>
        <h4>{{ $c->name }}</h4>
        <dd class="font-italic">
          {{ $c->content }}
        </dd>
      </dl>
       <small>{{ \carbon\carbon::parse($c->created_at)->diffForHumans() }}</small>
    </div>
  </div>
</div>
@endforeach
@endisset
</div>



<button id="myP" class="btn btn-primary" type="button" disabled hidden>
  <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true"></span>
  Đang đăng...
</button>

@endsection