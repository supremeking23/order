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
		global $connection;
		if (!$result_set) {
			die("database query failed: " .mysqli_error($connection));
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



	//login admin
	function attempt_login($username,$password){
	global $connection;

		$safe_username = mysqli_real_escape_string($connection, $username);
		$safe_password = mysqli_real_escape_string($connection, $password);
		

		$query = "SELECT * ";
		$query .= "FROM admintbl ";
		$query .= "WHERE (username ='{$safe_username}' OR email ='{$safe_username}' )  ";
		$query .= "AND password = '{$safe_password}' AND admin_bin != 'bin'";
		$query .= "LIMIT 1";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		if($admin = mysqli_fetch_assoc($admin_set)) {
			return $admin;
		} else {
			return null;
		}
}




//get customer  not use this function have a better one
function get_all_customers(){
	global $connection;

	$query ="SELECT * ";
		$query .= "FROM customertbl ";
		$customer_set = mysqli_query($connection, $query);
		confirm_query($customer_set);
		return $customer_set;


}


//get customer  not use this function have a better one
function get_all_admins(){
	global $connection;

		$query ="SELECT * ";
		$query .= "FROM admintbl WHERE admin_bin !='bin' ORDER BY admin_id ASC";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		return $admin_set;


}

function get_all_admins_except_main($admin_id_main){
	global $connection;

		$query ="SELECT * ";
		$query .= "FROM admintbl WHERE admin_bin !='bin' AND  admin_id != '$admin_id_main'  ORDER BY admin_id ASC";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		return $admin_set;


}



//get all product
function get_all_products(){
	global $connection;

		$query ="SELECT * ";
		$query .= "FROM producttbl WHERE product_bin !='bin' ORDER BY date_added DESC";
		$product_set = mysqli_query($connection, $query);
		confirm_query($product_set);
		return $product_set;
}



//get all category
function get_all_category(){
	global $connection;

		$query ="SELECT * ";
		$query .= "FROM categorytbl ";
		$category_set = mysqli_query($connection, $query);
		confirm_query($category_set);
		return $category_set;
}



//get all pending confirmation
function get_all_pending_customers(){
	global $connection;

	$query ="SELECT * ";
		$query .= "FROM customertbl WHERE isApproved = 0 ORDER BY customer_id DESC";
		$customer_set = mysqli_query($connection, $query);
		confirm_query($customer_set);
		return $customer_set;


}




// get all approve
function get_all_approve_customers(){
	global $connection;

	$query ="SELECT * ";
		$query .= "FROM customertbl WHERE isApproved = 1 AND isBin !='bin' ORDER BY customer_id DESC";
		$customer_set = mysqli_query($connection, $query);
		confirm_query($customer_set);
		return $customer_set;


}



//get bin customer
function get_all_bin_customers(){
	global $connection;

	$query ="SELECT * ";
		$query .= "FROM customertbl WHERE isApproved = 1 AND isBin ='bin' ORDER BY customer_id DESC";
		$customer_set = mysqli_query($connection, $query);
		confirm_query($customer_set);
		return $customer_set;


}



//get bin admins
function get_all_bin_admins(){
			global $connection;

		$query ="SELECT * ";
		$query .= "FROM admintbl WHERE admin_bin ='bin' ORDER BY admin_id ASC";
		$admin_set = mysqli_query($connection, $query);
		confirm_query($admin_set);
		return $admin_set;

}



//get all bin products
function get_all_bin_products(){
	global $connection;

		$query ="SELECT * ";
		$query .= "FROM producttbl WHERE product_bin ='bin'";
		$product_set = mysqli_query($connection, $query);
		confirm_query($product_set);
		return $product_set;
}

	

//get all decline customer
function get_all_declined_customers(){
	global $connection;

	$query ="SELECT * ";
		$query .= "FROM customertbl WHERE isApproved = 2 AND isBin !='bin' ORDER BY customer_id DESC";
		$customer_set = mysqli_query($connection, $query);
		confirm_query($customer_set);
		return $customer_set;
}



//find category by products
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



//find product by id
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


//find customer by id
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



//find admin my id not use
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



//find admin main
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




//text limit
function limit_text($text, $limit) {
      if (str_word_count($text, 0) > $limit) {
          $words = str_word_count($text, 2);
          $pos = array_keys($words);
          $text = substr($text, 0, $pos[$limit]) . '...';
      }
      return $text;
    }



//age not use
function age($birthdate){
	//return $age = floor((time() - strtotime($birthdate) / 31556926));
	return $age = floor((time() - strtotime($birthdate)) / 31556926);
}    




//count pending approval customer
function showPendingApproval(){
	global $connection;

	$query = "SELECT COUNT(isApproved) AS 'notApproved' FROM customertbl WHERE isApproved = 0";

	$customer_set = mysqli_query($connection,$query);

	return $customer_set;
}


//count pending orders
function countPendingOrders(){
	global $connection;

	$query = "SELECT COUNT(status) AS 'notApproved' FROM ordertbl WHERE status = 'pending'";

	$order_set = mysqli_query($connection,$query);

	return $order_set;
}    


// join pending orders customertbl and ordertbl
function get_all_pending_orders(){
	global $connection;

		$query ="SELECT a.customer_id,a.firstname,a.surname,a.customer_address,b.order_id,b.total_price,b.date_ordered ";
		$query .= "FROM customertbl as a JOIN ordertbl as b ON(a.customer_id = b.customer_id) WHERE status = 'pending' ORDER BY order_id DESC";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;


}


//join approve orders customretbl and ordertbl
function get_all_approve_orders(){
	global $connection;

		$query ="SELECT a.customer_id,a.firstname,a.surname,a.customer_address,b.order_id,b.total_price,b.date_ordered,b.date_approved,b.date_delivered, b.general_amount ";
		$query .= "FROM customertbl as a JOIN ordertbl as b ON(a.customer_id = b.customer_id) WHERE status = 'approve' ORDER BY date_ordered DESC";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;


}


//get all cancel orders customer and order
function get_all_canceled_orders(){
	global $connection;

		$query ="SELECT a.customer_id,a.firstname,a.surname,a.customer_address,b.order_id,b.total_price,b.date_ordered,b.date_delivered, b.general_amount,b.date_cancelled  ";
		$query .= "FROM customertbl as a JOIN ordertbl as b ON(a.customer_id = b.customer_id) WHERE status = 'cancel' ORDER BY date_cancelled DESC";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;


}


//get all delivered orders customer and order
function get_all_delivered_orders(){
	global $connection;

		$query ="SELECT a.customer_id,a.firstname,a.surname,a.customer_address,b.order_id,b.total_price,b.date_ordered,b.date_delivered, b.general_amount  ";
		$query .= "FROM customertbl as a JOIN ordertbl as b ON(a.customer_id = b.customer_id) WHERE status = 'delivered' ORDER BY date_ordered DESC";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;


}


//getting the order detail by order id 
function find_order_deteails_by_customer_id($order_id){
	global $connection;

	  $query ="SELECT a.product_id,a.product_name,a.product_price,a.category_id,a.product_grams,b.quantity,b.order_id ";
		$query .= "FROM producttbl as a JOIN order_items as b ON(a.product_id = b.product_id) WHERE order_id = '$order_id' 	";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;
	
}



//total amount 
function get_total_amount($order_id){
		global $connection;

		$query ="SELECT * FROM";
		$query .= " ordertbl WHERE order_id = '$order_id'";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;

}





// join not use
function get_orders(){
	global $connection;

		$query ="SELECT * FROM";
		$query .= " ordertbl WHERE status = 'pending' ORDER BY date_ordered DESC";
		$order_set = mysqli_query($connection, $query);
		confirm_query($order_set);
		return $order_set;


}

// join not use


?>