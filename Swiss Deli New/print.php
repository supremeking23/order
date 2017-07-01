<?php
  include('includes/session.php');
  include('includes/connection.php');
  include('includes/functions.php');
  ?>


<html>
<head>
	<title>Voucher Print</title>
	<link rel="stylesheet" type="text/css" href="css/print.css">
</head>

<body>
<?php
									
	if(!isset($_GET['customer_id'])){
		echo "<script>window.location='order_history.php'</script>";
	}else{


?>
<div class="vouchercontainer">
	<div class="receipt">
		<div class="orderdetails">
			<div class="vouchimg">
			<!--<img src="images/SD_logo.png"> -->
			<h1><b>SWISS DELLI Philippines Inc</b></h1>
			<h1><i>Online Ordering and Delivery System</i></h1>
			<h2><b>Main Branch</b></h2>
			<h2>Davao City, Philippines</h2>
				</div>
					<h2>ORDER NUMBER: </h2>
					<p>Order Date:  </p>
					<p>Delivery Date:  </p>
				<div class="customerdetails">
							<h3>CUSTOMER DETAILS</h3>
							<table>
								
								<tr class="customerinfo">
									<td><label>Full Name:</label></td><td></td>
								</tr>
								<tr class="customerinfo">
									<td><label>Gender:</label></td><td></td>
								</tr>
								<tr class="customerinfo">
									<td><label>Birthdate:</label></td>
								</tr>
								<tr class="customerinfo">
									<td><label>Email Address:</label></td><td></td>
								</tr>
								<tr class="customerinfo">
									<td><label>Cellphone No.:</label></td><td>dd</td>
								</tr>
								<tr class="customerinfo">
									<td><label>Telephone No.:</label></td><td></td>
								</tr>
								<tr class="customerinfo">
									<td><label>Billing Address:</label></td><td></td>
								</tr>
								<tr class="customerinfo">
									<td><label>Province:</label></td><td></td>
								</tr>
								<tr class="customerinfo">
									<td><label>Zip Code:</label></td><td></td>
							</table>
				</div>
				<div class="orderdetail">
					<h3>ORDER DETAILS</h3>
							<table>
							<tr class="headdetails">
								<td>Product Name</td>
								<td>Unit Price</td>
								<td>Quantity</td>
								<td>Total Price</td>
							</tr>
							
<?php
				//for ordertbl
?>

					<tr class="orderinfo">
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
<?php

?>
	<?php
	

    ?>
		    				<tr class="totalprice">
								<td>Total : </td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr class="payment">
								<td>Type of Payment : </td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr class="payment">
								<td>Gym Branch : </td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</table>
				</div>
		</div>
			<!--<a href="index.php">DONE</a>-->
	</div>
</div>



<script type="text/javascript">

	window.print();

</script>

<?php 
	}
?>

</body>
</html>