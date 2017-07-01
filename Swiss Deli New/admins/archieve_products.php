        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    
    <?php include('header.php');?>

    <?php include('sidebar.php');?>


    <?php $get_products_bin = get_all_bin_products();?>





      <!-- Page heade -->
        <?php include('page_header.php');?>


        <div class="container">
            <h1 style="">Archive Section | Products</h1>   
        </div>

           <!-- add customer -->
        <div class="table_nav" >
                    
       
            <a href="archieve.php?archieve=customers" role="button" data-toggle="modal" class="btn dashed_button " data-tooltip="tooltip" data-placement="top" data-original-title="Add Products" title="" id="">
               &nbsp;Customer           
            </a>

             &nbsp; &nbsp;

                         <a href="archieve_declined_customers.php?archieve=declined" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="Add Products" title="" id="">
               &nbsp;Declined Customer           
            </a>

             &nbsp; &nbsp;

                         <a href="archieve_admin.php?archieve=admin" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="Add Products" title="" id="">
               &nbsp;Administrator        
            </a>


                &nbsp; &nbsp;

                         <a href="archieve_products.php?archieve=products" role="button" data-toggle="modal" class="btn dashed_button <?php if(isset($_GET['archieve'] ) == 'products'){echo 'active_mini';}?>" data-tooltip="tooltip" data-placement="top" data-original-title="" title="" id="">
               &nbsp;Products        
            </a>

          
        </div>

        <br /><br /><br />






        <!-- Page Content #page-content-wrapper -->
        <div  class="container-fluid" style="background:">
            
         <div>


            <div class="row">

                <div class="col-lg-12">
                            
                           

                    <!--<div><a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a></div> -->
                        
                      

                           <!-- <span style="margin-left:160px"></span><button type="button" data-toggle="modal" data-target="#add_admin" data-tooltip ="tooltip" title="Add admin" data-placement ="bottom" class="btn btn-warning btn-sm" >Add Admin</button> -->

                    






    <table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">


        <thead>
            <tr>
                
                <th>Product ID</th>
                <th>Product Category</th>
                <th>Product Name</th>
                <th>Product Price</th>
                <th>Grams per Pack</th>
                <th>Actions</th>
            </tr>
        </thead>
        
        <tbody>
         <?php while($bin_products = mysqli_fetch_assoc($get_products_bin)) {?>
            <tr>  
            <?php 
                // meron datapat session pero tinanggal ko
                $bin_products['product_id']; ?>  
                <td><?php echo htmlentities($bin_products["product_id"]); ?></td>

                  <?php $get_category = find_category_by_products($bin_products['category_id']);?>
                    <?php while($category = mysqli_fetch_array($get_category)){?>
                <td><?php echo $category['category_name'] ?></td>
                    <?php }?>



                <td><?php echo $bin_products['product_name']?></td>
             
                <td><?php echo $bin_products['product_price']?></td>   
                <td><?php echo $bin_products['product_grams']?>grams</td> 
                <td><a href="recover_customer.php?customer_id=<?php echo $bin_products['product_id']?>" data-tooltip ="tooltip" title="Restore product details" data-placement ="bottom" class="btn btn-primary btn-sm " ><i class="fa fa-arrow-left" aria-hidden="true"></i></a>
                    &nbsp;

                  

                       <a onclick="return confirm('delete this record permanently?')" href="delete_permanent_products.php?product_id=<?php echo $bin_products['product_id']; ?>" data-tooltip ="tooltip" title="Delete Permanent product details" data-placement ="bottom" class="btn btn-warning btn-sm" ><i class="fa fa-trash-o"></i></a>


                    </td>
      

                 
         

            
            </tr>
          <?php }?>
        </tbody>
    </table>



    
    



                   </div> <!--col 12 div -->
               </div> <!--row div -->
            </div> <!--no name div -->
        </div>
        <!-- /#page-content-wrapper -->



       

    <?php include('footer.php');?>

        <!-- 
             <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        <h1>Simple Sidebar</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
        -->