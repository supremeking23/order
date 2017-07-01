<?php 
	session_start();

	function message(){
		if(isset($_SESSION["message"])){
			$output =  "<div class=\"well well-sm\">";
			$output .= "<div class=\"text-success \">";
			$output .= htmlentities($_SESSION["message"]);
			$output .= "</div>";
			$output .= "</div>";

			//clear message after use
			$_SESSION["message"] = null;

			return $output;
		}	
	}


	function errors(){
		if(isset($_SESSION["errors"])) {
			$errors = $_SESSION["errors"];

			//clear mesage after use
			$_SESSION["errors"] =null;

			return $errors; 
		}
	}


?>