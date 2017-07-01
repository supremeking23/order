        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    
    <?php include('header.php');?>

    <?php include('sidebar.php');?>


    <?php $get_admin_bin = get_all_bin_admins();?>





      <!-- Page heade -->
        <?php include('page_header.php');?>


        <div class="container">
            <h1 style="">Archive Section |Administrator</h1>   
        </div>

           <!-- add customer -->
        <div class="table_nav">
                    
       
            <a href="archieve.php?archieve=customers" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="" title="" id="">
               &nbsp;Customer           
            </a>

             &nbsp; &nbsp;

                         <a href="archieve_declined_customers.php?archieve=declined" role="button" data-toggle="modal" class="btn dashed_button " data-tooltip="tooltip" data-placement="top" data-original-title="" title="" id="">
               &nbsp;Declined Customer           
            </a>

              &nbsp; &nbsp;

                         <a href="archieve_admin.php?archieve=admin" role="button" data-toggle="modal" class="btn dashed_button  <?php if(isset($_GET['archieve'] ) == 'admin'){echo 'active_mini';}?>" data-tooltip="tooltip" data-placement="top" data-original-title="" title="" id="">
               &nbsp;Administrator        
            </a>


                &nbsp; &nbsp;

                         <a href="archieve_products.php?archieve=products" role="button" data-toggle="modal" class="btn dashed_button" data-tooltip="tooltip" data-placement="top" data-original-title="" title="" id="">
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
                
                <th>Full Name</th>
                <th>Gender</th>
                <th>Role</th>
                <th>Address</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
        </thead>
        
        <tbody>
         <?php while($bin_admin = mysqli_fetch_assoc($get_admin_bin)) {?>
            <tr>  
            <?php 
                // meron datapat session pero tinanggal ko
                $bin_admin['admin_id']; ?>  
                <td><?php echo htmlentities($bin_admin["admin_firstname"] . '  ' . $bin_admin["admin_surname"] ); ?></td>
                <td><?php echo $bin_admin['gender']?></td>
                <td><?php echo $bin_admin['role']?></td>
                <td><?php echo $bin_admin['admin_address']?></td>
             
                <td><?php echo $bin_admin['admin_cell']?></td>   
                <td><a href="recover_admin.php?admin_id=<?php echo $bin_admin['admin_id']; ?>"  data-tooltip ="tooltip" title="
                restore admin account" data-placement ="bottom" class="btn btn-primary btn-sm " ><i class="fa fa-share-square-o" aria-hidden="true"></i></a>
                    &nbsp;

                    <a href="delete_permanent_admin.php?admin_id=<?php echo $bin_admin['admin_id']; ?>" data-tooltip ="tooltip" title="delete admin/staff permanently" onclick="return confirm('delete this record permanently?')" data-placement ="bottom" class="btn btn-warning btn-sm" ><i class="fa fa-trash-o"></i></a></td>
      

                 
         

            
            </tr>
          <?php }?>
        </tbody>
    </table>



    
    



                   </div> <!--col 12 div -->
               </div> <!--row div -->
            </div> <!--no name div -->
        </div>
        <!-- /#page-content-wrapper -->




        ?>

    

    <?php include('footer.php');?>

        <!-- 
             <a href="#menu-toggle" class="btn btn-default" id="menu-toggle">Toggle Menu</a>
                        <h1>Simple Sidebar</h1>
                        <p>This template has a responsive menu toggling system. The menu will appear collapsed on smaller screens, and will appear non-collapsed on larger screens. When toggled using the button below, the menu will appear/disappear. On small screens, the page content will be pushed off canvas.</p>
                        <p>Make sure to keep all page content within the <code>#page-content-wrapper</code>.</p>
        -->