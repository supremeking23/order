        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    


    <?php 

    	if(!isset($_GET['customer_id'])){
    		echo "<script>window.location='archieve.php?archieve=archieve'</script>";
    	}else{

    				$customer_id=$_GET['customer_id'];
    			    $update_query = "UPDATE customertbl SET isBin= '' WHERE customer_id ='$customer_id' ";
                         

                      $run_customer = mysqli_query($connection,$update_query) or die(mysqli_error($connection));
                      
                      if($run_customer){
                        echo "<script>alert('Customer account has been recovered');</script>";
                        echo "<script>window.open('archieve.php?archieve=archieve','_self');</script>";
                      }   
    	}
    ?>