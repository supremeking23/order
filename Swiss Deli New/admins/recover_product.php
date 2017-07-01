        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    


    <?php 

    	if(!isset($_GET['product_id'])){
    		echo "<script>window.location='archieve.php?archieve=archieve'</script>";
    	}else{

    				$customer_id=$_GET['customer_id'];
    			    $update_query = "UPDATE producttbl SET product_bin= '' WHERE product_id ='$customer_id' ";
                         

                      $run_customer = mysqli_query($connection,$update_query) or die(mysqli_error($connection));
                      
                      if($run_customer){
                        echo "<script>alert('Product  has been recovered');</script>";
                        echo "<script>window.open('archieve_products.php?archieve=products','_self');</script>";
                      }   
    	}
    ?>