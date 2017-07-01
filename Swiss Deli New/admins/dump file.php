

<?php var_dump($_SESSION['update_id']); ;?>


<?php 
	   if(isset($_POST['update_product'])){
                   // echo "<script>window.open('administrator.php','_self')</script>";
                   	 $update_id = $_POST['pro_id'];

                        $pro_category = $_POST['pro_category'];
                        $pro_name = $_POST['pro_name'];

                        
                        $pro_price = $_POST['pro_price'];
                        $pro_desc = $_POST['pro_desc'];


                        

                        $pro_keywords = $_POST['pro_keywords'];


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
                              $update_query .= "product_keywords = '{$pro_keywords}', product_grams = '{$pro_grams}',product_quantity ='{$pro_quantity}' ";
                             $update_query .= "WHERE product_id = '{$update_id}' LIMIT 1";


                               $run_product = mysqli_query($connection,$update_query) or die(mysqli_error($connection));
    
                                if($run_product){
                
                                //$_SESSION["message"] = "New Product has been inserted";
                                //redirect_to("product.php");
                                echo "<script>alert('Product has been updated');</script>";
                                echo "<script>window.open('products.php','_self')</script>";
                                }         

                    
                }
?>