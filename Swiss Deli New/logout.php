<?php require_once("includes/session.php") ;?>
<?php require_once("includes/functions.php") ;?>


<?php 
	//v1: simple logout
	// session_start();
	

		    $_SESSION["customer_id"] = null; //wash it away.... handstamp
			$_SESSION["username"] = null;
			$_SESSION['shopping_cart'] = null;
			redirect_to("index.php");
			session_destroy();

?>

<?php

	//heavy handed 
	//v2: destroy session
	// assumes nothing else in session to keep
	//session_start();
	// $_SESSION = array();
	// if(isset($_COOKIE[session_name()])) {
	// setcokie(session_name(),''.time()-42000,'/');
	//}
	// session_destroy();
	//redirect_to("login.php");
?>