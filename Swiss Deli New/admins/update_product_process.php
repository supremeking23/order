<?php 

  include('includes/session.php');
   include('includes/connection.php');
  include('includes/functions.php');
  
?>

<?php 

	if(!isset($_POST['update_product'])){

		redirect_to('dashboard.php');

	}else{



				$product = find_products_by_id($_POST['hidden_product_id']);

				if(!$product){

					redirect_to('dashboard.php');
				}else{

					
					
				

					$product_id = $_POST['hidden_product_id'] ;
					$product_name = $_POST['pro_name'] ;
					$product_category = $_POST['pro_category'];
				


				// funk sheet kailangn ayusin
					if (empty($_FILES['updateImage']['name'])){
					//no value
					  $admin_profile = $_POST['image_name'];
				}else{
					  //$update_image = $_FILES['updateImage']['name'];

					  $admin_profile = $_FILES['updateImage']['name'];
					  $admin_profile_tmp = $_FILES['updateImage']['tmp_name'];

		              move_uploaded_file($admin_profile_tmp, "product_images/$admin_profile");
				}	



				


					$product_price =  $_POST['product_price'];
					$product_desc =$_POST['pro_desc'];
					$product_keywords =$_POST['pro_keywords'];
					$product_grams= $_POST['pro_grams'];


					$product_quantity= $_POST['pro_quantity'];

									
										
				
				$update_query = "UPDATE producttbl SET ";
				$update_query .= "product_name = '{$product_name}', category_id = '{$product_category}', product_image='{$admin_profile }', ";
				$update_query .= "product_price = '{$product_price}', product_desc = '{$product_desc}', ";
				$update_query .= "product_keywords = '{$product_keywords}', product_grams = '{$product_grams}',product_quantity = '{$product_quantity}' ";
				$update_query .= "WHERE product_id = '{$product_id}' LIMIT 1";
					

				$run_query = mysqli_query($connection,$update_query) or die(mysqli_error($connection));

				if ($run_query && mysqli_affected_rows($connection) == 1) {
					// Success
					$_SESSION["message"] = "Product updated.";
					redirect_to('products.php');
				} else {
					//Failure
					$_SESSION["massage"] = "Product update failed.";
					redirect_to('products.php');

			}	
			
				}

	}
?>