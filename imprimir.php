<?php 
require ('fpdf/fpdf.php');
require 'config/database.php';


if (isset($_POST['imprimir'])) 
		{
			


class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        
        // Arial bold 15
        $this->SetFont('Arial','B',15);
        // Movernos a la derecha
        $this->Cell(80);
        // Título
        $this->Cell(30,10,'Factura',1,0,'C');
        // Salto de línea
        $this->Ln(20);
    }

    // Pie de página
    function Footer()
    {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        // Número de página
        $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
    }

    // Tabla
    function TablaFactura($header, $data)
    {
        // Cabecera
        foreach($header as $col)
        
        $this->Cell(50,7,$col,1);
        $this->Ln();
        // Datos
        foreach($data as $row)
        {
            foreach($row as $col)
                $this->Cell(50,6,$col,1);
            $this->Ln();
        }
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF('L');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',12);

$registros="SELECT *FROM venta";
$resulta = $conexion->query($registros);

$header = array('Ref de Factura', 'Fecha', 'Id de Usuario', 'Comprobante de Pago N', 'Telf');
$data = array();


while($row1 = $resulta->fetch_assoc()){
    $data[] = array($row1['id_venta'], $row1['fecha'], $row1['id_usuario'], $row1['referencia'], $row1['telefono']);

    $header2 = array('Id de Producto', 'Cantidad', 'Precio Unitario', 'Descuento+IVA');
    $data2 = array();

    $registross = "SELECT * FROM detalle WHERE id_venta = '".$row1['id_venta']."'";
    $resultaa = $conexion->query($registross);
    $totalsub = 0;
    while($row2 = $resultaa->fetch_assoc()){
        $data2[] = array($row2['id_producto'], $row2['cantidad'], '$'.$row2['precio_unit'], '$'.$row2['subtotal']);
        $totalsub += $row2['precio_unit'];
    }
    $data2[] = array('Subtotal:$'.$totalsub, 'Total: $'.$row1['total']);

    $pdf->TablaFactura($header, $data);
    
    $pdf->TablaFactura($header2, $data2);
    $pdf->Ln(10);
}

$pdf->Output();
        }
?>