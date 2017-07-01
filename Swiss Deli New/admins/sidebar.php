        
    <?php 
        $admin_id = $_SESSION["admin_id"];
        //$query = "SELECT * FROM admintbl WHERE admin_id = '$admin_id'";

        $find_admin = find_admin_by_id($admin_id);

        $customer_pending = showPendingApproval();
        $count_pending_orders = countPendingOrders();


        //order count pending
         while($customer = mysqli_fetch_array($count_pending_orders)){
            $order_count = $customer['notApproved'];
        }

        //customer count pending
        while($customer = mysqli_fetch_array($customer_pending)){
            $customer_count = $customer['notApproved'];
        }

        ?>


        <!-- Sidebar -->
        <div id="sidebar-wrapper">
           
            <div>
                <div style="text-align:center">
                    <?php while($admin_picture = mysqli_fetch_array($find_admin)){?>
                    <img src="admin_images/<?php echo $admin_picture['admin_profile']?>" width="150" height="150" class="img-circle" style="margin-top:15px">
                    <?php }?>
                    
                </div>
            </div>
            
            <br />
            <ul class="sidebar-nav">

                <?php   
                    
                ?>

                <li <?php if(isset($_GET['dashboard'] ) == 'dashboard'){echo 'class= "active"';}?> ><a href="dashboard.php?dashboard=dashboard" ><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Dashboard </a></li>
                <li <?php if(isset($_GET['products'] ) == 'products'){echo 'class= "active"';}?>><a href="products.php?products=products" ><i class="fa fa-shopping-bag" aria-hidden="true"></i>&nbsp;Products </a></li>
                <li <?php if(isset($_GET['customers'] ) == 'customers'){echo 'class= "active"';}?>><a href="customers.php?customers=customers" ><i class="fa fa-users" aria-hidden="true"></i>&nbsp;Customers &nbsp;<span class="label label-danger"><?php echo $customer_count?></span></a></li>


                <li <?php if(isset($_GET['reports'] ) == 'reports'){echo 'class= "active"';}?>><a href="reports.php?reports=reports"><i class="fa fa-bar-chart-o" aria-hidden="true">&nbsp;Summary Reports</i></a></li>


                <li  <?php if(isset($_GET['orders'] ) == 'orders'){echo 'class= "active"';}?>><a href="orders.php?orders=orders" ><i class="fa fa-cart-plus" aria-hidden="true">&nbsp;Orders <span class="label label-danger"><?php echo $order_count?></span></i></a></li>
               
                <li  <?php if(isset($_GET['archieve'] ) == 'archieve'){echo 'class= "active"';}?>><a href="archieve.php?archieve=archieve" ><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;Archieve Section</a></li>


                 <!--<li  <?php if(isset($_GET['archieve'] ) == 'archieve'){echo 'class= "active"';}?>><a href="archieve.php?archieve=archieve" ><i class="fa fa-recycle" aria-hidden="true"></i>&nbsp;Inbox</a></li> -->



                <?php //validation to add additional admin for admins/staff
                        $query = "SELECT * FROM admintbl WHERE admin_id = '$admin_id'";
                        $run_query = mysqli_query($connection,$query);
                         $role ="";
                ?>


                <?php 

                //validation to add additional admin for admins/staff
                while ($role = mysqli_fetch_assoc($run_query)) {
                                $roles =  $role["role"];

                       if($roles==="superadmin"){          
                    
                  ?>


                  <li <?php if(isset($_GET['administrator'] ) == 'administrator'){echo 'class= "active"';}?>><a href="administrator.php?administrator=administrator" ><i class="fa fa-user" aria-hidden="true"></i>&nbsp;Administrator</a></li>

                 <?php   } } ?>

               
            </ul>
            <div style="margin-top:15px"><span style="margin-left:40px"></span><button type="button"  class="btn btn-danger btn-block" data-toggle="modal" data-tooltip ="tooltip" title="Logout here" data-placement ="top"  data-target="#logout">Logout</button></div>
        </div>
        <!-- /#sidebar-wrapper -->




        <!-- if logout -->
             <div class="modal fade" id="logout" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">Log out Confirmation</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-12" >
                                     
                                        <p>Are you sure you want to logout ?</p>
                                        <div>
                                            <form action="logout.php" method="POST">
                                            <button type="submit" class="btn btn-primary btn-lg" name="logout">Yes</button>
                                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
                                            </form>
                                        </div>  
                                        
                                    </div>
                                </div>
               
                   
                            </div>
                        </div>
                    </div>
            </div>




<?php if(isset($_POST['logout'])){
            redirect_to('logout.php'); //https://www.youtube.com/watch?v=VEv4BQDsNWc
        }?>
