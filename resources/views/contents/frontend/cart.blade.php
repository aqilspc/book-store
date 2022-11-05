@extends('layouts.frontend.header')

@section('content')
    <!-- slideshow -->
    @if($tot > 0)
    <div class="holder">
      <p align="right">
        <a href="{{url('hompage_checkout_all_cart')}}" onclick="return confirm('Checkout all of cart')" class="btn btn-warning" style="background-color: orange; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;">Checkout All</a>
    </p>
  </div>
  @endif
    <!-- ENDS slideshow -->
    <p class="custom excerpt">List You Card {{$banyak}} Total : Rp.{{number_format($tot)}}</p>
    <!-- blocks -->
     @if($message=Session::get('success'))
                <p align="center" style="color: green;">
                  <div class="alert alert-success">
                      {{$message}}
                  </div>
                </p>
                @endif
    <div class="holder">
      @foreach($arr as $key => $item)
      <div class="block {{$key == $banyak?'last':''}}" id="cart_list_{{$item->cart_id}}">
        <div class="thumb-holder"> 
          <a href="#">
          <img src="{{$item->image}}" alt="" class="thumb" style="width: 301px;max-height: 116px;" /> 
        </a> 
        </div>
        <h2 class="custom">{{$item->category}}</h2>
        <h5 class="custom color2">{{$item->name}}</h5>
        <p class="thumb-text">Rp.{{number_format($item->price)}}</p>
        <p>
          @if(Auth::check())
          <a style="cursor: pointer;color: orange;" onclick="removeToCart({{$item->cart_id}})"  class="fa fa-close">Remove from cart</a>
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