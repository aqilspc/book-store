  <!-- navigation -->
  <ul id="nav" class="sf-menu">
     @if(Auth::check())
    <li class="custom">
     <a href=""><i class="fa fa-shopping-cart"></i></a>
    </li>
    <li class="custom">
      <a href="#">PROFIL</a>
      <ul>
        <li><a style="cursor: context-menu;">HALO {{Auth::user()->name}}</a></li>
        <li> <a href="#"  onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">KELUAR</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form></li>
      </ul>
    </li>
    @else
    <li class="custom"><a href="{{url('login')}}">MASUK</a></li>
    @endif
    <li class="custom"><a href="blog.html">BOOK</a></li>
    <li class="custom"><a href="contact.html">HOME</a></li>
  </ul>
  <!-- ENDS navigation -->