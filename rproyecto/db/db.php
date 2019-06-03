<?php 


//$conex = mysql_connect ("localhost","root","")
//or die ("SE ENCONTRO UN ERROR EN LA CONEXION");
//mysql_select_db ("moyobamba_tq_limpia",$conex)
//or die ("NO EXISTE LA BASE DE DATOS"); 

$conexio;
function conectar_bd()
{
	global $conexio;
	//Definir datos de conexion con el servidor MySQL
	$laBd = "bmkubcaacvfyfmlhr2t0";
	$elUsr = "uvpy41ydy33hsxmt";
	$elPw  = "s3R28mgWgmR9KlcdUaMS";
	$elServer ="bmkubcaacvfyfmlhr2t0-mysql.services.clever-cloud.com";
	
	
	//Conectar
	$conexio = mysqli_connect($elServer, $elUsr , $elPw) or die (mysqli_error());
	
	//Seleccionar la BD a utilizar
	mysqli_select_db($conexio, $laBd ) or die (mysqli_error());
}
?>