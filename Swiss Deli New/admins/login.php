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
		body{
			background: url("img/Gourmet-Thumb.jpg") no-repeat center center fixed;
			background-size: cover;
	font-size: 16px;
	font-family: 'Lato', sans-serif;
	font-weight: 300;
	margin: 0;
	color: black;
		}


		.container{
			
			
			width: 100%;
			
			
		}


		.form{
			position: relative;
			background: rgba(255,255,255,0.5);
			margin: auto;
			bottom: -170px;
			width: 500px;
			height: 250px;
			box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
		}


		.table input[type="text"], .table input[type="password"] {
      width: 100%;
      height: 30px;
      border-radius: 5px;
      border: 1px solid gray;
      padding-left: 10px;
      padding-right: 10px;
    }

    .modal-body td{
      padding: 5px;
    }

 
	</style>
	
</head>
<body>

	<div class="container">


	<div class="form">
			<br />
			<h1 class="text-center">Swiss Deli&nbsp;<small style="color:rgba(0,0,0,0.6)">Administrator Login</small></h1>

				<div class="col-md-10 col-md-offset-1">
							<table cellpadding="20px" style="width:100%" class="table">
							<col width="22%">
							<col width="73%">	
							
						<form class="form col-md-12 center-block" method="POST" action="login.php" enctype="multipart/form-data">
							<tr>
								<td>Username:</td>
								<td><input type="text" name="emailorusername" placeholder="Username" required></td>
							</tr>
							<tr>
								<td>Password:</td>
								<td><input type="password" name="password" placeholder="Password" required></td>
							</tr>

							<tr>
								<td ></td>
								<td><input type="submit" value="Login" name="login" class="btn-block btn-md btn-primary"></td>
							</tr>

						</form>	
						</table>

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