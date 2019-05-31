<?php
	
	require 'conexion.php';
	
	$sql = "SELECT * FROM socio";
	$resultado = $mysqli->query($sql);
	
	while ($row = $resultado->fetch_assoc()){
		
	?>
	
	<img src="barcode.php?text=<?php echo $row['so_codigo']; ?>&size=50&orientation=horizontal&codetype=Code39&print=true&sizefactor=1" />
	
	<br/>
	
<?php } ?>
