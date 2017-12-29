@extends('front.app')
@section('content')
  <section class="page-404">
    <div class="main-container">
      <div class="image"><img src="{{asset('images/404.jpg')}}"></div>
      <div class="page-404-content">
        <div class="page-404-1">Oops.. Looks like you are lost</div>
        <div class="page-404-2">The page you are looking for is not available</div>
        <div class="page-404-3"><a href="{{url('/')}}">Go to Homepage <img src="{{asset('images/goto.png')}}"></a></div>
      </div>
    </div>
  </section>
@endsection
