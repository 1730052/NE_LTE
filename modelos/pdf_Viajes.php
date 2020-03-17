<?php
require "../controladores/conexion.php";
//Variable que tiene la accion a realizar con la tabla
$count = "SELECT v.id as Id, c.nombre as Cliente, e.nombre as Empleado, a.nombre as Admin,
	v.fecha_solicitud, v.fecha_fin, v.material, v.destino
	FROM viajes v INNER JOIN administradores a ON a.id = v.id_admin
	INNER JOIN clientes c ON c.id = v.id_cliente
	INNER JOIN empleados e ON e.id = v.id_empleado WHERE v.id BETWEEN 1 AND 100 ORDER BY `v`.`id` ASC";
require('fpdf.php');
class PDF extends FPDF
{
	//Doy los valores para el encabezado de la pagina
	function Header()
	{
		$this->SetFont('Arial','B',15);
		$this->Cell(30);
		$this->Cell(120,10, 'Reporte',0,0,'C');
		$this->Ln(20);
	}

	//Doy los valores para el pie de pagiina
	function Footer()
	{
		$this->SetY(-15);
		$this->SetFont('Arial','I', 8);
		$this->Cell(0,10, 'Pagina '.$this->PageNo().'/{nb}',0,0,'C' );
	}
}

//Creo un PDF
$pdf = new PDF();
//Asigno los atributos que va a tener
$pdf->AliasNbPages();
$pdf->AddPage('O');

//Imprimo los campos que se van a mostrar
$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',8);
$pdf->Cell(30,6,'CLIENTE',1,0,'C',1);
$pdf->Cell(30,6,'EMPLEADO',1,0,'C',1);
$pdf->Cell(30,6,'ADMIN',1,0,'C',1);
$pdf->Cell(30,6,'FECHA_SOLICITUD',1,0,'C',1);
$pdf->Cell(30,6,'FECHA_FINALIZACION',1,0,'C',1);
$pdf->Cell(30,6,'MATERIAL',1,0,'C',1);
$pdf->Cell(30,6,'DESTINO',1,0,'C',1);
$pdf->SetFont('Arial','',8);

//Hago la sentencia con la variable count
$sentencia = $BD->prepare($count);
$sentencia->execute();
//Tomo todos los elementos que coincidan
$resultado = $sentencia->fetchAll(PDO::FETCH_ASSOC);

//Imprimo cada valor de la tabla
foreach ($resultado as $row) {
  $pdf->Ln();
	$pdf->Cell(30,6,$row['Cliente'],1,0,'C');
  $pdf->Cell(30,6,$row['Empleado'],1,0,'C');
	$pdf->Cell(30,6,$row['Admin'],1,0,'C');
  $pdf->Cell(30,6,$row['fecha_solicitud'],1,0,'C');
  $pdf->Cell(30,6,$row['fecha_fin'],1,0,'C');
  $pdf->Cell(30,6,$row['material'],1,0,'C');
  $pdf->Cell(30,6,$row['destino'],1,0,'C');

}

$pdf->Output();


?>
