<?php
  include('includes/session.php');
  include('includes/connection.php');
  include('includes/functions.php');


  date_default_timezone_set('Asia/Taipei');

  
  ?>

  <?php include('navigation.php'); ?>

  <div class="carousel fade" data-ride="carousel" id="featured">

    <ol class="carousel-indicators">
    </ol>

    <!-- prev fullheight-->
    <div class="carousel-inner " style="height: 600px;">
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

      <div class="row">

        <button type="button" data-toggle="modal" class="center-block btn btn-info" data-target="#terms">Read Terms and Condition</button>

           <div class="modal fade" id="terms" tabindex="-1" role="dialog" aria-labelledby="">
                <div class="modal-dialog" role="document" style="width: 900px">
                  <div class="modal-content">
                      <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><div class="modal_close_circle">&times;</div></span></button>
                          <h3 class="modal-title text-primary text-center" id="modalLabel">Terms and Condition</h3>
                      </div>

                      <div class="modal-body" style="color:black">
                          


        <h2>Account Registration</h2>
        <br />
          <div class="about_description">
            <table style="color:;font-size:16px">
              <col width="5%">
              <col width="95%">
              <tr>
                <td>1.</td>
                <td colspan="2"> On registration you must provide Swiss Deli Inc with complete, accurate and truthful information</td>
                <td></td>
              </tr>

              <tr>
                <td>2.</td>
                <td colspan="2">You are responsible for all use of this website using Your credentials and for preventing unauthorized use of Your ID. If you believe that there has been or will be a potential breach of Your credentials security please notify us immediately by contacting us.</td>
                <td></td>
              </tr>

              <tr>
                <td>3.</td>
                <td colspan="2">Only the administrator has the authority to approve your registration.</td>
                <td></td>
              </tr>

              <tr>
                <td>4.</td>
                <td colspan="2">Before approving your account, you must present some business requirements in our company as a sign of membership</td>
                <td></td>
              </tr>

              <tr>
                <td>5.</td>
                <td colspan="2">You are responsible in remembering your account information</td>
                <td></td>
              </tr>

              <tr>
                <td>6.</td>
                <td>You have the authority on updating your account information</td>
                <td></td>
              </tr>

             
            </table>
          </div>


          <br />


            <h2>Ordering</h2>
        <br />
          <div class="about_description">
            <table style="color:;font-size:16px">
              <col width="5%">
              <col width="95%">
              <tr>
                <td>1.</td>
                <td colspan="2">Before placing order,  you should have your account</td>
                <td></td>
              </tr>

              <tr>
                <td>2.</td>
                <td colspan="2">You have the right to cancel your order by contacting us with valid reason and before the delivery date.</td>
                <td></td>
              </tr>

              <tr>
                <td>3.</td>
                <td colspan="2">The minimum kilos required in every transaction must be 30 kilograms. Otherwise your order request will not be send. <!-- When you placed your order with the amount below the minimum kilos required, the administrator will inform you (through call) that you should re-order your transaction with the required amount of kilos. -->  </td>
                <td></td>
              </tr>

             

             
            </table>
          </div>


            <br />


            <h2>Pointing</h2>
        <br />
          <div class="about_description">
            <table style="color:;font-size:16px">
              <col width="5%">
              <col width="95%">
              <tr>
                <td>1.</td>
                <td colspan="2">1 point is equal to ₱ 1.00.</td>
                <td></td>
              </tr>

              <tr>
                <td>2.</td>
                <td colspan="2">When your account is approved you will receive a bonus of 100 points.</td>
                <td></td>
              </tr>

              <tr>
                <td>3.</td>
                <td colspan="2">You can only use your points when it is equal to 100 points or above.  <!-- When you placed your order with the amount below the minimum kilos required, the administrator will inform you (through call) that you should re-order your transaction with the required amount of kilos. -->  </td>
                <td></td>
              </tr>

              <tr>
                <td>4.</td>
                <td colspan="2">Only 30% of the total cost is the maximum points you can use.</td>
                <td></td>
              </tr>


              <tr>
                <td>5.</td>
                <td colspan="2">5.  For every   ₱ 1000.00, 1 point will be added to your points.</td>
                <td></td>
              </tr>

             
  
             
            </table>
          </div>





            <br />


            <h2>Delivery</h2>
        <br />
          <div class="about_description">
            <table style="color:;font-size:16px">
              <col width="5%">
              <col width="95%">
              <tr>
                <td>1.</td>
                <td colspan="2">The payment should in the receiving of the delivery</td>
                <td></td>
              </tr>

              <tr>
                <td>2.</td>
                <td colspan="2">From approving the order,   process of delivery is within 2 days</td>
                <td></td>
              </tr>

              <tr>
                <td>3.</td>
                <td colspan="2">You can track your order status if it is still pending for approval, approved or delivered.</td>
                <td></td>
              </tr>

           

             
  
             
            </table>
          </div>
                      




                      </div> <!--modal-bodt -->


                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-primary btn-block">Close</button>
                  </div>  

                  </div> <!--modal-content -->
                </div> <!--modal-dialog -->
          </div> <!--modal-modal -->

      </div>
    </div><!-- content container -->
  </div><!-- mission page -->

 

  <div class="page" id="products">
    <div class="container-fluid">
      <h2 id="ourstaff">Featured Products</h2>
      <div class="row">
        <div class="col-md-12">
          <div class="pull-right"><a href="shop.php">Go to Shop</a></div>
        </div>
      </div>
      <div class="row" style="">
     

        




          <?php $random_products =  get_all_products_random(); ?> 

          <?php while($all_products = mysqli_fetch_array($random_products)){?>

            <div class="col-lg-4" style=" padding: 15px;">
             
                 <div id="single_product">
                <h3 style=" text-align: center;font-weight: 600;font-size: 1.2em;color: #6F4E36;padding-bottom: 5px;"><?php echo $all_products['product_name']?></h3>
                <img class="img-thumbnail" style="width:300px;height: 200px;" src="admins/product_images/<?php echo $all_products['product_image']?>"   alt="product image" width="100" >
                  <p style="text-align: center"><b>₱<?php echo $all_products['product_price']?></b></p>
                  <a role="button" class="btn btn-info btn-block" href="view_product_detail.php?product_id=<?php echo $all_products['product_id']?>">View Details</a>
                  
                </div>
           

              </div>
              <?php } ?>
         




        

      </div><!-- outer row -->
    </div><!-- container -->
  </div><!-- staff page -->

 
</div><!-- main -->

<?php include('footer.php'); ?>