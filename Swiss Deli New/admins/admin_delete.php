<?php 

  include('includes/session.php');
   include('includes/connection.php');
  include('includes/functions.php');
  
?>
     <!-- if delete -->
              <?php 
                      /*if(isset($_POST['delete'])){
                            $admin_id_to_delete = $_POST['hidden_id'];
                            $query = "UPDATE  admintbl SET admin_bin = 'bin' WHERE admin_id = '$admin_id_to_delete'";
                            $run_query = mysqli_query($connection,$query);

                            if ($run_query && mysqli_affected_rows($connection) == 1) {
                            echo "<script>alert('admin has been successfully deleted')</script>";
                            echo "<script>window.open('administrator.php','_self')</script>";

                            }

                           
                            }
                            */

                            if(isset($_GET['admin_id'])){
                            $admin_id_to_delete = $_GET['admin_id'];
                            $query = "UPDATE  admintbl SET admin_bin = 'bin' WHERE admin_id = '$admin_id_to_delete'";
                            $run_query = mysqli_query($connection,$query);

                            if ($run_query && mysqli_affected_rows($connection) == 1) {
                            //echo "<script>alert('admin has been successfully deleted')</script>";
                            echo "<script>window.open('administrator.php?administrator=administrator','_self')</script>";

                            }

                           
                            }

                           



                ?>