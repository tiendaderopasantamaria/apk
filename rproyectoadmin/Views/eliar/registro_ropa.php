<?php
//Archivo de conexión a la base de datos
include ("db/db.php");
conectar_bd();
	
//Creamos las variables necesarias
$talla = $_POST['talla'];
$idr = $_POST['sel_tipo_filtro'];
$detalle = $_POST['detalle'];
$feria = $_POST['sel_feria'];




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
			//Si el tamaño es correcto, subimos los datos

				conectar_bd();
				$peticion= "SELECT * FROM tipo_filtro  WHERE id_tipo_filtro='$idr' ";				

				$ejecutar= mysqli_query($conexio,$peticion);


				while($fila=mysqli_fetch_array($ejecutar)){
					
					$stock= $fila['stock'];
					$suma=$stock + 1 ;
					$id_tipo_filtro=$fila['id_tipo_filtro'];

					if(!$id_tipo_filtro)
					{
						die( "No Hay Registro");						
					}

					else
					{
						
						$insertar = "UPDATE tipo_filtro SET 
						
						stock='$suma' WHERE id_tipo_filtro='$idr'
						";			
		 				mysqli_query($conexio,$insertar)
						or die (mysqli_error());		
					}
					
		 		
			}

			$peticion= "SELECT * FROM prenda ORDER BY id_prenda DESC LIMIT 1";
				$ejecutar= mysqli_query($conexio,$peticion);
				while($fila=mysqli_fetch_array($ejecutar))
				{
					$sumaimg= $fila['id_prenda']+1;
				}

			$consulta = "INSERT INTO prenda SET 
					talla='$talla',
					id_tipo_filtro='$idr',
					feria_prenda='$feria',
					detalle='$detalle',
					img_prenda='$sumaimg$nombreArchivo',
					estado_prenda='1'
					";


			//Hacemos la inserción, y si es correcta, se procede
			if(mysqli_query($conexio, $consulta))
				{
				//guardamos la imagen en la carpeta
				rename($imgtemp, "../../../rproyecto/img_ropita/$sumaimg$nombreArchivo");
				//Reiniciamos los inputs
				echo '<script>
						$("#enviarimagenes input,textarea").each(function(index) {
						$(this).val("");
						});
					  </script>';
				//Cerramos la conexión con MySQL
				mysqli_close($conexio);
				//Mostramos un mensaje

				die( "Agregó Nuevo Producto");

				
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


