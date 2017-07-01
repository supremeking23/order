        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    


    <?php 

    	if(!isset($_GET['customer_id'])){
    		echo "<script>window.location='archieve_declined_customer.php?archieve=declined'</script>";
    	}else{

    				$customer_id=$_GET['customer_id'];
    			    $update_query = "UPDATE customertbl SET isApproved = '0', date_registered = '' WHERE customer_id ='$customer_id' ";
                         

                      $run_customer = mysqli_query($connection,$update_query) or die(mysqli_error($connection));
                      
                      if($run_customer){
                        echo "<script>alert('Customer Information has been move to pending section');</script>";
                        echo "<script>window.open('archieve_declined_customers.php?archieve=declined','_self');</script>";
                      }   
    	}
    ?>