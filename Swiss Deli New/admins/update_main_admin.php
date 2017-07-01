        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>
    
    <?php include('header.php');?>

    <?php include('sidebar.php');?>


  
    <?php if(isset($_SESSION['admin_id'])){
       
        $query = "SELECT * FROM admintbl WHERE email = '". $_SESSION['email'] ."'";
        echo  $_SESSION['admin_id'];
         echo $_SESSION['email'];
        $run_query = mysqli_query($connection,$query);
        ///to be continued
        if($admin = mysqli_fetch_array($run_query)){
              echo  $admin['admin_surname'];
        }
    }
    ?>


<?php 

        $_SESSION['currentClick'] = 0;
        $currentClick = "Dashboard";

        echo "<script>
                    $(\" a:contains('$currentClick')\").parent().addClass('active');
                    </script>"; 
?>


        <!-- Page heade -->
        <div id="header"><i class="fa fa-printer"></i>
             <div class="logo"><a href="#">Swiss<span>Deli </span></a></div>
             <div class="pull-right welcome">
               
                   <a href="">Welcome Admin <?php echo $_SESSION['email']?></a>
               



             </div>

             
        </div>




        <!-- Page Content #page-content-wrapper -->
        <div  class="container-fluid" style="background:">
            
            
            
            <div> <!-- former container-fluid-->
                <?php echo message();

                ?>
                <div class="row">

                    
                    <div class="col-lg-12">

                       
                        
                    </div> <!--class="col-lg-12" -->

                </div> <!--row" -->




               



            </div> <!--no name div -->
        </div>
        <!-- /#page-content-wrapper -->



    <?php include('footer.php');?>
    
  