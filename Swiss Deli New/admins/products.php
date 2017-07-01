        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    
    <?php include('header.php');?>

    <?php include('sidebar.php');?>


    <?php 
        $get_products = get_all_products();?>






          <!-- Page heade -->
        <?php include('page_header.php');?>

        <div class="container">
            <h1 style="">Product Section</h1>   
        </div>

           <!-- add product -->
        <div class="table_nav">
             <a href="#products" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="Add Products" title="" id="">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add Products             
            </a>
            &nbsp; &nbsp;
             <a href="#pdf_product" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="generate product list report" title="" id="">
                &nbsp;Generate Report           
            </a>
            &nbsp; &nbsp;



                        <!-- pdf products -->
            <div class="modal fade" id="pdf_product" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">PRODUCT REPORT</h3>

                            </div>
                            <div class="modal-body ">
                                <center>

                                <form action="generate_product_pdf.php" method="POST">
                                   <br><h4>Select below to filter the reports information to be print:</h4><br><br>
                                        <b>Sort by Category:</b> <select name="sortby">
                                          <option value="0">All</option>
                                          <option value="1">Smoked Meat</option>
                                          <option value="2">Smoked Fish</option>
                                          <option value="3">Smoke Chicken</option>
                                          <option value="4">Cooked Ham</option>
                                          <option value="5">Pickled Meat</option>
                                          <option value="6">Fresh Sauges</option>
                                          <option value="7">Cooked Sausage</option>
                                          <option value="8">Smoked Sausage</option>
                                          <option value="9">Spreadable Saugsage</option>
                                        </select>
                                        <br /><br />
                                        <b>From:</b> <input type="date" name="from">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>To:</b> <input type="date" name="to">
                                       <br><br>
                                
                            </div>

                            <div class="modal-footer">
                                
                                <button type="submit" name="product_summary" class="btn btn-warning" style="width:100%">Generate PDF</button>  

                            </div> 

                                  </form>
                                </center>

     
                      </div>
                   </div>
                </div> <!-- end modal -->




        </div>

        <br /><br /><br />
        <!-- Page Content #page-content-wrapper -->
        <div  class="container-fluid" style="background:">
            
                        
                        
            
            
            <div> <!-- former container-fluid-->
                <?php echo message();?>
                <div class="row">

                    <div class="col-lg-12">



                        <!--<div><a href="#menu-toggle" class="btn btn-primary btn-sm" id="menu-toggle"><i class="material-icon">Toggle Menu</i></a></div> -->
                        

                            

            <!-- <div class="" style="margin-left:180px;"><button type="button"  class="btn btn-md hoverButton" data-toggle="modal" data-tooltip ="tooltip" title="Add Products" data-placement ="bottom"  data-target="#products">Add Products</button></div> -->
                    
<table id="example" class="table table-striped table-bordered"  width="100%">


        <thead>
            <tr>
               <!-- <th>Product ID</th> -->
                <th>Product Category</th>
                <th>Product Name</th>
                <th>Product Price(PHP)</th>
                <th>Product Image</th>
                <th>Product Quantity</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <tbody>
         <?php while($product = mysqli_fetch_assoc($get_products)) {?>
            <tr>    
               <!-- <td><?php //echo $product['product_id']; ?></td> -->

                
                <?php $get_category = find_category_by_products($product['category_id']);?>
                    <?php while($category = mysqli_fetch_array($get_category)){?>
                <td><?php echo $category['category_name'] ?></td>
                    <?php }?>


                <td><?php echo $product['product_name']?></td>
                <td><?php echo $product['product_price']?></td>
                <td><a href="#<?php echo $product['product_id'] ?>" role="button" data-toggle="modal" ><img src="product_images/<?php echo $product['product_image']?>" data-tooltip="tooltip" data-placement="top" data-original-title="press the image to see the product information" class="img-rounded center-block" height="130px" width="130px" > </a></td>
                <td><div><?php echo $product['product_quantity']?></div></td>
                   
                <td><button type="button" class="btn btn-sm btn-warning btn-rounded waves-effect" data-toggle="modal" data-target="#update<?php echo $product['product_id']?>" data-tooltip="tooltip" data-placement="left" title="update"><i class="fa fa-wrench"></i></button>
                    <button type="button" class="btn btn-sm btn-danger btn-rounded waves-effect" data-toggle="modal" data-target="#delete<?php echo $product['product_id']?>"><i class="fa fa-trash"></i></button>
                </td>
       

                



                <!-- update modal -->
                <div class="modal fade" id="update<?php echo $product['product_id']; ?>" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">Update Product<?php  $_SESSION['update_id'] = $product['product_id']; ?><input type="hidden" name="update_id" value"<?php echo $product['product_id'];?>" ></h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-9" >
                                        
                                       <form  method="post" action="products.php" enctype="multipart/form-data">

                                           <div class="form-group">
                                                    <label for="pro_id"></label>
                                                    <input type="hidden"  class="form-control" name="pro_id" value="<?php echo $product['product_id']?>">
                                                </div>

                                            <div class="form-group row">
                                              <label for="pro_name" class="col-sm-5 col-form-label"><b>Product Name:</b></label>
                                              <div class="col-sm-7">
                                                
                                                <input type="text" class="form-control" name="pro_name" id="pro_name" value ="<?php echo $product['product_name'];?>" />
                                              </div>
                                            </div><!-- product_name -->  



                                               
                                     
                                               

                                                <div class="form-group row">
                                                    <label for="pro_category" class="col-sm-5 col-form-label">Product Category</label>
                                                   
                                                        <?php $get_category = get_all_category();
                                                                                                                         
                                                                    # code...
                                                        ?>

                                                        <div class="col-sm-7">
                                                            <select class="form-control"  name="pro_category">

                                                                    <?php 
                                                                     while ($category = mysqli_fetch_array($get_category)) {

                                                                            $category_id = $category['category_id'];
                                                                            $category_name = $category['category_name'];

                                                                            echo "<option value='$category_id'>$category_name</option>";
                                                                    ?>
                                                                        <?php } ?>
                                                            </select>

                                                        </div>    
                                                </div>

                                            
                                            <div class="form-group row">
                                                  <label for="productImage" class="col-sm-5 col-form-label"><b>Product Image</b></label>

                                                     <div class="col-sm-7">
                                                         <input type="hidden" name="image_name" value="<?php echo $product['product_image']?>">
                                                <input type="file" style="text-align:center" name="productImage"
                                                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >

                                                     </div>   
                                              </div>


                                               
                                                    
                                         

                                            <div class="form-group row"> 
                                                 <label for="pro_price" class="col-sm-5 col-form-label"><b>Product Price(PHP)</b></label>  
                                                
                                                <div class="col-sm-7">
                                                <input type="text" class="form-control" name="pro_price" value="<?php echo $product['product_price']?>">
                                                </div>

                                            </div>





                                            <div class="form-group row"> 
                                               <label for="pro_desc" class="col-sm-5 col-form-label">Product Description</label>

                                               <div class="col-sm-7">
                                                    <textarea class="form-control" cols="20" rows="10" name="pro_desc"><?php echo $product['product_desc']?></textarea>
                                              </div>
                                            </div>



                                          


                                        <div class="form-group row">
                                              <label for="pro_grams" class="col-sm-5 col-form-label"><b>Grams Per Pack:</b></label>
                                              
                                                
                                               <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="pro_grams" value="<?php echo $product['product_grams']?>">
                                              </div>
                                            </div><!-- product_name -->   


                                          <div class="form-group row">
                                              <label for="pro_quantity" class="col-sm-5 col-form-label"><b>Product Quantity</b></label>
                                              
                                                
                                               <div class="col-sm-7">
                                                    <input type="text" class="form-control" name="pro_quantity" value="<?php echo $product['product_quantity']?>">
                                              </div>
                                            </div><!-- product_name -->       

                                             <div class="form-group row">
                                                <input type="hidden" name="update_id" value"<?php echo $product['product_id'];?>" > 
                                                <button type="submit" name="update_product" class="btn btn-default btn-md">Update Product</button>
                                             </div>
                                        
                                       </form>  
                                      
                                        </div>  
                                        
                                    </div>
                                </div>
               
                   
                            </div>
                        </div>
                    </div>
                </div>

                
                 <!-- delete modal -->
                <div class="modal fade" id="delete<?php echo $product['product_id']; ?>" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">DELETE Product</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-12" >
                                     
                                        <p>Are you sure you want to <B class="text-danger">DELETE</B> this product?</p>
                                        <div>
                                            <form action="product_delete.php" method="POST">
                                                <?php $product_id_to_delete = $product['product_id'];
                                                    //echo $admin_id;
                                                ?>
                                                <input type="hidden" name="hidden_id" value=" <?php echo $product_id_to_delete?>">
                                            <button type="submit" class="btn btn-primary btn-lg" name="delete">Yes</button>
                                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
                                            </form>  
                                        </div>  
                                        
                                    </div>
                                </div>
               
                   
                            </div>
                        </div>
                    </div>
                </div>
          
          
            




            <!---view description -->
            
            <div class="modal fade" id="<?php echo $product['product_id']?>" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:600">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">Product Information</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-6" >
                                        
                                    <img class="img-responsive" height="1000" widht="300" src="product_images/<?php echo $product['product_image']?>">
                                      
                                    </div>

                                    <div class="col-lg-6 text-left">
                                        
                                        <h3 style="text-align: left;">Description:</h3>
                                        <p style="text-indent:20px;text-align:justify"><?php echo $product['product_desc'] ?>
                                            
                                        </p>

                                        <h3>Product Price:&nbsp;<small>₱<?php echo $product['product_price'] ?></small></h3>
                                         <h3>Grams per pack:&nbsp;<small><?php echo $product['product_grams'] ?>grams</small></h3>
                                        
                                    </div>

                                    <div class="col-lg-12">
                                        <!--<a href="" style="margin-top:10px" class="btn btn-default">View Feedback</a> -->
                                    </div>
                                </div>
               
                   
                            </div>
                        </div>
                    </div>
            </div>








            
             
            </tr>
          <?php }?>
        </tbody>
    </table>





    




<!-- add products -->
                <div class="modal fade" id="products" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">Insert New Product</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-12" >
                                        
                                    <form  method="post" action="products.php" enctype="multipart/form-data" id="uploadForm">
                                       <table class="col-lg-8">
                                            <tr>
                                                <td><label for="pro_name">Product Name</label></td>
                                                <td><input type="text" class="form-control" name="pro_name"></td>
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

                                                                        echo "<option value='$category_id'> $category_name</option>";
                                                                ?>
                                                                    <?php } ?>
                                                        </select>


                                                     
                                                           

                                                   
                                                </td>
                                            </tr>

                                            <tr>
                                                <td><label for="productImage">Product Image</label></td>
                                                <td><input type="file" name="productImage" class="form-control-file"
                                                    onchange="document.getElementById('product_image').src = window.URL.createObjectURL(this.files[0])" >
                                                    <img  id="product_image" class="img-rounded" alt="" width="300" height="200" src="" />
                                                </td>
                                            </tr>


                                             <tr>
                                                <td ><label for="pro_price">Product Price(PHP)</label></td>
                                                <td><input type="text" class="form-control" name="pro_price"></td>
                                            </tr>

                                            <tr>
                                                <td ><label for="pro_desc">Product Description</label></td>
                                                <td><textarea class="form-control" cols="20" rows="10" name="pro_desc"></textarea></td>
                                            </tr>



                                             <tr>
                                                <td ><label for="pro_grams">Grams Per Pack</label></td>
                                                <td><input type="text" class="form-control" name="pro_grams"></td>
                                            </tr>

                                             <tr>
                                                <td ><label for="pro_quantity">Product Quantity</label></td>
                                                <td><input type="text" class="form-control" name="pro_quantity"></td>
                                            </tr>

                                            <tr>
                                                <td></td>
                                                <td><input type="submit" name="add_product" class="btn btn-primary btn-md btn-block" value="Add Product"></td>
                                            </tr>
                                       </table>
                                        
                                       </form> 
                                       
                                    </div>
                                </div>
               
                   
                            </div>
                        </div>
                    </div>
            </div>







           <?php 
       if(isset($_POST['update_product'])){
                   // echo "<script>window.open('administrator.php','_self')</script>";
                     $update_id = $_POST['pro_id'];

                        $pro_category = $_POST['pro_category'];
                        $pro_name = $_POST['pro_name'];

                        
                        $pro_price = $_POST['pro_price'];
                        $pro_desc = $_POST['pro_desc'];


                        

                        


                          if($_FILES['productImage']['name'] == "") {
                                    // No file was selected for upload, your (re)action goes here
                                        $product_image = $_POST['image_name'];
                                    }else{
                                        $product_image = $_FILES['productImage']['name'];
                                        $product_image_tmp = $_FILES['productImage']['tmp_name'];
                                        move_uploaded_file($product_image_tmp, "product_images/$product_image");
                                    }
                              

                        $pro_grams = $_POST['pro_grams'];
                        $pro_quantity = $_POST['pro_quantity'];


                              $update_query = "UPDATE producttbl SET category_id= '{$pro_category}', ";
                               $update_query .= "product_name = '{$pro_name}', product_price = '{$pro_price}', ";
                               $update_query .= "product_desc = '{$pro_desc}', product_image = '{$product_image}', ";
                              $update_query .= " product_grams = '{$pro_grams}',product_quantity ='{$pro_quantity}',date_added = now() ";
                             $update_query .= "WHERE product_id = '{$update_id}' LIMIT 1";


                               $run_product = mysqli_query($connection,$update_query) or die(mysqli_error($connection));
    
                                if($run_product){
                
                                //$_SESSION["message"] = "New Product has been inserted";
                                //redirect_to("product.php");
                                echo "<script>alert('Product has been updated');</script>";
                                echo "<script>window.open('products.php?products=products','_self')</script>";
                                }         

                    
                }
?>


            <?php 
             
            ?>


             <?php 
                    if(isset($_POST['add_product'])){
                        
                        $pro_category = $_POST['pro_category'];
                        $pro_name = $_POST['pro_name'];

                        
                        $pro_price = $_POST['pro_price'];
                        $pro_desc = $_POST['pro_desc'];


                        $product_image = $_FILES['productImage']['name'];
                        $product_image_tmp = $_FILES['productImage']['tmp_name'];
                       



                        $pro_grams = $_POST['pro_grams'];
                        $pro_quantity = $_POST['pro_quantity'];
                       


                        

                        move_uploaded_file($product_image_tmp, "product_images/$product_image");


                        $insert_product = "INSERT INTO producttbl (category_id,product_name,product_price,product_desc,product_image,product_grams,product_quantity,date_added)
                                        VALUES ('$pro_category','$pro_name','$pro_price','$pro_desc','$product_image','$pro_grams','$pro_quantity',now())";

                        $run_product = mysqli_query($connection,$insert_product) or die(mysqli_error($connection));
    
                        if($run_product){
        
                        //$_SESSION["message"] = "New Product has been inserted";
                        //redirect_to("product.php");
                        echo "<script>alert('Product has been inserted');</script>";
                        echo "<script>window.open('products.php','_self')</script>";
                            }       

                    }
            ?>



                       
                        
                    </div> <!--class="col-lg-12" -->

                </div> <!--row" -->








            </div> <!--no name div -->
        </div>
        <!-- /#page-content-wrapper -->

    

    <?php include('footer.php');?>

        <!-- 
             <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        <h1>Simple Sidebar</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
        -->