<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Watercolor</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<!-- JS -->
<script type="text/javascript" src="js/jquery_1.3.2.js"></script>
<script type="text/javascript" src="js/jqueryui.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="js/custom.js"></script>
<!-- ENDS JS -->
<!-- superfish -->
<link rel="stylesheet" type="text/css" media="screen" href="css/superfish-custom.css" />
<script type="text/javascript" src="js/superfish-1.4.8/js/hoverIntent.js"></script>
<script type="text/javascript" src="js/superfish-1.4.8/js/superfish.js"></script>
<!-- ENDS superfish -->
<!-- CSS -->
<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" />
<link rel="stylesheet" href="css/spring.css" type="text/css" media="screen" />
<!--[if IE 6]>
<link rel="stylesheet" type="text/css" media="screen" href="css/ie-hacks.css" />
<script type="text/javascript" src="js/DD_belatedPNG.js"></script>
<script>/* EXAMPLE */ DD_belatedPNG.fix('*');</script>
<![endif]-->
<!-- ENDS CSS -->
<!-- Cufon -->
<script src="js/cufon-yui.js" type="text/javascript"></script>
<script src="js/bebas_400.font.js" type="text/javascript"></script>
<script type="text/javascript">Cufon.replace('.custom', { fontFamily: 'bebas', hover: true });</script>
<!-- /Cufon -->
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<div id="wrapper">
@include('layouts.frontend.navbar')
  <!-- HEADER -->
  <div id="header"> <a href="index.html"><img src="img/logo.png" alt="" id="logo" /></a> 
    <!-- <img src="img/nav-arrow.png" alt="" id="arrow" class="arrow-home" /> -->
    <form action="#" method="post" id="search">
      <p>
        <input type="text" onfocus="defaultInput(this)" onblur="clearInput(this)" name="keyword" id="keyword" value="Search..." />
      </p>
      <p>
        <input type="submit" id="go" value="" />
      </p>
      <div class="clear"></div>
    </form>
  </div>
  <!-- ENDS HEADER -->
  <!-- MAIN -->
  <div id="main">
  	@yield('content')
   <!-- ENDS MAIN -->
  </div>
@include('layouts.frontend.footer')

@yield('script')

</body>
</html>