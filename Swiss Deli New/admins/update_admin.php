        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    
    <?php include('header.php');?>

    <?php include('sidebar.php');?>


    <?php 
if(isset($_GET['admin_id'])){
		//echo $_GET['admin_id'];


		$admin = find_admin_by_id($_GET['admin_id']);
		?>



<?php 

        $_SESSION['currentClick'] = 0;
        $currentClick = "Dashboard";

        echo "<script>
                    $(\" a:contains('$currentClick')\").parent().addClass('active');
                    </script>"; 
?>


        <!-- Page heade -->
        <div id="header"><i class="fa fa-printer"></i>
             <div class="logo"><a href="#">Swiss<span>Deli </span></a></div>
             <div class="pull-right welcome">
               
                   <a href="">Welcome Admin <?php echo $_SESSION['email']?></a>
               



             </div>

             
        </div>




        <!-- Page Content #page-content-wrapper -->
        <div  class="container-fluid" style="background:">
            
            
            
            <div> <!-- former container-fluid-->
                <?php if(message()){


                	echo "<script>window.open('update_admin','_self')</script>";
                	 echo message();

                }

                ?>
                <div class="row">

                <form  method="post" action="admin_update_profile_process.php" enctype="multipart/form-data">	
                    <div class="col-lg-12">

                        <div><a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a></div>

                      <h1>Edit Administrator Information</h1>
                       
                      <?php while($update_admin = mysqli_fetch_array($admin)){ 
                        			
                        		?>

                       <div class="col-md-5">
                       		 <h3>General Information</h3>
                            
                            <div class="form-group">
                                <label for="surname">Surname Name</label>
                                <input class="form-control" id="surname" placeholder="surname" name="surname" type="text" value="<?php echo $update_admin['admin_surname']?>" autocomplete="on">
                            </div>
                          
                             <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input class="form-control" id="firstname" placeholder="firstname" name="firstname" type="text" value="<?php echo $update_admin['admin_firstname']?>" autocomplete="on">
                            </div>

                             <div class="form-group">
                                <label for="middlename">Middle Name</label>
                                <input class="form-control" id="middlename" placeholder="middlename" name="middlename" type="text" value="<?php echo $update_admin['admin_middlename']?>" autocomplete="on">
                            </div>
                
                            <div class="form-group">
                                <label for="birthdate">Birthdate</label>
                                <input type="date" class="form-control" id="birthdate"  name="birthdate" value="<?php echo $update_admin['birthdate']?>" >
                            </div>
                              
                             <div class="form-group">
                                <label for="gender">Gender</label>
                                <select class="form-control"  name="gender">
                                    <?php $gender = $update_admin['gender'];?>
                                	 <option value="male" <?php if($gender== "male") echo "selected"; ?>>Male</option>
                                     <option value="female" <?php if($gender == "female") echo "selected"; ?>>Female</option>

                                </select>
                            </div>

                            

                           
                       </div>	

                       <div class="col-md-1"></div>

                        <div class="col-md-5">
                       		  <h3>Address Information</h3>
                            <div class="form-group">
                                   <label for="house_num">House number</label>
                                  <input type="text" class="form-control" placeholder="House Number" name="house_num" value="<?php echo $update_admin['address_house_num']?>" autocomplete="on">
                            </div>

                            <div class="form-group">
                                   <label for="street">Street / Block</label>
                                   <input type="text" class="form-control" id="street" name="street" value="<?php echo $update_admin['address_street']?>" autocomplete="on">
                            </div>

                            <div class="form-group">
                                   <label for="village">Village</label>
                                   <input type="text" class="form-control" id="village" name="village" value="<?php echo $update_admin['address_village']?>" autocomplete="on">
                            </div>


                            <div class="form-group">
                                   <label for="city">City/Municipality</label>
                                   <input type="text" class="form-control" id="city" name="city" value="<?php echo $update_admin['address_city']?>" autocomplete="on">
                            </div>

                             <div class="form-group">
                                   <label for="zipcode">ZipCode</label>
                                   <input type="text" class="form-control" id="zipcode" value="<?php echo $update_admin['address_zipcode']?>" name="zipcode" autocomplete="on">
                            </div>
                          </div>

                           
                         <div class="col-md-5">
                         	<h3>Account Information</h3>
                           
                        
                            <div class="form-group">
                                <label for="role">Role</label> 
                                <select class="form-control" name="role">
   										

                                    <?php $role = $update_admin['role'];?>
                                     <option value="superadmin" <?php if($role == "superadmin") echo "selected"; ?>>Super Admin</option>
                                     <option value="staff" <?php if($role  == "staff") echo "selected"; ?>>Staff</option>

								</select>
                            </div>
                        
                            <div class="form-group">
                                <label for="tw">Username</label> 
                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $update_admin['username']?>" placeholder="Username" autocomplete="on">
                            </div>

                             <div class="form-group">
                                <label for="password">Password</label> 
                                <input type="password" class="form-control" id="password" name="password" value="<?php echo $update_admin['password']?>" placeholder="Password" autocomplete="on">
                            </div>

                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label> 
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" value="<?php echo $update_admin['password']?>" placeholder="confirm_password" autocomplete="on">
                            </div>

                             <div class="form-group">
                                <label for="email">Email Address</label> 
                                <input type="text" class="form-control" id="email" name="email" value="<?php echo $update_admin['email']?>" placeholder="Email" autocomplete="on">
                            </div>

                            <div class="form-group">
                                <label for="tel">Telephone Number</label> 
                                <input type="text" class="form-control" id="tel" name="tel" value="<?php echo $update_admin['admin_tel']?>" placeholder="Telephone Number" autocomplete="on">
                            </div>

                             <div class="form-group">
                                <label for="cell">Cellphone Number</label> 
                                <input type="text" class="form-control" id="cell" name="cell" value="<?php echo $update_admin['admin_cell']?>" placeholder="Cellphone Number" autocomplete="on">
                            </div>


                             <div class="form-group ">
                                <label  for="profile">Profile Picture</label> 
                                
                            <input type="hidden" value="<?php echo $update_admin['admin_profile'];?>" name="image_name">
							<input type="file" name="updateImage"
    						onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" >
                            </div>

                            <div class="form-group "> 
                                <img  id="image" class="img-rounded" alt="your image" width="100" height="100" src="admin_images/<?php echo $update_admin['admin_profile']?>" />
                            </div>

                          	
                			
                            <div class="form-group">
                                
                                <button type="button" class="btn btn-primary btn-md"    data-toggle="modal" data-target="#<?php echo $update_admin["admin_id"]; ?>"  >Update Your Account</button>
                            </div>
                         </div>

                           
                         <div class="modal fade" id="<?php echo $update_admin['admin_id']?>" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">Confirm Update</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                      <div class="col-lg-12" >
                                     
                                        <p>Are you sure you want to update your account ?</p>
                                        <div>
                                            
                                            <input type="hidden" value ="<?php echo $update_admin['admin_id']?>" name="hidden_admin_id" />
                                            <button type="submit" id="update" class="btn btn-primary btn-lg" name="update">Yes</button>
                                            <button type="button" class="btn btn-danger btn-lg" data-dismiss="modal">No</button>
                                            </form>
                                        </div>  
                                        
                                    </div>
                                </div>
               
                   
                            </div>
                        </div>
                    </div>
            </div>


                       </div>	

                       <?php }?>
                        
                    </div> <!--class="col-lg-12" -->

                </div> <!--row" -->




               



            </div> <!--no name div -->
        </div>
        <!-- /#page-content-wrapper -->



    <?php include('footer.php');?>
	
	<?php
	}else{
		redirect_to('dashboard.php');
	}
?>	