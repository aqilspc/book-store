@extends('layouts.frontend.header')

@section('content')
    <!-- slideshow -->
    <div id="slideshow">
      <ul id="slides">
        <li><img src="slides/01.jpg" alt="" /></li>
        <li><img src="slides/02.jpg" alt="" /></li>
        <li><img src="slides/03.jpg" alt="" /></li>
      </ul>
      <span></span> <a href="#"><img src="img/prev-slide.png" alt="" id="prev" /></a> <a href="#"><img src="img/next-slide.png" alt="" id="next" /></a> </div>
    <!-- ENDS slideshow -->
    <p class="custom excerpt">New Books</p>
    <!-- blocks -->

    <div class="holder">
      @foreach($data as $key => $item)
      <div class="block {{$key == $banyak?'last':''}}">
        <div class="thumb-holder"> <a href="#"><img src="{{$item->image}}" alt="" class="thumb" style="width: 301px;max-height: 116px;" /> </a> </div>
        <h2 class="custom">{{$item->category}}</h2>
        <h5 class="custom color2">{{$item->name}}</h5>
        <p class="thumb-text">Rp.{{number_format($item->price)}}</p>
        <p>
         @if(Auth::check())
          <a style="cursor: pointer;color: orange;" onclick="addToCart({{$item->id}})"  class="fa fa-shopping-cart">Add to cart</a>
          @else
          <a href="login" class="fa fa-shopping-cart" style="color: orange;">Add to cart</a>
          @endif
        </p>
      </div>
      @endforeach
    </div>
    <!-- ENDS blocks -->
  </div>
@endsection

@section('script')

@endsection