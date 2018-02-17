<?php
require('res/fpdf/fpdf.php');

class PDF extends FPDF {
    // Cabecera de página
    function Header() {
        $title = "Keroseno Shop - Tu tienda de cine y series online";

        // Arial bold 15
        $this->SetFont('Arial','B',15);
        
        // Calculamos ancho y posición del título.
        $w = $this->GetStringWidth($title)+6;
        $this->SetX((210-$w)/2);
        
        // Colores de los bordes, fondo y texto
        $this->SetDrawColor(0,80,180);
        $this->SetFillColor(230,230,0);
        $this->SetTextColor(220,50,50);
        
        // Ancho del borde (1 mm)
        $this->SetLineWidth(1);
        
        // Título
        $this->Cell($w,9,$title,1,1,'C',true);
        
        // Salto de línea
        $this->Ln(10);
        }

    // Pie de página
    function Footer() {
        // Posición: a 1,5 cm del final
        $this->SetY(-15);
        
        // Arial italic 8
        $this->SetFont('Arial','I',8);
        
        // Número de página
        $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    }
    
    // Tabla coloreada
    function FancyTable($header, $data) {
        // Colores, ancho de línea y fuente en negrita
        $this->SetFillColor(255,0,0);
        $this->SetTextColor(255);
        $this->SetDrawColor(128,0,0);
        $this->SetLineWidth(.3);
        $this->SetFont('','B');
        
        // Cabecera
        $w = array(40, 100, 50);
        for($contador = 0; $contador < count($header); $contador++)
            $this->Cell($w[$contador], 6, $header[$contador], 1, 0, 'C', true);
        $this->Ln();
        
        // Restauración de colores y fuentes
        $this->SetFillColor(224,235,255);
        $this->SetTextColor(0);
        $this->SetFont('');
        
        // Datos
        $fill = false;
        foreach($data as $row) {
            $this->Cell($w[0],6,number_format($row[0]),'LR',0,'C',$fill);
            $this->Cell($w[1],6,$row[1],'LR',0,'C',$fill);
            $this->Cell($w[2],6,$row[2],'LR',0,'C',$fill);
            $this->Ln();
            $fill = !$fill;
        }
        
        // Línea de cierre
        $this->Cell(array_sum($w),0,'','T');
    }
}

// Creación del objeto de la clase heredada
$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();

$pdf->SetFont('Arial','',14);
$pdf->Write(5,'SUBFAMILIAS');

// Salto de línea
$pdf->Ln(10);

$pdf->SetFont('Arial','',12);

// Títulos de las columnas
$header = array('ID', 'Descripcion', 'Familia');
// Carga de datos
include '../datos_bd.php';
$enlace = mysqli_connect(SERVIDOR, USUARIO, CLAVE, BASE_DE_DATOS);

// Si hay error de conexión.
if (!mysqli_connect_errno()) {
    
    // Se obtienen todos los artículos.
    $consulta = "SELECT * FROM SUBFAMILIA";
    $resultado = mysqli_query($enlace, $consulta);

    // Si hay resultado.
    if ($resultado) {

        // Mientras haya filas.
        while ($fila = mysqli_fetch_row($resultado)) {

            // Se obtiene el nombre de la subfamilia.
            $consulta2 = "SELECT DESCRIPCION FROM FAMILIA WHERE ID = $fila[2]";
            $resultado2 = mysqli_query($enlace, $consulta2);
            $fila2 = mysqli_fetch_row($resultado2);

            // Se guarda la fila.
            $data[] = array($fila[0], $fila[1], $fila2[0]);
        }

        // Se liberan los resultados de la memoria.
        mysqli_free_result($resultado);
        mysqli_free_result($resultado2);
    }

    // Se cierra la conexión con la base de datos.
    mysqli_close($enlace);
}

$pdf->FancyTable($header,$data);
$pdf->Output();
?>