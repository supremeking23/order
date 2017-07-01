<?php 
	
	$errors = array();


	//redirect to new page
	function redirect_to($new_location){
		header("Location: " . $new_location);
		exit;
	}



		// prepared statement
	function mysql_prep($string){
		global $connection;
		$escaped_string = mysqli_real_escape_string($connection,$string);
		return $escaped_string;
	}




	//confirm query
	function confirm_query($result_set){
		if (!$result_set) {
			die("database query failed");
		}
	} 


	//not use
	function has_presence($value){
	return isset($value) && $value !=="";
	}
	

	//loop has presence  not use
	function validate_presences($required_fields){
		global $errors;
		foreach ($required_fields as $field) {
			$value = trim($_POST[$field]);
			if(!has_presence($value)) {
				$errors[$field] = fieldname_as_text($field) . " can't be black";
			}
		}
	}


	//login admin ... not use customer side
	function attempt_login($username,$password){
	global $connection;

		$safe_username = mysqli_real_escape_string($connection, $username);
		$safe_password = mysqli_real_escape_string($connection, $password);
		

		$query = "SELECT * ";
		$query .= "FROM admintbl ";
		$query .= "WHERE (username ='{$safe_username}' OR email ='{$safe_username}' )  ";
		$query .= "AND password = '{$safe_password}' ";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return null;
		}
}


//login customer
function attempt_login_customer($username,$password){
	global $connection;

		$safe_username = mysqli_real_escape_string($connection, $username);
		$safe_password = mysqli_real_escape_string($connection, $password);
		

		$query = "SELECT * ";
		$query .= "FROM customertbl ";
		$query .= "WHERE (username ='{$safe_username}' OR email ='{$safe_username}' )  ";
		$query .= "AND password = '{$safe_password}' AND isApproved='1' AND isBin !='bin'";
		$query .= "LIMIT 1";
		$customer_set = mysqli_query($connection, $query);
		confirm_query($customer_set);
		if($customer = mysqli_fetch_assoc($customer_set)) {
			return $customer;
		} else {
			return null;
		}
}




//get all customer... not use in client side
function get_all_customers(){
	global $connection;

	$query ="SELECT * ";
		$query .= "FROM customertbl ";
		$customer_set = mysqli_query($connection, $query);
		confirm_query($customer_set);
		return $customer_set;


}


//get all admins ... not use in client side
function get_all_admins(){
	global $connection;

		$query ="SELECT * ";
		$query .= "FROM admintbl WHERE admin_bin !='bin'";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		return $admin_set;


}



//get all products... use in shops
function get_all_products(){
	global $connection;

		$query ="SELECT * ";
		$query .= "FROM producttbl WHERE product_bin !='bin' AND product_quantity != 0";
		$product_set = mysqli_query($connection, $query);
		confirm_query($product_set);
		return $product_set;
}



//product random in feature products
function get_all_products_random(){
	global $connection;

		$query ="SELECT * ";
		$query .= "FROM producttbl WHERE product_bin !='bin' AND product_quantity != 0 ORDER BY RAND() LIMIT 0,6 ";
		$product_set = mysqli_query($connection, $query);
		confirm_query($product_set);
		return $product_set;
}


//product info
function get_product_info_by_id($product_id){
	global $connection;

		$query ="SELECT * ";
		$query .= "FROM producttbl WHERE product_bin !='bin' AND product_id = '$product_id' AND product_quantity != 0 ";
		$product_set = mysqli_query($connection, $query);
		confirm_query($product_set);
		return $product_set;
}

// not use
function get_featured_products(){
	global $connection;

		$query ="SELECT * ";
		$query .= "FROM producttbl WHERE product_bin !='bin' ORDER BY RAND() LIMIT 0,4";
		$product_set = mysqli_query($connection, $query);
		confirm_query($product_set);
		return $product_set;
}



//not use
function get_all_category(){
	global $connection;

		$query ="SELECT * ";
		$query .= "FROM categorytbl ";
		$category_set = mysqli_query($connection, $query);
		confirm_query($category_set);
		return $category_set;
}


//not use
function get_all_pending_customers(){
	global $connection;

	$query ="SELECT * ";
		$query .= "FROM customertbl WHERE isApproved = 0";
		$customer_set = mysqli_query($connection, $query);
		confirm_query($customer_set);
		return $customer_set;


}

//not use
function find_category_by_products($category_id){

		global $connection;

		$safe_category_id = mysqli_real_escape_string($connection, $category_id);

		$query = "SELECT * ";
		$query .= "FROM categorytbl ";
		$query .= "WHERE category_id ={$safe_category_id} ";
		$query .= "";
		$category_set = mysqli_query($connection, $query);
		confirm_query($category_set);
		return $category_set;
}



//not use
function find_products_by_id($product_id){

		global $connection;

		$safe_product_id = mysqli_real_escape_string($connection, $product_id);

		$query = "SELECT * ";
		$query .= "FROM producttbl ";
		$query .= "WHERE product_id ={$safe_product_id} ";
		$query .= "";
		$product_set = mysqli_query($connection, $query);
		confirm_query($product_set);
		return $product_set;
}


////not use?
function find_customer_by_id($customer_id) {
		global $connection;

		$safe_customer_id = mysqli_real_escape_string($connection, $customer_id);

		$query = "SELECT * ";
		$query .= "FROM customertbl ";
		$query .= "WHERE customer_id ={$safe_customer_id} ";
		$query .= "";
		$customer_set = mysqli_query($connection, $query);
		confirm_query($customer_set);
		return $customer_set;

	}



//not use
function find_admin_by_id($admin_id) {
		global $connection;

		$safe_admin_id = mysqli_real_escape_string($connection, $admin_id);

		$query = "SELECT * ";
		$query .= "FROM admintbl ";
		$query .= "WHERE admin_id ={$safe_admin_id} ";
		$query .= "";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		return $admin_set;

	}

//not use
	function find_admin_by_id_main($admin_id) {
		global $connection;

		$safe_admin_id = mysqli_real_escape_string($connection, $admin_id);

		$query = "SELECT * ";
		$query .= "FROM admintbl ";
		$query .= "WHERE admin_id ={$safe_admin_id} ";
		$query .= "";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		return $admin_set;

	}




//not use
function find_order_deteails_by_customer_id($order_id){
	global $connection;

	  $query ="SELECT a.product_name,a.product_price,a.category_id,a.product_grams,b.quantity,b.order_id ";
		$query .= "FROM producttbl as a JOIN order_items as b ON(a.product_id = b.product_id) WHERE order_id = '$order_id' 	";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	
}


//not use
function get_total_amount($order_id){
		global $connection;

		$query ="SELECT * FROM";
		$query .= " ordertbl WHERE order_id = '$order_id'";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;

}


//will be use
function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }


//not use
function showPendingApproval(){
	global $connection;

	$query = "SELECT COUNT(isApproved) AS 'notApproved' FROM customertbl WHERE isApproved = 0";

	$customer_set = mysqli_query($connection,$query);

	return $customer_set;
}   





//show all notification for customer

function get_all_notification_by_customer_id($customer_id){
	global $connection;

	$query ="SELECT * FROM";
		$query .= " notificationtbl WHERE customer_id = '$customer_id' AND status = '' ORDER BY notify_id DESC";
		$noficaition_set = mysqli_query($connection, $query);
		confirm_query($noficaition_set);
		return $noficaition_set;

}

?>