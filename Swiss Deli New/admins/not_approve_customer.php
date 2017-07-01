<?php 

  include('includes/session.php');
   include('includes/connection.php');
  include('includes/functions.php');
  
?>

<?php 

/*	$customer = find_customer_by_id($_GET['customer_id']);
	
	if(!$customer){
		redirect_to('index.php');
	}else{
		$id = $customer['customer_id'];
		$query = "UPDATE customertbl SET ";
		$query .= "isApproved = '1', date_registered = now() ";
		$query .= "WHERE customer_id = '$id' LIMIT 1";

		$result = mysqli_query($connection,$query);

		if ($result && mysqli_affected_rows($connection) == 1) {
				// Success
				//$_SESSION["message"] = "customer has been approved.";
				echo "<script>alert('customer has been approved.')</script>";
				redirect_to("pendingCustomer.php");
			} else {
				//Failure
				//$_SESSION["massage"] = "Error on approving the customer";
				echo "<script>alert('Error on approving the customer.')</script>";
				redirect_to("pendingCustomer.php");
			}
	}

*/

	if(isset($_GET['customer_id'])){

		$id = $_GET['customer_id'];
		$query = "UPDATE customertbl SET ";
		$query .= "isApproved = '2', date_registered = now() ";
		$query .= "WHERE customer_id = '$id' LIMIT 1";

		$result = mysqli_query($connection,$query);

		if ($result && mysqli_affected_rows($connection) == 1) {
				// Success
				//$_SESSION["message"] = "customer has been approved.";
				echo "<script>alert('customer has not been approved.')</script>";
				//redirect_to("pendingCustomer.php");
				echo "<script>window.location='pendingCustomer.php?customers=customers&pendingCustomers=pendingCustomer'</script>";
			} else {
				//Failure
				//$_SESSION["massage"] = "Error on approving the customer";
				echo "<script>alert('Error on approving the customer.')</script>";
				redirect_to("pendingCustomer.php");
			}


	}


?>