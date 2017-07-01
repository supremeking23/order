        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    
    <?php include('header.php');?>

    <?php include('sidebar.php');?>


    <?php $get_customers = get_all_approve_customers();?>




          <!-- Page heade -->
        <?php include('page_header.php');?>

        <div class="container">
            <h1 style="">Customer Section</h1>   
        </div>

           <!-- add customer -->
        <div class="table_nav">
             <a href="#add_customer" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="Add Customer" title="" id="">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>&nbsp;Add Customer            
            </a>
            &nbsp; &nbsp;
             <a href="pendingCustomer.php?customers=customers&pendingCustomers=pendingCustomer" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="Pending Customer" title="" id="">
                &nbsp;Pending Confirmation            
            </a>

            &nbsp; &nbsp;
            <a href="#pdf_customer" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="generate summary list report of customers" title="" id="">
                &nbsp;Generate Report           
            </a>

            <!-- pdf members -->
            <div class="modal fade" id="pdf_customer" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px;">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">CUSTOMER REPORT</h3>

                            </div>
                            <div class="modal-body ">
                                <center>

                                <form action="generate_customer_pdf.php" method="POST">
                                   <br><h4>Select below to filter the reports information to be print:</h4><br><br>
                                        <b>Order by Name:</b> <select name="orderby">
                                          <option value="asc">Accending</option>
                                          <option value="desc">Decending</option>
                                          
                                        </select>
                                         <br /><br />
                                        <b>From:</b> <input type="date" name="from">
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <b>To:</b> <input type="date" name="to">
                                       <br><br>
                                        
                                       
                                
                            </div>

                            <div class="modal-footer">
                                
                                <button type="submit" name="customer_summary" class="btn btn-warning" style="width:100%">Generate PDF</button>  

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



                        <!--<div><a href="#menu-toggle" class="btn btn-primary btn-sm" id="menu-toggle"><i class="material-icon">Toggle Menu</i></a></div>-->
                        

                            

             <div class="" style="margin-left:180px;">
              
                <!--<a href="pendingCustomer.php"  class="btn btn-md btn-primary class "  data-tooltip ="tooltip" title="View Pending Confirmation" data-placement ="bottom"  >Pending Confirmation</a> -->
             </div>



               <!-- add customer modal stanby -->
                <div class="modal fade" id="add_customer" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">Add Customer</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-12" >
                                         <form  method="post" action="customers.php" enctype="multipart/form-data" id="uploadForm">
                                       <table class="col-lg-8 space register" >
                                            <tr>
                                                <td><label for="fname">First Name</label></td>
                                                <td><input type="text" class="form-control" name="fname" onkeypress = "return lettersonly(event)" required></td>
                                            </tr>

                                            <tr>
                                               <td><label for="lname">Last Name</label></td>
                                                <td><input type="text" class="form-control" name="lname" onkeypress = "return lettersonly(event)" required></td>
                                            </tr>

                                            <tr>
                                                <td><label for="bdate">Birthdate</label></td>
                                                <td><input type="date" name="bdate" class="form-control"></td>
                                            </tr>


                                            <tr>
                                                <td><label for="gender">Gender</label></td>
                                                <td> <select class="form-control" required="required" name="gender">
                                                      <option value="male">Male</option>
                                                      <option value="female">Female</option>
                                                  </select>
                                              </td>
                                            </tr>

                                            <tr>
                                                <td ><label for="address">Address</label></td>
                                                <td> <input type="text" class="form-control" name="address"></td>
                                            </tr>

                                             <tr>
                                                <td ><label for="email">Email</label></td>
                                                <td>  <input type="text" class="form-control" name="email"></td>
                                            </tr>

                                             <tr>
                                                <td ><label for="username">Username</label></td>
                                                <td><input type="text" class="form-control" name="username"></td>
                                            </tr>

                                             <tr>
                                                <td ><label for="pro_quantity">Password</label></td>
                                                <td><input type="password" class="form-control" name="password"></td>
                                            </tr>

                                               <tr>
                                                <td ><label for="confirm_password">Confirm Password</label></td>
                                                <td> <input type="password" class="form-control" name="confirm_password" onfocusout = "passwordconfirm('password','confirm_password')"  required></td>
                                            </tr>

                                                <tr>
                                                    <td><label for="tel_no">Telephone #</label></td>
                                                    <td><input type="text" class="form-control" name="tel_no" onkeypress = "return numbersonly(event)"  required ></td>
                                                </tr>

                                                 <tr>
                                                    <td><label for="cel_no">Celphone #</label></td>
                                                    <td><input type="text" class="form-control" name="cel_no" onkeypress = "return numbersonly(event)"  required ></td>
                                                </tr>

                                            <tr>
                                                <td></td>
                                                <td><input type="submit" name="add_customer" class="btn btn-primary btn-md btn-block" value="Add Customer"></td>
                                            </tr>
                                       </table>
                                        
                                       </form> 
                                                        
                                    </div>  
                                        
                                    </div>
                                </div>
               
                   
                            </div>
                        </div>
                    </div>  <!-- add customer modal stanby -->




            <!-- add customer query -->
            
             <?php 
                if(isset($_POST["add_customer"])){
                     $surname = $_POST['lname'];
                      $firstname = $_POST['fname'];
                    
                      $birthdate = $_POST['bdate'];

                      
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
                      $tel = $_POST['tel_no'];
                      $cell = $_POST['cel_no'];

                      
                         // $admin_profile = $_FILES['a_image']['name'];
                          //$admin_profile_tmp = $_FILES['a_image']['tmp_name'];

                          //move_uploaded_file($admin_profile_tmp, "admin_images/$admin_profile");

                      //$date_registered = date("m-d-Y H:i:s"); 


                      if($password != $confirm_pass){
                          echo "<script>alert('password and confirm password doesnt match')</script>";
                          exit;
                      }

                      $insert_customer = "INSERT INTO customertbl (surname,firstname,birthdate,gender,customer_address,username,password,email,telephone,cellphone,isApproved)
                                    VALUES ('$surname','$firstname','$birthdate','$gender','$address','$username','$password','$email','$tel','$cell','0')";

                      $run_customer = mysqli_query($connection,$insert_customer) or die(mysqli_error($connection));
                      
                      if($run_customer){
                        echo "<script>alert('Your registration is being process. Please submit your requirements to Swiss Deli Philippines (NCR Branch)');</script>";
                        echo "<script>window.open('customers.php?customers=customers','_self');</script>";
                      }   

                  

                }

            ?>                 
            





<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">


        <thead>
            <tr>
                
                <th>Full Name</th>
                <th>Cellphone Number</th>
                <th>Date Approved</th>
                <th>Information</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <tbody>
         <?php while($customer = mysqli_fetch_assoc($get_customers)) {?>
            <tr>    
                
                <td><?php echo htmlentities($customer["firstname"] . '  ' . $customer["surname"] ); ?></td>
                
                <td><?php echo $customer['cellphone']?></td>
                <?php $date =date_create($customer['date_registered']);
                         

                         $approved_date= date_format($date,"F d Y g:i:s A");
                ?>
                <td><?php echo $approved_date;?></td>
                <td><button  type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#<?php echo $customer["customer_id"]; ?>">Information</button></td>
                   
                <td>
                    <button type="button" class="btn btn-sm btn-warning btn-rounded " data-toggle="modal" data-target="#update<?php echo $customer['customer_id']?>" data-tooltip="tooltip" data-placement="left" data-original-title="update customer information"><i class="fa fa-wrench"></i></button>
                     <a href="customer_delete.php?delete_id=<?php echo $customer["customer_id"];?>" onclick="return confirm('Are you sure you want to delete this record?');" class="btn btn-danger btn-rounded btn-sm"  data-tooltip="tooltip" data-placement="top" data-original-title="Delete Member. Move to archieve section" ><i class="fa fa-trash "></i></a>
                </td>
      

                        
               
            <!-- update customer details -->
                <div class="modal fade" id="update<?php echo $customer['customer_id']?>" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">Update Information</h3>

                            </div>


                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-6 pull-left" >
                              
                              <form action="update_customer.php" method="POST">          
                                        <div class="form-group row">
                                          <label for="fname" class="col-sm-5 col-form-label"><b>First Name:</b></label>
                                          <div class="col-sm-7">
                                            <!-- hidden id -->

                                            <input type="hidden" name="hidden_id" value="<?php echo $customer['customer_id']?>">

                                            <input type="text" class="form-control" name="fname" id="fname" value ="<?php echo $customer['firstname'];?>" />
                                          </div>
                                        </div><!-- firstname -->  


                                        <div class="form-group row">
                                          <label for="lname" class="col-sm-5 col-form-label"><b>Last Name:</b></label>
                                          <div class="col-sm-7">
                                            
                                            <input type="text" class="form-control" name="lname" id="lname" value ="<?php echo $customer['surname'];?>" />
                                          </div>
                                        </div><!-- surname -->  


                                        <div class="form-group row">
                                          <label for="gender" class="col-sm-5 col-form-label"><b>Gender:</b></label>
                                          <div class="col-sm-7">
                                                    <select class="form-control" name="gender">
                                                        <option value="male" <?php if($customer['gender']=="male"){echo "selected"; };?>>Male</option>
                                                        <option value="female" <?php if($customer['gender']=="female"){echo "selected"; };?>>Female</option>
                                                    </select>
                                          </div>
                                        </div><!-- gender -->  


                                         <div class="form-group row">
                                              <label for="address" class="col-sm-5 col-form-label"><b>Address:</b></label>
                                              <div class="col-sm-7">
                                                
                                                <input type="text" class="form-control" name="address" id="lname" value ="<?php echo $customer['customer_address'];?>" />
                                              </div>
                                        </div><!-- address -->  



                                        <div class="form-group row">
                                          <label for="cell" class="col-sm-5 col-form-label"><b>Cellphone#:</b></label>
                                          <div class="col-sm-7">
                                           <input type="text" class="form-control" name="cell" id="cell" value ="<?php echo $customer['cellphone'];?>" />
                                          </div>
                                     
                                    </div><!-- cell -->



                                     <div class="form-group row">
                                          <label for="tel" class="col-sm-5 col-form-label"><b>Telephone:</b></label>
                                          <div class="col-sm-7">
                                            <input type="text" class="form-control" name="tel" id="cell" value ="<?php echo $customer['telephone'];?>" />
                                          </div>
                                     
                                    </div><!-- tel -->




                                        <!--<p><button  type="button" data-target="#approve" data-toggle="modal" class="btn btn-warning btn-sm">Approve</button>&nbsp;<button class="btn btn-danger btn-sm" type="button" name="decline">Decline</button></p> -->
                                    </div>

                                <div class="col-lg-6 pull-right">
                                     
                                      <div class="form-group row">
                                          <label for="email" class="col-sm-5 col-form-label"><b>Email:</b></label>
                                          <div class="col-sm-7">
                                            
                                            <input type="text" class="form-control" name="email" id="email" value ="<?php echo $customer['email'];?>" />
                                          </div>
                                        </div><!-- email -->


                                       <div class="form-group row">
                                          <label for="username" class="col-sm-5 col-form-label"><b>Username:</b></label>
                                          <div class="col-sm-7">
                                            
                                            <input type="text" class="form-control" name="username" id="username" value ="<?php echo $customer['username'];?>" />
                                          </div>
                                        </div><!-- username -->
                                        


                                       <div class="form-group row">
                                          <label for="password" class="col-sm-5 col-form-label"><b>Password:</b></label>
                                          <div class="col-sm-7">
                                            
                                            <input type="password" class="form-control" name="password" id="password" value ="<?php echo $customer['password'];?>" />
                                          </div>
                                        </div><!-- password -->



                                        <div class="form-group row">
                                          <label for="confirm_password" class="col-sm-5 col-form-label"><b>Confirm Password:</b></label>
                                          <div class="col-sm-7">
                                            
                                            <input type="password" class="form-control" name="confirm_password" id="confirm_password" value ="<?php echo $customer['password'];?>" />
                                          </div>
                                        </div><!-- confirm password -->  



                                </div> <!-- right float -->

                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit" name="update_customer" class="btn btn-warning  button-shadow">Update</button>
                                    </div>
                                </div>
               
                          </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>  <!-- update customer details -->



            <!-- view customer details -->
                <div class="modal fade" id="<?php echo $customer["customer_id"];?>" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">Customer Information</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-3 col-md-offset-1 pull-left" >

                                        <?php if(empty($customer['profile'])){ ?>
                                        <p><img src="images/guest2.jpg" class="img-circle" width="110px"></p>
                                        <?php }else{?> 
                                        <p><img src="../images/<?php echo $customer['profile']; ?>" class="img-circle" width="110px" height="110px"></p>
                                          <!--resume  -->
                                        <?php }?>

                                        <div class="form-group row">
                                          <a href="customer_delete.php?delete_id=<?php echo $customer["customer_id"];?>" class="btn btn-danger btn-block"  data-tooltip="tooltip" data-placement="top" data-original-title="Delete Member. Move to archieve section" ><i class="fa fa-trash "></i></a>
                                        </div>

                                        
                                        

                                        <!--<p><button  type="button" data-target="#approve" data-toggle="modal" class="btn btn-warning btn-sm">Approve</button>&nbsp;<button class="btn btn-danger btn-sm" type="button" name="decline">Decline</button></p> -->
                                    </div>

                                    <div class="col-lg-8 pull-right">
                                     
                                      <div class="form-group row">
                                          <label for="fullname" class="col-sm-2 col-form-label"><b>FullName:</b></label>
                                          <div class="col-sm-10">
                                            <?php echo $customer['firstname'];?> &nbsp; <?php echo $customer['surname'];?>
                                          </div>
                                        </div><!-- name -->

                                      <div class="form-group row">
                                          <label for="age" class="col-sm-2 col-form-label"><b>Age:</b></label>
                                          <div class="col-sm-10">
                                            <?php echo $age = floor((time() - strtotime($customer['birthdate'])) / 31556926);?>
                                          </div>
                                        
                                    </div><!-- age -->

                                     <div class="form-group row">
                                          <label for="address" class="col-sm-2 col-form-label"><b>Address:</b></label>
                                          <div class="col-sm-10">
                                          <?php echo $customer['customer_address'];?>
                                          </div>
                                       
                                    </div><!-- address -->



                                     <div class="form-group row">
                                          <label for="gender" class="col-sm-2 col-form-label"><b>Gender:</b></label>
                                          <div class="col-sm-10">
                                          <?php echo $customer['gender'];?>
                                          </div>
                                       
                                    </div><!-- gender -->





                                     <div class="form-group row">
                                          <label for="email" class="col-sm-2 col-form-label"><b>Email:</b></label>
                                          <div class="col-sm-10">
                                            <?php echo $customer['email']?>
                                          </div>
                                     
                                    </div><!-- email -->


                                     <div class="form-group row">
                                          <label for="username" class="col-sm-2 col-form-label"><b>Username:</b></label>
                                          <div class="col-sm-10">
                                            <?php echo $customer['username']?>
                                          </div>
                                     
                                    </div><!-- email -->


                                     <div class="form-group row">
                                          <label for="cell" class="col-sm-2 col-form-label"><b>Cellphone#:</b></label>
                                          <div class="col-sm-10">
                                            <?php echo $customer['cellphone']?>
                                          </div>
                                     
                                    </div><!-- cell -->



                                     <div class="form-group row">
                                          <label for="tel" class="col-sm-2 col-form-label"><b>Telephone:</b></label>
                                          <div class="col-sm-10">
                                            <?php echo $customer['telephone']?>
                                          </div>
                                     
                                    </div><!-- cel -->

                                      <div class="form-group row">
                                          <label for="date_registered" class="col-sm-2 col-form-label"><b>Date Approved:</b></label>
                                          <div class="col-sm-10">
                                            <?php $date =date_create($customer['date_registered']);
                                                    echo date_format($date,"F d Y g:i:s A");
                                            ?>
                                          </div>
                                     
                                    </div><!-- date registered -->      
                                    

                                </div>
               
                   
                            </div>
                        </div>
                    </div>

                </div>
            </div>  <!-- view customer details -->
           

            <!---Approve modal -->
             
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