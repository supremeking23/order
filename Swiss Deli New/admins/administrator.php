        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    
    <?php include('header.php');?>

    <?php include('sidebar.php');?>


    <?php 
    $admin_id_main = $_SESSION['admin_id'];
    $get_admin = get_all_admins_except_main($admin_id_main);?>





      <!-- Page heade -->
        <?php include('page_header.php');?>


        <div class="container">
            <h1 style="">Administrator Section</h1>   
        </div>

           <!-- add customer -->
        <div class="table_nav">
             <a href="#add_admin" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="Add Administrator/Staff" title="" id="">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add Administrator           
            </a>
            &nbsp; &nbsp;


            <a href="#pdf_admin" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="generate administrator list report" title="" id="">
                &nbsp;Generate Report           
            </a>



                       <!-- pdf members -->
            <div class="modal fade" id="pdf_admin" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">ADMINISTRATOR LIST FILTRATION</h3>

                            </div>
                            <div class="modal-body ">
                                <center>

                                <form action="generate_administrator_pdf.php" method="POST">
                                   <br><h4>Select below to filter the reports information to be print:</h4><br><br>
                                        <b>Order by Name:</b> <select name="orderby">
                                          <option value="asc">Accending</option>
                                          <option value="desc">Decending</option>
                                          
                                        </select> <br /><br />
                                         <b>Role:</b> <select name="sortrole">
                                          <option value="all">All</option>
                                          <option value="superadmin">Super Admin</option>
                                          <option value="staff">Staff</option>
                                          
                                        </select>




                                       <br /><br />
                                        <b>From:</b> <input type="date" name="from">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>To:</b> <input type="date" name="to">
                                       <br><br>
                                        
                                       
                                
                            </div>

                            <div class="modal-footer">
                                
                                <button type="submit" name="admin_summary" class="btn btn-warning" style="width:100%">Generate PDF</button>  

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
            
         <div>


            <div class="row">

                <div class="col-lg-12">
                            
                           

                    <!--<div><a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a></div> -->
                        
                      

                           <!-- <span style="margin-left:160px"></span><button type="button" data-toggle="modal" data-target="#add_admin" data-tooltip ="tooltip" title="Add admin" data-placement ="bottom" class="btn btn-warning btn-sm" >Add Admin</button> -->

                    


                             <!-- add modal -->
                <div class="modal fade" id="add_admin" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">ADD Administrator/Staff</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-12" >
                                     
                                            
                                        <form action="administrator.php" method="POST" enctype="multipart/form-data">
                                            <div class="col-md-12">
                                                
                                                <table class="col-lg-8 space register" >
                                               

                                                <tr>
                                                    <td><label for="firstname">First Name</label></td>
                                                    <td> <input class="form-control" id="firstname" placeholder="firstname" name="firstname" type="text" value="" autocomplete="on" onkeypress = "return lettersonly(event)" required></td>
                                                </tr>

                                                 <tr>
                                                    <td><label for="surname">Surname Name</label></td>
                                                    <td><input class="form-control" id="surname" placeholder="surname" name="surname" type="text" value="" autocomplete="on" onkeypress = "return lettersonly(event)" required></td>
                                                </tr>

                                                <tr>
                                                    <td><label for="birthdate">Birthdate</label></td>
                                                    <td> <input type="date" class="form-control" id="birthdate"  name="birthdate" value="" ></td>
                                                </tr>

                                                  <tr>
                                                    <td><label for="gender">Gender</label></td>
                                                    <td><select class="form-control"  name="gender">
                                                       
                                                         <option value="male" >Male</option>
                                                         <option value="female" >Female</option>

                                                    </select></td>
                                                </tr>

                                                  <tr>
                                                    <td> <label for="address">Address</label></td>
                                                    <td>  <input type="text" class="form-control" placeholder="Address" name="address" value="" autocomplete="on"></td>
                                                </tr>

                                                  <tr>
                                                    <td> <label for="role">Role</label></td>
                                                    <td> <select class="form-control" name="role">
                                                         <option value="superadmin" >Super Admin</option>
                                                         <option value="staff">Staff</option>

                                                    </select></td>
                                                </tr>

                                                  <tr>
                                                    <td><label for="tw">Username</label> </td>
                                                    <td> <input type="text" class="form-control" id="username" name="username" value="" placeholder="Username" autocomplete="on"></td>
                                                </tr>

                                                  <tr>
                                                    <td><label for="password">Password</label></td>
                                                    <td> <input type="password" class="form-control" id="password" name="password" value="" placeholder="Password"></td>
                                                </tr>

                                                <tr>
                                                    <td><label for="confirm_password">Confirm Password</label></td>
                                                    <td><input type="password" class="form-control" id="confirm_password" name="confirm_password" value="" placeholder="confirm_password"   onfocusout = "passwordconfirm('password','confirm_password')"  required></td>
                                                </tr>

                                                 <tr>
                                                    <td> <label for="email">Email Address</label> </td>
                                                    <td> <input type="text" class="form-control" id="email" name="email" value="" placeholder="Email" autocomplete="on"></td>
                                                </tr>


                                                 <tr>
                                                    <td><label for="tel">Telephone Number</label> </td>
                                                    <td><input type="text" class="form-control" id="tel" name="tel" value="" placeholder="Telephone Number" autocomplete="on" onkeypress = "return numbersonly(event)"  required ></td>
                                                </tr>

                                                <tr>
                                                    <td><label for="cell">Cellphone Number</label></td>
                                                    <td> <input type="text" class="form-control" id="cell" name="cell" value="" placeholder="Cellphone Number" autocomplete="on" onkeypress = "return numbersonly(event)"  required ></td>
                                                </tr>


                                                </table>
                            
                                            


                                                
                                                <!-- tentative
                                                  <div class="form-group pull-left">
                                                    <label  for="profile">Profile Picture</label> 
                                                        
                                                    <input type="hidden" value="" name="image_name">
                                                    <input type="file" name="c_image"
                                                    onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >
                                                   
                                                </div>

                                                    <div class="form-group pull-right"> 
                                                        <img  id="image" class="img-rounded" alt="your image" width="300" height="180" src="" />
                                                    </div>

                                                    -->
                                                    <div class="form-group" style="clear:both">
                                
                                                        <button type="submit" class="btn btn-primary btn-md"  name="add_admin">Add Account</button>
                                                    </div>

                                                

                                            </div> 

                                        </form>


                                        
                                    </div>
                                </div>
               
                   
                            </div>
                        </div>
                    </div>
                </div> <!-- end modal -->

                <?php 
                         if(isset($_POST['add_admin'])){
                                
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
                                  /*  $admin_profile = $_FILES['c_image']['name'];
                                    $admin_profile_tmp =$_FILES['c_image']['tmp_name'];

                                    move_uploaded_file($admin_profile_tmp, "admin_images/$admin_profile");
                                    */

                              


                               if($admin_password != $admin_confirm_pass){
                                    echo "<script>alert('password and and confirm password doesnt match')</script>";
                                    redirect_to("administrator.php");
                                    exit;
                                }



                                 $insert_admin = "INSERT INTO admintbl (admin_surname,admin_firstname,birthdate,gender,admin_address,role,username,password,email,admin_tel,admin_cell,date_registered)
                                              VALUES ('$admin_surname','$admin_firstname','$admin_birthdate','$admin_gender','$address','$admin_role','$admin_username','$admin_password','$admin_email','$admin_tel','$admin_cell',now())";

                                $run_admin = mysqli_query($connection,$insert_admin) or die(mysqli_error($connection));
                                
                                if($run_admin){
                                     //$_SESSION["message"] = "Admin Update.";
                                    echo "<script>alert('Admin created.')</script>";
                                    //redirect_to("administrator.php");
                                    echo "<script>window.open('administrator.php','_self')</script>";
                                    
                                    //$_SESSION["message"] = "Admin created.";
                                    //redirect_to("administrator.php");
                                    
                                } 
                        }
                ?>




                      <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">


        <thead>
            <tr>
                
                <th>Full Name</th>
                <th>Gender</th>
                <th>Email Address</th>
                <th>Contact</th>
                 <th>Position</th>
                  <th>Username</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <tbody>
         <?php while($admins = mysqli_fetch_assoc($get_admin)) {?>
            <tr>  
            <?php 
                // meron datapat session pero tinanggal ko
                $admins['admin_id']; ?>  
                <td><?php echo htmlentities($admins["admin_firstname"] . '  ' . $admins["admin_surname"] ); ?></td>
                <td><?php echo $admins['gender']?></td>
                <td><?php echo $admins['email']?></td>
                <?php //limit_text($admins['address_house_num'].' '.$admins['address_street'].' '.$admins['address_village'].' '. $admins['address_city'], 7);?>
                <td><?php echo $admins['admin_cell']?></td>
                <td><?php echo $admins['role']?></td>
                <td><?php echo $admins['username']?></td>
                   
                <td><button type="button" data-toggle="modal" data-target="#update<?php echo $admins['admin_id']?>" data-tooltip ="tooltip" title="Update admin/staff Information" data-placement ="bottom" class="btn btn-primary btn-sm " ><i class="fa fa-pencil "></i></button>
                    &nbsp;

                    <a href="admin_delete.php?admin_id=<?php echo $admins['admin_id']; ?>" onclick="return confirm('are you sure you want to delete this record?');" role="button" data-tooltip ="tooltip" title="Delete admin/staff.Move to archieve section" data-placement ="bottom" class="btn btn-warning btn-sm" ><i class="fa fa-trash-o"></i></a></td>
      

                


                             <!-- update modal -->
                <div class="modal fade" id="update<?php echo $admins['admin_id']?>" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">Update Admin/Staff</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    
                               
                                 <div class="col-lg-6 pull-left" >

                                 

                                    <form action="administrator.php" method="POST" enctype="multipart/form-data">

                                      
                                       

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

                                 <div class="col-lg-6 pull-right">


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

                                    <div class="form-group" style="clear:both;margin-right: 50px">
                                                        <input type="hidden" value="<?php echo $admins['admin_id']?>" name="update_id">
                                                        <button type="submit" class="btn btn-primary btn-md"  name="update_admin">Update Account</button>
                                    </div>


                                 </form>                      
                            </div>
                        </div>
                    </div>
                </div> <!-- end modal -->






                  <!-- delete modal not use-->
                <div class="modal fade" id="delete2" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">DELETE ADMINISTRATOR</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-12" >
                                     
                                        <p>Are you sure you want to <B class="text-danger">DELETE</B> this record?</p>
                                        <div>
                                            <form action="admin_delete.php" method="POST">
                                                <?php $admin_id_to_delete = $admins['admin_id'];
                                                    //echo $admin_id;
                                                ?>
                                                <input type="hidden" name="hidden_id" value=" <?php echo $admin_id_to_delete?>">
                                            <button type="submit" class="btn btn-primary btn-lg" name="delete">Yes</button>
                                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
                                            </form>  
                                        </div>  
                                        
                                    </div>
                                </div>
               
                   
                            </div>
                        </div>
                    </div>
                </div>







            <!-- if update -->

                 
         

            
            </tr>
          <?php }?>
        </tbody>
    </table>



    
    



                   </div> <!--col 12 div -->
               </div> <!--row div -->
            </div> <!--no name div -->
        </div>
        <!-- /#page-content-wrapper -->



        <?php 
                if(isset($_POST['update_admin'])){

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
                                


                              /*  if($_FILES['c_image']['name'] == "") {
                                    // No file was selected for upload, your (re)action goes here
                                        $admin_profile = $_POST['image_name'];
                                    }else{
                                          $admin_profile = $_FILES['c_image']['name'];
                                        $admin_profile_tmp =$_FILES['c_image']['tmp_name'];

                                        move_uploaded_file($admin_profile_tmp, "admin_images/$admin_profile");
                                    }
                              */


                              


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
                                $update_query .= "admin_cell = '{$admin_cell}' ";
                                $update_query .= "WHERE admin_id = '{$id}' LIMIT 1";
                                $run_admin = mysqli_query($connection,$update_query) or die(mysqli_error($connection));
                                
                                if($run_admin){
                                    
                                    //$_SESSION["message"] = "Admin Update.";
                                    echo "<script>alert('Admin Update.')</script>";
                                    //redirect_to("administrator.php");
                                    echo "<script>window.open('administrator.php','_self')</script>";
                                    
                                } 

                }

        ?>

    

    <?php include('footer.php');?>

        <!-- 
             <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        <h1>Simple Sidebar</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
        -->