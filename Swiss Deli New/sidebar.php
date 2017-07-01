<!-- Sidebar -->
        <div id="sidebar-wrapper">

            <div>
                <div style="text-align:center">
                    <?php while($customer_picture = mysqli_fetch_array($find_customer)){

                        if(empty($customer_picture['profile'])){
                    ?>
                        <img src="images/guest2.jpg" width="150" height="150" class="img-circle" style="margin-top:15px">
                    <?php }else{ ?>
                    <img src="images/<?php echo $customer_picture['profile']?>" width="150" height="150" class="img-circle" style="margin-top:15px">
                    <?php }
                }
                    ?>
                    
                </div>
            </div>

             <ul class="sidebar-nav">

            <br /><br /><br />


                <li><a href="customer_account.php" ><i class="fa fa-home" aria-hidden="true"></i>&nbsp;Your Account </a></li>
                <li><a href="order_history.php" >&nbsp;Order History </a></li>
                <li><a href="change_info.php">&nbsp;Change Account Info</li></a>
                <li><a href="shop.php">&nbsp;Go back to Shop</li></a>
                <!--<li><a href=""  >&nbsp;Inbox </a></li> -->
                <li><a href="logout.php" onclick="return confirm('Are you sure you want to logout?')">Logout</a></li>
            </ul>

                    


        </div>
        <!-- /#sidebar-wrapper -->