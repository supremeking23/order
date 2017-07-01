  <?php
  include('includes/session.php');
  include('includes/connection.php');


    date_default_timezone_set('Asia/Taipei');

 $servername = 'localhost';
    $user = 'root';
    $password ='';
    $dbname = 'swiss_delidb';
     // Create connection
        $db = new mysqli($servername, $user, $password, $dbname);
        // Check connection
        if ($db->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 



  include('includes/functions.php');

  ?>


  <?php if(!empty($_SESSION['shopping_cart'])){


          $total_grams_in_cart  =$_GET['total_grams_in_cart'];


              if($total_grams_in_cart<30000){

                  echo "<script>alert('You didnt acquire na minimum grams. Minimum grams should be 30000grams')</script>";
                         echo "<script>window.location='shop.php'</script>";
                         exit();

              }else{




              }

                                               
                                             $total =0;    
                                             echo $_SESSION['customer_id'].'<br />';
                                                
                                                //total price
                                                echo $_SESSION['cart_total'];

                                                //date_ordered;
                                                $date_orderd= date("Y-m-d H:i:s");

                                                //status // tracking system

                                                $status = "pending";

                                                // not finish
                                               
                                                $insertOrder = $db->query("INSERT INTO ordertbl (customer_id, total_price, date_ordered,status) VALUES ('".$_SESSION['customer_id']."', '".$_SESSION['cart_total']."','".date("Y-m-d H:i:s")."','".$status."')");


                                                if($insertOrder){
                                                  $orderID = $db->insert_id;
                                                  $sql= '';

                                                    foreach ($_SESSION['shopping_cart'] as $keys => $values) {

                                                        // product_name;
                                                        $values['item_name'];
                                                        //cart_total
                                                        $total = $total + ($values['item_quantity'] * $values['item_price']);
                                                        
                                                       //grams
                                                        $values['item_grams'];
                                                        
                                                       $sql .= "INSERT INTO order_items (order_id, product_id, quantity,grams) VALUES ('".$orderID."', '".$values['item_id']."', '".$values['item_quantity']."','".$values['item_grams']."');";



                                                        //$total_price_per_product = number_format($values['item_quantity'] * $values['item_price'],2);
                                           
                                                      //echo $values['item_name'] .'<br />';
                                                      } //foreach


                                                       // insert order items into database
                                                      $insertOrderItems = $db->multi_query($sql);
                                                      if($insertOrderItems){
                                                      unset( $_SESSION['shopping_cart']);
                                                      echo "<script>alert('Your order request is now being process.')</script>";
                                                      echo "<script>window.location='shop.php'</script>";
                                                       
                                                      }
                                                }



                                      }else{
                                        echo "<script>window.location='shop.php'</script>";
                                      }  
                                        ?>

                               