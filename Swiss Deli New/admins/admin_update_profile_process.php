<?php 

  include('includes/session.php');
   include('includes/connection.php');
  include('includes/functions.php');
  
?>

<?php 

	if(!isset($_POST['update'])){

		redirect_to('dashboard.php');

	}else{



				$admin = find_admin_by_id($_POST['hidden_admin_id']);

				if(!$admin){

					redirect_to('dashboard.php');
				}else{

					if($_POST['gender'] == 'male'){
							$gender = 'male';
					}else if($_POST['gender'] == 'female'){
						$gender = 'female';
					}else{
						$gender = '';
					}
					
				

					$admin_id = $_POST['hidden_admin_id'] ;
					$surname = $_POST['surname'] ;
					$firstname = $_POST['firstname'] ;
					$middlename = $_POST['middlename'] ;
					$birthdate = $_POST['birthdate'] ;
					$gender = $_POST['gender'] ;
					$house_num = $_POST['house_num'] ;
					$street = $_POST['street'] ;
					$village = $_POST['village'] ;
					$city = $_POST['city'];
					$zipcode = $_POST['zipcode'] ;
					$role = $_POST['role'] ;
					$username = $_POST['username'];
					$password = $_POST['password'];
					$confirm_password = $_POST['confirm_password'];
					$email = $_POST['email'] ;
					$tel = $_POST['tel'] ;
					$cell = $_POST['cell'];


				
				if (empty($_FILES['updateImage']['name'])){
					//no value
					  $admin_profile = $_POST['image_name'];
				}else{
					  //$update_image = $_FILES['updateImage']['name'];

					  $admin_profile = $_FILES['updateImage']['name'];
					  $admin_profile_tmp = $_FILES['updateImage']['tmp_name'];

		              move_uploaded_file($admin_profile_tmp, "admin_images/$admin_profile");
				}	


				if($password != $confirm_password){
					 $_SESSION["message"] = "password and and confirm password doesnt match. Admin update failed.";
    				 redirect_to('dashboard.php');
				
					}

				$update_query = "UPDATE admintbl SET ";
				$update_query .= "admin_surname = '{$surname}', admin_firstname = '{$firstname}', admin_middlename='{$middlename}', ";
				$update_query .= "birthdate = '{$birthdate}', gender = '{$gender}', ";
				$update_query .= "address_house_num = '{$house_num}', address_street= '{$street}', address_village = '{$village}', address_city = '{$city}', address_zipcode ='{$zipcode}', ";
				$update_query .= "role = '{$role}', username = '{$username}', password ='{$password}', email = '{$email}', admin_tel ='{$tel}', ";
				$update_query .= "admin_cell = '{$cell}', admin_profile = '{$admin_profile}' ";
				$update_query .= "WHERE admin_id = '{$admin_id}' LIMIT 1";


				//echo $update_query ;

				
				$run_admin = mysqli_query($connection,$update_query) or die(mysqli_error($connection));

				if ($run_admin && mysqli_affected_rows($connection) == 1) {
					// Success
					$_SESSION["message"] = "Admin updated.";
					redirect_to('dashboard.php');
				} else {
					//Failure
					$_SESSION["massage"] = "Admin update failed.";
					redirect_to('dashboard.php');

			}	

			
				}

	}
?>