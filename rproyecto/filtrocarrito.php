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
					<div class="tituloropa">Estas son las prendas que quieres comprar</div>									
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
					$peticion= "SELECT * FROM prenda  pren
                				INNER JOIN carrito carr ON carr.id_prenda_c = pren.id_prenda
                				INNER JOIN usuarios us ON us.id_usuarios = carr.id_usuarios
                				WHERE carr.id_usuarios = '$id_user' AND pren.estado_prenda = '1' AND estado_carrito = 'si'
                				ORDER BY carr.id_carrito DESC";
					$ejecutar= mysqli_query($conexio,$peticion);

						while($fila=mysqli_fetch_array($ejecutar)){
							
							$id_carrito= $fila['id_prenda_c'];

							$peticion2= "SELECT * FROM prenda WHERE id_prenda = '$id_carrito'";
								$ejecutar2= mysqli_query($conexio,$peticion2);
								while ($fila2=mysqli_fetch_array($ejecutar2)) {
									$img= $fila2['img_prenda'];
									$id_like_prenda= $fila2['id_prenda'];
									$like_prenda= $fila2['corazon'];
									$like_carrito= $fila2['carrito'];
								}							

							echo "									

								<div id='ropita'>
									
									<div id='precio'>S/. ".$fila['precio'].".00</div>

									<div id='mas'>+
										<div id='comentar'><a id='' class='carritoadd$id_like_prenda'><span class='icon-cart cart'></a></div>
										<div id='megusta'><a id='' class='megustaropita$id_like_prenda'><span class='icon-heart heart'></a></div>
										
									</div>
									
									<img id='prenda' src='img_ropita/$img'>
									
									<div id='caja'>
										<img src='img/corazon.png'>
										<h1 class='corazonropita$id_like_prenda'>".$like_prenda."</h1>
										<img src='img/carrito.png'>
										<h1 class='carrito$id_like_prenda'>".$like_carrito."</h1>
										
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

								<script type='text/javascript'>
									$(document).ready(function() {
									   $('.carritoadd$id_like_prenda').click(function(){
									      $.ajax({
										    type: 'GET',
										    url: 'procesocarrito.php?id=$id_like_prenda',
										    success: function(a) {
									                $('.carrito$id_like_prenda').html(a);
									               
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

				$peticion= "SELECT * FROM prenda  pren
                				INNER JOIN carrito carr ON carr.id_prenda_c = pren.id_prenda
                				INNER JOIN usuarios us ON us.id_usuarios = carr.id_usuarios
                				WHERE mod(id_carrito,2) = 0 and carr.id_usuarios = '$id_user' AND pren.estado_prenda = '1' AND estado_carrito = 'si'
                				ORDER BY carr.id_carrito DESC";

				
				$ejecutar= mysqli_query($conexio,$peticion);

						while($fila=mysqli_fetch_array($ejecutar)){
							
							$id_carrito= $fila['id_prenda'];
							$peticion2= "SELECT * FROM prenda WHERE id_prenda = '$id_carrito'";
								$ejecutar2= mysqli_query($conexio,$peticion2);
								while ($fila2=mysqli_fetch_array($ejecutar2)) {
									$img= $fila2['img_prenda'];
									$id_like_prenda= $fila['id_prenda'];
									$like_prenda= $fila2['corazon'];
									$like_carrito= $fila2['carrito'];
								}										

							echo "									

								<div id='ropita'>
									
									<div id='precio'>S/. ".$fila['precio'].".00</div>

									<div id='mas'>+
										<div id='comentar'><a id='' class='carritoadd$id_like_prenda'><span class='icon-cart cart'></a></div>
										<div id='megusta'><a id='' class='megustaropita$id_like_prenda'><span class='icon-heart heart'></a></div>
										
									</div>
									
									<img id='prenda' src='img_ropita/$img'>
									
									<div id='caja'>
										<img src='img/corazon.png'>
										<h1 class='corazonropita$id_like_prenda'>".$like_prenda."</h1>
										<img src='img/carrito.png'>
										<h1 class='carrito$id_like_prenda'>".$like_carrito."</h1>
										
									</div>
									
									
								</div>
							
				 			";
					}
				
				?>
			</div>
				

				<div class="der">					
					<?php 
					conectar_bd();

					$peticion= "SELECT * FROM prenda  pren
                				INNER JOIN carrito carr ON carr.id_prenda_c = pren.id_prenda
                				INNER JOIN usuarios us ON us.id_usuarios = carr.id_usuarios
                				WHERE mod(id_carrito,2) <> 0 and carr.id_usuarios = '$id_user' AND pren.estado_prenda = '1' AND estado_carrito = 'si'
                				ORDER BY carr.id_carrito DESC";

					
					$ejecutar= mysqli_query($conexio,$peticion);

						while($fila=mysqli_fetch_array($ejecutar)){
							
							$id_carrito= $fila['id_prenda'];

							$peticion2= "SELECT * FROM prenda WHERE id_prenda = '$id_carrito'";
								$ejecutar2= mysqli_query($conexio,$peticion2);
								while ($fila2=mysqli_fetch_array($ejecutar2)) {
									$img= $fila2['img_prenda'];
									$id_like_prenda= $fila['id_prenda'];
									$like_prenda= $fila2['corazon'];
									$like_carrito= $fila2['carrito'];
								}										

							echo "									

								<div id='ropita'>
									
									<div id='precio'>S/. ".$fila['precio'].".00</div>

									<div id='mas'>+
										<div id='comentar'><a id='' class='carritoadd$id_like_prenda'><span class='icon-cart cart'></a></div>
										<div id='megusta'><a id='' class='megustaropita$id_like_prenda'><span class='icon-heart heart'></a></div>
										
									</div>
									
									<img id='prenda' src='img_ropita/$img'>

									<div id='caja'>
										<img src='img/corazon.png'>
										<h1 class='corazonropita$id_like_prenda'>".$like_prenda."</h1>
										<img src='img/carrito.png'>
										<h1 class='carrito$id_like_prenda'>".$like_carrito."</h1>
										
									</div>
									
								</div>
								
								
				 			";
					}
					?>
				</div>

				