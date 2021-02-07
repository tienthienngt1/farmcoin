@extends('layouts.app')

@section('content')

<x-home.mobile-farm-component :getFarm="$getFarm" :getVet="$getVet"/>
  
<x-home.desktop-farm-component />
@endsection

