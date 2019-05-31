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

				<div class="oculto">



					<?php

					include ("db/db.php");
					conectar_bd();
					$idr = $_GET['id'];
					$peticion= "SELECT * FROM like_usuario WHERE estado_like = '$idr' and id_usuarios='$id_user' ";
					$ejecutar= mysqli_query($conexio,$peticion);

						while($fila=mysqli_fetch_array($ejecutar)){
							$tipo= $fila['tipo'];
							
							$id_like= $fila['id_tipo_filtro'];


								$peticion2= "SELECT * FROM tipo_filtro WHERE id_tipo_filtro = '$id_like'";
								$ejecutar2= mysqli_query($conexio,$peticion2);
								while ($fila2=mysqli_fetch_array($ejecutar2)) {
									$img= $fila2['img'];
								}
							

							echo "
									

								<div id='ropita'>
									<div id='tipo' class='$tipo'>".$fila['nombre']."</div>
									<div id='precio'>S/. ".$fila['precio'].".00</div>
									<div id='stock'>Stock: ".$fila['stock']."</div>
									<div id='mas'>+
										
										<div id='megusta'><a class='megusta$id_like'><span class='icon-heart heart'></a></div>
										<div id='ver'><a class='rop$id_like'><span class='icon-eye'></a></div>
									</div>
									<img id='prenda' src='img_tipo_filtro/$img'>
									<div id='caja'>
										<img src='img/corazon.png'>
										<h1 class='corazon$id_like'>".$fila['corazon']."</h1>
										
									</div>
								</div>

								<script type='text/javascript'>
									$(document).ready(function() {
									   $('.megusta$id_like').click(function(){
									      $.ajax({
										    type: 'GET',
										    url: 'procesolike.php?id=$id_like',
										    success: function(a) {
									                $('.corazon$id_like').html(a);
									               
										    }
									       });
									   });
									});
								</script>

								
							<script type='text/javascript'>
								$(document).ready(function() {
								   $('.rop$id_like').click(function(){
								      $.ajax({
									    type: 'GET',
									    url: 'ropita.php?id=$id_like',
									    success: function(a) {
								                
								                $('.cuerpo-modal').html(a);
								                
									    }
								       });
								   });
								});
							</script>	
							

							<script type='text/javascript'>
								$('.rop$id_like').on('click', function(){
									$('.contenedor-modal').addClass('mostrar-modal');
									$('body').addClass('scroll-oculto');
								})
							</script>

							
				 			";
					}
					?>

				</div>

			<div class="iz">
				<?php 
				conectar_bd();

				$peticion= "SELECT * FROM like_usuario WHERE mod(id_like_usuario,2) = 0 and  estado_like = '$idr' and id_usuarios='$id_user'  ORDER BY id_like_usuario DESC ";

				$ejecutar= mysqli_query($conexio,$peticion);

						while($fila=mysqli_fetch_array($ejecutar)){
							$tipo= $fila['tipo'];
							
							$id_like= $fila['id_tipo_filtro'];

							$peticion2= "SELECT * FROM tipo_filtro WHERE id_tipo_filtro = '$id_like'";
								$ejecutar2= mysqli_query($conexio,$peticion2);
								while ($fila2=mysqli_fetch_array($ejecutar2)) {
									$img= $fila2['img'];
								}

							

							echo "

								<div id='ropita'>
									<div id='tipo' class='$tipo'>".$fila['nombre']."</div>
									<div id='precio'>S/. ".$fila['precio'].".00</div>
									<div id='stock'>Stock: ".$fila['stock']."</div>
									<div id='mas'>+
										
										<div id='megusta'><a class='megusta$id_like'><span class='icon-heart heart'></a></div>
										<div id='ver'><a class='rop$id_like'><span class='icon-eye'></a></div>
									</div>
									<img id='prenda' src='img_tipo_filtro/$img'>
									<div id='caja'>
										<img src='img/corazon.png'>
										<h1 class='corazon$id_like'>".$fila['corazon']."</h1>
										
									</div>
								</div>

								

								
							<script type='text/javascript'>
								$(document).ready(function() {
								   $('.rop$id_like').click(function(){
								      $.ajax({
									    type: 'GET',
									    url: 'ropita.php?id=$id_like',
									    success: function(a) {
								                
								                $('.cuerpo-modal').html(a);
								                
									    }
								       });
								   });
								});
							</script>	
							

							<script type='text/javascript'>
								$('.rop$id_like').on('click', function(){
									$('.contenedor-modal').addClass('mostrar-modal');
									$('body').addClass('scroll-oculto');
								})
							</script>

							
				 			";
					}
				
				?>
			</div>
				

				<div class="der">					
					<?php 
					conectar_bd();

					$peticion= "SELECT * FROM like_usuario WHERE  mod(id_like_usuario,2) <> 0 and  estado_like = '$idr' and id_usuarios='$id_user'  ORDER BY id_like_usuario DESC ";

					$ejecutar= mysqli_query($conexio,$peticion);

						while($fila=mysqli_fetch_array($ejecutar)){
							$tipo= $fila['tipo'];
							
							$id_like= $fila['id_tipo_filtro'];

							$peticion2= "SELECT * FROM tipo_filtro WHERE id_tipo_filtro = '$id_like'";
								$ejecutar2= mysqli_query($conexio,$peticion2);
								while ($fila2=mysqli_fetch_array($ejecutar2)) {
									$img= $fila2['img'];
								}

							echo "
									

								<div id='ropita'>
									<div id='tipo' class='$tipo'>".$fila['nombre']."</div>
									<div id='precio'>S/. ".$fila['precio'].".00</div>
									<div id='stock'>Stock: ".$fila['stock']."</div>
									<div id='mas'>+
										
										<div id='megusta'><a class='megusta$id_like'><span class='icon-heart heart'></a></div>
										<div id='ver'><a class='rop$id_like'><span class='icon-eye'></a></div>
									</div>
									<img id='prenda' src='img_tipo_filtro/$img'>
									<div id='caja'>
										<img src='img/corazon.png'>
										<h1 class='corazon$id_like'>".$fila['corazon']."</h1>
										
									</div>
								</div>

								

								
							<script type='text/javascript'>
								$(document).ready(function() {
								   $('.rop$id_like').click(function(){
								      $.ajax({
									    type: 'GET',
									    url: 'ropita.php?id=$id_like',
									    success: function(a) {
								                
								                $('.cuerpo-modal').html(a);
								                
									    }
								       });
								   });
								});
							</script>	
							

							<script type='text/javascript'>
								$('.rop$id_like').on('click', function(){
									$('.contenedor-modal').addClass('mostrar-modal');
									$('body').addClass('scroll-oculto');
								})
							</script>

							
				 			";
					}
					?>
				</div>

				