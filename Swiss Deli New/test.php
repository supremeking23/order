<?php 
	include('includes/connection.php');




	//$invoice_query = "SELECT a.order_id, concat(b.surname,' ' ,b.firstname) AS 'Fullname', a.date_ordered,c.product_name FROM ordertbl as a INNER JOIN customertbl as b INNER JOIN producttbl as c ON a.customer_id=b.customer_id AND  WHERE b.customer_id='4'";
	
	$order = "SELECT * FROM  ordertbl WHERE order_id = 1 AND customer_id=4";
	$run_order_query = mysqli_query($connection,$order) or die(mysqli_error($connection));

	


	?>

	<table>
	
		<tr>
			<th>Date</th>
			<th>Product Name</th>
			<th>Quantity</th>
		</tr>
		
		

	<?php
	while($invoice1=mysqli_fetch_assoc($run_order_query)){

		$order2 = "SELECT  * FROM order_items WHERE order_id = 1";
		$run_order_query2 = mysqli_query($connection,$order2) or die(mysqli_error($connection));


		while ($invoice2=mysqli_fetch_assoc($run_order_query2)) {
			
				$order3 = "SELECT  * FROM producttbl WHERE product_id = " .$invoice2['product_id'];
				$run_order_query3 = mysqli_query($connection,$order3) or die(mysqli_error($connection));


				while ($invoice3=mysqli_fetch_assoc($run_order_query3)) {
					



	
?>




		
		<tr>
			<td></td>
			<td><?php echo $invoice1['date_ordered'];?></td>
		</tr>	

			<tr>
			<td></td>
			<td><?php echo $invoice3['product_name'];?></td>
		</tr>	

			<tr>
			<td></td>
			<td><?php echo $invoice2['quantity'];?></td>
		</tr>	

	


<?php	

						
				}
		}	
	}
?>

	</table>