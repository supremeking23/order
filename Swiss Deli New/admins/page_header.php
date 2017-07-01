        <!-- Page heade -->
        <div id="header">


        <div class="brand">
          <h1>Swiss Deli  Online Ordering and Delivery System</h1>
        </div>
           
            
          <div class="dropdown pull-right">
            <button type="button" data-toggle="dropdown" id="settings" class="btn btn-info dropdown-toggle" style="margin-top:8px">&nbsp;Settings<span class="caret"></span></button>
            
            <ul class="dropdown-menu" aria-labelledby="settings">
              <li><a href="" data-toggle="modal" data-target="#editAdmin" class="btn btn-info sidebar_button" data-tooltip="tooltip" data-placement="left" data-original-title="Click here to modify your account" title="">Log In as: <?php echo $_SESSION['email']?></a></li>
              <li> <a href="#" style="color:;"  class="btn btn-info sidebar_button" data-tooltip="tooltip" data-placement="left" data-original-title="Toggle to show/hide sidebar" title="" id="menu-toggle">
                 Toggle to show/ hide sidebar
                </a></li>
            </ul>
          </div>



                             <!-- update modal -->
                <div class="modal fade" id="editAdmin" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content " style="width: 700px">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">Update Admin Profile</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    
                               
                                 <div class="col-lg-4" >

                                 

                                    <form action="" method="POST" enctype="multipart/form-data">

                                      
                                    <?php $admin_profile =  find_admin_by_id($_SESSION['admin_id']); ?>   


                                  <?php while($admins = mysqli_fetch_array($admin_profile)){ ?>

                                    <div class="form-group row">
                                          <label for="firstname" class="col-sm-4 col-form-label"><b>First Name:</b></label>
                                          <div class="col-sm-8">
                                            
                                           <input class="form-control" id="firstname" placeholder="firstname" name="firstname" type="text" value="<?php echo $admins['admin_firstname']?>" autocomplete="on">
                                          </div>
                                    </div><!--  -->  


                                    <div class="form-group row">
                                          <label for="surname" class="col-sm-4 col-form-label"><b>Surname Name:</b></label>
                                          <div class="col-sm-8">
                                            
                                          <input class="form-control" id="surname" placeholder="surname" name="surname" type="text" value="<?php echo $admins['admin_surname']?>" autocomplete="on">
                                          </div>
                                    </div><!--  -->  
                                        

                                    <div class="form-group row">
                                          <label for="birthdate" class="col-sm-4 col-form-label"><b>Birthdate:</b></label>
                                          <div class="col-sm-8">
                                            
                                            <input type="date" class="form-control" id="birthdate"  name="birthdate" value="<?php echo $admins['birthdate']?>" >
                                          </div>
                                    </div><!--  -->         
          
                                      

                                      <div class="form-group row">
                                          <label for="gender" class="col-sm-4 col-form-label"><b>Gender:</b></label>
                                          <div class="col-sm-8">
                                                    <select class="form-control" name="gender">
                                                        <option value="male" <?php if($admins['gender']=="male"){echo "selected"; };?>>Male</option>
                                                        <option value="female" <?php if($admins['gender']=="female"){echo "selected"; };?>>Female</option>
                                                    </select>
                                          </div>
                                        </div><!-- gender -->  
                                        



                                
                                    <div class="form-group row">
                                          <label for="address" class="col-sm-4 col-form-label"><b>Address</b></label>
                                          <div class="col-sm-8">
                                            
                                          <input class="form-control" id="surname" placeholder="address" name="address" type="text" value="<?php echo $admins['admin_address']?>" autocomplete="on">
                                          </div>
                                    </div><!--  -->  


  
                                    <div class="form-group row">
                                          <label for="tel" class="col-sm-4 col-form-label"><b>Telephone Number:</b></label>
                                          <div class="col-sm-8">
                                            
                                       <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $admins['admin_tel']?>" placeholder="Telephone Number" autocomplete="on">
                                      </div><!--  -->  


                                     </div>



                                 </div> <!-- left --> 


                                 <!-- right -->

                                 <div class="col-lg-4">


                                        <div class="form-group row">
                                          <label for="role" class="col-sm-4 col-form-label"><b>Role:</b></label>
                                          <div class="col-sm-8">
                                                    <select class="form-control" name="role">
                                                          <option value="superadmin" <?php if($admins['role']=="superadmin"){echo "selected"; };?>>Super Admin</option>
                                                            <option value="staff" <?php if($admins['role']=="staff"){echo "selected"; };?>>Staff</option>
                                                    </select>
                                          </div>
                                        </div><!--  -->   



                                        <div class="form-group row">
                                          <label for="username" class="col-sm-4 col-form-label"><b>Username:</b></label>
                                          
                                        <div class="col-sm-8">
                                         <input type="text" class="form-control" id="username" name="username" value="<?php echo $admins['username']?>" placeholder="Username" autocomplete="on">
                                         </div>
                                      </div><!--  -->  



                                      <div class="form-group row">
                                          <label for="password" class="col-sm-4 col-form-label"><b>Password:</b></label>
                                          <div class="col-sm-8">
                                            
                                         <input type="password" class="form-control" id="password" name="password" value="<?php echo $admins['password']?>" placeholder="Password" autocomplete="on">
                                      </div><!--  -->  


                                    </div>


                                      <div class="form-group row">
                                          <label for="confirm_password" class="col-sm-4 col-form-label"><b>Confirm Password:</b></label>
                                          <div class="col-sm-8">
                                            
                                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?php echo $admins['password']?>" placeholder="confirm_password" autocomplete="on">
                                      </div><!--  -->  


                                     </div>


                                       <div class="form-group row">
                                          <label for="email" class="col-sm-4 col-form-label"><b>Email Address:</b></label>
                                          <div class="col-sm-8">
                                            
                                       <input type="text" class="form-control" id="email" name="email" value="<?php echo $admins['email']?>" placeholder="Email" autocomplete="on">
                                      </div> 


                                     </div><!--  --> 






                                     <div class="form-group row">
                                          <label for="cell" class="col-sm-4 col-form-label"><b>Cellphone Number:</b></label>
                                          <div class="col-sm-8">
                                            
                                             <input type="text" class="form-control" id="cell" name="cell" value="<?php echo $admins['admin_cell']?>" placeholder="Cellphone Number" autocomplete="on">
                                      </div><!--  -->  


                                     </div>
                                        

                                                

                                   
                                </div> <!-- right -->



                                <div class="col-lg-4">


                                        <div class="form-group row">
                                          <label for="role" class="col-sm-4 col-form-label">
                                           
                                          </label><br />
                                          <div class="col-sm-8">
                                           <img  id="image" class="img-circle" alt="your image" width="150" height="150" src="admin_images/<?php echo $admins['admin_profile']?>" />
                                                       <input type="hidden" value="<?php echo $admins['admin_profile']?>" name="image_name">
                                                    <input type="file" name="c_image"
                                                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >
                                          </div>
                                        </div><!--  -->   



                                      


                                     </div><!--  --> 

                                        

                                                

                                   
                                </div> <!-- right -->

                                    <div class="form-group" style="clear:both;margin-right: 50px">
                                                        <input type="hidden" value="<?php echo $admins['admin_id']?>" name="update_id">
                                                        <button type="submit" class="btn btn-primary btn-md"  name="update_admin_main">Update Account</button>
                                    </div>

                                    <?php } ?>
                                 </form>                      
                            </div>
                        </div>
                    </div>
                </div> <!-- end modal -->


                <?php 
                if(isset($_POST['update_admin_main'])){

                                 $id = $_POST['update_id'];
                                $admin_surname = $_POST['surname'];
                                $admin_firstname = $_POST['firstname'];
                               
                                $admin_birthdate = $_POST['birthdate'];

                                
                                if($_POST['gender'] == 'male'){
                                    $admin_gender = 'male';
                                }else if($_POST['gender'] == 'female'){
                                    $admin_gender = 'female';
                                }else{
                                    $admin_gender = '';
                                }  


                                $address =   $_POST['address'];

                                   $admin_role = $_POST['role'];
                                    $admin_username = $_POST['username'];
                                    $admin_password = $_POST['password'];
                                    $admin_confirm_pass = $_POST['confirm_password'];

                                $admin_tel = $_POST['tel'];
                                $admin_cell = $_POST['cell'];


                                $admin_email = $_POST['email'];
                                


                                if($_FILES['c_image']['name'] == "") {
                                    // No file was selected for upload, your (re)action goes here
                                        $admin_profile = $_POST['image_name'];
                                    }else{
                                          $admin_profile = $_FILES['c_image']['name'];
                                        $admin_profile_tmp =$_FILES['c_image']['tmp_name'];

                                        move_uploaded_file($admin_profile_tmp, "admin_images/$admin_profile");
                                    }
                              


                              


                               if($admin_password != $admin_confirm_pass){
                                    echo "<script>alert('password and and confirm password doesnt match')</script>";
                                    redirect_to("administrator.php");
                                    exit;
                                }


                                $update_query = "UPDATE admintbl SET ";
                                $update_query .= "admin_surname = '{$admin_surname}', admin_firstname = '{$admin_firstname}', ";
                                $update_query .= "birthdate = '{$admin_birthdate}', gender = '{$admin_gender}', ";
                                $update_query .= "admin_address = '{$address}', ";
                                $update_query .= "role = '{$admin_role}', username = '{$admin_username}', password ='{$admin_password}', email = '{$admin_email}', admin_tel ='{$admin_tel}', ";
                                $update_query .= "admin_cell = '{$admin_cell}', admin_profile = '{$admin_profile}' ";
                                $update_query .= "WHERE admin_id = '{$id}' LIMIT 1";
                                $run_admin = mysqli_query($connection,$update_query) or die(mysqli_error($connection));
                                
                                if($run_admin){
                                    
                                    //$_SESSION["message"] = "Admin Update.";
                                    echo "<script>alert('Admin Update.')</script>";
                                    //redirect_to("administrator.php");
                                    echo "<script>window.open('dashboard.php?dashboard=dashboard','_self')</script>";
                                    
                                } 

                }

        ?>


   
        </div>


