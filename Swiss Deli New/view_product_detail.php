<?php
  include('includes/session.php');
  include('includes/connection.php');
  include('includes/functions.php');

  ?>
  
  <?php include('nav_product.php'); ?>

</header>

<div class="main " id="products">
  <br /> <br />     

  

 <?php 

    $product_id= $_GET['product_id'];
    $product = get_product_info_by_id($product_id);?>

  <div class="page" id="products">



    <div class="container-fluid">


      <!--cart system 2 -->
        <?php include('cart_system2.php'); ?>

      <!--cart system 2 -->


      <h2 id="ourstaff" style="margin-bottom:60px"><a href="shop.php" role="button" class="btn btn-info">Go Back</a></h2>
      <br /><br />
      <div class="row">

        <?php while($all_details = mysqli_fetch_array($product)){?>

        <form action="shop.php?action=add&id=<?php echo $all_details['product_id']?>" method="POST">
       
        <div class="doctor col-lg-12">
          <div class="row">
          
          <h1 class="text-center"><?php echo $all_details['product_name']?></h1>

          <div class="col-md-2"></div>
          <div class="col-md-8" style="">
              <img class="" src="admins/product_images/<?php echo $all_details['product_image']?>" alt="" width="60" height="400">
              
            <div style="margin-top:15px;">

            <div style="width: 500px;border: " class="center-block">
              <button type="button" class="btn btn-primary center-block btn-block"  data-toggle="modal" data-target="#add<?php echo $all_details['product_id']?>">Add</button>
            </div>

            </div>

          </div>
          <div class="col-md-2"></div>


      
            <div class="col-md-10 col-xs-offset-1">
             <br />


                <?php $get_category = find_category_by_products($all_details['category_id']);?>
                <?php while($category = mysqli_fetch_array($get_category)){?>

             <p><b>Product Category:</b> <?php echo $category['category_name'];?></p>
              <?php } ?>
              <?php $cat_id =  $all_details['category_id'];
                    $prod_id = $all_details['product_id'];
                //product id and category id reference
              ?>
             <b>Product Detail</b>
            <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $all_details['product_desc']?></p>
            <p style="font-weight: bold;">Pack Size:<b><?php echo $all_details['product_grams']?> grams</b></p>
            <p style="font-weight: bold;">Product Price:  <b>₱<?php echo $all_details['product_price']?> </b></p>

          </div>
        
          
           
         

            <!-- add to cart -->
            <div class="modal fade" id="add<?php echo $all_details['product_id']?>" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content modal-sm center-block">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 style="color:white" class="modal-title text-primary text-center" id="modalLabel">Product Detail</h3>
                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-12" >
                                     <table>
                                      <tr>
                                        <td>Product Name:</td>
                                        <td><?php echo $all_details['product_name']?></td>
                                      </tr>
                                      <tr>
                                        <td>Product Image:</td>
                                        <td><img src="admins/product_images/<?php echo $all_details['product_image']?>"></td>
                                      </tr>
                                      <tr>
                                        <td>Product Price:</td>
                                        <td>₱<?php echo $all_details['product_price']?></td>
                                      </tr>
                                       <tr>
                                        <td>Product Quantity:</td>
                                        <td><input class="form-control" type="number" value="1" min="1" step="1" name="quantity" /></td>
                                      </tr>
                                      <input type="hidden" name="hidden_name" value="<?php echo $all_details['product_name']?>">
                                      <input type="hidden" name="hidden_price" value="<?php echo $all_details['product_price']?>">

                                      <input type="hidden" name="hidden_grams" value="<?php echo $all_details['product_grams']?>">
                                      <tr>
                                         <td><button type="submit" class="btn btn-sm prime" name="add_to_cart">Add to Cart</button></td>
                                        <td> <button type="button" class="btn btn-sm negate" data-dismiss="modal" aria-label="Close">Cancel</button></td>
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



      </div><!-- outer row -->


        <hr style=" border-top: 1px solid #8c8b8b;" />
      <div class="row">
        
      <div class="col-md-12">
          <h1>Related Products</h1>
        </div>
         
                
                <?php 

                      // query for related product

                  $sql = "SELECT * FROM producttbl WHERE category_id = '$cat_id' AND product_id != '$prod_id' AND product_bin != 'bin' AND product_quantity != 0";
                  $get_related = mysqli_query($connection,$sql);

                 

                  while ($related = mysqli_fetch_assoc($get_related )) {
                    ?>

                            <div class="col-md-4" style="margin-bottom: 10px;width: ">

                                  <div id="product_box" style="width: 350px">
                                    <div id="single_product">
                                      <h3><?php echo $related['product_name']?></h3>
                                      <img class="img-thumbnail" style="width:300px;height: 200px;" src="admins/product_images/<?php echo $related['product_image']?>"   alt="product image" width="100" >
                <p><b>₱<?php echo $related['product_price']?></b></p>
                <a role="button" class="btn btn-info center-block" href="view_product_detail.php?product_id=<?php echo $related['product_id']?>">View Details</a>
               
          </div>
           </div>
         
                     </div>


                  <?php  
                    # code...
                  }
                ?>
                    
               
              
    

      </div><!-- second row -->


       
    </div><!-- container -->

  </div><!-- products page -->

  <p></p>

 
</div><!-- main -->

<?php include('footer.php');?>