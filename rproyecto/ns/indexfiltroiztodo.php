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
				<div class="informacion">

					<div><div class="tipos t1 ">no se que decir largo y mas aun si es enorme para poder leerlo</div></div>
					<div class="stocks ">Stock: 11</div>
					<div class="precios ">S/. 22.00</div>
					
				</div>

				<div class="oculto">
					<?php 
						include ("db/db.php");
						conectar_bd();
						$idr = $_GET['id'];

						$peticion= "SELECT * FROM like_usuario WHERE estado_like = '$idr' and id_usuarios = :uid ";
						
						$peticion= "SELECT * FROM ropita WHERE id_tipo_filtro = '$idr'  ORDER BY id_ropita DESC  ";



						$ejecutar= mysqli_query($conexio,$peticion);
						while($fila=mysqli_fetch_array($ejecutar)){
							
							$img= $fila['img'];							

							echo "									

								<div id='ropita'>
									
									<div id='mas'>+
										<div id='comentar'><a href='#'><span class='icon-bubbles'></span></a></div>
										<div id='megusta'><a class='id_like'><span class='icon-heart heart'></a></div>
										<div id='ver'><a href='#'><span class='icon-eye'></a></div>
									</div>
									<img id='prenda' src='img/$img'>
									
								</div>
								
				 			";
					}
					?>	
				</div>

			<div class="iz">
				<?php 
				conectar_bd();

				$peticion= "SELECT * FROM ropita WHERE mod(id_ropita,2) = 0  and id_tipo_filtro = '$idr' ORDER BY id_ropita DESC ";

				$ejecutar= mysqli_query($conexio,$peticion);
						while($fila=mysqli_fetch_array($ejecutar)){
							
							$img= $fila['img'];							

							echo "
									

								<div id='ropita'>
									
									<div id='mas'>+
										<div id='comentar'><a href='#'><span class='icon-bubbles'></span></a></div>
										<div id='megusta'><a class='id_like'><span class='icon-heart heart'></a></div>
										<div id='ver'><a href='#'><span class='icon-eye'></a></div>
									</div>
									<img id='prenda' src='img/$img'>
									
								</div>
								
				 			";
					}

				
				?>
			</div>
				

				<div class="der">					
					<?php 
					conectar_bd();

					$peticion= "SELECT * FROM ropita WHERE  mod(id_ropita,2) <> 0 and id_tipo_filtro = '$idr'  ORDER BY id_ropita DESC ";

					$ejecutar= mysqli_query($conexio,$peticion);
						while($fila=mysqli_fetch_array($ejecutar)){
							
							$img= $fila['img'];
							
							

							echo "
									

								<div id='ropita'>
									
									<div id='mas'>+
										<div id='comentar'><a href='#'><span class='icon-bubbles'></span></a></div>
										<div id='megusta'><a class='id_like'><span class='icon-heart heart'></a></div>
										<div id='ver'><a href='#'><span class='icon-eye'></a></div>
									</div>
									<img id='prenda' src='img/$img'>
									
								</div>

								
				 			";
					}

				
					?>
				</div>

				