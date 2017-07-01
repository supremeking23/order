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
		$query .= "isApproved = '1', date_registered = now() ";
		$query .= "WHERE customer_id = '$id' LIMIT 1";


		//insert in notifacationtbl for approve customer
		$subject = 'New customer account';
		$message = 'Welcome to your new account. In here, you can update your account,track your orders and check your epoints balance.';

		$create_notification = "INSERT INTO notificationtbl(subject,message,notification_date,customer_id) ";
		$create_notification .= "VALUES('$subject','$message',now(),'$id') ";


		//insert in notificationtbl for initial points
		$subject_points = 'Initial Points of 100';
		$message_message = 'To our valuable customer. You have recieve  an initial points of 100';

		$create_notification_points = "INSERT INTO notificationtbl(subject,message,notification_date,customer_id) ";
		$create_notification_points .= "VALUES('$subject_points','$message_message',now(),'$id') ";




		$result = mysqli_query($connection,$query);

		if ($result && mysqli_affected_rows($connection) == 1) {

				//run query for crreting and points
				$notifySQL = mysqli_query($connection,$create_notification);
				$notify_pointsSQL = mysqli_query($connection,$create_notification_points);


				$points = 100;
				$pointsquery = "INSERT INTO epointstbl(customer_id,total_points) VALUES('$id',$points)";
				$pointsql = mysqli_query($connection,$pointsquery);

				



				// Success
				//$_SESSION["message"] = "customer has been approved.";
				echo "<script>alert('customer has been approved.')</script>";
				//redirect_to("pendingCustomer.php");
				echo "<script>window.location='pendingCustomer.php?customers=customers&pendingCustomers=pendingCustomer'</script>";
			} else {
				//Failure
				//$_SESSION["massage"] = "Error on approving the customer";
				echo "<script>alert('Error on approving the customer.')</script>";
				redirect_to("pendingCustomer.php");
			}


	}else{
		redirect_to('dashboard.php?dashboard=dashboard');
	}


?>