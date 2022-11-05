@extends('layouts.frontend.header')

@section('content')

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
    <!-- slideshow -->
    <div id="slideshow">
        <div class="contact-left" >
      <h5 class="custom">Kirim Pesan Ke admin</h5>
      <!-- form -->
      @if(Auth::check())
      <form action="{{url('hompage_kirim_pesan')}}" method="post">
        @csrf
        <fieldset>
          <p>
            <label>NAME:</label>
            <input name="name"  id="name" type="text" value="{{Auth::user()->name}}" />
          </p>
          <p>
            <label>EMAIL:</label>
            <input name="email"  id="email" type="text" value="{{Auth::user()->email}}" />
          </p>
          <p>
            <label>MESSAGE:</label>
            <textarea  name="message"  id="comments" rows="5" cols="10"></textarea>
          </p>
          
          <p>
            <input type="submit" value="" name="send" id="send" />
          </p>
           @if($message=Session::get('success'))
          <p id="success">Thanks for your message.</p>
          @endif
        </fieldset>
      </form>
       @else
          <p>Anda harus login dulu!</p>
          @endif
      
      <!-- ENDS form -->
    </div>
    </div>
    <!-- ENDS slideshow -->
@endsection

@section('script')

@endsection