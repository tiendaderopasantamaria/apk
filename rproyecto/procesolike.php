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
				$peticion= "SELECT * FROM tipo_filtro  WHERE id_tipo_filtro='$idt' ";

				$ejecuta= mysqli_query($conexio,$peticion);
				$contador=mysqli_num_rows($ejecuta);

				while($contador=mysqli_fetch_array($ejecuta)){
				$nombre= $contador['nombre_tf'];
				$precio= $contador['precio'];
				$stock= $contador['stock'];
				$tipo= $contador['tipo'];
				
				$corazon= $contador['corazon'];
				$compra= $contador['compra'];		 	
				
			}
		 		
			?>

			<?php 
				conectar_bd();
				$peticion= "SELECT * FROM like_usuario  WHERE id_tipo_filtro='$idt' and id_usuarios='$idusuario' ";

				$ejecuta= mysqli_query($conexio,$peticion);


				$contador=mysqli_num_rows($ejecuta);

				

				if(!$contador)
				{
					$insertar = "INSERT INTO like_usuario SET
					estado_like='no', 
					id_usuarios='$idusuario',
					id_tipo_filtro='$idt',
					nombre='$nombre',
					precio='$precio',
					stock='$stock',
					tipo='$tipo',
					
					corazon='$corazon',
					compra='$compra'
					";				
					 
	 				mysqli_query($conexio,$insertar)
					or die (mysqli_error());
					
				}
		 		
			?>

			<?php 
				
				conectar_bd();
				$idt = $_GET['id'];
				$peticion= "SELECT * FROM like_usuario  WHERE id_usuarios='$idusuario' and id_tipo_filtro='$idt' ";

				$ejecutar= mysqli_query($conexio,$peticion);
				$fila=mysqli_num_rows($ejecutar);
		 		
				

				while($fila=mysqli_fetch_array($ejecutar)){
				$estado= $fila['estado_like'];

			 	if($estado == 'no' )
				{
					$insertar = "UPDATE like_usuario SET
					estado_like='si' WHERE id_usuarios='$idusuario' and id_tipo_filtro='$idt'
					";				
					 
	 				mysqli_query($conexio,$insertar)
					or die (mysql_error());					
				}

				if($estado == 'si')
				{
					$insertar = "UPDATE like_usuario SET
					estado_like='no' WHERE id_usuarios='$idusuario' and id_tipo_filtro='$idt'
					";				
					 
	 				mysqli_query($conexio,$insertar)
					or die (mysqli_error());
								
				}

			}
			?>



			<?php 
				
				conectar_bd();
				$idt = $_GET['id'];
				$peticion= "SELECT corazon FROM tipo_filtro  WHERE id_tipo_filtro='$idt' ";

				

				$ejecutar= mysqli_query($conexio,$peticion);


				while($fila=mysqli_fetch_array($ejecutar)){
					
					$corazon= $fila['corazon'];
					$mas=$corazon + 1 ;
					$menos=$corazon - 1 ;

					if($estado == 'no' )
					{
						
						$insertar = "UPDATE tipo_filtro SET 
						
						corazon='$mas' WHERE id_tipo_filtro='$idt'
						";			
		 				mysqli_query($conexio,$insertar)
						or die (mysqli_error());
						
						echo "$mas +";
						
					}

					if($estado == 'si' )
					{
						
						$insertar = " UPDATE tipo_filtro SET
						
						corazon='$menos' WHERE id_tipo_filtro='$idt'
						";			
		 				mysqli_query($conexio,$insertar)
						or die (mysqli_error());
						
						echo "$menos -" ;
						
					}

					
		 		
			}
			?>

			<?php 
				
				conectar_bd();
				$idt = $_GET['id'];
				$peticion= "SELECT corazon FROM like_usuario  WHERE id_tipo_filtro='$idt' and id_usuarios='$idusuario' ";

				

				$ejecutar= mysqli_query($conexio,$peticion);


				while($fila=mysqli_fetch_array($ejecutar)){
					
					$corazon= $fila['corazon'];
					$mas=$corazon + 1 ;
					$menos=$corazon - 1 ;

					if($estado == 'no' )
					{
						
						$insertar = "UPDATE like_usuario SET 
						
						corazon='$mas' WHERE id_tipo_filtro='$idt'
						";			
		 				mysqli_query($conexio,$insertar)
						or die (mysqli_error());
						
						
						
					}

					if($estado == 'si' )
					{
						
						$insertar = " UPDATE like_usuario SET
						
						corazon='$menos' WHERE id_tipo_filtro='$idt'
						";			
		 				mysqli_query($conexio,$insertar)
						or die (mysqli_error());
						
						
						
					}

					
		 		
			}
			?>