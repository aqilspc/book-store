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
    <p class="custom excerpt">Four different skins: <a href="#">Spring</a>, <a href="#">Summer </a>, <a href="#">Autumn</a>, and <a href="#">Winter. </a></p>
    <!-- blocks -->
    <div class="holder">
      <div class="block">
        <div class="thumb-holder"> <a href="gallery.html"><img src="img/dummies/dummy-block1.jpg" alt="" class="thumb" /> </a> </div>
        <h2 class="custom">RECENT ALBUMS</h2>
        <h5 class="custom color2">IMAGES AND VIDEOS</h5>
        <p class="thumb-text">Eleifend et eu est. Aenean tortor eros, sodales at bibendum vulputate, porttitor.Vestibulum sed neque ac magna feugiat eleifend et eu est. Aenean tortor eros, sodales at bibendum vulputate, porttitor.</p>
        <p><a href="gallery.html" class="more">More</a></p>
      </div>
      <div class="block">
        <div class="thumb-holder"> <a href="gallery.html"><img src="img/dummies/dummy-block2.jpg" alt="" class="thumb" /> </a> </div>
        <h2 class="custom">FROM THE BLOG</h2>
        <h5 class="custom color2">POSTS FROM THE BLOG</h5>
        <p class="thumb-text">Eleifend et eu est. Aenean tortor eros, sodales at bibendum vulputate, porttitor.Vestibulum sed neque ac magna feugiat eleifend et eu est. Aenean tortor eros, sodales at bibendum vulputate, porttitor.</p>
        <p><a href="gallery.html" class="more">More</a></p>
      </div>
      <div class="block last">
        <div class="thumb-holder"> <a href="gallery.html"><img src="img/dummies/dummy-block1.jpg" alt="" class="thumb" /> </a> </div>
        <h2 class="custom">RECENT NEWS</h2>
        <h5 class="custom color2">NEWS AND EVENTS</h5>
        <p class="thumb-text">Eleifend et eu est. Aenean tortor eros, sodales at bibendum vulputate, porttitor.Vestibulum sed neque ac magna feugiat eleifend et eu est. Aenean tortor eros, sodales at bibendum vulputate, porttitor.</p>
        <p><a href="gallery.html" class="more">More</a></p>
      </div>
    </div>
    <!-- ENDS blocks -->
  </div>
@endsection

@section('script')

@endsection