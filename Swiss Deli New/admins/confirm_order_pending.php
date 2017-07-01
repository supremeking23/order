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

			$sub_total = $_GET['subtotal'];
			$order_id = $_GET['order_id'];
			$customer_id = $_GET['customer_id'];
			$totalna = $_GET['total_na'];
			$e_points = $_GET['e_points'];

			$confirm_query = "UPDATE ordertbl SET status = 'approve',date_approved = now(),date_delivered = now(),general_amount = '$totalna',date_delivered = now() + interval 2 day WHERE order_id = '$order_id'";


			$epoints_deduc = "UPDATE epointstbl SET total_points = total_points - $e_points WHERE customer_id = '$customer_id'";



			//insert in notifacationtbl for approve orders
		$subject = 'Approve Order';
		$message = 'Your order request has been approve and will be delivered 2 days from now. Order Number is SD'. $order_id;

		$create_notification = "INSERT INTO notificationtbl(subject,message,notification_date,customer_id) ";
		$create_notification .= "VALUES('$subject','$message',now(),'$customer_id') ";


		//insert in notificationtbl for initial points
		$subject_points = 'Extra points on previous order';
		$message_message = 'You have gain an additional points during your previous order';

		$create_notification_points = "INSERT INTO notificationtbl(subject,message,notification_date,customer_id) ";
		$create_notification_points .= "VALUES('$subject_points','$message_message',now(),'$customer_id') ";


		$notifySQL = mysqli_query($connection,$create_notification);


		$notify_pointsSQL = mysqli_query($connection,$create_notification_points);



			//epoints add

			$point = 0;
	
				while($sub_total >= 1000){
				$point++;
				$sub_total = $sub_total - 1000;
				
				
				}
	
	
	//echo "<br><br>Your total point is : ";
	//echo number_format($point,0);
			$points_add = "UPDATE epointstbl SET total_points = total_points + $point WHERE  customer_id = '$customer_id'";





			//$updateproductquantity = ""

			

			//$update product inventory

			$update1 = "SELECT * FROM order_items WHERE order_id = '$order_id'";
			$run_update1 = mysqli_query($connection,$update1);

			while($row1 = mysqli_fetch_assoc($run_update1)){

					$product_id = $row1['product_id'];
					$quantity = $row1['quantity'];



					$update2 = "SELECT * FROM producttbl WHERE product_id = '$product_id'";
					$run_update2 = mysqli_query($connection,$update2);
					$row2 = mysqli_fetch_assoc($run_update2);

					$stock_quantity = $row2['product_quantity'];

					$update3 = "UPDATE producttbl SET product_quantity = product_quantity- $quantity WHERE product_id = '$product_id' AND product_quantity = $stock_quantity";


					$run_update3 = mysqli_query($connection,$update3);


			}

			/*
				$query2=mysql_query("select * from tb_products where productID='$pid'") or die (mysql_error());
$row2=mysql_fetch_array($query2);
$quantity=$row2['quantity'];


 mysql_query ("UPDATE tb_products SET quantity = quantity - $qty 
            WHERE productID ='$pid' and quantity='$quantity' ");
			*/

            	$confirm_deduc = mysqli_query($connection,$epoints_deduc);
            	$confirm_add = mysqli_query($connection,$points_add);
            	$confirm_run = mysqli_query($connection,$confirm_query);
			  if ($confirm_run && mysqli_affected_rows($connection) == 1) {
                            echo "<script>alert('Order request has been approved')</script>";
                            echo "<script>window.open('orders.php?pending_orders=pending_orders&orders=orders','_self')</script>";

                            }
		}
		
?>