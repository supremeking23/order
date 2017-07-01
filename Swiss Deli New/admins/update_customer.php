<?php 

  include('includes/session.php');
   include('includes/connection.php');
  include('includes/functions.php');
  
?>

<?php 

	if(isset($_POST['update_customer'])){
		//echo "<script>alert('ivan')</script>";

					  $customer_id = $_POST['hidden_id'];

					            $surname = $_POST['lname'];
                      $firstname = $_POST['fname'];
                    
                     
                      
                      if($_POST['gender'] == 'male'){
                          $gender = 'male';
                      }else if($_POST['gender'] == 'female'){
                          $gender = 'female';
                      }else{
                          $gender = '';
                      }

                      $address = $_POST['address'];

                     

                      $username = $_POST['username'];
                      $password = $_POST['password'];
                      $confirm_pass = $_POST['confirm_password'];

                      $email = $_POST['email'];
                      $tel = $_POST['tel'];
                      $cell = $_POST['cell'];

                      
                         // $admin_profile = $_FILES['a_image']['name'];
                          //$admin_profile_tmp = $_FILES['a_image']['tmp_name'];

                          //move_uploaded_file($admin_profile_tmp, "admin_images/$admin_profile");

                      //$date_registered = date("m-d-Y H:i:s"); 


                      if($password != $confirm_pass){
                          echo "<script>alert('password and confirm password doesnt match')</script>";
                          echo "<script>window.open('customers.php?customers=customers','_self');</script>";
                          exit;
                      }

               			
                         $update_query = "UPDATE customertbl SET surname= '{$surname}', ";
                         $update_query .= "firstname = '{$firstname}', gender = '{$gender}', ";
                         $update_query .= "customer_address = '{$address}', cellphone = '{$cell}', ";
                         $update_query .= "telephone = '{$tel}', email = '{$email}',password ='{$password}' ";
                         $update_query .= "WHERE customer_id = '{$customer_id}' LIMIT 1";


                      $run_customer = mysqli_query($connection,$update_query) or die(mysqli_error($connection));
                      
                      if($run_customer){
                        echo "<script>alert('Customer Information has been updated');</script>";
                        echo "<script>window.open('customers.php?customers=customers','_self');</script>";
                      }   

	}
?>