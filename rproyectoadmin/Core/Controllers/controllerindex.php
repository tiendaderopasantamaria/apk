<?php 
if (isset($_SESSION['usuario'])) {
        include 'Views/index.php';	
	$con=new Conexion();
 } else{
 	header('Location:?view=login');
 	exit();
 }
	
?>