        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    
    <?php include('header.php');?>

    <?php include('sidebar.php');?>



 <?php $get_pending = get_all_pending_orders();?>







          <!-- Page heade -->
        <?php include('page_header.php');?>

        <div class="container">
            <h1 style="">Order Section</h1>   
        </div>


        <!--  table_nav -->
        <div class="" style="margin-right: ;position: relative;bottom: -70px;right: -190px">

            <a href="orders.php?pending_orders=pending_orders&orders=orders" role="button" data-toggle="modal" class="btn <?php
            if (isset($_GET['pending_orders']) =='pending_orders' || isset($_GET['orders']) =='orders') {
                echo 'active_mini';
            }
            ?> dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="" title="" id="">
                </i>&nbsp;Pending Order             
            </a>
            &nbsp; 
            <a href="approve_orders.php?approve_orders=approve_orders&orders=orders" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="" title="" id="">
                </i>&nbsp;For Delivery            
            </a>

             &nbsp; 
            <a href="delivered_orders.php?delivered_orders=delivered_orders&orders=orders" role="button" data-toggle="modal" class="btn  dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="" title="" id="">
                </i>&nbsp;Delivered Order           
            </a>



             &nbsp; 
            <a href="canceled_orders.php?canceled_orders=canceled_orders&orders=orders" role="button" data-toggle="modal" class="btn  dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="" title="" id="" >
                </i>&nbsp;Canceled Order           
            </a>



            &nbsp;
              <a href="#pdf_pendingorders" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="generate pending orders report" title="" id="">
                &nbsp;Generate Report           
            </a>

            <br />

            


                       <!-- pdf products -->
            <div class="modal fade" id="pdf_pendingorders" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">PENDING ORDER LIST FILTRATION</h3>

                            </div>
                            <div class="modal-body ">
                                <center>

                                <form action="generate_pendingorders_pdf.php" method="POST">
                                   <br><h4>Select below to filter the reports information to be print:</h4><br><br>
                                        
                                       <br /><br />
                                        <b>From:</b> <input type="date" name="from">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>To:</b> <input type="date" name="to">
                                       <br><br>
                                        
                                       
                                
                            </div>

                            <div class="modal-footer">
                                
                                <button type="submit" name="product_summary" class="btn btn-warning" style="width:100%">Generate PDF</button>  

                            </div> 

                                  </form>
                                </center>

     
                      </div>
                   </div>
                </div> <!-- end modal -->



        </div>

        <br /><br /><br />


        <!-- Page Content #page-content-wrapper -->
        <div  class="container-fluid" style="background:">
            
            
            
            <div> <!-- former container-fluid-->
             
                <div class="row">

                    <div class="col-lg-12">


                           <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">


                                    <thead>
                                        <tr>
                                            
                                            <th>Order Number</th>
                                            <th>Customer Name</th>
                                            <th>Address</th>
                                            <th>Date Ordered</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                     <?php while($pending = mysqli_fetch_assoc($get_pending)) {?>
                                        <tr>    
                                            <td>SD<?php echo $pending['order_id']?></td> 
                                            <td><?php echo $pending['firstname'].' '. $pending['surname']?></td> 
                                            <td><?php echo $pending['customer_address']?>
                                               
                                            </td>  

                                            <td> <?php $date =date_create($pending['date_ordered']);
                                                    echo date_format($date,"F d Y g:i:s A");
                                            ?></td> 
                                            <td><a href="order_details_pending.php?customer_id=<?php echo urlencode($pending["customer_id"]); ?>&orders=orders&order_id=<?php echo $pending['order_id']?>" data-tooltip="tooltip" data-placement="top" data-original-title="View Order Deteails" title=""  class="btn btn-primary btn-sm">View Details</i></a></td>  

                                        </tr>
                                  <?php }?>
                                </tbody>

                             </table>   
                        
                    </div> <!--class="col-lg-12" -->

                </div> <!--row" -->








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