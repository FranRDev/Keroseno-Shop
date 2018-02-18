<?php
session_start();
extract($_REQUEST);
require('admin/res/fpdf/fpdf.php');

class PDF extends FPDF {
    // Cabecera de página.
    function Header() {
        $title = "Keroseno Shop - Tu tienda de cine y series online";

        // Arial bold 15.
        $this->SetFont('Arial','B',15);
        
        // Calculamos ancho y posición del título.
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((210-$w)/2);
        
        // Colores de los bordes, fondo y texto.
        $this->SetDrawColor(0,80,180);
        $this->SetFillColor(230,230,0);
        $this->SetTextColor(220,50,50);
        
        // Ancho del borde (1 mm).
        $this->SetLineWidth(1);
        
        // Título.
        $this->Cell($w,9,$title,1,1,'C',true);
        
        // Salto de línea.
        $this->Ln(10);
        }

    // Pie de página.
    function Footer() {
        // Posición: a 1,5 cm del final.
        $this->SetY(-15);
        
        // Arial italic 8.
        $this->SetFont('Arial','I',8);
        
        // Número de página.
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
    
    // Tabla coloreada
    function FancyTable($header, $data) {
        // Colores, ancho de línea y fuente en negrita.
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        
        // Cabecera.
        $w = array(120, 35, 35);
        
        for($contador = 0; $contador < count($header); $contador++)
            $this->Cell($w[$contador], 6, $header[$contador], 1, 0, 'C', true);
        $this->Ln();
        
        // Restauración de colores y fuentes.
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        
        // Datos.
        $fill = false;
        foreach($data as $row) {
            $this->Cell($w[0],6,$row[0],'LR',0,'C',$fill);
            $this->Cell($w[1],6,number_format($row[1]),'LR',0,'C',$fill);
            $this->Cell($w[2],6,number_format($row[2]),'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        
        // Línea de cierre.
        $this->Cell(array_sum($w),0,'','T');
    }
}

// Creación del objeto de la clase heredada.
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','',14);

// Carga de datos.
include 'datos_bd.php';
$enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);

// Si hay error de conexión.
if (!mysqli_connect_errno()) {
    
    // Se obtienen todos los artículos.
    $consulta = "SELECT F.FECHA, F.USUARIO, A.NOMBRE, L.CANTIDAD, L.PRECIO FROM ARTICULO AS A, FACTURA AS F, LINEA AS L WHERE A.ID = L.ID_ARTICULO AND L.ID_FACTURA = F.ID AND F.ID = ".$id;
    $resultado = mysqli_query($enlace, $consulta);
    
    $fila = mysqli_fetch_row($resultado);
    
    $pdf->Ln(10); // Salto de línea.
    
    $pdf->Write(5,'FACTURA');
    $pdf->Ln(20); // Salto de línea.
    
    $pdf->Write(5, 'Usuario: '.$fila[1]);
    $pdf->Ln(10); // Salto de línea.
    
    $pdf->Write(5, 'Fecha: '.$fila[0]);
    $pdf->Ln(20); // Salto de línea.

    $pdf->SetFont('Arial','',12);

    // Títulos de las columnas
    $header = array('PELICULA/SERIE', 'CANTIDAD', 'SUBTOTAL');
    
    // Se obtienen todos los artículos.
    $consulta = "SELECT F.FECHA, F.USUARIO, A.NOMBRE, L.CANTIDAD, L.PRECIO FROM ARTICULO AS A, FACTURA AS F, LINEA AS L WHERE A.ID = L.ID_ARTICULO AND L.ID_FACTURA = F.ID AND F.ID = ".$id;
    $resultado = mysqli_query($enlace, $consulta);

    // Si hay resultado.
    if ($resultado) {

        // Mientras haya filas.
        while ($fila = mysqli_fetch_row($resultado)) {
            
            // Se guarda la fila.
            $data[] = array($fila[2], $fila[3], $fila[4]);
        }

        // Se liberan los resultados de la memoria.
        mysqli_free_result($resultado);
    }

    // Se cierra la conexión con la base de datos.
    mysqli_close($enlace);
    
} else {
    // TODO: Tratar error sin conexión a la BD.
}

$pdf->FancyTable($header,$data);
$pdf->Output();

unset($_SESSION['carro']);
?>