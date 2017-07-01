<?php if(!isset($_SESSION['username'])){redirect_to('index.php');exit;} ?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, shrink-to-fit=no, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
 

    <title>Customer Account</title>

  

    <!-- Custom CSS -->
    <link href="css/simple-sidebars.css" rel="stylesheet">

      <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Customer CSS -->
    <link href="css/customers.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .brand{
  float: left;
  position: relative;
  top: -10px;
  font-family: sans-serif;
  color:white;
  margin-left: 7px;

}

.brand h1{
   font-size: 20px;
}


    .table input[type="text"],input[type="date"],input[type="password"]{
      width: 100%;
      height: 30px;
      border-radius: 5px;
      border: 1px solid gray;
      padding-left: 10px;
      padding-right: 10px;
    }
    </style>
</head>

<body>

    <?php 
        //tentative

        $customer_query = "SELECT * FROM customertbl WHERE customer_id = '{$_SESSION['customer_id']}'";
        $run_query = mysqli_query($connection,$customer_query);

        while($customer = mysqli_fetch_array($run_query)){
           $fullname = $customer['firstname'] .' '. $customer['surname'];
        }
    ?>  

    <div id="wrapper">





<?php  //for sidebar?>

        <?php 
        $customer_id = $_SESSION["customer_id"];
        //$query = "SELECT * FROM admintbl WHERE admin_id = '$admin_id'";

        $find_customer = find_customer_by_id($customer_id);

        ?>
