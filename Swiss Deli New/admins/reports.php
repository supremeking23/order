        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    
    <?php include('header.php');?>

    <?php include('sidebar.php');?>


    





      <!-- Page heade -->
        <?php include('page_header.php');?>


        <div class="container">
            <h1 style="">Summary Report</h1>   
        </div>

           <!-- add customer -->
        <div class="table_nav" style="margin-bottom: 20px;position: relative;top: 16px;margin-left: 12px">
            &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <a href="#report" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="generate summary  report" title="" id="">
                &nbsp;Generate Report           
            </a>
            &nbsp; &nbsp;
          
        </div>

        <br />






        <!-- Page Content #page-content-wrapper -->
        <div  class="container-fluid" style="background:">
            
         <div>


            <div class="row">

                <div class="col-lg-12">
                            
                           

                    <!--<div><a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a></div> -->
                        
                      

                           <!-- <span style="margin-left:160px"></span><button type="button" data-toggle="modal" data-target="#add_admin" data-tooltip ="tooltip" title="Add admin" data-placement ="bottom" class="btn btn-warning btn-sm" >Add Admin</button> -->

                    


                             <!-- add modal -->
                <div class="modal fade" id="report" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">DATE FILTRATION</h3>

                            </div>
                            <div class="modal-body ">
                                <center>

                                <form action="generate_report.php" method="POST">
                                    <br><h4>Select below to filter the reports information to be print:</h4><br><br>

                                    <b>As of:</b> <input type="date" name="summary_asof"><br><br>
                                    <input type="submit" name="generate_summary" value="Gerate Report" class="btn btn-warning">
                                </form>
                                </center>
                            </div> 
     
                      </div>
                   </div>
                </div> <!-- end modal -->



                <!-- reports -->

                <?php 

                    $totalOrdersql = "SELECT count(*) FROM ordertbl";
                    $totalOrderQuery = mysqli_query($connection,$totalOrdersql);
                    $totalOrderResult = mysqli_fetch_array($totalOrderQuery);

                    $pendingOrdersql = "SELECT count(*) FROM ordertbl WHERE status='pending'";
                    $totalPendingQuery = mysqli_query($connection,$pendingOrdersql);
                    $totalPendingResult = mysqli_fetch_array($totalPendingQuery);

                    $approveOrdersql = "SELECT count(*) FROM ordertbl WHERE status='approve'";
                    $totalapproveQuery = mysqli_query($connection,$approveOrdersql);
                    $totalapproveResult = mysqli_fetch_array($totalapproveQuery);


                    $deliveredOrdersql = "SELECT count(*) FROM ordertbl WHERE status='delivered'";
                    $totaldeliveredQuery = mysqli_query($connection,$deliveredOrdersql);
                    $totaldeliveredResult = mysqli_fetch_array($totaldeliveredQuery);

                    $canceledOrdersql = "SELECT count(*) FROM ordertbl WHERE status='cancel'";
                    $totalcanceledQuery = mysqli_query($connection,$canceledOrdersql);
                    $totalcanceledResult = mysqli_fetch_array($totalcanceledQuery);



                    $totalCustomersql = "SELECT count(*) FROM customertbl";
                    $totalCustomerQuery = mysqli_query($connection,$totalCustomersql);
                    $totalCustomerResult = mysqli_fetch_array($totalCustomerQuery);

                    $totalCustomerPendingsql = "SELECT count(*) FROM customertbl WHERE isApproved = '0'";
                    $totalCustomerPendinQuery = mysqli_query($connection,$totalCustomerPendingsql);
                    $totalCustomerPendingResult = mysqli_fetch_array($totalCustomerPendinQuery);


                    $totalCustomerAprrovesql = "SELECT count(*) FROM customertbl WHERE isApproved = '1'";
                    $totalCustomerAprroveQuery = mysqli_query($connection,$totalCustomerAprrovesql);
                    $totalCustomerApproveResult = mysqli_fetch_array($totalCustomerAprroveQuery);


                    $totalCustomerDeletesql = "SELECT count(*) FROM customertbl WHERE isApproved = '2'";
                    $totalCustomerDeleteQuery = mysqli_query($connection,$totalCustomerDeletesql);
                    $totalCustomerDeleteResult = mysqli_fetch_array($totalCustomerDeleteQuery);


                    $totalAdministratorSql = "SELECT count(*) FROM admintbl WHERE admin_bin != 'bin' AND role ='superadmin'";
                    $totalAdministratorQuery = mysqli_query($connection,$totalAdministratorSql);
                    $totalAdministratorResult = mysqli_fetch_array($totalAdministratorQuery);


                    $totalStaffSql = "SELECT count(*) FROM admintbl WHERE admin_bin != 'bin' AND role ='staff'";
                    $totalStaffQuery = mysqli_query($connection,$totalStaffSql);
                    $totalStaffResult = mysqli_fetch_array($totalStaffQuery);


                    //product category

                    $totalcat_all_Sql = "SELECT sum(product_quantity) FROM producttbl WHERE product_bin != 'bin' ";
                    $totalcat_all_Query = mysqli_query($connection,$totalcat_all_Sql);
                    $totalcat_all_Result = mysqli_fetch_array($totalcat_all_Query);


                    

                    $totalcat_one_Sql = "SELECT sum(product_quantity) FROM producttbl WHERE product_bin != 'bin' AND category_id ='1'";
                    $totalcat_one_Query = mysqli_query($connection,$totalcat_one_Sql);
                    $totalcat_one_Result = mysqli_fetch_array($totalcat_one_Query);


                     $totalcat_two_Sql = "SELECT sum(product_quantity) FROM producttbl WHERE product_bin != 'bin' AND category_id ='2'";
                    $totalcat_two_Query = mysqli_query($connection,$totalcat_two_Sql);
                    $totalcat_two_Result = mysqli_fetch_array($totalcat_two_Query);


                     $totalcat_three_Sql = "SELECT sum(product_quantity) FROM producttbl WHERE product_bin != 'bin' AND category_id ='3'";
                    $totalcat_three_Query = mysqli_query($connection,$totalcat_three_Sql);
                    $totalcat_three_Result = mysqli_fetch_array($totalcat_three_Query);


                      $totalcat_four_Sql = "SELECT sum(product_quantity) FROM producttbl WHERE product_bin != 'bin' AND category_id ='4'";
                    $totalcat_four_Query = mysqli_query($connection,$totalcat_four_Sql);
                    $totalcat_four_Result = mysqli_fetch_array($totalcat_four_Query);


                    $totalcat_five_Sql = "SELECT sum(product_quantity) FROM producttbl WHERE product_bin != 'bin' AND category_id ='5'";
                    $totalcat_five_Query = mysqli_query($connection,$totalcat_five_Sql);
                    $totalcat_five_Result = mysqli_fetch_array($totalcat_five_Query);


                    $totalcat_six_Sql = "SELECT sum(product_quantity) FROM producttbl WHERE product_bin != 'bin' AND category_id ='6'";
                    $totalcat_six_Query = mysqli_query($connection,$totalcat_six_Sql);
                    $totalcat_six_Result = mysqli_fetch_array($totalcat_six_Query);


                    $totalcat_seven_Sql = "SELECT sum(product_quantity) FROM producttbl WHERE product_bin != 'bin' AND category_id ='7'";
                    $totalcat_seven_Query = mysqli_query($connection,$totalcat_seven_Sql);
                    $totalcat_seven_Result = mysqli_fetch_array($totalcat_seven_Query);


                    $totalcat_eight_Sql = "SELECT sum(product_quantity) FROM producttbl WHERE product_bin != 'bin' AND category_id ='8'";
                    $totalcat_eight_Query = mysqli_query($connection,$totalcat_eight_Sql);
                    $totalcat_eight_Result = mysqli_fetch_array($totalcat_eight_Query);
                 

                    $totalcat_nine_Sql = "SELECT sum(product_quantity) FROM producttbl WHERE product_bin != 'bin' AND category_id ='9'";
                    $totalcat_nine_Query = mysqli_query($connection,$totalcat_nine_Sql);
                    $totalcat_nine_Result = mysqli_fetch_array($totalcat_nine_Query);



                ?>

             
                <div class="col-sm-12 " style="margin-left: 10px" >

                    <div class="col-sm-7">
                    
                       <table class="table table-responsive" >
                 
                    <tr>
                        <th>Report</th>
                        <th>Total Count</th>
                    </tr>

                    <tr>
                        <td><b>Orders</b></td>
                        <td><?php echo $totalOrderResult['count(*)'] ?></td>
                    </tr>
                        <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pending Order</td>
                            <td><?php echo $totalPendingResult['count(*)']?></td>
                        </tr>
                         <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Approve Order</td>
                            <td><?php echo $totalapproveResult['count(*)'] ?></td>
                        </tr>

                          <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Delivered Order</td>
                            <td><?php echo $totaldeliveredResult['count(*)'] ?></td>
                        </tr>


                          <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Canceled Order</td>
                            <td><?php echo $totalcanceledResult['count(*)'] ?></td>
                        </tr>

                      <tr>
                        <td><b>Customers</b></td>
                        <td><?php echo $totalCustomerResult['count(*)']?></td>
                    </tr>
                        <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pending Customer</td>
                            <td><?php echo $totalCustomerPendingResult['count(*)']?></td>
                        </tr>
                         <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Approve Customer</td>
                            <td><?php echo $totalCustomerApproveResult ['count(*)']?></td>
                        </tr>

                          <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Deleted Customer</td>
                            <td> <?php echo $totalCustomerDeleteResult ['count(*)']?></td>
                        </tr> 

                         <tr>
                            <td><b>Administrator</b></td>
                            <td> <?php echo $totalAdministratorResult ['count(*)']?></td>
                       </tr>   

                        <tr>
                            <td><b>Staff</b></td>
                            <td><?php echo $totalStaffResult ['count(*)']?></td>
                       </tr>   

                    </table>
                </div><!-- div 8 -->

                


                <div class="col-sm-5">
                    
                       <table class="table table-hover">
                 
                    <tr>
                        <th>Report</th>
                        <th>Total Count</th>
                    </tr>

                    <tr>
                        <td><b>Product Category Summary Detail</b></td>
                        <td><?php echo $totalcat_all_Result['sum(product_quantity)'] ?></td>
                    </tr>
                        <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Smoked Meat </td>
                            <td><?php echo $totalcat_one_Result['sum(product_quantity)']?></td>
                        </tr>
                         <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Smoked Fish</td>
                            <td><?php echo $totalcat_two_Result['sum(product_quantity)'] ?></td>
                        </tr>


                         <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Smoked Chicken</td>
                            <td><?php echo $totalcat_three_Result['sum(product_quantity)'] ?></td>
                        </tr>


                          <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Cooked Ham</td>
                            <td><?php echo $totalcat_four_Result['sum(product_quantity)'] ?></td>
                        </tr>

                        <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Pickled Meat</td>
                            <td><?php echo $totalcat_five_Result['sum(product_quantity)']?></td>
                        </tr>
                         <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Fresh Sauges</td>
                            <td><?php echo $totalcat_six_Result['sum(product_quantity)'] ?></td>
                        </tr>

                          <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Cooked Sausage</td>
                            <td><?php echo $totalcat_seven_Result['sum(product_quantity)'] ?></td>
                        </tr>


                        <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Smoked Sausage</td>
                            <td><?php echo $totalcat_eight_Result['sum(product_quantity)']?></td>
                        </tr>
                         <tr>
                            <td>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Spreadable Saugsage</td>
                            <td><?php echo $totalcat_nine_Result['sum(product_quantity)'] ?></td>
                        </tr>

                        


                      

                    </table>
                </div><!-- div 8 -->


                </div>

                <br /><br /><br /><br />

    
                   </div> <!--col 12 div -->
               </div> <!--row div -->
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