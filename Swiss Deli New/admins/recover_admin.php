        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    


    <?php 

    	if(!isset($_GET['admin_id'])){
    		echo "<script>window.location='archieve.php?archieve=archieve'</script>";
    	}else{

    				$admin_id=$_GET['admin_id'];
    			    $update_query = "UPDATE admintbl SET admin_bin= '' WHERE admin_id ='$admin_id' ";
                         

                      $run_admin = mysqli_query($connection,$update_query) or die(mysqli_error($connection));
                      
                      if($run_admin){
                        echo "<script>alert('Admin account has been recovered');</script>";
                        echo "<script>window.open('archieve_admin.php?archieve=admin','_self');</script>";
                      }   
    	}
    ?>