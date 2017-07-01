<?php
  include('includes/session.php');
  include('includes/connection.php');
  include('includes/functions.php');

  ?>

  <?php include('navigation.php'); ?>

  <div class="carousel fade" data-ride="carousel" id="featured">

    <ol class="carousel-indicators">
    </ol>

    <div class="carousel-inner fullheight">
      <div class="item"><img src="images/Breakfast-Sandwich-2-1024x683.jpg"></div>
      <div class="item"><img src="images/BBQ-Party-Pack_2-1024x683.jpg" ></div>
      <div class="item"><img src="images/Antipasti-sharing-platters.jpg" ></div>
      <div class="item"><img src="images/Currywurst-with-chips.png"></div>
      <div class="item"><img src="images/Beef-Pastrami-300x187.png"></div>      
    </div><!-- carousel-inner -->

    <a class="left carousel-control" href="#featured" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#featured" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
  </div><!-- featured carousel -->
</header>

<div class="main">
  <div class="page" id="about">
    <div class="content container">
      <h1>About Us</h1>      
      <div class="row">
        <div class="col-md-5 col-md-offset-1 about_heading">
          <h2>Mission</h2>
           <p class="text-indent:40px">To progressive increase our market share by providing and competitive prices without sacrificing qualitites and develop
        long term business business realationships built on good service,reliablity, integrity and mutual respect. As to the quality and suberb
        service we rendered, we have reached and expanded its distribution throughout the Philippines, abd still moving forward in servinf and producing safe and good quality meat products.</p>
        </div><!-- mission -->
        
        <div class="col-md-5 about_heading">
            <h2>Vision</h2>
              <p>To maintain leadership in the food industry and develop new products and services that will meet the needs of 
              satisfaction of our clients as welll as the consumers.
             </p>
        </div>

        <div class="col-md-4 about_heading">
            <h2>Objective</h2>
               <p>To ensure that all products are produced in a manner that product
                  safety quality and overall integrity to meet the satisfaction of our 
                  customers</p>
        </div>

       
      </div><!-- row -->
    </div><!-- content container -->
  </div><!-- mission page -->

 <?php $products = get_featured_products();?>

  <div class="page" id="products">
    <div class="container-fluid">
      <h2 id="ourstaff">Featured Products</h2>
      <div class="row">

        <?php while($featured_products = mysqli_fetch_array($products)){?>
        <div class="doctor col-lg-6">
          <div class="row">
            <div class="photo col-xs-6 col-xs-offset-3 col-sm-3 col-sm-offset-1 col-md-2 col-md-offset-2 col-lg-4 col-lg-offset-0">
              <img class="img-circle" src="admins/product_images/<?php echo $featured_products['product_image']?>" alt="Photo of Dr Sanders" width="60" height="100">
            </div><!-- photo -->
            <div class="info col-xs-8 col-xs-offset-2 col-sm-7 col-sm-offset-0 col-md-6 col-lg-8">
              <h3><?php echo $featured_products['product_name']?></h3>
              <p style="text-indent:20px;text-align:justify"><?php echo $featured_products['product_desc']?></p>
            </div><!-- info -->
          </div> <!-- inner row -->
        </div> <!-- products -->

        <?php }?>     


      <div class="clearfix"></div>
      </div><!-- outer row -->
       <div class="pull-right"><a href="shop.php" class="btn btn-warning" data-tooltip ="tooltip" title="Logout here" data-placement ="top">Go to Store</a></div>
    </div><!-- container -->

  </div><!-- products page -->

 
</div><!-- main -->

<?php include('footer.php');?>
