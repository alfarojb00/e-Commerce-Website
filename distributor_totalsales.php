<?php
	include 'includes/session.php';
	require_once 'FPDF/fpdf.php';
	
	$dist_id = $_GET['id'];

	$stmt = $conn->prepare("SELECT * FROM reseller_orders
		WHERE dist_id = '$dist_id' AND status = 'order received' ");
	$stmt->execute();

	//******************** DOWNLOAD PDF BUTTON *******************************
	class PDF extends FPDF
	{
		// Page header
		function Header()
		{
			// Logo
			$this->Image('images/BG_BANNER/icon.png',15,10,50);
			// Font
			$this->SetFont('Arial','B',22);
			// Move to the right
			$this->Cell(100);
			// Title
			$this->Cell(30,10,'MI-redenszer',0,0);
			// Font
			$this->SetFont('Arial','',10);
			// Move to the right
			$this->Cell(130);
			// SY
			$this->Cell(30,10,'Date : ' .  date("F j\, Y"),0,1);
				
			// Font
			$this->SetFont('Arial','',15);
			// Move to the right
			$this->Cell(100);
			// Sub Title
			$this->Cell(30,10,'My Sales',0,0);
			// Font
			$this->SetFont('Arial','',10);
			// Move to the right
			$this->Cell(130);
			// Admin

			$this->Cell(30,10,'Distributor : ' . $_GET['fname'] ,0,1);
			// Font
			$this->SetFont('Arial','',10);
				
			// Line break
			$this->Ln(20);
		}
		// Page footer
		function Footer()
		{
				// Position at 1.5 cm from bottom
				$this->SetY(-15);
				// Arial italic 8
				$this->SetFont('Arial','I',8);
				// Page number
				$this->Cell(0,10,'Page '.$this->PageNo(),0,0,'C');
		}
	}
		
	$pdf = new PDF('L','mm','Legal');
	$pdf->SetFont('Arial','B',10);
	$pdf->AddPage();
	$pdf->Cell(30,10,'Reseller ID',1,0,'C');
	$pdf->Cell(60,10,'Reseller Name',1,0,'C');
	$pdf->Cell(60,10,'Product Name',1,0,'C');
	$pdf->Cell(60,10,'Delivery Address',1,0,'C');
	$pdf->Cell(40,10,'Product Quantity',1,0,'C');
	$pdf->Cell(40,10,'Order Date',1,0,'C');
	$pdf->Cell(50,10,'Total Price',1,1,'C');
		
	foreach($stmt as $row) {
		
		$pdf->SetFont('Arial','',10);
		$pdf->Cell(30,10,$row['reseller_id'],1,0,'C');

		$query = $conn->prepare("SELECT * FROM users WHERE id = '$row[reseller_id]' ");
		$query->execute();
		foreach($query as $que) {
			$pdf->Cell(60,10,$que['firstname'] ." ". $que['lastname'],1,0,'C');
		}

		
		$pdf->Cell(60,10,$row['product_name'],1,0,'C');
		$pdf->Cell(60,10,$row['delivery_address'],1,0,'C');
		$pdf->Cell(40,10,$row['product_quantity'],1,0,'C');
		$pdf->Cell(40,10,$row['order_date'],1,0,'C');
		$pdf->Cell(50,10,number_format($row['total_price'],2),1,1,'C');

	}

	$sql = $conn->prepare("SELECT SUM(total_price) AS value_sum FROM reseller_orders
			WHERE dist_id = '$dist_id' AND status = 'order received' ");
		$sql->execute();
		$num = $sql->fetch();
		$sum = $num['value_sum'];

		$pdf->Cell(30,10, "",1,0,'C');
		$pdf->Cell(60,10, "",1,0,'C');
		$pdf->Cell(60,10, "",1,0,'C');
		$pdf->Cell(60,10, "",1,0,'C');
		$pdf->Cell(40,10, "",1,0,'C');
		$pdf->Cell(40,10, "Total Sales : "	,1,0,'C');
		$pdf->Cell(50,10,number_format($sum,2),1,1,'C');

	$pdf->Output();
?>