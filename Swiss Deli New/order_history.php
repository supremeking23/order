 <?php
  include('includes/session.php');
  include('includes/connection.php');
  include('includes/functions.php');
  $customer_id = $_SESSION['customer_id'];
  ?>
  
        <?php include('header_customer.php'); ?>
        <?php include('sidebar.php'); ?>
        <?php include('page_header_customer.php'); ?>





  <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">

     	<?php $query ="SELECT * FROM customertbl JOIN ordertbl ON customertbl.customer_id = ordertbl.customer_id WHERE customertbl.customer_id = '$customer_id' ORDER BY order_id DESC";
     			$run_query = mysqli_query($connection,$query);

            ?>
                <div class="row">
                <br /><br />
                	<h1>Order History</h1>
                	<br />
                    <div class=" col-md-6">
                      <table style="width:100%;" class="table table-bordered">
                      	<tr>
                          <th>Order ID</th>
                      		<th>Order Date</th>
                      		<th>Status</th>
                      		<th>Action</th>
                      	</tr>

                      	<?php 

                        if(mysqli_num_rows($run_query)){



                        while($history_orders = mysqli_fetch_assoc($run_query)){?>
                      	<tr>
                          <td><?php echo $history_orders['order_id'] ?></td>
                      		<?php 	$date=date_create($history_orders['date_ordered']);
									$date_ordered= date_format($date,"F d, Y"); ?>
                      		<td><?php echo $date_ordered ?></td>
                      		<td><?php echo ucfirst($history_orders['status'])?></td>
                      		<td>


            <!-- for details -->
            <form action="" method="POST">
                           <?php 
                           //status pending
                           if($history_orders['date_approved'] == '0000-00-00 00:00:00'){ ?>
                            <!-- <a href="view_invoice_pending.php?customer_id=<?php echo $history_orders['customer_id'];?>&order_id=<?php echo $history_orders['order_id']?>" class="btn btn-info btn-sm">View Details</a> -->


                              <input type="hidden" name="hidden_customer_id" value="<?php echo $history_orders['customer_id'];?>">
                          <input type="hidden" name="hidden_order_id" value="<?php echo $history_orders['order_id'];?>">
                              <input type="submit" name="view1" value="View Details" class="btn btn-info btn-sm">

                         <?php    }else{  //for delivery and delivered?> 
                         
                         <!-- <a href="view_invoice.php?customer_id=<?php echo $history_orders['customer_id'];?>&order_id=<?php echo $history_orders['order_id']?>" class="btn btn-info btn-sm">View Details</a> -->
                          
                          <input type="hidden" name="hidden_customer_id" value="<?php echo $history_orders['customer_id'];?>">
                          <input type="hidden" name="hidden_order_id" value="<?php echo $history_orders['order_id'];?>">
                          <input type="submit" name="view1" value="View Details" class="btn btn-info btn-sm">
                         <?php } ?>
                          </td>
                      	</tr>


             </form>           
                      	<?php }

                         }else{
                          echo "<p class=\"text-center text-info\" style=\"font-weight:bold\">You have no order history</p>";
                         }
                         ?>


                      </table>  
                    </div>


                  <?php 
                        //cancel order logic

                        if(!isset($_POST['view1'])){

                        }else{ 


                          $cust_id = $_POST['hidden_customer_id'];
                          $order_hidden_id = $_POST['hidden_order_id'];

                          $query2 ="SELECT * FROM customertbl JOIN ordertbl ON customertbl.customer_id = ordertbl.customer_id WHERE customertbl.customer_id = '$cust_id' AND ordertbl.order_id = '$order_hidden_id' ORDER BY order_id DESC";
                            $run_query2 = mysqli_query($connection,$query2);

                            while($order_date = mysqli_fetch_assoc($run_query2)){
                              $date_ordered2 = $order_date['date_ordered'];
                             $date2 = date_create($date_ordered2);
                             $date2_ordered = date_format($date2,"F d, Y");
                             $status2 = $order_date['status'];
                             $order_id = $order_date['order_id'];
                             $date_approved =  $order_date['date_approved'];


                             $customer_id = $order_date['customer_id'];
                            }
                          ?>



                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="text-center">Order Details</h3><br>
                                <h4 class="">Order Date: <small><?php echo $date2_ordered;?></small>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                Order Status:<small><?php echo ucfirst($status2) ?></small></h4>
                                 
                                

                            </div>
                            <div class="panel-body">

                             <?php $orders =find_order_deteails_by_customer_id($order_id); ?>
                               <table class="table table-responsive">


                                <thead>
                                  <tr>
                                    <th>Product Name</th>
                                    <th>Unit Price</th>
                                    <th>Grams per pack</th>
                                    <th>Quantity</th>
                                    <th>Total Price</th>


                                  </tr>

                               </thead>

                                <?php while($order_details=mysqli_fetch_assoc($orders)){ ?>
                            <?php $total =0;
                                $total_quantity = 0;
                             ?>
                               <tbody>
                                 <tr>
                                     <td><?php
                                      echo   $order_details['product_name']?></td>
                                <td>₱<?php echo  $order_details['product_price']?></td>
                                <td><?php echo  $order_details['product_grams']?></td>
                                <td><?php echo  $order_details['quantity']?></td>
                                <td>₱<?php echo number_format( $order_details['product_price'] * $order_details['quantity'],2)?></td>

                                   <?php
                                       //$total_grams = 0 + $order_details['quantity'];
                                     } ?>
                                 </tr>


                                 <?php $amount = get_total_amount($order_id);?>

                                <?php $countquantity = "SELECT sum(quantity),grams FROM order_items WHERE order_id = '$order_id' ";
                                $totalcountquantity = mysqli_query($connection,$countquantity) or die(mysqli_error($connection));
                                $totalcountResult = mysqli_fetch_array($totalcountquantity);
                            ?>



                               <tr>
                                <td></td>
                                <td></td>
                                <td>Total: <?php echo $totalcountResult["grams"] *  $totalcountResult["sum(quantity)"];?> Grams</td>
                                <td><?php echo  $totalcountResult["sum(quantity)"];?></td>
                                <?php 
                                    //getting the epoints and compute
                                while($total = mysqli_fetch_assoc($amount)){?>
                                <td ><b> Sub Total:</b> ₱<?php echo $total['total_price'];?><br />
                                    <?php $subtotal =  $total['total_price'];?>
                                    <b>Points Use:</b> ₱<?php echo $total['epoints_use'];?><br />
                                    <?php $e_points = $total['epoints_use'];?>
                                    <?php $totalna =  $total['total_price'] - $total['epoints_use'] ;?>
                                    <b> Total Amount:</b>₱<?php echo number_format($totalna,2);?>
                                    <?php 

                                    ?>
                                </td>
                                <?php } ?>
                            </tr>



                            <tr> <td></td>


                                
                                <td colspan="5">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                                <?php   if($date_approved == '0000-00-00 00:00:00'){ ?>
                            <!-- <a href="view_invoice_pending.php?customer_id=<?php echo $customer_id;?>&order_id=<?php echo $history_orders['order_id']?>" class="btn btn-info btn-sm">View Details</a> -->



                              <?php }else{ ?> 

                             <a href="view_invoice.php?customer_id=<?php echo $customer_id;?>&order_id=<?php echo $order_id?>" class="btn btn-info btn-sm">Reciept</a> 

                              <?php }?>
                                </td>
                                <td></td>
                            </tr>

                               </tbody>


                               </table>

                            </div>
                        </div>
                    </div>


                    <?php       

                       }
                    ?>
                    

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    







   <!--footer section -->     
    </div>
    <!-- /#wrapper -->


    <script src="js/jquery-2.1.4.min.js"></script>


    

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/customerscript.js"></script>

    <!-- Menu Toggle Script -->
    <script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
    </script>

</body>

</html>
       