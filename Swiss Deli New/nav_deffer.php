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
        <a class="navbar-brand" href="index.php"><h1>Swiss Deli <span class="subhead">Inc</span></h1></a>
      </div><!-- navbar-header -->
      <div class="collapse navbar-collapse" id="collapse">
        <ul class="nav navbar-nav navbar-right">
          <li><a href="index.php">Home</a></li>
          <!--<li><a href="#about">About</a></li> -->
          <li><a href="#products">Products</a></li>

           <?php if(isset($_SESSION['username'])){?>
            <li><a href="customer_account.php?customer_account=customer_account">Hello !! <?php echo $_SESSION['username']; ?></a></li>
             <li><a href="logout.php">Logout</a></li>
          <?php }else{ ?>
            <li><a href="#" data-toggle="modal" data-target="#login"> Login</a></li>
            <li><a href="#" data-toggle="modal" data-target="#signup">Sign Up</a></li>
          <?php } ?>

        </ul>        
      </div><!-- collapse navbar-collapse -->
    </div><!-- container -->
  </nav>  <!-- navigation -->





  <!--start login and signup -->

  <!-- login modal-->
                <div class="modal fade" id="login" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:">
                    <div class="modal-dialog" role="document" id="#myModal3">
                        <div class="modal-content ">
                            <div class="modal-header">

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><div class="modal_close_circle">&times;</div></span></button>


                                <h3 class="modal-title text-primary text-center" id="modalLabel">Login Credentials</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-12" >
                                        
                                    <form  method="post" action="index.php" enctype="multipart/form-data" id="uploadForm">

                                     <table cellpadding="20px" style="width:100%" >
                                      <col width="22%">
                                      <col width="73%"> 
                                      <tr>
                                        <td>Username:</td>
                                        <td><input type="text" name="emailorusername" placeholder="Username" required></td>
                                      </tr>
                                      <tr>
                                        <td>Password:</td>
                                        <td><input type="password" name="password" placeholder="Password" required></td>
                                      </tr>
                                    </table>

                                          
                                       
                                       
                                    </div>
                                </div>
                   
                            </div>
                            <div class="modal_footer">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="prime modal_close_button" name="login">Login</button>
                          </div>
                          </form> <!-- login -->
                        </div>
                    </div>
            </div><!-- /login modal-->




         <!-- sign up modal-->
                <div class="modal fade" id="signup" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:">
                    <div class="modal-dialog" role="document" id="#myModal4">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><div class="modal_close_circle">&times;</div></span></button>
                                <h3 class="modal-title text-primary text-center" id="modalLabel">Sign Up Now !!</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                      <div class="col-lg-12" >
                                        
                                      <form  method="post" action="index.php" enctype="multipart/form-data" >

                                          <div class="pull-left col-lg-6">
                                              <table cellpadding="20px" style="width:100%">
                                                <col width="31%">
                                                <col width="69%"> 
                                                <tr>
                                                  <td>First Name:</td>
                                                  <td>
                                                  <input type="text"  name="firstname" placeholder="First Name" onkeypress = "return lettersonly(event)"  required >
                                                 </td>
                                                </tr>
                                                <tr>
                                                  <td>Last Name:</td>
                                                  <td><input type="text" name="surname" placeholder="Last Name" onkeypress = "return lettersonly(event)"  required ></td>
                                                </tr>
                                             
                                                <tr>
                                                  <td>Birthdate:</td>
                                                  <td><input type="date" class="form-control" id="birthdate"  name="birthdate" value="" ></td>
                                                </tr>
                                                <tr>
                                                  <td>Gender:</td>
                                                  <td> <select class="form-control" required="required" name="gender">
                                                                                <option value="male">Male</option>
                                                                                <option value="female">Female</option>
                                                      </select></td>
                                                </tr>


                                                <tr>
                                                  <td>Address:</td>
                                                  <td><input type="text"  placeholder="Address" name="address"></td>
                                                </tr>

                                                <tr>
                                                  <td>Email:</td>
                                                  <td><input type="text" name="email" placeholder="Email Address" required></td>
                                                </tr>
                                                
                                              </table>
                                      </div><!--pull left -->


                                                      <div class="pull-right col-lg-6">
                                              <table cellpadding="20px" style="width:100%">
                                                <col width="40%">
                                                <col width="60%"> 
                                                <tr>
                                                  <td>Username:</td>
                                                  <td>
                                                  <input type="text"  name="username" placeholder="Username"  required >
                                                 </td>
                                                </tr>
                                                <tr>
                                                  <td>Password:</td>
                                                  <td><input type="password" name="password" placeholder="Password"  required ></td>
                                                </tr>
                                                    
                                                <tr>
                                                   <td>Confirm Password:</td>
                                                  <td><input type="password" name="confirm_password" placeholder="Confirm Password"  onfocusout = "passwordconfirm('password','confirm_password')"   required ></td>
                                                </tr>
                                                <tr>
                                                  <td>Telephone Number:</td>
                                                  <td><input type="text" name="tel_no" placeholder="Telephone Number" onkeypress = "return numbersonly(event)"  required ></td>
                                                </tr>


                                                <tr>
                                                  <td>Celphone Number:</td>
                                                  <td><input type="text" name="cel_no" placeholder="Celphone Number" onkeypress = "return numbersonly(event)"  required ></td>
                                                </tr>

                                               
                                                
                                              </table>
                                      </div><!--pull right
                                              -->
                                 </div><!--col 12 sign up -->

                                  
                                        
                                    
                                       
                                    </div> <!--row sign up -->
                                </div>
                                 <div class="modal_footer">
                              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="submit" class="prime modal_close_button" name="signup">Sign Up</button>
                             </div>
                            </form> 
                            </div>


                        </div>
                    </div>
            </div><!-- /sign up modal-->     



<!--end login and signup -->









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
                          echo "<script>window.open('index.php','_self');</script>";
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
        echo "<script>window.open('shop.php','_self')</script>";

    }else{
      echo "<script>alert('username and password are incorect');</script>";
    }

  } // 
?>


