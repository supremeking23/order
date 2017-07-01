        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>


<?php
	if(!isset($_POST['generate_summary'])){

	}else{


	
		$from = $_POST['from'];
		$to = $_POST['to'];

		$query = "SELECT a.firstname,a.surname,a.customer_address,b.order_id,b.date_ordered,b.date_approved,b.date_delivered,b.status,b.total_price FROM customertbl as a JOIN ordertbl as b ON(a.customer_id = b.customer_id) WHERE b.date_delivered BETWEEN '$from' AND '$to' AND status = 'delivered'";

		$generatepdfQuery=mysqli_query($connection,$query);
?>

<?php
	require('fpdf/fpdf.php');

	class ConductPDF extends FPDF {
		function vcell($c_width,$c_height,$x_axis,$text){
			$w_w=$c_height/3;
			$w_w_1=$w_w+2;
			$w_w1=$w_w+$w_w+$w_w+3;
			$len=strlen($text);

			if($len>30){
				$w_text=str_split($text,30);
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

	

	$wrapdf=new ConductPDF('P','mm','A4');
	$wrapdf->AddPage('L');
	$wrapdf->SetFont('Arial','',16);
	$wrapdf->AliasNbPages();


	$from_date=date_create($from);
	$date_from= date_format($from_date,"F d, Y");

	$to_date=date_create($to);
	$date_to= date_format($to_date,"F d, Y");


	$wrapdf->Image('images/SD_logo.png',37,10,25);
	$wrapdf->SetFont('Arial','B',16);
	$wrapdf->Cell(0,10,"Swiss Deli Philippines Inc.",0,1,"C");
	$wrapdf->SetFont('Arial','I',14);
	$wrapdf->Cell(0,2,"Online Ordering and Delivery System",0,1,"C");
	$wrapdf->SetFont('Arial','',14);
	$wrapdf->Cell(0,10,"Delivered Order Report",0,1,"C");
	$wrapdf->Cell(0,10,"From: ".$date_from." To: " .$date_to,0,1,"C");
	$wrapdf->Ln(8);


	$wrapdf->SetFont('Arial','B',10);
	$wrapdf->Cell(20,10,"Order ID",1,0,"C");
	$wrapdf->Cell(50,10,"Customer Name",1,0,"C");
	$wrapdf->Cell(50,10,"Customer Address",1,0,"C");
	$wrapdf->Cell(40,10,"Date Ordered",1,0,"C");
	$wrapdf->Cell(40,10,"Date Approved",1,0,"C");
	$wrapdf->Cell(40,10,"Date Delivered",1,0,"C");
	$wrapdf->Cell(40,10,"Status",1,1,"C");
	
	


	while($result_DisplayGenerate= mysqli_fetch_assoc($generatepdfQuery)){


		$wrapdf->Cell(20,10,"SD".$result_DisplayGenerate['order_id'],1,0,"C");

		$x_axis=$wrapdf->getx();
		$c_width=50;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,$result_DisplayGenerate['firstname'].' '. $result_DisplayGenerate['surname'],1);


		$x_axis=$wrapdf->getx();
		$c_width=50;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,$result_DisplayGenerate['customer_address'],1);

		$x_axis=$wrapdf->getx();
		$c_width=40;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,$result_DisplayGenerate['date_ordered'],1);


		$x_axis=$wrapdf->getx();
		$c_width=40;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,$result_DisplayGenerate['date_approved'],1);

		$x_axis=$wrapdf->getx();
		$c_width=40;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,$result_DisplayGenerate['date_delivered'],1);


		$deliveredword="";
		if($result_DisplayGenerate['status']=="delivered"){
			$deliveredword="Delivered";
		}




		$wrapdf->Cell(40,10,$deliveredword,1,0,"C");
		
		$wrapdf->Ln();

	}



	

	
	$wrapdf->Output();

	}
?>