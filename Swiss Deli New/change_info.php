 <?php
  include('includes/session.php');
  include('includes/connection.php');
  include('includes/functions.php');
  $customer_id = $_SESSION['customer_id'];
  ?>
  
        <?php include('header_customer.php'); ?>
        <?php include('sidebar.php'); ?>
        <?php include('page_header_customer.php'); ?>





  <!-- Page Content -->
        <div id="page-content-wrapper">
            <div class="container-fluid">

     	<?php $query ="SELECT * FROM customertbl WHERE customer_id = '$customer_id' ";
     			$run_query = mysqli_query($connection,$query);

            ?>
                <div class="row">
                <br /><br />
                	<h1>Change Account Information</h1>
                	<br />

                  <?php while($customer = mysqli_fetch_assoc($run_query)){

                  ?>
                    <div class=" col-md-4">
                      <table style="width:100%;" class="table table-hover">
                      <form action="change_info.php" method="POST" enctype="multipart/form-data">
                          <tr>
                            <td>First Name:</td>
                            <td><input type="text"  name="firstname" value="<?php echo $customer['firstname']; ?>" ></td>
                          </tr>

                           <tr>
                            <td>Last Name:</td>
                            <td><input type="text"  name="surname" value="<?php echo $customer['surname']; ?>" ></td>
                          </tr>


                            <tr>
                            <td>Birthdate:</td>
                            <td><input type="date"  name="birthdate" value="<?php echo $customer['birthdate']; ?>" ></td>
                          </tr>




                           <tr>
                            <td>Gender:</td>
                            <td> <select class="form-control" name="gender">
                                                        <option value="male" <?php if($customer['gender']=="male"){echo "selected"; };?>>Male</option>
                                                        <option value="female" <?php if($customer['gender']=="female"){echo "selected"; };?>>Female</option>
                                                    </select></td>
                          </tr>


                           <tr>
                            <td>Address:</td>
                            <td><input type="text"  name="address" value="<?php echo $customer['customer_address']; ?>" ></td>
                          </tr>

                           <tr>
                            <td>Telephone Number:</td>
                            <td><input type="text"  name="tel" value="<?php echo $customer['telephone']; ?>"></td>
                          </tr>

                          <tr>
                            <td>Cellpone Number:</td>
                            <td><input type="text"  name="cell" value="<?php echo $customer['cellphone']; ?>"></td>
                          </tr>

                      </table>  
                    </div>


                    <div class=" col-md-4">
                      <table style="width:100%;" class="table table-hover">
                        
                          <tr>
                            <td>Email Address</td>
                            <td><input type="text"  name="email" value="<?php echo $customer['email']; ?>" ></td>
                          </tr>

                           <tr>
                            <td>Username:</td>
                            <td><input type="text"  name="username" value="<?php echo $customer['username']; ?>" ></td>
                          </tr>


                            <tr>
                            <td>Password:</td>
                            <td><input type="password"  name="password" value="<?php echo $customer['password']; ?>" ></td>
                          </tr>


                           <tr>
                            <td>Confirm Password:</td>
                            <td><input type="password"  name="confirm_password" value="<?php echo $customer['password']; ?>" ></td>
                          </tr>
                      </table>  



                    </div>



                    <div class=" col-md-4">
                                <div class="form-group row">
                                    <label for="role" class="col-sm-4 col-form-label">
                                           
                                    </label><br />
                                <div class="col-sm-8">

                                  <?php if(empty($customer['profile'])){ ?>

                                   <img src="images/guest2.jpg" width="150" height="150" class="img-circle" style="margin-top:15px">
                                   

                                  <?php }else{ ?> 
                                       <img  id="image" class="img-circle" alt="your image" width="150" height="150" src="images/<?php echo $customer['profile']?>" />
                                  <?php } ?> 

                                    <input type="hidden" value="<?php echo $customer['profile']?>" name="image_name">

                                    <input type="file" name="customer_image"
                                                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >
                                                   
                                          </div>
                                        </div><!--  -->   






                    </div>

                    <div class="row">

                      <div class="col-md-4" style="margin-right: 20px;margin-top: 50px">
                      <br /><br />
                           <input type="hidden"  value="<?php echo $customer['customer_id']?>" name="update_id">
                          <button type="submit" class="btn btn-primary btn-md"  name="update_info">Update Account</button>
                          
                      </div>
                    </div>


                    </form> 

                    <?php  } ?>



                    <?php 
                      if(isset($_POST['update_info'])){
                           
                            $customer_id = $_POST['update_id'];
                           $surname = $_POST['surname'];
                          $firstname = $_POST['firstname'];
                    
                     
                      
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

                                  

                                   if($_FILES['customer_image']['name'] == "") {
                                    // No file was selected for upload, your (re)action goes here
                                        $admin_profile = $_POST['image_name'];
                                    }else{
                                          $profile = $_FILES['customer_image']['name'];
                                        $profile_tmp =$_FILES['customer_image']['tmp_name'];

                                        move_uploaded_file($profile_tmp, "images/$profile");
                                    }

                      if($password != $confirm_pass){
                          echo "<script>alert('password and confirm password doesnt match')</script>";
                          echo "<script>window.open('customers.php?customers=customers','_self');</script>";
                          exit;
                      }

                    
                         $update_query = "UPDATE customertbl SET surname= '{$surname}', ";
                         $update_query .= "firstname = '{$firstname}', gender = '{$gender}', ";
                         $update_query .= "customer_address = '{$address}', cellphone = '{$cell}', ";
                         $update_query .= "telephone = '{$tel}', email = '{$email}',password ='{$password}',profile = '{$profile}',username = '{$username}' ";
                         $update_query .= "WHERE customer_id = '{$customer_id}' LIMIT 1";


                      $run_customer = mysqli_query($connection,$update_query) or die(mysqli_error($connection));
                      
                      if($run_customer){
                        echo "<script>alert('Your Account has been updated');</script>";
                        echo "<script>window.open('change_info.php','_self');</script>";
                      }   

                      var_dump($_FILES['c_image']['name']);
                      }
                    ?>
                    

                </div>
            </div>
        </div>
        <!-- /#page-content-wrapper -->

    







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
       