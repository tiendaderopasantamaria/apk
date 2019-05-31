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
				<?php
						include ("db/db.php");
						conectar_bd();
						$idr = $_GET['id'];
						$peticion= "SELECT * FROM tipo_filtro WHERE id_tipo_filtro = '$idr' ";

						$ejecutar= mysqli_query($conexio,$peticion);

						while($fila=mysqli_fetch_array($ejecutar)){			

							echo "									
								

								<div class='informacion'>
									
									<div class='cerrar'><div class='close-modal'><span class='icon-cross'></div></div>
									<div class='stocks'>Stock: ".$fila['stock']."</div>
									<div class='precios'>S/. ".$fila['precio_venta'].".00</div>
									
								</div>

								<script type='text/javascript'>
								$('.close-modal').on('click', function(){
									$('.contenedor-modal').removeClass('mostrar-modal');
									$('body').removeClass('scroll-oculto');
								})
							</script>
				 			";
					}
				?>
				

				<div class="oculto">
					<?php 
						
						conectar_bd();
						
						

						$peticion= "SELECT * FROM prenda	
                					WHERE id_tipo_filtro = '$idr' AND estado_prenda = '1' 
                					ORDER BY id_prenda DESC";
						

						$ejecutar= mysqli_query($conexio,$peticion);

						while($fila=mysqli_fetch_array($ejecutar)){
							
							$img= $fila['img_prenda'];
							$id_like_prenda= $fila['id_prenda'];						

							echo "									

								<div id='ropita'>
								<div id='precio'>Talla: ".$fila['talla']."</div>
									<div id='stock'>".$fila['detalle']."</div>
									
									
									<div id='mas'>+
										<div id='comentar'><a id='' class='carritoadd$id_like_prenda'><span class='icon-cart cart'></a></div>
										<div id='megusta'><a id='' class='megustaropita$id_like_prenda'><span class='icon-heart heart'></a></div>
										
									</div>
									<img id='prenda' src='img_ropita/$img'>									

									<div id='caja'>
										<img src='img/corazon.png'>
										<h1 class='corazonropita$id_like_prenda'>".$fila['corazon']."</h1>
										<img src='img/carrito.png'>
										<h1 class='carrito$id_like_prenda'>".$fila['carrito']."</h1>										
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

				$peticion= "SELECT * FROM prenda WHERE mod(id_prenda,2) = 0  and id_tipo_filtro = '$idr' ORDER BY id_prenda DESC ";

				$ejecutar= mysqli_query($conexio,$peticion);

						while($fila=mysqli_fetch_array($ejecutar)){
							
							$img= $fila['img_prenda'];
							$id_like_prenda= $fila['id_prenda'];					

							echo "
									

								<div id='ropita'>
									
									<div id='mas'>+
										<div id='comentar'><a id='' class='carritoadd$id_like_prenda'><span class='icon-cart cart'></a></div>
										<div id='megusta'><a id='' class='megustaropita$id_like_prenda'><span class='icon-heart heart'></a></div>
										
									</div>
									<img id='prenda' src='img_ropita/$img'>

									<div id='caja'>
										<img src='img/corazon.png'>
										<h1 class='corazonropita$id_like_prenda'>".$fila['corazon']."</h1>
										<img src='img/carrito.png'>
										<h1 class='carrito$id_like_prenda'>".$fila['carrito']."</h1>										
									</div>
									
								</div>


								
				 			";
					}

				
				?>
			</div>
				

				<div class="der">					
					<?php 
					conectar_bd();

					$peticion= "SELECT * FROM prenda WHERE  mod(id_prenda,2) <> 0 and id_tipo_filtro = '$idr'  ORDER BY id_prenda DESC ";

					$ejecutar= mysqli_query($conexio,$peticion);

					while($fila=mysqli_fetch_array($ejecutar)){
							
							$img= $fila['img_prenda'];
							$id_like_prenda= $fila['id_prenda'];
							

							echo "
									

							<div id='ropita'>
									
									<div id='mas'>+
										<div id='comentar'><a id='' class='carritoadd$id_like_prenda'><span class='icon-cart cart'></a></div>
										<div id='megusta'><a id='' class='megustaropita$id_like_prenda'><span class='icon-heart heart'></a></div>
										
									</div>
									<img id='prenda' src='img_ropita/$img'>									

									<div id='caja'>
										<img src='img/corazon.png'>
										<h1 class='corazonropita$id_like_prenda'>".$fila['corazon']."</h1>
										<img src='img/carrito.png'>
										<h1 class='carrito$id_like_prenda'>".$fila['carrito']."</h1>									
									</div>
									
								</div>


								
				 			";
					}

				
					?>
				</div>

				