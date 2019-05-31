<?php
//Archivo de conexión a la base de datos
include ("../db.php");
conectar_bd();
	
//Creamos las variables necesarias
$tiporopa = $_POST['nombre'];
$precioropa = $_POST['precio'];
$filtro = $_POST['sel_filtro'];
$precioventa = $_POST['precio_venta'];


//Cambiamos los ENTER por <br>

//Comprobamos que los inputs no estén vacíos, y si lo están, mandamos el mensaje correspondiente
if(empty($tiporopa)) {
	die( 'Es necesario el título' );}
elseif(empty($precioropa)) {
	die( 'Es necesario el Precio' );}
elseif(empty($precioventa)) {
	die( 'Es necesario un filtro' );}
elseif(empty($filtro)) {
	die( 'Es necesario un filtro' );}


	//"Error 4" en los array de $_FILES significa que ningún archivo fue subido o incluido en el input
	//Más info en http://php.net/manual/es/features.file-upload.errors.php
 elseif($_FILES['imagen']['error'] === 4) {
	die( 'Es necesario establecer una imagen' );
	//Si los inputs están seteados y el archivo no tiene errores, se procede
} else if(isset($precioropa) AND isset($tiporopa) AND isset($precioventa) AND isset($filtro) AND $_FILES['imagen']['error'] === 0 ) {

	//Convertimos la información de la imagen en binario para insertarla en la BBDD
	$imgtemp = $_FILES['imagen']['tmp_name'];

	//Nombre del archivo
	$nombreArchivo = $_FILES['imagen']['name'];

	//Extensiones permitidas
	

	//Obtenemos la extensión (en minúsculas) para poder comparar

	if ((($_FILES["imagen"]["type"]  == "image/gif") || 
	     ($_FILES["imagen"]["type"] == "image/jpeg") ||
	     ($_FILES["imagen"]["type"] == "image/bpm") || 
	     ($_FILES["imagen"]["type"] == "image/png")|| 
	     ($_FILES["imagen"]["type"] == "image/PNG")||
	     ($_FILES["imagen"]["type"] == "image/JPG")||
	     ($_FILES["imagen"]["type"] == "image/jpg")) && 
	     ($_FILES["imagen"]["size"] < 10000000000000000))
	{
	
	//Verificamos que sea una extensión permitida, si no lo es mostramos un mensaje de error
	 if ($_FILES["imagen"]["error"] > 0) {
		die( 'Sólo se permiten archivos con las siguientes extensiones: '.implode(', ', $extensiones) );
		} 

	else 
		{
		//Si la extensión es correcta, procedemos a comprobar el tamaño del archivo subido
		//Y definimos el máximo que se puede subir
		//Por defecto el máximo es de 2 MB, pero se puede aumentar desde el .htaccess o en la directiva 'upload_max_filesize' en el php.ini

		$tamañoArchivo = $_FILES['imagen']['size']; //Obtenemos el tamaño del archivo en Bytes
		$tamañoArchivoKB = round(intval(strval( $tamañoArchivo / 1024 ))); //Pasamos el tamaño del archivo a KB

		$tamañoMaximoKB = "2048"; //Tamaño máximo expresado en KB
		$tamañoMaximoBytes = $tamañoMaximoKB * 1024; // -> 2097152 Bytes -> 2 MB

		//Comprobamos el tamaño del archivo, y mostramos un mensaje si es mayor al tamaño expresado en Bytes
		if($tamañoArchivo > $tamañoMaximoBytes)
			{
			die( "El archivo ".$nombreArchivo." es demasiado grande. El tamaño máximo del archivo es de ".$tamañoMaximoKB."Kb." );
			} 
		else
			{
			$peticion= "SELECT * FROM tipo_filtro ORDER BY id_tipo_filtro DESC LIMIT 1";
			$ejecutar= mysqli_query($conexio,$peticion);
			while($fila=mysqli_fetch_array($ejecutar))
				{
					$sumaimg= $fila['id_tipo_filtro']+1;
				}
			//Si el tamaño es correcto, subimos los datos
			$consulta = "INSERT INTO tipo_filtro SET 
					nombre='$tiporopa',
					precio='$precioropa',
					precio_venta='$precioventa',
					tipo='t$filtro',
					img='$sumaimg$nombreArchivo'
					";			

			//Hacemos la inserción, y si es correcta, se procede
			if(mysqli_query($conexio, $consulta))
				{
				//guardamos la imagen en la carpeta
				rename($imgtemp, "../img_tipo_filtro/$sumaimg$nombreArchivo");
				//Reiniciamos los inputs
				echo '<script>
						$("#enviarimagenes input,textarea").each(function(index) {
						$(this).val("");
						});
					  </script>';
				//Cerramos la conexión con MySQL
				mysqli_close($conexio);
				//Mostramos un mensaje
				die( "Se agrego un nuevo tipo de Producto" );
				}
			else
				{
				//Si hay algún error con la inserción, se muestra un mensaje
				die( "Parece que ha habido un error. Recargue la página e inténtelo nuevamente." );
				};

			};//Fin condicional tamaño archivo

		};//Fin condicional extensiones

	}

	else 
	{

	 echo "Tipo de imagen no permitido <br> Extenciones: jpg, jpeg, gif, png, bmp. ";
	}

};//Fin condicional para saber si todos los campos necesarios están completos
?>