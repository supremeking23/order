<?php 

	include('includes/session.php');
	include('includes/connection.php');
	include('includes/functions.php');
	
?>

<html>
<head>
	<title>Admin | Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<style type="text/css">
		.modal-footer {   border-top: 0px; }
		.modal-content{background: skyblue}
	</style>
</head>
<body>

	<div id="loginModal" class="modal show" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content">
      <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h1 class="text-center">Login</h1>
      </div>
      <div class="modal-body">
          <form class="form col-md-12 center-block" method="POST" action="login.php" enctype="multipart/form-data">
            <div class="form-group">
              <input type="text" class="form-control input-lg" placeholder="Enter Email or Username" name="emailorusername">
            </div>
            <div class="form-group">
              <input type="password" class="form-control input-lg" placeholder="Password" name="password">
            </div>
            <div class="form-group">
              <button class="btn btn-primary btn-lg btn-block" type="submit" name="login">Login</button>
             
            </div>
          </form>
      </div>
      <div class="modal-footer">
        
		  </div>	
      </div>
  </div>
  </div>
</div>
		

</body>
</html>


<?php 
	if(isset($_POST['login'])){

			$username = $_POST["emailorusername"];
			$password = $_POST["password"];
			
			$found_admin = attempt_login($username,$password); 


			if ($found_admin) {
				//Success
				// Mark user as logged in
				$_SESSION["admin_id"] = $found_admin["admin_id"];
				$_SESSION["username"] = $found_admin["username"];
				$_SESSION["email"] = $found_admin["email"];
				$_SESSION["role"] = $found_admin["role"];
				//$_SESSION['currentPosition'] = 'dashboard';
				redirect_to("dashboard.php?dashboard=dashboard");
				//echo "<script>window.open('index.php','_self')</script>";

		}else{
			echo "<script>alert('username and password are incorect');</script>";
		}
	}
?>