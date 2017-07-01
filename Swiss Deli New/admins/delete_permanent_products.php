<?php 

  include('includes/session.php');
   include('includes/connection.php');
  include('includes/functions.php');
  
?>

<?php 

	if(!isset($_GET['product_id'])){
			echo "<script>window.location='archieve.php'</script>";
	}else{


		$product_id= $_GET['product_id'];

		$delete_query = "DELETE  FROM producttbl WHERE product_id = '$product_id'";

		$deleteSQL = mysqli_query($connection,$delete_query) or die(mysqli_error($connection));

		if($deleteSQL && mysqli_affected_rows($connection) == 1){
			   echo "<script>alert('Product has been permanently deleted')</script>";
               echo "<script>window.open('archieve.php?archieve=archieve','_self')</script>";

		}
	}
?>