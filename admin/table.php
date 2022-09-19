<?php
require('fpdf.php');
$con=mysqli_connect('localhost','root','');
mysqli_select_db($con,'tours');

  
class PDF extends FPDF
{
  

  function Header()
    {
      // $this->Image('logo.png',50,20,50);
      $this->SetFont('Helvetica','B',15);
      $this->SetXY(100, 10);
       $this->Cell(100,10,'Package Details',0,1);
      // $this->SetDrawColor('60','50',100);
      //  $this->Cell(40,5,'Name',1,0,'C',true);
       $this->SetFillColor(180,180,255);
        $this->SetDrawColor(50,50,100);
        $this->cell(60,5,'wname',1,0,'',true);
         $this->cell(40,5,'price_per_office',1,0,'',true);
          $this->cell(40,5,'price_per_desk',1,1,'',true);
     }

  function Footer()
    {
      $this->SetXY(100,-15);
      $this->SetFont('Arial','I',10);
      $this->Write (5, 'This is a footer');
    }
}

$pdf=new PDF();
$pdf->AliasNbPages('{pages}');
$pdf->AddPage();
$pdf->SetFont('Arial','', 9);
$pdf->SetDrawColor(50,50,100);
$query=mysqli_query($con,"select * from workspaces");
   while($data=mysqli_fetch_array($query)) {
     $pdf->cell(60,5,$data['wname'],1,0);
     $pdf->cell(40,5,$data['price_per_office'],1,0);
     $pdf->cell(40,5,$data['price_per_desk'],1,1);
   }
// $pdf->SetFont('Arial','B',12);
// $pdf->SetFillColor(180,180,255); 
// $pdf->Cell(40,5,'Package ID',1,0);
// $pdf->Cell(60,5,'Worksapce Name',1,0);
              


$pdf->Output();
?>
