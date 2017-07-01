        <?php 
            include('includes/session.php');
            include('includes/connection.php');
            include('includes/functions.php');
  
    ?>


<?php
	if(!isset($_POST['product_summary'])){

	}else{


		$sortby = $_POST['sortby'];
		$from = $_POST['from'];
		$to = $_POST['to'];

		$generatepdfSQL ="";
		if($sortby == '0'){
			$generatepdfSQL="SELECT * FROM producttbl as a JOIN categorytbl as b ON a.category_id=b.category_id WHERE  a.date_added BETWEEN '$from' AND '$to'  AND a.product_bin != 'bin'  ORDER BY a.category_id";
		}
		else if($sortby == '1'){
			$generatepdfSQL="SELECT * FROM producttbl as a JOIN categorytbl as b ON a.category_id=b.category_id WHERE  a.date_added BETWEEN '$from' AND '$to' AND a.product_bin != 'bin' AND a.category_id ='$sortby'  ORDER BY a.category_id";
		}else if($sortby == '2'){
			$generatepdfSQL="SELECT * FROM producttbl as a JOIN categorytbl as b ON a.category_id=b.category_id WHERE  a.date_added BETWEEN '$from' AND '$to' AND a.product_bin != 'bin' AND a.category_id ='$sortby'  ORDER BY a.category_id";
		}else if($sortby == '3'){
			$generatepdfSQL="SELECT * FROM producttbl as a JOIN categorytbl as b ON a.category_id=b.category_id WHERE  a.date_added BETWEEN '$from' AND '$to' AND a.product_bin != 'bin' AND a.category_id ='$sortby'  ORDER BY a.category_id";
		}else if($sortby == '4'){
			$generatepdfSQL="SELECT * FROM producttbl as a JOIN categorytbl as b ON a.category_id=b.category_id WHERE  a.date_added BETWEEN '$from' AND '$to' AND a.product_bin != 'bin' AND a.category_id ='$sortby'  ORDER BY a.category_id";
		}else if($sortby == '5'){
			$generatepdfSQL="SELECT * FROM producttbl as a JOIN categorytbl as b ON a.category_id=b.category_id WHERE  a.date_added BETWEEN '$from' AND '$to' AND a.product_bin != 'bin' AND a.category_id ='$sortby'  ORDER BY a.category_id";
		}else if($sortby == '6'){
			$generatepdfSQL="SELECT * FROM producttbl as a JOIN categorytbl as b ON a.category_id=b.category_id WHERE a.date_added BETWEEN '$from' AND '$to' AND a.product_bin != 'bin' AND a.category_id ='$sortby'  ORDER BY a.category_id";
		}else if($sortby == '7'){
			$generatepdfSQL="SELECT * FROM producttbl as a JOIN categorytbl as b ON a.category_id=b.category_id WHERE  a.date_added BETWEEN '$from' AND '$to' AND a.product_bin != 'bin' AND a.category_id ='$sortby'  ORDER BY a.category_id";
		}else if($sortby == '8'){
			$generatepdfSQL="SELECT * FROM producttbl as a JOIN categorytbl as b ON a.category_id=b.category_id WHERE  a.date_added BETWEEN '$from' AND '$to' AND a.product_bin != 'bin' AND a.category_id ='$sortby'  ORDER BY a.category_id";
		}else if($sortby == '9'){
			$generatepdfSQL="SELECT * FROM producttbl as a JOIN categorytbl as b ON a.category_id=b.category_id WHERE  a.date_added BETWEEN '$from' AND '$to' AND a.product_bin != 'bin' AND a.category_id ='$sortby'  ORDER BY a.category_id";
		}

		$generatepdfQuery=mysqli_query($connection,$generatepdfSQL);
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
	$wrapdf->Cell(0,10,"Product Report",0,1,"C");
	$wrapdf->Cell(0,10,"From: ".$date_from." To: " .$date_to,0,1,"C");
	$wrapdf->Ln(8);


	$wrapdf->SetFont('Arial','B',10);
	$wrapdf->Cell(40,10,"Product ID",1,0,"C");
	$wrapdf->Cell(50,10,"Product Category",1,0,"C");
	$wrapdf->Cell(80,10,"Product Name",1,0,"C");
	$wrapdf->Cell(50,10,"Product Price (PHP)",1,0,"C");
	$wrapdf->Cell(50,10,"Product Quantity",1,1,"C");
	
	


	while($result_DisplayGenerate= mysqli_fetch_assoc($generatepdfQuery)){


		$x_axis=$wrapdf->getx();
		$c_width=40;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,$result_DisplayGenerate['product_id'],1);

		$x_axis=$wrapdf->getx();
		$c_width=50;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,$result_DisplayGenerate['category_name'],1);


		$x_axis=$wrapdf->getx();
		$c_width=80;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,$result_DisplayGenerate['product_name'],1);

		$x_axis=$wrapdf->getx();
		$c_width=50;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,$result_DisplayGenerate['product_price'],1);


		$x_axis=$wrapdf->getx();
		$c_width=50;
		$c_height=10;
		$wrapdf->vcell($c_width,$c_height,$x_axis,$result_DisplayGenerate['product_quantity'],1);
		
		$wrapdf->Ln();

	}



	

	
	$wrapdf->Output();

	}
?>