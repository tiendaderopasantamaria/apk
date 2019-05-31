<?php
	require 'fpdf/fpdf.php';
	require 'conexion.php';
	include 'barcode.php';

	$id_socio = $_GET['idcog'];
	
	$sql = "SELECT * FROM usuarios WHERE id_usuarios = '$id_socio' ";
	$resultado = $mysqli->query($sql);
	
	$pdf = new FPDF();
	
	$pdf->SetFont('Arial', '', 7);

	$pdf->SetAutoPageBreak(true, 20);
	$y = $pdf->GetY();
	
	while ($row = $resultado->fetch_assoc()){
		
		

		$sql2 = "SELECT * FROM prenda  pren
                INNER JOIN carrito carr ON carr.id_prenda = pren.id_prenda
                INNER JOIN tipo_filtro tf ON tf.id_tipo_filtro = pren.id_tipo_filtro
                WHERE carr.id_usuarios = '$id_socio' AND pren.estado_prenda = '1'
                ORDER BY carr.id_carrito ASC
        ";
        $resultado2 = $mysqli->query($sql2);		
		
		while ($row2 = $resultado2->fetch_assoc()){

		$img = $row2['img_prenda'];
		$nombre = $row2['nombre'];
		$detalle = $row2['detalle'] ;
		$precio = $row2['precio_venta'] ;
		$precio .= ' - id=' ;
		$precio .= $row2['id_prenda'] ;

			$pdf->AddPage();
			$pdf->Image('../../../../rproyecto/img_ropita/'. $img . '', 5.5 , 11 , 35 , 0 ,'jpg');
			$pdf->Cell(10,-10, $nombre);
			$pdf->Cell(1,-5, $detalle);
			$pdf->Cell(10,0, 'S/. '.$precio);
		
		}
	}
	$pdf->Output();	
	
?>

