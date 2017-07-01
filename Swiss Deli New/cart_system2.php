 <!--cart system 2 -->

        <?php 
          //cart system



          if(isset($_POST['add_to_cart'])){
            //echo "<script>alert('ewow')</script>";

             if(isset($_SESSION['username'])){
                    

                              if(isset($_SESSION['shopping_cart'])){

                            $item_array_id = array_column($_SESSION['shopping_cart'],"item_id");

                            if(!in_array($_GET['id'], $item_array_id)){

                              $count = count($_SESSION['shopping_cart']);

                               $item_array = array(

                              'item_id' => $_GET["id"],
                              'item_name' => $_POST['hidden_name'],
                              'item_price' => $_POST['hidden_price'],
                              'item_quantity' => $_POST['quantity'],
                              'item_grams' => $_POST['hidden_grams']

             
                            ); //end array
                              $_SESSION['shopping_cart'][$count] = $item_array; 


                            }else{
                              echo "<script>alert('product already added')</script>";
                              echo "<script>window.location='shop.php'</script>";
                            }

            }else{

                  $item_array = array(

                      'item_id' => $_GET["id"],
                      'item_name' => $_POST['hidden_name'],
                      'item_price' => $_POST['hidden_price'],
                      'item_quantity' => $_POST['quantity'],
                      'item_grams' => $_POST['hidden_grams']
     
                    ); //end array
                  $_SESSION['shopping_cart'][0] = $item_array;
                }


                if(isset($_POST['place_order'])){
                    //echo "<script>alert('nandito kana')</script>";
                }

                // username
              }else{
                echo "<script>alert('you should login first')</script>";

                // if place order is click but not login
                  if(isset($_POST['place_order'])){
                    echo "<script>alert('bakti')</script>";
                }
              }



          }


          if(isset($_GET['action'])){

              if($_GET['action'] == "delete"){
                  foreach ($_SESSION['shopping_cart'] as $keys => $values) {
                    
                    if($values["item_id"] == $_GET['id']){
                        unset($_SESSION['shopping_cart'][$keys]);
                        //echo "<script>alert('Product Removed')</script>";
                        echo "<script>window.location='view_product_detail.php'</script>";
                    }
                  }
              }
          }
        ?>


                     <?php
              //points query
             $customer_id = "";
             if(!isset($_SESSION["customer_id"])){
                $customer_id = "";
             }else{


              $customer_id =  $_SESSION["customer_id"];



                                //epoints query
                                    $sql = "SELECT * FROM epointstbl WHERE customer_id = '$customer_id' ";
                                    $sqlrun = mysqli_query($connection,$sql);

                                    while($get_points = mysqli_fetch_assoc($sqlrun)){
                                              $points = $get_points['total_points'];
                                    }

                }                    
                                ?>

          <div class="form-group pull-right">
           <label>Check your cart:</label> <button class="btn btn-info btn-sm" style="margin-bottom:5px" data-toggle="modal" data-target="#shopping_cart"><i class="glyphicon glyphicon-shopping-cart" aria-hidden="true"></i>&nbsp;(<?php if(isset($_SESSION['shopping_cart'])){echo array_sum(array_column($_SESSION['shopping_cart'], 'item_quantity'));}?>)</button><br/>
            
          </div> <!-- search -->


          <div class="modal fade" id="shopping_cart" tab-index="-1" role="dialog" aria-labelledby="modalLabel" style="height:680px">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content  ">
                            <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true"><div class="modal_close_circle">&times;</div></span></button>
                                <h3 class="modal-title text-primary text-center" id="modalLabel">Order Details</h3>

                            </div>
                            <div class="modal-body text-center">
                                <div class="row">
                                    <div class="col-lg-12" >
                                     
                                      <table class="table table-hover" style="width:100%">
                                        <tr>
                                          <th width="20%">Product Name</th>
                                         
                                          <th width="10%">Quantity</th>
                                          <th width="10%">Product Grams</th>
                                          <th width="20%">Product Price</th>
                                          <th width="10%">Total </th>
                                          <th width="5%">Action</th>
                                        </tr>

                                        <?php if(!empty($_SESSION['shopping_cart'])){

                                              $total_grams=0;
                                              $total = 0;
                                              foreach ($_SESSION['shopping_cart'] as $keys => $values) {
                                        ?>
                                        <tr>
                                          <td><?php echo $values['item_name']?></td>
                                         
                                          <td><?php echo $values['item_quantity']?></td>
                                          <td><?php echo $values['item_grams']?>grams</td>
                                          <td><?php echo $values['item_price']?></td>
                                           <td><?php echo number_format($values['item_quantity'] * $values['item_price'],2);?></td>
                                          <td><a href="shop.php?action=delete&id=<?php echo $values['item_id']?>"><span class="text-danger">Remove</span></a></td>
                                        </tr>

                                        <?php 
                                               $total = $total + ($values['item_quantity'] * $values['item_price']); 

                                                $total_grams =$total_grams + ($values['item_quantity'] * $values['item_grams']);      
                                              }

                                         ?>


                                          <tr>
                                          
                                            <td colspan="5" align="left">Total Grams:<?php echo $total_grams;?>grams</td>
                                            <td align="right"></td>
                                         </tr>


                                         <tr>
                                            <td colspan="5" align="right">Total:</td>
                                            <td align="right">₱<?php echo number_format($total,2);?></td>
                                            <?php $_SESSION['cart_total'] =  $total //number_format($total,2); ?>
                                         </tr>


                                    <?php $points_allow = $total * .30;

                                            if($points >99){ 
                                            ?>
                                          <tr>
                                            <td colspan="5" align="left">30% of the total cost:<?php echo floor($points_allow);?>
                                              <br />
                                              Remaining Points: <?php echo $points;?>
                                            </td>

                                            
                                           <td></td>
                                          
                                         </tr>
                                          <?php } ?>


                                              
                                          <?php    
                                        }else{
                                          echo "Your cart is empty";
                                        }

                                       
                                        ?>

                                      </table>
                                        
                                    </div>
                                </div>
               
                   
                            </div>

                            <div class="modal-footer">
                              
                             <?php if(isset($_SESSION['shopping_cart'])){ ?>
                             

                              <?php if($points >99){ ?>
                                  <div class="pull-left">
                                    <form action="" method="POST"> 

                                    <?php //total grams ?>
                                     <input type="hidden" name="total_grams" value="<?php echo $total_grams;?>" />
                                    <?php //remaining points?>
                                    <input type="hidden" name="remaining_points" value="<?php echo $points;?>" />
                                    <?php //points allow?>                                    
                                    <input type="hidden" name="hidden_points" value="<?php echo floor($points_allow);?>" />
                                    <input type="submit" name="epoint_button" class="btn btn-warning" value="Use your E-points ">&nbsp;&nbsp;<input type="text" size="3" name="points_use" value="<?php echo $points;?>" />
                                    
                                    </form>

                                  </div>

                               <?php  } ?>
                               
                               
                              <a href="checkout.php?total_grams_in_cart=<?php echo $total_grams?>" class="btn prime">Place Order</a>


                               <?php } ?>
                          </div>
                        </div>
                    </div>
            </div>
    
            <!--cart system 2 -->





     <?php 
                 if(isset($_POST['epoint_button'])){

                    $hidden_points = $_POST['hidden_points'];
                    $points_use = $_POST['points_use'];
                    $remaining_points = $_POST['remaining_points'];
                    $total_grams_in_cart = $_POST['total_grams'];

              


                     if($points_use>$hidden_points){
                           echo "<script>alert('Points must be 30% of the total cost.')</script>";
                        echo "<script>window.location='shop.php'</script>";
                        exit(); 
                      }else if($points_use > $remaining_points){
                         echo "<script>alert('You dont have enough points')</script>";
                         echo "<script>window.location='shop.php'</script>";
                         exit();
                      }else{


                          if($total_grams_in_cart<30000){
                            echo "<script>alert('You  didnt aquire the minimum grams. Minimum grams should be 30000grams')</script>";
                         echo "<script>window.location='shop.php'</script>";
                         exit();
                          }else{

                            //all correct


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


                                              // epoints use
                                                 $points_use =$_POST['points_use'];

                                              //date_ordered;
                                                $date_orderd= date("Y-m-d H:i:s");

                                                //status // tracking system

                                                $status = "pending";

                                                // not finish
                                               
                                                $insertOrder = $db->query("INSERT INTO ordertbl (customer_id, total_price, date_ordered,status,epoints_use) VALUES ('".$_SESSION['customer_id']."', '".$_SESSION['cart_total']."','".date("Y-m-d H:i:s")."','".$status."','".$points_use."')");


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
                                                }//insertOrder




                               }//else



                          }


                           





                  }
            ?>       