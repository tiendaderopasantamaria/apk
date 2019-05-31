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
				$peticion= "SELECT * FROM like_prenda  WHERE id_prenda='$idt' and id_usuarios='$idusuario' ";

				$ejecuta= mysqli_query($conexio,$peticion);
				$contador=mysqli_num_rows($ejecuta);

				if(!$contador)
				{
					$insertar = "INSERT INTO like_prenda SET
					estado_like='no',
					id_prenda='$idt',
					id_tipo_filtro='$id_tipo_filtro',
					id_usuarios='$idusuario',
					corazon='$corazon'
					
					";				
					 
	 				mysqli_query($conexio,$insertar)
					or die (mysqli_error());
					
				}
		 		
			?>

			<?php 
				
				conectar_bd();
				$idt = $_GET['id'];
				$peticion= "SELECT * FROM like_prenda WHERE id_usuarios='$idusuario' and id_prenda='$idt' ";

				$ejecutar= mysqli_query($conexio,$peticion);
				$fila=mysqli_num_rows($ejecutar);
		 		
				

				while($fila=mysqli_fetch_array($ejecutar)){
				$estado= $fila['estado_like'];

			 	if($estado == 'no' )
				{
					$insertar = "UPDATE like_prenda SET
					estado_like='si' WHERE id_usuarios='$idusuario' and id_prenda='$idt'
					";				
					 
	 				mysqli_query($conexio,$insertar)
					or die (mysqli_error());					
				}

				if($estado == 'si')
				{
					$insertar = "UPDATE like_prenda SET
					estado_like='no' WHERE id_usuarios='$idusuario' and id_prenda='$idt'
					";				
					 
	 				mysqli_query($conexio,$insertar)
					or die (mysqli_error());
								
				}

			}
			?>



			<?php 
				
				conectar_bd();
				$idt = $_GET['id'];
				$peticion= "SELECT corazon FROM prenda  WHERE id_prenda='$idt' ";

				$ejecutar= mysqli_query($conexio,$peticion);

				while($fila=mysqli_fetch_array($ejecutar)){
					
					$corazon= $fila['corazon'];
					$mas=$corazon + 1 ;
					$menos=$corazon - 1 ;

					if($estado == 'no' )
					{
						
						$insertar = "UPDATE prenda SET 
						
						corazon='$mas' WHERE id_prenda='$idt'
						";			
		 				mysqli_query($conexio,$insertar)
						or die (mysqli_error());
						
						echo "$mas +";
						
					}

					if($estado == 'si' )
					{
						
						$insertar = " UPDATE prenda SET
						
						corazon='$menos' WHERE id_prenda='$idt'
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
				$peticion= "SELECT corazon FROM like_prenda  WHERE id_prenda='$idt' and id_usuarios='$idusuario' ";
				$ejecutar= mysqli_query($conexio,$peticion);


				while($fila=mysqli_fetch_array($ejecutar)){
					
					$corazon= $fila['corazon'];
					$mas=$corazon + 1 ;
					$menos=$corazon - 1 ;

					if($estado == 'no' )
					{
						
						$insertar = "UPDATE like_prenda SET 
						
						corazon='$mas' WHERE id_prenda='$idt'
						";			
		 				mysqli_query($conexio,$insertar)
						or die (mysqli_error());
						
						
						
					}

					if($estado == 'si' )
					{
						
						$insertar = " UPDATE like_prenda SET
						
						corazon='$menos' WHERE id_prenda='$idt'
						";			
		 				mysqli_query($conexio,$insertar)
						or die (mysqli_error());
						
						
						
					}

					
		 		
			}
			?>