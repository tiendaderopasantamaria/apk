<?php 
include ("db/db.php");
conectar_bd();

$usuario=$_POST["usuario"];
$email=$_POST["email"];
$password=$_POST["password"];
$password2=$_POST["password2"];


$sel = "SELECT * FROM usuarios WHERE email = '$email'";

$ejecutar = mysqli_query($conexio,$sel);

$chequear_email= mysqli_num_rows($ejecutar);

if ($chequear_email==1) {
	echo "El Email ya se encuentra Registrado";
	exit();
}

$sel2 = "SELECT * FROM usuarios WHERE usuario = '$usuario'";

$ejecutar = mysqli_query($conexio,$sel2);

$chequear_usuario= mysqli_num_rows($ejecutar);

if ($chequear_usuario==1) {
	echo "Utilice Otro Usuario";
	exit();
}

if (
	($usuario=="") ||
	($email=="") ||
	($password==""))
{
	echo "Todos los campos son Requeridos";
}

elseif ($password==$password2) {

	
		$insertar = "INSERT INTO usuarios SET
		usuario='$usuario',
		email='$email',
		Contrasena='$password2'
		";				
						 
		$ejecutar= mysqli_query($conexio,$insertar)
		or die (mysqli_error());

		if ($ejecutar) {
			echo "Te has Registrado con Exito";

		}
	
}
else
		{
			echo "Las Contraceñas no Coinciden";
			
		}



?>