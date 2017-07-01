        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>


    <?php 
    		if(!isset($_POST['generate_summary'])){
    			echo "<script>window.location='reports.php'</script>";
    		}else{


    			$summary_asof = $_POST['summary_asof'];



    			 	$totalOrdersql = "SELECT count(*) FROM ordertbl";
                    $totalOrderQuery = mysqli_query($connection,$totalOrdersql);
                    $totalOrderResult = mysqli_fetch_array($totalOrderQuery);

                    $pendingOrdersql = "SELECT count(*) FROM ordertbl WHERE status='pending'";
                    $totalPendingQuery = mysqli_query($connection,$pendingOrdersql);
                    $totalPendingResult = mysqli_fetch_array($totalPendingQuery);

                    $approveOrdersql = "SELECT count(*) FROM ordertbl WHERE status='approve'";
                    $totalapproveQuery = mysqli_query($connection,$approveOrdersql);
                    $totalapproveResult = mysqli_fetch_array($totalapproveQuery);


                    $deliveredOrdersql = "SELECT count(*) FROM ordertbl WHERE status='delivered'";
                    $totaldeliveredQuery = mysqli_query($connection,$deliveredOrdersql);
                    $totaldeliveredResult = mysqli_fetch_array($totaldeliveredQuery);



                    $totalCustomersql = "SELECT count(*) FROM customertbl";
                    $totalCustomerQuery = mysqli_query($connection,$totalCustomersql);
                    $totalCustomerResult = mysqli_fetch_array($totalCustomerQuery);

                    $totalCustomerPendingsql = "SELECT count(*) FROM customertbl WHERE isApproved = '0'";
                    $totalCustomerPendinQuery = mysqli_query($connection,$totalCustomerPendingsql);
                    $totalCustomerPendingResult = mysqli_fetch_array($totalCustomerPendinQuery);


                    $totalCustomerAprrovesql = "SELECT count(*) FROM customertbl WHERE isApproved = '1'";
                    $totalCustomerAprroveQuery = mysqli_query($connection,$totalCustomerAprrovesql);
                    $totalCustomerApproveResult = mysqli_fetch_array($totalCustomerAprroveQuery);


                    $totalCustomerDeletesql = "SELECT count(*) FROM customertbl WHERE isApproved = '2'";
                    $totalCustomerDeleteQuery = mysqli_query($connection,$totalCustomerDeletesql);
                    $totalCustomerDeleteResult = mysqli_fetch_array($totalCustomerDeleteQuery);




                     $totalAdministratorSql = "SELECT count(*) FROM admintbl WHERE admin_bin != 'bin' AND role ='superadmin'";
                    $totalAdministratorQuery = mysqli_query($connection,$totalAdministratorSql);
                    $totalAdministratorResult = mysqli_fetch_array($totalAdministratorQuery);


                     $totalStaffSql = "SELECT count(*) FROM admintbl WHERE admin_bin != 'bin' AND role ='staff'";
                    $totalStaffQuery = mysqli_query($connection,$totalStaffSql);
                    $totalStaffResult = mysqli_fetch_array($totalStaffQuery);



                    //product_category

                    /*$totalcat_all_Sql = "SELECT count(*) FROM producttbl WHERE product_bin != 'bin' ";
                    $totalcat_all_Query = mysqli_query($connection,$totalcat_all_Sql);
                    $totalcat_all_Result = mysqli_fetch_array($totalcat_all_Query);



                 $totalcat_one_Sql = "SELECT count(*) FROM producttbl WHERE product_bin != 'bin' AND category_id ='1'";
                    $totalcat_one_Query = mysqli_query($connection,$totalcat_one_Sql);
                    $totalcat_one_Result = mysqli_fetch_array($totalcat_one_Query);


                     $totalcat_two_Sql = "SELECT count(*) FROM producttbl WHERE product_bin != 'bin' AND category_id ='2'";
                    $totalcat_two_Query = mysqli_query($connection,$totalcat_two_Sql);
                    $totalcat_two_Result = mysqli_fetch_array($totalcat_two_Query);


                     $totalcat_three_Sql = "SELECT count(*) FROM producttbl WHERE product_bin != 'bin' AND category_id ='3'";
                    $totalcat_three_Query = mysqli_query($connection,$totalcat_three_Sql);
                    $totalcat_three_Result = mysqli_fetch_array($totalcat_three_Query);


                      $totalcat_four_Sql = "SELECT count(*) FROM producttbl WHERE product_bin != 'bin' AND category_id ='4'";
                    $totalcat_four_Query = mysqli_query($connection,$totalcat_four_Sql);
                    $totalcat_four_Result = mysqli_fetch_array($totalcat_four_Query);


                    $totalcat_five_Sql = "SELECT count(*) FROM producttbl WHERE product_bin != 'bin' AND category_id ='5'";
                    $totalcat_five_Query = mysqli_query($connection,$totalcat_five_Sql);
                    $totalcat_five_Result = mysqli_fetch_array($totalcat_five_Query);


                    $totalcat_six_Sql = "SELECT count(*) FROM producttbl WHERE product_bin != 'bin' AND category_id ='6'";
                    $totalcat_six_Query = mysqli_query($connection,$totalcat_six_Sql);
                    $totalcat_six_Result = mysqli_fetch_array($totalcat_six_Query);


                    $totalcat_seven_Sql = "SELECT count(*) FROM producttbl WHERE product_bin != 'bin' AND category_id ='7'";
                    $totalcat_seven_Query = mysqli_query($connection,$totalcat_seven_Sql);
                    $totalcat_seven_Result = mysqli_fetch_array($totalcat_seven_Query);


                    $totalcat_eight_Sql = "SELECT count(*) FROM producttbl WHERE product_bin != 'bin' AND category_id ='8'";
                    $totalcat_eight_Query = mysqli_query($connection,$totalcat_eight_Sql);
                    $totalcat_eight_Result = mysqli_fetch_array($totalcat_eight_Query);
                 

                    $totalcat_nine_Sql = "SELECT count(*) FROM producttbl WHERE product_bin != 'bin' AND category_id ='9'";
                    $totalcat_nine_Query = mysqli_query($connection,$totalcat_nine_Sql);
                    $totalcat_nine_Result = mysqli_fetch_array($totalcat_nine_Query);

					*/


                    //product  AND book_dateinsert<='$summary_asof'


                    //all product 

                    //total all product
                      $totalprod_all_SQL="SELECT sum(product_quantity) FROM producttbl WHERE product_bin != 'bin'";
					$totalprod_all_Query=mysqli_query($connection,$totalprod_all_SQL);


                    	//total per category
                      $totalprod_for_cat_one_SQL="SELECT sum(product_quantity) FROM producttbl WHERE category_id='1' AND product_bin != 'bin'";
					$totalprod_for_catone_Query=mysqli_query($connection,$totalprod_for_cat_one_SQL);

					//product_name and quantity
                    $totalprod_for_cat_one_SQL="SELECT * FROM producttbl WHERE category_id='1' AND product_bin != 'bin'";
					$totalprod_for_cat_one_Query=mysqli_query($connection,$totalprod_for_cat_one_SQL);



					//total per category 2
                      $totalprod_for_cat_two_SQL="SELECT sum(product_quantity) FROM producttbl WHERE category_id='2' AND product_bin != 'bin'";
					$totalprod_for_cattwo_Query=mysqli_query($connection,$totalprod_for_cat_two_SQL);

					//product_name and quantity 2
                    $totalprod_for_cat_two_SQL="SELECT * FROM producttbl WHERE category_id='2' AND product_bin != 'bin'";
					$totalprod_for_cat_two_Query=mysqli_query($connection,$totalprod_for_cat_two_SQL);


					//total per category 3
                      $totalprod_for_cat_three_SQL="SELECT sum(product_quantity) FROM producttbl WHERE category_id='3' AND product_bin != 'bin'";
					$totalprod_for_catthree_Query=mysqli_query($connection,$totalprod_for_cat_three_SQL);

					//product_name and quantity 3
                    $totalprod_for_cat_three_SQL="SELECT * FROM producttbl WHERE category_id='3' AND product_bin != 'bin'";
					$totalprod_for_cat_three_Query=mysqli_query($connection,$totalprod_for_cat_three_SQL);



					//total per category 4
                      $totalprod_for_cat_four_SQL="SELECT sum(product_quantity) FROM producttbl WHERE category_id='4' AND product_bin != 'bin'";
					$totalprod_for_catfour_Query=mysqli_query($connection,$totalprod_for_cat_four_SQL);

					//product_name and quantity 4
                    $totalprod_for_cat_four_SQL="SELECT * FROM producttbl WHERE category_id='4' AND product_bin != 'bin'";
					$totalprod_for_cat_four_Query=mysqli_query($connection,$totalprod_for_cat_four_SQL);
					

					//total per category 5
                      $totalprod_for_cat_five_SQL="SELECT sum(product_quantity) FROM producttbl WHERE category_id='5' AND product_bin != 'bin'";
					$totalprod_for_catfive_Query=mysqli_query($connection,$totalprod_for_cat_five_SQL);

					//product_name and quantity 5
                    $totalprod_for_cat_five_SQL="SELECT * FROM producttbl WHERE category_id='5' AND product_bin != 'bin'";
					$totalprod_for_cat_five_Query=mysqli_query($connection,$totalprod_for_cat_five_SQL);

					//total per category 6
                      $totalprod_for_cat_six_SQL="SELECT sum(product_quantity) FROM producttbl WHERE category_id='6' AND product_bin != 'bin'";
					$totalprod_for_catsix_Query=mysqli_query($connection,$totalprod_for_cat_six_SQL)or die(mysqli_error($connection));

					//product_name and quantity 6
                    $totalprod_for_cat_six_SQL="SELECT * FROM producttbl WHERE category_id='6' AND product_bin != 'bin'";
					$totalprod_for_cat_six_Query=mysqli_query($connection,$totalprod_for_cat_six_SQL);

					//total per category 7
                      $totalprod_for_cat_seven_SQL="SELECT sum(product_quantity) FROM producttbl WHERE category_id='7' AND product_bin != 'bin'";
					$totalprod_for_catseven_Query=mysqli_query($connection,$totalprod_for_cat_seven_SQL);

					//product_name and quantity 7
                    $totalprod_for_cat_seven_SQL="SELECT * FROM producttbl WHERE category_id='7' AND product_bin != 'bin'";
					$totalprod_for_cat_seven_Query=mysqli_query($connection,$totalprod_for_cat_seven_SQL);


					//total per category 8
                      $totalprod_for_cat_eight_SQL="SELECT sum(product_quantity) FROM producttbl WHERE category_id='8' AND product_bin != 'bin'";
					$totalprod_for_cateight_Query=mysqli_query($connection,$totalprod_for_cat_eight_SQL);

					//product_name and quantity 8
                    $totalprod_for_cat_eight_SQL="SELECT * FROM producttbl WHERE category_id='8' AND product_bin != 'bin'";
					$totalprod_for_cat_eight_Query=mysqli_query($connection,$totalprod_for_cat_eight_SQL);

					//total per category 9
                      $totalprod_for_cat_nine_SQL="SELECT sum(product_quantity) FROM producttbl WHERE category_id='9' AND product_bin != 'bin'";
					$totalprod_for_catnine_Query=mysqli_query($connection,$totalprod_for_cat_nine_SQL);

					//product_name and quantity 9
                    $totalprod_for_cat_nine_SQL="SELECT * FROM producttbl WHERE category_id='9' AND product_bin != 'bin'";
					$totalprod_for_cat_nine_Query=mysqli_query($connection,$totalprod_for_cat_nine_SQL);
    			?>


    			<?php
		


		require('fpdf/fpdf.php');

	class ConductPDF extends FPDF {
		function vcell($c_width,$c_height,$x_axis,$text){
			$w_w=$c_height/3;
			$w_w_1=$w_w+2;
			$w_w1=$w_w+$w_w+$w_w+3;
			$len=strlen($text);

			if($len>165){
				$w_text=str_split($text,165);
				$this->SetX($x_axis);
				$this->Cell($c_width,$w_w_1,$w_text[0],'','','');
				$this->SetX($x_axis);
				$this->Cell($c_width,$w_w1,$w_text[1],'','','');
				$this->SetX($x_axis);
				$this->Cell($c_width,$c_height,'','LTRB',0,'L',0);
			}else{
			    $this->SetX($x_axis);
			    $this->Cell($c_width,$c_height,$text,'LTRB',0,'L',0);}
		    }

		function Footer(){
	    
	        $this->SetY(-15);
	        $this->SetFont('Arial','I',8);
	        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
	    }
 	}

	$date=date_create($summary_asof);
	$summary_asof= date_format($date,"F d, Y");

	$wrapdf=new ConductPDF('P','mm','A4');
	$wrapdf->AddPage();
	$wrapdf->SetFont('Arial','',16);
	$wrapdf->AliasNbPages();



	$wrapdf->Image('images/SD_logo.png',37,10,25);
	$wrapdf->SetFont('Arial','B',16);
	$wrapdf->Cell(0,10,"Swiss Deli Philippines Inc.",0,1,"C");
	$wrapdf->SetFont('Arial','I',14);
	$wrapdf->Cell(0,2,"Online Ordering and Delivery System",0,1,"C");
	$wrapdf->SetFont('Arial','',14);
	$wrapdf->Cell(0,10,"Summary List of Report",0,1,"C");
	$wrapdf->Cell(0,10,"As Of ".$summary_asof,0,1,"C");
	$wrapdf->Ln(8);

	$wrapdf->SetFont('Arial','B',10);
	$wrapdf->Cell(165,10,"Report",1,0,"C");
	$wrapdf->Cell(25,10,"Total Count",1,1,"C");


	// total count
	while($total_prod_count = mysqli_fetch_array($totalprod_all_Query)){
			$wrapdf->SetFont('Arial','B',10);
	$x_axis=$wrapdf->getx();
	$c_width=165;
	$c_height=10;
	$wrapdf->vcell($c_width,$c_height,$x_axis,'Swiss Deli Products',1);
	$x_axis=$wrapdf->getx();
	$wrapdf->Cell(25,10,$total_prod_count['sum(product_quantity)'],1,0,"C");
	$wrapdf->Ln();
	}


	
	//total count for cat 1
	while($total_cat_one = mysqli_fetch_array($totalprod_for_catone_Query)){

	

	$wrapdf->SetFont('Arial','B',10);
	$x_axis=$wrapdf->getx();
	$c_width=165;
	$c_height=10;
	$wrapdf->vcell($c_width,$c_height,$x_axis,'         Smoked Meat',1);
	$x_axis=$wrapdf->getx();
	$c_width=25;
	$c_height=10;
	$wrapdf->Cell(25,10,$total_cat_one['sum(product_quantity)'],1,0,"C");
	$wrapdf->Ln();

	}


	//total count for each prod in cat 1
	while($prod_one_total = mysqli_fetch_array($totalprod_for_cat_one_Query)){

		$wrapdf->SetFont('Arial','I',10);
		$x_axis=$wrapdf->getx();
		$c_width=165;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,'                       '.$prod_one_total['product_name'],1,0,"C");
		$x_axis=$wrapdf->getx();
		$c_width=25;
		$c_height=10;
		$wrapdf->Cell(25,10,$prod_one_total['product_quantity'],1,0,"C");
		$wrapdf->Ln();
	}



	//total count for cat 2
	while($total_cat_two = mysqli_fetch_array($totalprod_for_cattwo_Query)){

	$wrapdf->SetFont('Arial','B',10);
	$x_axis=$wrapdf->getx();
	$c_width=165;
	$c_height=10;
	$wrapdf->vcell($c_width,$c_height,$x_axis,'         Smoked Fish',1);
	$x_axis=$wrapdf->getx();
	$c_width=25;
	$c_height=10;
	$wrapdf->Cell(25,10,$total_cat_two['sum(product_quantity)'],1,0,"C");
	$wrapdf->Ln();

	}


		//total count for each prod in cat 2
	while($prod_two_total = mysqli_fetch_array($totalprod_for_cat_two_Query)){

		$wrapdf->SetFont('Arial','I',10);
		$x_axis=$wrapdf->getx();
		$c_width=165;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,'                       '.$prod_two_total['product_name'],1,0,"C");
		$x_axis=$wrapdf->getx();
		$c_width=25;
		$c_height=10;
		$wrapdf->Cell(25,10,$prod_two_total['product_quantity'],1,0,"C");
		$wrapdf->Ln();
	}


	//total count for cat 3
	while($total_cat_three = mysqli_fetch_array($totalprod_for_catthree_Query)){
	$wrapdf->SetFont('Arial','B',10);
	$x_axis=$wrapdf->getx();
	$c_width=165;
	$c_height=10;
	$wrapdf->vcell($c_width,$c_height,$x_axis,'         Smoked Chicken',1);
	$x_axis=$wrapdf->getx();
	$c_width=25;
	$c_height=10;
	$wrapdf->Cell(25,10,$total_cat_three['sum(product_quantity)'],1,0,"C");
	$wrapdf->Ln();
   }


   	//total count for each prod in cat 3
	while($prod_two_total = mysqli_fetch_array($totalprod_for_cat_two_Query)){

		$wrapdf->SetFont('Arial','I',10);
		$x_axis=$wrapdf->getx();
		$c_width=165;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,'                       '.$prod_three_total['product_name'],1,0,"C");
		$x_axis=$wrapdf->getx();
		$c_width=25;
		$c_height=10;
		$wrapdf->Cell(25,10,$prod_three_total['product_quantity'],1,0,"C");
		$wrapdf->Ln();
	}



   //total count for cat 4
	while($total_cat_four = mysqli_fetch_array($totalprod_for_catfour_Query)){
	$wrapdf->SetFont('Arial','B',10);
	$x_axis=$wrapdf->getx();
	$c_width=165;
	$c_height=10;
	$wrapdf->vcell($c_width,$c_height,$x_axis,'         Smoked Ham',1);
	$x_axis=$wrapdf->getx();
	$c_width=25;
	$c_height=10;
	$wrapdf->Cell(25,10,$total_cat_four['sum(product_quantity)'],1,0,"C");
	$wrapdf->Ln();

}
	//total count for each prod in cat 4
	while($prod_four_total = mysqli_fetch_array($totalprod_for_cat_four_Query)){

		$wrapdf->SetFont('Arial','I',10);
		$x_axis=$wrapdf->getx();
		$c_width=165;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,'                       '.$prod_four_total['product_name'],1,0,"C");
		$x_axis=$wrapdf->getx();
		$c_width=25;
		$c_height=10;
		$wrapdf->Cell(25,10,$prod_four_total['product_quantity'],1,0,"C");
		$wrapdf->Ln();
	}



	//total count for cat 5
	while($total_cat_five = mysqli_fetch_array($totalprod_for_catfive_Query)){
	$wrapdf->SetFont('Arial','B',10);
	$x_axis=$wrapdf->getx();
	$c_width=165;
	$c_height=10;
	$wrapdf->vcell($c_width,$c_height,$x_axis,'         Pockled Meat',1);
	$x_axis=$wrapdf->getx();
	$c_width=25;
	$c_height=10;
	$wrapdf->Cell(25,10,$total_cat_five['sum(product_quantity)'],1,0,"C");
	$wrapdf->Ln();
}


	//total count for each prod in cat 5
	while($prod_five_total = mysqli_fetch_array($totalprod_for_cat_five_Query)){

		$wrapdf->SetFont('Arial','I',10);
		$x_axis=$wrapdf->getx();
		$c_width=165;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,'                       '.$prod_five_total['product_name'],1,0,"C");
		$x_axis=$wrapdf->getx();
		$c_width=25;
		$c_height=10;
		$wrapdf->Cell(25,10,$prod_five_total['product_quantity'],1,0,"C");
		$wrapdf->Ln();
	}




	//total count for cat 6
	while($total_cat_six = mysqli_fetch_array($totalprod_for_catsix_Query)){

	$wrapdf->SetFont('Arial','B',10);
	$x_axis=$wrapdf->getx();
	$c_width=165;
	$c_height=10;
	$wrapdf->vcell($c_width,$c_height,$x_axis,'         Fresh Sausage',1);
	$x_axis=$wrapdf->getx();
	$c_width=25;
	$c_height=10;
	$wrapdf->Cell(25,10,$total_cat_six['sum(product_quantity)'],1,0,"C");
	$wrapdf->Ln();

	}



		//total count for each prod in cat 6
	while($prod_six_total = mysqli_fetch_array($totalprod_for_cat_six_Query)){

		$wrapdf->SetFont('Arial','I',10);
		$x_axis=$wrapdf->getx();
		$c_width=165;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,'                       '.$prod_six_total['product_name'],1,0,"C");
		$x_axis=$wrapdf->getx();
		$c_width=25;
		$c_height=10;
		$wrapdf->Cell(25,10,$prod_six_total['product_quantity'],1,0,"C");
		$wrapdf->Ln();
	}



		//total count for cat 7
	while($total_cat_seven = mysqli_fetch_array($totalprod_for_catseven_Query)){
	$wrapdf->SetFont('Arial','B',10);
	$x_axis=$wrapdf->getx();
	$c_width=165;
	$c_height=10;
	$wrapdf->vcell($c_width,$c_height,$x_axis,'         Cooked Sausage',1);
	$x_axis=$wrapdf->getx();
	$c_width=25;
	$c_height=10;
	$wrapdf->Cell(25,10,$total_cat_seven['sum(product_quantity)'],1,0,"C");
	$wrapdf->Ln();
	
	}



//total count for each prod in cat 7
	while($prod_seven_total = mysqli_fetch_array($totalprod_for_cat_seven_Query)){

		$wrapdf->SetFont('Arial','I',10);
		$x_axis=$wrapdf->getx();
		$c_width=165;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,'                       '.$prod_seven_total['product_name'],1,0,"C");
		$x_axis=$wrapdf->getx();
		$c_width=25;
		$c_height=10;
		$wrapdf->Cell(25,10,$prod_seven_total['product_quantity'],1,0,"C");
		$wrapdf->Ln();
	}



		//total count for cat 8
	while($total_cat_eight = mysqli_fetch_array($totalprod_for_cateight_Query)){
	$wrapdf->SetFont('Arial','B',10);
	$x_axis=$wrapdf->getx();
	$c_width=165;
	$c_height=10;
	$wrapdf->vcell($c_width,$c_height,$x_axis,'         Smoked Sausage',1);
	$x_axis=$wrapdf->getx();
	$c_width=25;
	$c_height=10;
	$wrapdf->Cell(25,10,$total_cat_eight['sum(product_quantity)'],1,0,"C");
	$wrapdf->Ln();

}

	//total count for each prod in cat 8
	while($prod_eight_total = mysqli_fetch_array($totalprod_for_cat_eight_Query)){

		$wrapdf->SetFont('Arial','I',10);
		$x_axis=$wrapdf->getx();
		$c_width=165;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,'                       '.$prod_eight_total['product_name'],1,0,"C");
		$x_axis=$wrapdf->getx();
		$c_width=25;
		$c_height=10;
		$wrapdf->Cell(25,10,$prod_eight_total['product_quantity'],1,0,"C");
		$wrapdf->Ln();
	}



	//total count for cat 9
	while($total_cat_nine = mysqli_fetch_array($totalprod_for_catnine_Query)){
	$wrapdf->SetFont('Arial','B',10);
	$x_axis=$wrapdf->getx();
	$c_width=165;
	$c_height=10;
	$wrapdf->vcell($c_width,$c_height,$x_axis,'         Spreadable Ham',1);
	$x_axis=$wrapdf->getx();
	$c_width=25;
	$c_height=10;
	$wrapdf->Cell(25,10,$total_cat_nine['sum(product_quantity)'],1,0,"C");
	$wrapdf->Ln();

}


	//total count for each prod in cat 9
	while($prod_nine_total = mysqli_fetch_array($totalprod_for_cat_nine_Query)){

		$wrapdf->SetFont('Arial','I',10);
		$x_axis=$wrapdf->getx();
		$c_width=165;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,'                       '.$prod_nine_total['product_name'],1,0,"C");
		$x_axis=$wrapdf->getx();
		$c_width=25;
		$c_height=10;
		$wrapdf->Cell(25,10,$prod_nine_total['product_quantity'],1,0,"C");
		$wrapdf->Ln();
	}
	







	//customer and admin result
	$wrapdf->SetFont('Arial','B',10);
	$x_axis=$wrapdf->getx();
	$c_width=165;
	$c_height=10;
	$wrapdf->vcell($c_width,$c_height,$x_axis,' Customer',1);
	$x_axis=$wrapdf->getx();
	$c_width=25;
	$c_height=10;
	$wrapdf->Cell(25,10,$totalCustomerApproveResult['count(*)'],1,0,"C");
	$wrapdf->Ln();

	

	$wrapdf->SetFont('Arial','B',10);
	$x_axis=$wrapdf->getx();
	$c_width=165;
	$c_height=10;
	$wrapdf->vcell($c_width,$c_height,$x_axis,' Administrator',1);
	$x_axis=$wrapdf->getx();
	$c_width=25;
	$c_height=10;
	$wrapdf->Cell(25,10,$totalAdministratorResult['count(*)'],1,0,"C");
	$wrapdf->Ln();

	$wrapdf->SetFont('Arial','B',10);
	$x_axis=$wrapdf->getx();
	$c_width=165;
	$c_height=10;
	$wrapdf->vcell($c_width,$c_height,$x_axis,' Staff',1);
	$x_axis=$wrapdf->getx();
	$c_width=25;
	$c_height=10;
	$wrapdf->Cell(25,10,$totalStaffResult['count(*)'],1,0,"C");
	$wrapdf->Ln();




	$wrapdf->Output();





    			
    		}

    ?>