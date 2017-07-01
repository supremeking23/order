<?php
  include('includes/session.php');
  include('includes/connection.php');
  include('includes/functions.php');

  ?>

        
        <?php include('header_customer.php'); ?>
        <?php include('sidebar.php'); ?>
        <?php include('page_header_customer.php'); ?>




        <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <?php 
                          $id = $_SESSION['customer_id'];
                        $customer_name = "SELECT * FROM customertbl WHERE customer_id = ' $id' AND isBin = ''";
                          $run_customer = mysqli_query($connection,$customer_name);

                          while($customer = mysqli_fetch_assoc($run_customer)){
                             $name =  $customer['firstname'] .' '. $customer['surname'];
                          }
                        ?>
                        <h1>Hello <small><?php echo $name?></small></h1> 

                    </div>
                </div>
                <br /><br />
                <div class="row">
                    <div class="well well-md col-md-7">
                        
                        <?php 

                           $notficationsql = "SELECT count(*) FROM notificationtbl WHERE customer_id='$id' AND status = ''";
                          $totalnotificationQuery = mysqli_query($connection,$notficationsql);
                          $totalnotificationResult = mysqli_fetch_array($totalnotificationQuery);
                        ?>

                           <h1 style="text-align: left;">NOTIFICATIONS 

                           <?php if($totalnotificationResult['count(*)'] > 0){ ?>
                           <small>You have (<?php echo $totalnotificationResult['count(*)'] ?>) new notification</small>
                           <?php } ?>

                           </h1>
                            <hr style=" border-top: 1px solid #8c8b8b;" />

                            <table class="table table-bordered" >
                            <col width="73%">
                            <col width="32%"> 
                              <thead >
                              <tr >
                                <th style="text-align: center;">Message</th>
                                <th>Date</th>
                                <th style="text-align: center;">Action</th> 
                              </tr>
                                
                              </thead>

                              <tbody>
                               <?php $get_notification =  get_all_notification_by_customer_id($id);?>

                                <?php while($notification = mysqli_fetch_assoc($get_notification)){ ?>
                                <tr>

                               
                                  <td><h4><?php echo $notification['subject'] ?>&nbsp;&nbsp;&nbsp;<small><?php echo limit_text($notification['message'],7)  ?></small></h4></td>
                               

                                  <td><?php $date =date_create($notification['notification_date']);
                                                    echo date_format($date,"F d Y g:i:s A");
                                            ?></td>

                                  <td><button type="button" data-toggle="modal" data-target="#noti<?php echo $notification['notify_id']?>" class="btn btn-info btn-sm" name="read">Read More</button>&nbsp;&nbsp; </td>


                                  <!-- Modal -->
                                  <div class="modal fade" id="noti<?php echo $notification['notify_id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                      <div class="modal-dialog" role="document">
                                          <!--Content-->
                                          <div class="modal-content">
                                              <!--Header-->
                                              <div class="modal-header">
                                                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                      <span aria-hidden="true">&times;</span>
                                                  </button>
                                                  <h1 class="modal-title" id="myModalLabel">
                                                  Notifacation Detail</h1>
                                              </div>
                                              <!--Body-->
                                              <div class="modal-body">
                                                  <h3><?php echo $notification['subject'] ?></h3>
                                                  <p><?php echo $notification['message']?></p>
                                              </div>
                                              <!--Footer-->
                                              <div class="modal-footer">
                                               
                                                  
                                                <form action="" method="POST">
                                                  <input type="hidden" name="noti_id" value="<?php echo $notification['notify_id']; ?>">
                                                  <button type="submit" class="btn btn-primary btn-block" name="mark_read">Mark as Read</button>
                                                 </form>

                                              </div>
                                          </div>
                                          <!--/.Content-->
                                      </div>
                                  </div>
                                  <!-- /.Live preview-->
                                
                                 
                                </tr>
                                  <?php  } ?>
                              </tbody>
                            </table>


                      

                    
                    </div>
                    
                     <div class=" col-md-1">
                      
                    </div>

                    <div class="well well-md col-md-4">
                        <h1 style="text-align: center;">E-POINTS</h1>
                         <hr style=" border-top: 1px solid #8c8b8b;" />
                         <?php 
                            $customer_id = $_SESSION['customer_id'];
                         $get_points = "SELECT * FROM epointstbl WHERE customer_id ='$customer_id'";
                            $points = mysqli_query($connection,$get_points);


                            while($total_points = mysqli_fetch_assoc($points)){
                         ?>
                            
                         <h2 style="text-align: center;">Points:<small><?php echo $total_points['total_points']?></small></h2>
                         <?php   } ?>
                    </div>
                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    



        <?php 

              if(!isset($_POST['mark_read'])){

              }else{
                  
                  $noti_id = $_POST['noti_id'];
                  $sql = "UPDATE notificationtbl SET status = 'seen' WHERE notify_id = '$noti_id'";
                  $run_sql = mysqli_query($connection,$sql);

                  if($run_sql && mysqli_affected_rows($connection) == 1){
                    echo "<script>window.location='customer_account.php'</script>";
                  }
              }
        ?>



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
