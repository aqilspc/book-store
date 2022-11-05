<div id="footer">
  <div id="footer-wrapper">
    <ul id="follow">
      <li>
        <p>Follow us: </p>
      </li>
      <li><a href="#"><img src="img/twitter.png" alt="" /></a></li>
      <li><a href="#"><img src="img/facebook.png" alt="" /></a></li>
      <li><a href="#"><img src="img/linkedln.png" alt="" /></a></li>
      <li><a href="#"><img src="img/rss.png" alt="" /></a></li>
    </ul>
    <div class="footer-cols">
      <div>
        <ul>
          <li><a href="#" class="custom">Skins</a></li>
          <li><a href="#">Spring</a></li>
          <li><a href="#">Summer</a></li>
          <li><a href="#">Autumn</a></li>
          <li><a href="#">Winter</a></li>
        </ul>
      </div>
      <div>
        <ul>
          <li><a href="#" class="custom">Gallery</a></li>
          <li><a href="#">Spring</a></li>
          <li><a href="#">Summer</a></li>
          <li><a href="#">Autumn</a></li>
          <li><a href="#">Winter</a></li>
        </ul>
      </div>
      <div>
        <ul>
          <li><a href="#" class="custom">Blog</a></li>
          <li><a href="#">Spring</a></li>
          <li><a href="#">Summer</a></li>
          <li><a href="#">Autumn</a></li>
          <li><a href="#">Winter</a></li>
        </ul>
      </div>
      <div class="last">
        <ul>
          <li><a href="#" class="custom">Text Styles</a></li>
          <li><a href="#">Spring</a></li>
          <li><a href="#">Summer</a></li>
          <li><a href="#">Autumn</a></li>
          <li><a href="#">Winter</a></li>
        </ul>
      </div>
    </div>
    <div class="footer-bottom">
      <p class="legal">&copy; Copyright 2012 <a href="#">Company Name</a> All Rights Reserved | Website Template By <a target="_blank" href="http://www.luiszuno.com">luiszuno</a></p>
    </div>
  </div>
</div>
<!-- ENDS FOOTER -->
<!-- start cufon -->
<script type="text/javascript">
Cufon.now();
  function addToCart(val) {
        $.ajax({
                type: 'get',
                url: "{{url('/hompage_add_to_cart')}}"+"/"+ val,
                dataType: 'json',
                success: function (data) {
                    $('#lblCartCount').empty();
                    $('#lblCartCount').append(data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
       } 

       function removeToCart(val) {
        $.ajax({
                type: 'get',
                url: "{{url('/hompage_remove_from_cart')}}"+"/"+ val,
                dataType: 'json',
                success: function (data) {
                    $('#cart_list_'+val).remove();
                    $('#lblCartCount').empty();
                    $('#lblCartCount').append(data);
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
       } 


</script>
<!-- ENDS start cufon -->