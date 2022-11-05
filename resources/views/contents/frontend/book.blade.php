@extends('layouts.frontend.header')

@section('content')
    <!-- slideshow -->
    <div class="holder">
      <<div class="block">
      <form action="{{url('hompage_book')}}"  id="search">
      <p>
        <input type="text" onfocus="defaultInput(this)" onblur="clearInput(this)" name="search" id="keyword" 
        value="{{$request->search}}" />
      </p>
      <p>
        <input type="submit" id="go" value="" />
      </p>
      <div class="clear"></div>
    </form>
  </div>
</div>
    <!-- ENDS slideshow -->
    <p class="custom excerpt">All Books</p>
    <!-- blocks -->

    <div class="holder">
      @foreach($data as $key => $item)
      <div class="block {{$key == $banyak?'last':''}}">
        <div class="thumb-holder"> <a href="gallery.html"><img src="{{$item->image}}" alt="" class="thumb" style="width: 301px;max-height: 116px;" /> </a> 
        </div>
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