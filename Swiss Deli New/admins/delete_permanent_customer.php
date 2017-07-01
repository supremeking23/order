<?php 

  include('includes/session.php');
   include('includes/connection.php');
  include('includes/functions.php');
  
?>

<?php 

	if(!isset($_GET['customer_id'])){
			echo "<script>window.location='archieve.php'</script>";
	}else{


		$customer_id= $_GET['customer_id'];

		$delete_query = "DELETE  FROM customertbl WHERE customer_id = '$customer_id'";

		$deleteSQL = mysqli_query($connection,$delete_query) or die(mysqli_error($connection));

		if($deleteSQL && mysqli_affected_rows($connection) == 1){
			   echo "<script>alert('customer record has been permanently deleted')</script>";
               echo "<script>window.open('archieve.php?archieve=archieve','_self')</script>";

		}
	}
?>