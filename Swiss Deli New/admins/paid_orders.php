        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    

    	<?php 

    		if(!isset($_GET['order_id'])){
    			echo "<script>window.location='orders.php?orders=orders'</script>";
    		}else{

    				$order_id=$_GET['order_id'];
    			    $update_query = "UPDATE ordertbl SET status= 'delivered' WHERE order_id ='$order_id' ";
                         

                      $run_customer = mysqli_query($connection,$update_query) or die(mysqli_error($connection));
                      
                      if($run_customer){
                        echo "<script>alert('Order Information has now been moved to Delivered Section');</script>";
                        echo "<script>window.open('delivered_orders.php?delivered_orders=delivered_orders','_self');</script>";
                      }   
    		}

    	?>