<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Swiss Deli</title>
  <link rel="stylesheet" type="text/css" href="font/font-awesome.min.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" type="text/css" href="css/design.css">
  <link rel="stylesheet" type="text/css" href="css/product.css">

  <script src="js/prefixfree.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<header>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="#featured"><h1>Swiss Deli <span class="subhead">Inc</span></h1></a>
      </div><!-- navbar-header -->
      <div class="collapse navbar-collapse" id="collapse">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="#featured">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#products">Products</a></li>

           <?php if(isset($_SESSION['username'])){?>
            <li><a href="customer_account.php">Hello !! <?php echo $_SESSION['username']; ?></a></li>
             <li><a href="logout.php">Logout</a></li>
          <?php }else{ ?>
            <li><a href="#" data-toggle="modal" data-target="#login"> Login</a></li>
            <li><a href="#" data-toggle="modal" data-target="#signup">Sign Up</a></li>
          <?php } ?>

        </ul>        
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>  <!-- navigation -->





  <!-- login modal-->
                <div class="modal fade" id="login" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">Login Credentials</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-12" >
                                        
                                    <form  method="post" action="index.php" enctype="multipart/form-data" id="uploadForm">

                                        <div class="input-group input-group-sm">
                                                  <span class="input-group-addon">Email</span>
                                                  <input type="text" class="form-control" name="emailorusername">
                                              </div><br>


                                              <div class="input-group input-group-sm">
                                                  <span class="input-group-addon">Password</span>
                                                  <input type="password" class="form-control" name="password">
                                              </div><br>

                                              <p><input id="btnlogin" type="submit" class="btn prime btn-block block" name="login" value="Login">
                                                <button id="btnlogout" data-dismiss="modal" aria-label="Close" type="button" class="btn negate btn-block block">Cancel</button>
                                                </p>
                                        
                                       </form> 
                                       
                                    </div>
                                </div>
                   
                            </div>
                        </div>
                    </div>
            </div><!-- /login modal-->




         <!-- sign up modal-->
                <div class="modal fade" id="signup" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h3 class="modal-title text-primary" id="modalLabel">Sign Up now !!</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-12" >
                                        
                                    <form  method="post" action="index.php" enctype="multipart/form-data" >


                                      <div class="col-md-6">
                                              <div class="input-group input-group-sm">
                                                  <span class="input-group-addon">First Name</span>
                                                  <input type="text" class="form-control" name="firstname">
                                              </div><br>

                                         <div class="input-group input-group-sm">
                                                  <span class="input-group-addon">Surname</span>
                                                  <input type="text" class="form-control" name="surname">
                                              </div><br>

                                           <div class="input-group input-group-sm">
                                                  <span class="input-group-addon">birthdate</span>
                                                   <input type="date" class="form-control" id="birthdate"  name="birthdate" value="" >
                                              </div><br>          

                                          <div class="input-group input-group-sm">
                                                  <span class="input-group-addon">Gender</span>
                                                  
                                                  <select class="form-control" required="required" name="gender">
                                                      <option value="male">Male</option>
                                                      <option value="female">Female</option>
                                                  </select>
                                              </div><br>

                                                 
                                              <div class="input-group input-group-sm">
                                                  <span class="input-group-addon">address</span>
                                                  <input type="text" class="form-control" name="address">
                                              </div><br>


                                               <div class="input-group input-group-sm">
                                                  <span class="input-group-addon">Email</span>
                                                  <input type="text" class="form-control" name="email">
                                              </div><br>

                                      </div>



                                      <div class="col-md-6">
                                              <div class="input-group input-group-sm">
                                                  <span class="input-group-addon">Username</span>
                                                  <input type="text" class="form-control" name="username">
                                              </div><br>


                                              <div class="input-group input-group-sm">
                                                  <span class="input-group-addon">Password</span>
                                                  <input type="password" class="form-control" name="password">
                                              </div><br>


                                                <div class="input-group input-group-sm">
                                                  <span class="input-group-addon">Confirm Password</span>
                                                  <input type="password" class="form-control" name="confirm_password">
                                              </div><br>


                                              <div class="input-group input-group-sm">
                                                  <span class="input-group-addon">Telephone Number</span>
                                                  <input type="text" class="form-control" name="tel_no">
                                              </div><br>

                                              <div class="input-group input-group-sm">
                                                  <span class="input-group-addon">Celphone Number</span>
                                                  <input type="text" class="form-control" name="cel_no">
                                              </div><br>
                                      </div>


                                              <p><input id="btnlogin" type="submit" class="btn prime btn-block" name="signup" value="Sign Up">
                                                <button id="btnlogout" data-dismiss="modal" aria-label="Close" type="button" class="btn negate btn-block block">Cancel</button>
                                                </p>
                                        
                                       </form> 
                                       
                                    </div>
                                </div>
                   
                            </div>
                        </div>
                    </div>
            </div><!-- /sign up modal-->     









         <?php 
                if(isset($_POST["signup"])){
                     $surname = $_POST['surname'];
                      $firstname = $_POST['firstname'];
                    
                      $birthdate = $_POST['birthdate'];

                      
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
                        echo "<script>window.open('index.php','_self');</script>";
                      }   

                  

                }

            ?>         

            <?php 
  if(isset($_POST["login"])) {
    //Process the form
    $username = $_POST["emailorusername"];
    $password = $_POST["password"];

    $found_customer = attempt_login_customer($username,$password); 


      if ($found_customer) {
        //Success
        // Mark user as logged in
        $_SESSION["customer_id"] = $found_customer["customer_id"];
        $_SESSION["username"] = $found_customer["username"];
        $_SESSION["email"] = $found_customer["email"];
        //redirect_to("index.php");
        echo "<script>window.open('index.php','_self')</script>";

    }else{
      echo "<script>alert('username and password are incorect');</script>";
    }

  } // 
?>


