<?php
  include('includes/session.php');
  include('includes/connection.php');
  include('includes/functions.php');


  date_default_timezone_set('Asia/Taipei');

  //echo date('h s');
  ini_set("date.timezone", "Asia/Taipei");
  ?>
  
  <?php include('nav_deffer.php'); ?>

</header>

<div class="main " id="products">
  <br /> <br /><br />      
  <br /><br />
  

 <?php $products = get_all_products();?>

  <div class="page" id="products">



    <div class="container-fluid">



        <!--//cart system -->

      <?php include('cart_system.php'); ?>
      
            <!-- cart  end -->



      <h2 id="ourstaff" style="margin-bottom:60px">Swiss Deli <small>Products</small></h2>
      <br /><br />
      <div class="row">

        







        <div id="product_box">

        <?php while($all_products = mysqli_fetch_array($products)){?>

        <form action="shop.php?action=add&id=<?php echo $all_products['product_id']?>" method="POST">
       
        <div class="doctor col-lg-4">
          <div class="row">
           
           
               <div id="single_product">
              <h3 ><?php echo $all_products['product_name']?></h3>
              <img class="img-thumbnail" style="width:300px;height: 200px;" src="admins/product_images/<?php echo $all_products['product_image']?>"   alt="product image" width="100" >
                <p><b>₱<?php echo $all_products['product_price']?></b></p>
                <a role="button" class="btn btn-info pull-left" href="view_product_detail.php?product_id=<?php echo $all_products['product_id']?>">View Details</a>
                <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#add<?php echo $all_products['product_id']?>">Add</button>
          </div>
          
         



            <!-- add to cart -->
            <div class="modal fade" id="add<?php echo $all_products['product_id']?>" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-sm center-block">
                            <div class="modal-header">
                                  
                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><div class="modal_close_circle">&times;</div></span></button>

                                <h3 style="color:white" class="modal-title text-primary text-center" id="modalLabel">Product Detail</h3>
                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-12" >
                                     <table>
                                      <tr>
                                        <td>Product Name:</td>
                                        <td><?php echo $all_products['product_name']?></td>
                                      </tr>
                                      <tr>
                                        <td>Product Image:</td>
                                        <td><img src="admins/product_images/<?php echo $all_products['product_image']?>"></td>
                                      </tr>
                                      <tr>
                                        <td>Product Price:</td>
                                        <td>₱<?php echo $all_products['product_price']?></td>
                                      </tr>
                                       <tr>
                                        <td>Product Quantity:</td>
                                        <td><input class="form-control" type="number" value="1" min="1" step="1" name="quantity" /></td>
                                      </tr>
                                      <input type="hidden" name="hidden_name" value="<?php echo $all_products['product_name']?>">
                                      <input type="hidden" name="hidden_grams" value="<?php echo $all_products['product_grams']?>">
                                      <input type="hidden" name="hidden_price" value="<?php echo $all_products['product_price']?>">
                                      <tr>
                                         <td><button type="submit" class="btn btn-sm prime" name="add_to_cart"><b>Add to Cart</b></button></td>
                                        <td> <button type="button" class="btn btn-sm negate" data-dismiss="modal" aria-label="Close"><b>Cancel</b></button></td>
                                      </tr>
                                     </table>
                                      
                                        
                                    </div>
                                </div>
               
                   
                            </div>

                        </div>
                    </div>
            </div> <!-- add to cart -->
    


          </div> <!-- inner row -->
        </div> <!-- products -->
        </form>


        <?php }?>     


         </div> <!-- products box -->
      </div><!-- outer row -->
       
    </div><!-- container -->

  </div><!-- products page -->

  <p></p>

 
</div><!-- main -->

<?php include('footer.php');?>