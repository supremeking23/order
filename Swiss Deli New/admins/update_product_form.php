        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    
    <?php include('header.php');?>

    <?php include('sidebar.php');?>


       <?php 
		if(isset($_GET['product_id'])){
		//echo $_GET['admin_id'];


		$product = find_products_by_id($_GET['product_id']);
		?>


      <!-- Page heade -->
        <div id="header"><i class="fa fa-printer"></i>
             <div class="logo"><a href="#">Swiss<span>Deli </span></a></div>
             <div class="pull-right welcome">
               
                   <a href="">Welcome Admin <?php echo $_SESSION['email']?></a>
               



             </div>

             
        </div>



      

         <div class="container-fluid">

         	<div>

      	 		<div class="col-lg-12">

        			<div class="row">



        				 <div><a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a></div>

                      	<h1>Edit Product Information</h1>

                         <?php while($update_product = mysqli_fetch_array($product)){ 
                        			
                        		?>

                      	 <form  method="post" action="update_product_process.php" enctype="multipart/form-data">
                                       <table class="col-lg-8">
                                            <tr>
                                                <td><label for="pro_name">Product Name</label></td>
                                                <td><input type="text" class="form-control" name="pro_name" value="<?php echo $update_product['product_name'];?>"></td>
                                            </tr>

                                            <tr>
                                                <td><label for="pro_category">Product Category</label></td>
                                                <td>
                                                    <?php $get_category = get_all_category();
                                                         
                                                           
                                                                # code...
                                                    ?>


                                                        <select class="form-control"  name="pro_category">

                                                                <?php 
                                                                 while ($category = mysqli_fetch_array($get_category)) {

                                                                        $category_id = $category['category_id'];
                                                                        $category_name = $category['category_name'];

                                                                        echo "<option value='$category_id'>$category_name</option>";
                                                                ?>
                                                                    <?php } ?>
                                                        </select>


                                                     
                                                           

                                                   
                                                </td>
                                            </tr>

                                            <tr>
                                            	<input type="hidden" value="<?php echo $update_product['product_image'];?>" name="image_name">
                                                <td><label for="productImage">Product Image</label></td>
                                                <td><input type="file" name="productImage"
                                                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >
                                                    <img  id="image" class="img-rounded" alt="" width="300" height="200" src="product_images/<?php echo $update_product['product_image'];?>" />
                                                </td>
                                            </tr>


                                             <tr>
                                                <td ><label for="pro_price">Product Price</label></td>
                                                <td><input type="text" class="form-control" name="pro_price" value="<?php echo $update_product['product_price']?>"></td>
                                            </tr>

                                            <tr>
                                                <td ><label for="pro_desc">Product Description</label></td>
                                                <td><textarea class="form-control" cols="20" rows="10" value="" name="pro_desc"><?php echo $update_product['product_desc']?></textarea></td>
                                            </tr>

                                             <tr>
                                                <td ><label for="pro_keywords">Product Keywords</label></td>
                                                <td><input type="text" class="form-control" name="pro_keywords" value="<?php echo $update_product['product_keywords']?>"></td>
                                            </tr>

                                             <tr>
                                                <td ><label for="pro_grams">Grams Per Pack</label></td>
                                                <td><input type="text" class="form-control" name="pro_grams" value="<?php echo $update_product['product_grams']?>"></td>
                                            </tr>

                                             <tr>
                                                <td ><label for="pro_quantity">Product Quantity</label></td>
                                                <td><input type="text" class="form-control" name="pro_quantity" value="<?php echo $update_product['product_quantity']?>"></td>
                                            </tr>

                                            <tr>	
                                            	<input type="hidden" value="<?php echo $update_product['product_id'];?>" name="hidden_product_id">
                                                <td><input type="submit" name="update_product" class="btn btn-primary btn-md" value="Update Product"></td>
                                            </tr>
                                       </table>
                                        
                                       </form> 

                                       <?php }?>

                    </div> <!--class="col-lg-12" -->

                </div> <!--row" -->








            </div> <!--no name div -->
        </div>
        <!-- /#page-content-wrapper -->

    

    <?php include('footer.php');?>

    <?php } ?>