<footer>
  <div class="content container-fluid">
    <div class="row">
      <div class="col-sm-6">
        <p>Call us toll-free at <span class="phone">888-555-1212</span></p>
        <p>All contents &copy; 2014 <a href="#">Swiss Deli Philippines</a>. All rights reserved.</p>    
      </div><!-- col-sm-6 -->
      <div class="col-sm-6">
        <nav class="navbar navbar-default" role="navigation">
          <ul class="nav navbar-nav navbar-right">
            <!--<li><a href="#terms" data-toggle="modal">Terms of use</a></li>
            <li><a href="#">Privacy policy</a></li> -->
          </ul>


        
       



        </nav>        
      </div><!-- col-sm-6 -->
    </div><!-- row -->
  </div><!-- content container -->
</footer>


<script src="js/jquery-2.1.4.min.js"></script>

<script src="js/bootstrap.min.js"></script>
<script src="js/myscript.js"></script>

<script src="js/improved_restriction.js"></script>

  <script>
$(document).ready(function(){
  $('.search').on('keyup',function(){
    var searchTerm = $(this).val().toLowerCase();
    $('#product_box #single_product').each(function(){
      var lineStr = $(this).text().toLowerCase();
      if(lineStr.indexOf(searchTerm) === -1){
        $(this).hide();
      }else{
        $(this).show();
      }
    });
  });
});
</script>
</body>
</html>
