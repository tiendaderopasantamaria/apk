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

$id_user=$row['id_usuarios']

?>
				
				<div class='informacion'>
					<div class='close-modal'><span class='icon-cross'></div>
					<div class="tituloropa">Estas son las prendas que te gustan</div>									
				</div>

							<script type='text/javascript'>
								$('.close-modal').on('click', function(){
									$('.contenedor-modal').removeClass('mostrar-modal');
									$('body').removeClass('scroll-oculto');
								})
							</script>

				<div class="oculto">

							

					<?php

					include ("db/db.php");
					conectar_bd();
					$idr = $_GET['id'];
					$peticion= "SELECT * FROM like_prenda WHERE estado_like = '$idr' and id_usuarios='$id_user' ";
					$ejecutar= mysqli_query($conexio,$peticion);

						while($fila=mysqli_fetch_array($ejecutar)){
							
							$id_like_prenda= $fila['id_prenda'];

							$peticion2= "SELECT * FROM prenda WHERE id_prenda = '$id_like_prenda'";
								$ejecutar2= mysqli_query($conexio,$peticion2);
								while ($fila2=mysqli_fetch_array($ejecutar2)) {
									$img= $fila2['img_prenda'];
								}							

							echo "									

								<div id='ropita'>
									
									<div id='precio'>S/. ".$fila['precio'].".00</div>

									<div id='mas'>+
										<div id='comentar'><a href='#'><span class='icon-cart'></span></a></div>
										<div id='megusta'><a id='' class='megustaropita$id_like_prenda'><span class='icon-heart heart'></a></div>
										
									</div>
									
									<img id='prenda' src='img_ropita/$img'>
									
									<div id='caja'>
										<img src='img/corazon.png'>
										<h1 class='corazonropita$id_like_prenda'>".$fila['corazon']."</h1>
										<img src='img/carrito.png'>										
									</div>
									
								</div>
								
								<script type='text/javascript'>
									$(document).ready(function() {
									   $('.megustaropita$id_like_prenda').click(function(){
									      $.ajax({
										    type: 'GET',
										    url: 'procesolikeropita.php?id=$id_like_prenda',
										    success: function(a) {
									                $('.corazonropita$id_like_prenda').html(a);
									               
										    }
									       });
									   });
									});
								</script>
				 			";
					}
					?>

				</div>

			<div class="iz">
				<?php 
				conectar_bd();

				$peticion= "SELECT * FROM like_prenda WHERE mod(id_like_prenda,2) = 0 and  estado_like = '$idr' and id_usuarios='$id_user'  ORDER BY id_like_prenda DESC ";

				$ejecutar= mysqli_query($conexio,$peticion);

						while($fila=mysqli_fetch_array($ejecutar)){
							
							$id_like_prenda= $fila['id_prenda'];
							$peticion2= "SELECT * FROM prenda WHERE id_prenda = '$id_like_prenda'";
								$ejecutar2= mysqli_query($conexio,$peticion2);
								while ($fila2=mysqli_fetch_array($ejecutar2)) {
									$img= $fila2['img_prenda'];
								}										

							echo "									

								<div id='ropita'>
									
									<div id='precio'>S/. ".$fila['precio'].".00</div>

									<div id='mas'>+
										<div id='comentar'><a href='#'><span class='icon-cart'></span></a></div>
										<div id='megusta'><a id='' class='megustaropita$id_like_prenda'><span class='icon-heart heart'></a></div>
										
									</div>
									
									<img id='prenda' src='img_ropita/$img'>
									
									<div id='caja'>
										<img src='img/corazon.png'>
										<h1 class='corazonropita$id_like_prenda'>".$fila['corazon']."</h1>
										<img src='img/carrito.png'>										
									</div>
									
								</div>
							
				 			";
					}
				
				?>
			</div>
				

				<div class="der">					
					<?php 
					conectar_bd();

					$peticion= "SELECT * FROM like_prenda WHERE  mod(id_like_prenda,2) <> 0 and  estado_like = '$idr' and id_usuarios='$id_user'  ORDER BY id_like_prenda DESC ";

					$ejecutar= mysqli_query($conexio,$peticion);

						while($fila=mysqli_fetch_array($ejecutar)){
							
							$id_like_prenda= $fila['id_prenda'];

							$peticion2= "SELECT * FROM prenda WHERE id_prenda = '$id_like_prenda'";
								$ejecutar2= mysqli_query($conexio,$peticion2);
								while ($fila2=mysqli_fetch_array($ejecutar2)) {
									$img= $fila2['img_prenda'];
								}										

							echo "									

								<div id='ropita'>
									
									<div id='precio'>S/. ".$fila['precio'].".00</div>

									<div id='mas'>+
										<div id='comentar'><a href='#'><span class='icon-cart'></span></a></div>
										<div id='megusta'><a id='' class='megustaropita$id_like_prenda'><span class='icon-heart heart'></a></div>
										
									</div>
									
									<img id='prenda' src='img_ropita/$img'>
									
									<div id='caja'>
										<img src='img/corazon.png'>
										<h1 class='corazonropita$id_like_prenda'>".$fila['corazon']."</h1>
										<img src='img/carrito.png'>										
									</div>
									
								</div>
								
								
				 			";
					}
					?>
				</div>

				