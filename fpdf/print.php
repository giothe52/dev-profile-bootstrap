<?php
require "fpdf.php";
$servername = "localhost";
$username = "root";
$password = "";
$db = new PDO("mysql:host=$servername;dbname=db_inventory", $username, $password);

class myPDF extends FPDF{
	function header(){
		$this->Image('cvsu.jpg',10,6);
		$this->SetFont('Arial','B',14);
		$this->Cell(276,5,'CAVITE STATE UNIVERSITY BACOOR CAMPUS',0,0,'C');
		$this->Ln();
		$this->SetFont('Times','',12);
		$this->Cell(276,10,'Street Address',0,0,'C');
		$this->Ln(20);
		$this->SetFont('Times','B',14);
		$this->Cell(280,10,'Supply And Materials Report',1,0,'C');
		$this->Ln(10);
	}
	function footer(){
		$this->SetY(-15);
		$this->SetFont('Arial','',8);
		$this->Cell(0,10,'Page' .$this->PageNo().'/{nb}',0,0,'C');
	}
	function headerTable(){
		$this->SetFont('Times','B',12);
		$this->Cell(18,8,'Quantity',1,0,'C');
		$this->Cell(15,8,'Unit',1,0,'C');
		$this->Cell(25,8,'Item Name',1,0,'C');
		$this->Cell(30,8,'Description',1,0,'C');
		$this->Cell(20,8,'Amount',1,0,'C');
		$this->Cell(27,8,'Total Amount',1,0,'C');
		$this->Cell(30,8,'Request By',1,0,'C');
		$this->Cell(35,8,'Department',1,0,'C');
		$this->Cell(35,8,'Date Requested',1,0,'C');
		$this->Cell(20,8,'Status',1,0,'C');
		$this->Cell(25,8,'Remark',1,0,'C');
		$this->Ln();
	}
	function viewTable($db){
		$this->SetFont('Arial','',10);
		if(ISSET($_POST['pass'])){
			$stmt = $db->query("SELECT * FROM supplyrequest_tbl  WHERE RequestorDepartment = '".$_POST['pass']."'");
			while($data = $stmt->fetch(PDO::FETCH_OBJ)){

					$this->Cell(18,8,$data->qty_request,1,0,'C');
					$this->Cell(15,8,$data->unit,1,0,'C');
					$this->Cell(25,8,$data->itemname,1,0,'C');
					$this->Cell(30,8,$data->description,1,0,'C');
					$this->Cell(20,8,$data->amount,1,0,'C');
					$this->Cell(27,8,$data->totalamount,1,0,'C');
					$this->Cell(30,8,$data->RequestBy,1,0,'C');
					$this->Cell(35,8,$data->RequestorDepartment,1,0,'C');
					$this->Cell(35,8,$data->DateRequested,1,0,'C');
					$this->Cell(20,8,$data->Status,1,0,'C');
					$this->Cell(25,8,$data->remark,1,0,'C');
				$this->Ln();
				}
			
		}
	}
}
$pdf = new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L','A4',0);
$pdf->headerTable();
$pdf->viewTable($db);
$pdf->Output();
$pdf->SetX(50);
?>