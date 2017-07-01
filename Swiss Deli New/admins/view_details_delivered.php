        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    
    <?php include('header.php');?>

    <?php include('sidebar.php');?>



 <?php if(!isset($_GET['order_id'])){
        //redirect_to('orders.php?orders=orders');
        echo "<script>window.location='orders.php?orders=orders'</script>";
    }else{

        $order_id = $_GET['order_id'];

        $customer_id = $_GET['customer_id'];
        $customer = find_customer_by_id($customer_id);


        //get order date

        $date_query ="SELECT * FROM ordertbl where order_id = '{$order_id}'";
        $run_date = mysqli_query($connection,$date_query);

        while($date = mysqli_fetch_assoc($run_date)){
            $order = $date['date_ordered'];
            $date_delivered = $date['date_delivered'];
        }

       // $order_details = 

     ?>







          <!-- Page heade -->
        <?php include('page_header.php');?>
        <br />

        <div class="container">
            <h1 class="text-center">Customer Order Information</h1>  
            <br />
            <h3 class="pull-left">ORDER NUMER: SD<?php echo $order_id ?></h3> 
            <?php $date = date_create($order);?>
             <h3 class="pull-right" style="margin-right: 120px">ORDER DATE: <?php echo  $order_date = date_format($date,'F d Y'); ?></h3> 
        </div>


       

        <br /><br />


        <!-- Page Content #page-content-wrapper -->
        <div  class="container-fluid" style="background:">
            
            
            
            <div> <!-- former container-fluid-->
             
                <div class="row" style="margin-bottom: 50px">

                    <div class="col-lg-8 col-xs-offset-2 box">

                    <h1>Customer Information</h1>
                    <br />

                         <table class="table table-responsive">

                         <?php while($customer_details=mysqli_fetch_assoc($customer)){ ?>
                            <tr>
                                <td><b>Name: </b></td>
                                <td><?php echo $customer_details['firstname'].' '. $customer_details['surname']?></td>
                            </tr>

                            <tr>
                                <td><b>Gender: </b></td>
                                <td><?php echo $customer_details['gender']?></td>
                            </tr>  

                             <tr>
                                <td><b>Birthdate: </b></td>
                                <?php $bdate =date_create($customer_details['birthdate']);
                                             $bdate_format =   date_format($bdate,"F d Y"); //https://web.facebook.com/PP.R18/photos/a.384678061599125.88377.137068356360098/1305027776230811/?type=3
                                ?>
                                <td><?php echo $bdate_format; ?></td>
                            </tr>  

                              <tr>
                                <td><b>Age: </b></td>
                                <td><?php echo $age = floor((time() - strtotime($customer_details['birthdate'])) / 31556926);?></td>
                            </tr>  

                            <tr>
                                <td><b>Address </b></td>
                                <td><?php echo $customer_details['customer_address']?></td>
                            </tr>


                             <tr>
                                <td><b>Email </b></td>
                                <td><?php echo $customer_details['email']?></td>
                            </tr>

                             <tr>
                                <td><b>Cellphone </b></td>
                                <td><?php echo $customer_details['cellphone']?></td>
                            </tr>

                            <tr>
                                <td><b>Telephone </b></td>
                                <td><?php echo $customer_details['telephone']?></td>
                            </tr>

                              
                        <?php } ?>

                         </table>
                        
                    </div> <!--class="col-lg-12" -->

                </div> <!--row" -->




                <br /><br />


                <div class="row" style="margin-bottom: 50px">

                    <div class="col-lg-8 col-xs-offset-2 box">

                    <?php $date_deliver = date_create($date_delivered);
                            $delivery_date = date_format($date_deliver,'F d Y');
                        ?>
                    <h1 class="pull-left">Order Details</h1> <h3 class="pull-right">Date Delivered: <small><?php echo $delivery_date;?></small></h3>
                    <br />

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
                                <td><?php echo number_format( $order_details['product_price'] * $order_details['quantity'],2)?></td>

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
                                <td >Sub Total: ₱<?php echo $total['total_price'];?><br />
                                    <?php $subtotal =  $total['total_price'];?>
                                    Points Use: ₱<?php echo $total['epoints_use'];?><br />
                                    <?php $e_points = $total['epoints_use'];?>
                                    <?php $totalna =  $total['total_price'] - $total['epoints_use'] ;?>
                                    Total Amount:₱<?php echo number_format($totalna,2);?>
                                    <?php 

                                    ?>
                                </td>
                                <?php } ?>
                            </tr>


                        </tbody> 
                              
                     

                            <tr> <td></td>
                                
                                <td colspan="5">
                                <td></td>
                            </tr>

                         </table>

                           <!--   $sql .= "UPDATE producttbl SET product_quantity = product_quantity - '".$values['item_quantity']."' WHERE product_id = '".$values['item_id']."' ";
                            -->

                        
                    </div> <!--class="col-lg-12" -->

                </div> <!--row" -->

<br /><br />
                 <div class="row" style="height: 20px">

 
                </div> <!--row" -->







            </div> <!--no name div -->
        </div>
        <!-- /#page-content-wrapper -->

    <?php } ?>

    <?php include('footer.php');?>

        <!-- 
             <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        <h1>Simple Sidebar</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
        -->