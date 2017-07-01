<?php 
	
	include('includes/connection.php');
	include('includes/functions.php');
	require('fpdf/fpdf.php');
	

	

	if(!isset($_GET['order_id'])){
		echo "<script>window.location='orders.php?orders=orders'</script>";
	}else{

	
		  $order_id = $_GET['order_id'];
 
         $customer_id = $_GET['customer_id'];
         $customer = find_customer_by_id($customer_id);


        //get order date

        $date_query ="SELECT * FROM ordertbl where order_id = '{$order_id}'";
        $run_date = mysqli_query($connection,$date_query);

        while($date = mysqli_fetch_assoc($run_date)){
            $approve = $date['date_approved'];
            $delivered = $date['date_delivered'];
            $status = $date['status'];
        }

			//Create a new PDF file
			$pdf = new FPDF();
			//var_dump(get_class_methods($pdf));
			$pdf ->AddPage();


			$pdf->Image('images/SD_logo.png',30,10,25);
			$pdf->SetFont('Arial','B',16);
			$pdf->Cell(0,10,"SWISS DELI Philippines Inc",0,1,"C");
			$pdf->SetFont('Arial','I',14);
			$pdf->Cell(0,2,"Online Ordering and Delivery System",0,1,"C");
			
			$pdf->Ln(5);

			$pdf->SetFont('Arial','B','10');
			$pdf->Cell(0,10,"Main Office",0,1,"C");
			$pdf->SetFont('Arial','','8');
			$pdf->Cell(0,4," RS Compound km. 7, Lanang, Davao City ",0,1,"C");
			$pdf->SetFont('Arial','','8');
			$pdf->Cell(0,2,"Tel No. 235-3417",0,1,"C");

			$pdf->SetFont('Arial','B','10');
			$pdf->Cell(0,10,"NCR Office",0,1,"C");
			$pdf->SetFont('Arial','','8');
			$pdf->Cell(0,4,"163 Aguirre Ave, BF Homes, Parañaque, 1718 Metro Manila",0,1,"C");
			$pdf->SetFont('Arial','','8');
			$pdf->Cell(0,2,"Tel No. 985 0028",0,1,"C");

			$pdf->Ln(15);

			$pdf->SetFont('Arial','B',14);
			$pdf->Cell(0,2,"SALES INVOICE ",0,1,"C");

			$pdf->Ln(20);

			$approve_date = date_create($approve);
			$date_approved = date_format($approve_date,"F d Y");
			//$mydate = strtotime(date('Y-m-d h:i:s'));
			

			$pdf->SetFont('Arial','B',10);
			$pdf->cell(0,4,'Date Approved:  '. $date_approved,0,1,"R");
			$pdf->Ln(5);

			
			//$date_approved = date('F d Y', strtotime("+2 days"));
			$deliver_date = date_create($delivered);
			$date_delivered = date_format($deliver_date,"F d Y");
			//$mydate = strtotime(date('Y-m-d h:i:s'));
			$pdf->cell(0,4,'Delivery Date:  '. $date_delivered,0,1,"R");
			$pdf->Ln(5);



			while($customer_deteails = mysqli_fetch_assoc($customer)){
				  $fullname	= $customer_deteails['firstname'].' '. $customer_deteails['surname'];
				  $address = $customer_deteails['customer_address'];

			}
			
			$pdf->Cell(80);
			$pdf->cell(0,4,'Term:  COD',0,1,"R");
			$pdf->Ln(20);
			
			$pdf->SetFont('Arial','B','10');
			//$name ="Ivan Christian Jay Funcion";
			$pdf->cell(0,4,'Sold to:  '. $fullname ,0,1,"");
			$pdf->Ln(5);

			$pdf->SetFont('Arial','B','10');
			//$address ="16th ISU Village makati city";
			$pdf->cell(0,4,'Address:  '. $address ,0,1,"");
			$pdf->Ln();


			//$pdf->Cell(0,20,'',0,1,'R');
			$pdf->SetFillColor(224,235,255);
			$pdf->SetDrawColor(192,192,192);
			/*$pdf->Cell(50,7,'Item',1,0,'L');
			$pdf->Cell(50,7,'Quantity',1,1,'C');
			$pdf->Cell(50,7,'Unit Price',1,0,'L');
			$pdf->Cell(50,7,'Ext Price',1,1,'C');
		*/
			


			$pdf->SetFont('Arial','B',10);


			$pdf->Cell(20,10,"Order number: ".' SD'.$order_id,"C");
			$pdf->Cell(20,10,'',0,1,"C");

			$status_main = "";
			if($status=="approve"){
				$status_main ="Ready for Delivery";
			}

			$pdf->Cell(20,10,"Order Status: " .$status_main,"C");
		

			$pdf->Ln(10);
			$pdf->Cell(60,10,"Product Name",1,0,"C");
			$pdf->Cell(40,10,"Quantity",1,0,"C");
			$pdf->Cell(40,10,"Unit Price",1,0,"C");
			$pdf->Cell(40,10,"Ext Price",1,1,"C");

			/*$pdf->Cell(25,10,"Position",1,0,"C");
			$pdf->Cell(25,10,"Username",1,0,"C");
			$pdf->Cell(35,10,"Contact",1,0,"C");
			$pdf->Cell(40,10,"Date",1,1,"C");

			*/

			$pdf->SetFont('Arial','',10);





			$orders =find_order_deteails_by_customer_id($order_id);

			while($invoice=mysqli_fetch_assoc($orders)){
				$total =0;
                $total_quantity = 0;
			
				$pdf->Cell(60,10,$invoice['product_name'],1,0,"C");
				$pdf->Cell(40,10,$invoice['quantity'],1,0,"C");
				$pdf->Cell(40,10,$invoice['product_price'],1,0,"C");
				$pdf->Cell(40,10,number_format( $invoice['product_price'] * $invoice['quantity'],2),1,1,"C");
			}



			$amount = get_total_amount($order_id);
			
			while($total = mysqli_fetch_assoc($amount)){
							$subtotal = $total['total_price'];
							$epoints_use = $total['epoints_use'];
						$total_price = $total['total_price'] - $total['epoints_use'];
			}

			//$pdf->Cell(60,10,''.$subtotal.' - '.$epoints_use ,1,1,"C");

			$pdf->Cell(120,10,'Sub Total: (Php) ',1,0,"C");
			$pdf->Cell(60,10,''.number_format($subtotal,2),1,1,"C");

			$pdf->Cell(120,10,'Points Use: (Php) ',1,0,"C");
			$pdf->Cell(60,10,''.number_format($epoints_use,2),1,1,"C");

			$pdf->Cell(120,10,'Total Amount: (Php) ',1,0,"C");
			$pdf->Cell(60,10,''.number_format($total_price,2),1,1,"C");



			$pdf->Ln(35);
			$pdf->Cell(120,10,'_______________________________________',0,1,"L");
			$pdf->Cell(120,10,'Signature over Printed Name',0,1,"L");
			//filename
			$filename=$fullname;
			$pangalan='SWISS DELI Invoice '.$filename.' List.pdf';
			$pdf->Output($pangalan,'I');





	  }
?>