<?php 

  include('includes/session.php');
   include('includes/connection.php');
  include('includes/functions.php');
  
?>

<?php 

	if(!isset($_GET['admin_id'])){
			echo "<script>window.location='archieve.php'</script>";
	}else{


		$admin_id= $_GET['admin_id'];

		$delete_query = "DELETE  FROM admintbl WHERE admin_id = '$admin_id'";

		$deleteSQL = mysqli_query($connection,$delete_query) or die(mysqli_error($connection));

		if($deleteSQL && mysqli_affected_rows($connection) == 1){
			   echo "<script>alert('admin record has been permanently deleted')</script>";
               echo "<script>window.open('archieve_admin.php?archieve=admin','_self')</script>";

		}
	}
?>