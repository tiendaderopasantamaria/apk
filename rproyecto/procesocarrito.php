<?php
session_start();

if(!isset($_SESSION['user_session']))
{
	header("Location: index.php");
}

include_once 'dbconfig.php';

$stmt = $db_con->prepare("SELECT * FROM usuarios WHERE id_usuarios=:uid");
$stmt->execute(array(":uid"=>$_SESSION['user_session']));
$row=$stmt->fetch(PDO::FETCH_ASSOC);


?>
			<?php $idusuario=$row['id_usuarios']; ?>

			<?php 
				include ("db/db.php");
				conectar_bd();
				$idt = $_GET['id'];
				$peticion= "SELECT * FROM prenda  WHERE id_prenda='$idt' ";

				$ejecuta= mysqli_query($conexio,$peticion);
				$contador=mysqli_num_rows($ejecuta);

				while($contador=mysqli_fetch_array($ejecuta)){
				$id_tipo_filtro= $contador['id_tipo_filtro'];
				
				$corazon= $contador['corazon'];	 	
				
			}
		 		
			?>

			<?php 
				conectar_bd();
				$peticion= "SELECT * FROM carrito  WHERE id_prenda_c='$idt' and id_usuarios='$idusuario' ";

				$ejecuta= mysqli_query($conexio,$peticion);
				$contador=mysqli_num_rows($ejecuta);

				if(!$contador)
				{
					$insertar = "INSERT INTO carrito SET
					estado_carrito='no',
					id_prenda_c='$idt',
					id_tipo_filtro='$id_tipo_filtro',
					id_usuarios='$idusuario'
					
					
					";				
					 
	 				mysqli_query($conexio,$insertar)
					or die (mysqli_error());
					
				}
		 		
			?>

			<?php 
				
				conectar_bd();
				$idt = $_GET['id'];
				$peticion= "SELECT * FROM carrito WHERE id_usuarios='$idusuario' and id_prenda_c='$idt' ";

				$ejecutar= mysqli_query($conexio,$peticion);
				$fila=mysqli_num_rows($ejecutar);
		 		
				

				while($fila=mysqli_fetch_array($ejecutar)){
				$estado= $fila['estado_carrito'];

			 	if($estado == 'no' )
				{
					$insertar = "UPDATE carrito SET
					estado_carrito='si' WHERE id_usuarios='$idusuario' and id_prenda_c='$idt'
					";				
					 
	 				mysqli_query($conexio,$insertar)
					or die (mysqli_error());					
				}

				if($estado == 'si')
				{
					$insertar = "UPDATE carrito SET
					estado_carrito='no' WHERE id_usuarios='$idusuario' and id_prenda_c='$idt'
					";				
					 
	 				mysqli_query($conexio,$insertar)
					or die (mysqli_error());
								
				}

			}
			?>



			<?php 
				
				conectar_bd();
				$idt = $_GET['id'];
				$peticion= "SELECT carrito FROM prenda  WHERE id_prenda='$idt' ";

				$ejecutar= mysqli_query($conexio,$peticion);

				while($fila=mysqli_fetch_array($ejecutar)){
					
					$corazon= $fila['carrito'];
					$mas=$corazon + 1 ;
					$menos=$corazon - 1 ;

					if($estado == 'no' )
					{
						
						$insertar = "UPDATE prenda SET 
						
						carrito='$mas' WHERE id_prenda='$idt'
						";			
		 				mysqli_query($conexio,$insertar)
						or die (mysqli_error());
						
						echo "$mas +";
						
					}

					if($estado == 'si' )
					{
						
						$insertar = " UPDATE prenda SET
						
						carrito='$menos' WHERE id_prenda='$idt'
						";			
		 				mysqli_query($conexio,$insertar)
						or die (mysqli_error());
						
						echo "$menos -" ;
						
					}

					
		 		
			}
			?>