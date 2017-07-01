        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    
    <?php include('header.php');?>

    <?php include('sidebar.php');?>


    <?php 
$customer_pending = showPendingApproval();
$order_pending =120;
?>


        


        <!-- Page heade -->
        <?php include('page_header.php');?>









        <!-- Page Content #page-content-wrapper -->
        <div  class="container-fluid" style="background:">
            
            
            
            <div> <!-- former container-fluid-->
                
                <div class="row">

                    <div class="col-lg-12">

                        <!--<div><a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a></div>-->
                        <h1>Dashboard | <small>Welcome Admin</small></h1>

                        

                                    <div class="well well-md col-md-6 ">
                                        <div class="">
                                            <h2>Customer Request</h2>
                                            <hr />
                                            <p class="lead text-info"><?php 
                                            if(mysqli_num_rows($customer_pending) == 0){
                                                echo "No Customer Pending request";

                                            }else{
                                            
                                            while($customer = mysqli_fetch_array($customer_pending)){
                                                $not_approve = $customer['notApproved'];
                                                echo "You have   $not_approve customer pending request";
                                            }
                                        }
                                        ?>
                                      </p>
                            <a href="pendingCustomer.php?pendingCustomers=pendingCustomer&customers=customers" class="btn btn-default btn-sm">View Pending Confirmation</a>
                            <p>
                                        </div>
                                    </div> <!--customer request" -->



                                    <?php  // count the total pending orders
                                      $query = "SELECT count(order_id) as 'orders'  FROM ordertbl where status = 'pending'";
                                      $run_query = mysqli_query($connection,$query);

                                    ?>

                                    <div class="well well-md col-md-5 " style="margin-left:50px">
                                        <div class="">
                                            <h2>Order Summary</h2>
                                            <hr />
                                            <p class="lead text-info"><?php 
                                          
                                            
                                            while($pending = mysqli_fetch_array($run_query)){
                                                $pending = $pending['orders'];
                                                echo "You have  $pending Order Request";
                                            }
                                        
                                        ?>
                                                     </p>
                                                <a href="orders.php?orders=orders" class="btn btn-default btn-sm">View Order Section</a>
                                                  <p>
                                        </div>
                                    </div> <!--customer request" -->

                                

                                
                        
                    </div> <!--class="col-lg-12" -->

                </div> <!--row" -->


                <!-- second row -->
                <div class="row">
                         <div class="well well-lg col-lg-12">
                            <h2>Product Summary</h2>
                            <hr>
                                
                            <?php $get_products = get_all_products();
                            
                                while ($products = mysqli_fetch_assoc($get_products)) { ?>
                                        
                                <div class="col-lg-4" style="padding:5px">


                                    <?php echo $products['product_name'];?> : 

                                    <?php
                                        if($products['product_quantity']<=500){ ?>
                                         
                                         <span class="text-danger"><?php echo $products['product_quantity']; ?> packs left&nbsp;<i class="fa fa-exclamation-triangle"></i></span>
                                      
                                      <?php   }else{ ?>

                                      

                                      <span><?php echo $products['product_quantity']; ?> packs left </span>


                                       
                                      <?php
                                        }
                                     ?>
                                </div>        

                            <?php            
                                }

                            ?>        
                        </div>
                </div>








            </div> <!--no name div -->
        </div>
        <!-- /#page-content-wrapper -->

    

    <?php include('footer.php');?>

        <!-- 
             <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        <h1>Simple Sidebar</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
        -->