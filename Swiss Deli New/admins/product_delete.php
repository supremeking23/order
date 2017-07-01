<?php 

  include('includes/session.php');
   include('includes/connection.php');
  include('includes/functions.php');
  
?>
     <!-- if delete -->
              <?php 
                      if(isset($_POST['delete'])){
                            $product_id_to_delete = $_POST['hidden_id'];
                            $query = "UPDATE  producttbl SET product_bin = 'bin' WHERE product_id = '$product_id_to_delete'";
                            $run_query = mysqli_query($connection,$query);

                            if ($run_query && mysqli_affected_rows($connection) == 1) {
                            echo "<script>alert('product has been successfully deleted')</script>";
                            echo "<script>window.open('products.php','_self')</script>";

                            }

                           
                            }
                ?>