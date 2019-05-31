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
<!DOCTYPE html>
<html>
<head>
	<title>SM</title>
	<link rel="icon" type="image/png" href="img/maria.png" />
	<!-- JS -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"  />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel=stylesheet href="css/main.css" type="text/css" />
	<link rel=stylesheet href="css/ico.css" type="text/css" />
	<link rel=stylesheet href="css/main_modal_filtro.css" type="text/css" />
	
	
	

</head>
<div class="fondo"></div>
<body >

	<div class="body">
		<div class="contenedor-modal">
			
			<div class="cuerpo-modal" >
					
			</div>

		</div>
	</div>
		
	</div>

	<section id='banner'>
		
	</section>

	<section id='body'></section>
	<div id="contenedor" class="contenedor">
		<nav>

			<div class="filtro fil">
				<div class="titulo">Filtro</div>

				<div class="tipo">
					<?php 
					
					include ("db/db.php");
					conectar_bd();

					$peticion= "SELECT * FROM filtro ORDER BY id_filtro DESC ";

					$ejecutar= mysqli_query($conexio,$peticion);
					while($fila=mysqli_fetch_array($ejecutar)){
						$filtro= $fila['id_filtro'];
						$nombre= $fila['nombre_filtro'];

						echo "				

							<a id='filtro$filtro'>$nombre</a>

							<script type='text/javascript'>
								$(document).ready(function() {
								   $('#filtro$filtro').click(function(){
								      $.ajax({
									    type: 'GET',
									    url: 'indexfiltromostrar.php?id=t$filtro',
									    success: function(a) {
								                $('#principal').html(a);
								               
									    }
								       });
								   });
								});
							</script>
							
			 			";
					}
					?>

					
					<a id='tipo1'>Todo</a>
							<script type='text/javascript'>
								$(document).ready(function() {
								   $('#tipo1').click(function(){
								      $.ajax({
									    type: 'GET',
									    url: 'indexfiltrotodo.php',
									    success: function(a) {
								                
								                $('#principal').html(a);								                
									    }
								       });
								   });
								});
							</script>
							
				</div>
			</div>

			<div>				
				<img src="img/user.jpg">
				<div class="caja">
					<a id="ves" ><span class="icon-heart"></span></a>



					<?php $idusuario=$row['usuario']; 
					echo"
						<a id='pan'  class='pan' target='_blank' href='https://wa.me/51935066499?text=Estoy%20interesado%20en%20alguna%20de%20sus%20prendas%20revise%20mi%20perfil%3D$idusuario'><span class='icon-phone'></span></a>
					"
					?>

					
					<a id="ofe" href="logout.php"><span class="icon-cross"></span></a>
					<a id="len" class="len" href="#"><span class="icon-cart"></span></a>
					<a id="pol" class="pol" href="#"><span class="icon-heart"></span></a>					
				</div>
				<script type='text/javascript'>
					$(document).ready(function() {
						$('#ves').click(function(){
							$.ajax({
								type: 'GET',
								url: 'filtrocorazon.php?id=si',
									success: function(a) {								                
								        $('#principal').html(a);								                
									}
							});
						});
					});
				</script>

				<script type='text/javascript'>
								$('.pol').on('click', function(){
									$('.contenedor-modal').addClass('mostrar-modal');
									$('body').addClass('scroll-oculto');
								})
				</script>
				<script type='text/javascript'>
					$(document).ready(function() {
						$('.pol').click(function(){
							$.ajax({
								type: 'GET',
								url: 'filtrocorazonropita.php?id=si',
									success: function(a) {								                
								        $('.cuerpo-modal').html(a);								                
									}
							});
						});
					});
				</script>

				<script type='text/javascript'>
								$('.len').on('click', function(){
									$('.contenedor-modal').addClass('mostrar-modal');
									$('body').addClass('scroll-oculto');
								})
				</script>
				<script type='text/javascript'>
					$(document).ready(function() {
						$('.len').click(function(){
							$.ajax({
								type: 'GET',
								url: 'filtrocarrito.php?id=si',
									success: function(a) {								                
								        $('.cuerpo-modal').html(a);								                
									}
							});
						});
					});
				</script>

				<!--<script type='text/javascript'>
								$('.pan').on('click', function(){
									$('.contenedor-modal').addClass('mostrar-modal');
									$('body').addClass('scroll-oculto');
								})
				</script>	
				<script type='text/javascript'>
					$(document).ready(function() {
						$('.pan').click(function(){
							$.ajax({
								type: 'GET',
								url: 'social.php',
									success: function(a) {								                
								        $('.cuerpo-modal').html(a);								                
									}
							});
						});
					});
				</script>-->
				
			</div>

		<!--<div class="filtro2 fil">
				<div class="titulo">Otros</div>

				<div class="tipo">
				<a id="tipo1" href="">Más Vendido</a>
				<a id="tipo2" href="">Votos</a>
				<a id="tipo3" href="">Nuevo</a>
				<a id="tipo4" href="">Conjunto</a>
				<a id="tipo5" href="">Diseño Katy</a>
				</div>
			</div>-->
		</nav>

		<div class="slider">
			<ul>
				<li><img src="img/banermoda.jpg"></li>
				<li><img src="img/banercamisa.jpg"></li>
				<li><img src="img/banervestido.jpg"></li>
				<li><img src="img/banervestido2.jpg"></li>
			</ul>
		</div>

		<div id="cuerpo" class="cuerpo">
			

			
			<div id="principal">
				<div class="oculto">
					<?php 

						conectar_bd();

						$peticion= "SELECT * FROM tipo_filtro  ORDER BY id_tipo_filtro DESC  ";

						$ejecutar= mysqli_query($conexio,$peticion);
						while($fila=mysqli_fetch_array($ejecutar)){
							$tipo= $fila['tipo'];
							$img= $fila['img'];
							$id_like= $fila['id_tipo_filtro'];

							

							echo "
									

								<div id='ropita'>
									<div id='tipo' class='$tipo'>".$fila['nombre_tf']."</div>
									<div id='precio'>S/. ".$fila['precio_venta'].".00</div>
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

						$peticion= "SELECT * FROM tipo_filtro WHERE  mod(id_tipo_filtro,2) = 0  ORDER BY id_tipo_filtro DESC ";

						$ejecutar= mysqli_query($conexio,$peticion);
						while($fila=mysqli_fetch_array($ejecutar)){
							$tipo= $fila['tipo'];
							$img= $fila['img'];
							$id_like= $fila['id_tipo_filtro'];

							

							echo "
									

								<div id='ropita'>
									<div id='tipo' class='$tipo'>".$fila['nombre_tf']."</div>
									<div id='precio'>S/. ".$fila['precio_venta'].".00</div>
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
								$('.rop$id_like').on('click', function(){
									$('.contenedor-modal').addClass('mostrar-modal');
									$('body').addClass('scroll-oculto');
								})
							</script>

							<script type='text/javascript'>
								$('.close-modal').on('click', function(){
									$('.contenedor-modal').removeClass('mostrar-modal');
									$('body').removeClass('scroll-oculto');
								})
							</script>				
								
				 			";
					}
					?>	
			</div>
				

				<div class="der">					
					<?php 

						conectar_bd();

						$peticion= "SELECT * FROM tipo_filtro WHERE mod(id_tipo_filtro,2) <> 0  ORDER BY id_tipo_filtro DESC ";

						$ejecutar= mysqli_query($conexio,$peticion);
						while($fila=mysqli_fetch_array($ejecutar)){
							$tipo= $fila['tipo'];
							$img= $fila['img'];
							$id_like= $fila['id_tipo_filtro'];

							

							echo "
									

								<div id='ropita'>
									<div id='tipo' class='$tipo'>".$fila['nombre_tf']."</div>
									<div id='precio'>S/. ".$fila['precio_venta'].".00</div>
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
								$('.rop$id_like').on('click', function(){
									$('.contenedor-modal').addClass('mostrar-modal');
									$('body').addClass('scroll-oculto');
								})
							</script>

							<script type='text/javascript'>
								$('.close-modal').on('click', function(){
									$('.contenedor-modal').removeClass('mostrar-modal');
									$('body').removeClass('scroll-oculto');
								})
							</script>
								
				 			";
					}
					?>	
				</div>

				</div>


			
			</div>

		</div>



</body>

</html>
