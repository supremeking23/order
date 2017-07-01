<?php 

  include('includes/session.php');
   include('includes/connection.php');
  include('includes/functions.php');
  
?>
     <!-- if delete -->
              <?php 
                      if(isset($_GET['delete_id'])){
                            $customer_id_to_delete = $_GET['delete_id'];
                            $query = "UPDATE  customertbl SET isBin = 'bin' WHERE customer_id = '$customer_id_to_delete'";
                            $run_query = mysqli_query($connection,$query);

                            if ($run_query && mysqli_affected_rows($connection) == 1) {
                            echo "<script>alert('customer record has been successfully deleted')</script>";
                            echo "<script>window.open('customers.php?customers=customers','_self')</script>";

                            }

                           
                          }
                ?>