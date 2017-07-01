<?php 

  include('includes/session.php');
   include('includes/connection.php');
  include('includes/functions.php');
  
?>


<?php 
		
		if(!isset($_GET['order_id'])){
			redirect_to('dashboard.php?dashboard=dashboard');
			exit;
		}else{

			$order_id = $_GET['order_id'];

			$customer_id = $_GET['customer_id'];

			$cancelQuery = "UPDATE ordertbl SET status = 'cancel', date_cancelled = now() WHERE order_id = '$order_id'";
			$cancelSQL  = mysqli_query($connection,$cancelQuery);

			//insert in notifacationtbl for canceled orders
		$subject = 'Canceled Order';
		$message = 'Your order has been canceled.Order ID is SD'. $order_id;

		$create_notification = "INSERT INTO notificationtbl(subject,message,notification_date,customer_id) ";
		$create_notification .= "VALUES('$subject','$message',now(),'$customer_id') ";


		$notifySQL = mysqli_query($connection,$create_notification);

			if ($cancelSQL && mysqli_affected_rows($connection) == 1) {
                            echo "<script>alert('Order  has been canceled')</script>";
                            echo "<script>window.open('orders.php?pending_orders=pending_orders&orders=orders','_self')</script>";

             }

		}

?>