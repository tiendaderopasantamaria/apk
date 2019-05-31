<?php

include_once 'db/dbconfig.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>SM</title>
	
	<!-- JS -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"  />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel=stylesheet href="css/main.css" type="text/css" />
	<link rel=stylesheet href="css/ico.css" type="text/css" />
	<link rel=stylesheet href="css/main_modal_filtro.css" type="text/css" />
	<link rel=stylesheet href="css/admin_css.css" type="text/css" />
	<link rel=stylesheet href="css/main_usuario.css" type="text/css" />

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
		<div class='informacion'>
									
							<div class='cerrar'><div class='close-tiporopa'><span class='icon-cross'></div></div>						
									
						</div>

		

		<div id="cuerpo" class="cuerpo">
			
			<div id="principal">
				
							<script type='text/javascript'>
								$('.close-tiporopa').on('click', function(){
									window.location="../../?view=r_prenda";
								})
							</script>



				<div class="formulario"  id="registro-form">
      			  <form accept-charset="utf-8" method="POST" id="enviarimagenes" enctype="multipart/form-data" >
			        <h2>Nueva Ropita sii!</h2><hr/>
			        
			        <div id="error">
			        <!-- error will be shown here ! -->
			        </div>


			         <div class="grupo">
			        	<?php 
			        		include ("db/db.php");
			        		
							conectar_bd();
							$peticion= "SELECT * FROM tipo_filtro";

							$ejecutar= mysqli_query($conexio,$peticion);

							echo '
								<select class="form-control" type="text" name="idfiltro" required>
								';
							while($fila=mysqli_fetch_array($ejecutar)){
							echo'				        		 
				        		<option value="'.$fila['id_tipo_filtro'].' " selected>'.$fila['nombre'].'</option>
								';
								}
							echo'</select>';

			        	 ?>
				        
			        </div>

			        <div class="grupo">
			        	<?php 
			        		
							conectar_bd();
							$peticion= "SELECT * FROM tipo_filtro";

							$ejecutar= mysqli_query($conexio,$peticion);

							echo '
								<select placeholder: "Seleccione una opción" id="sel_aula" class="form-control" type="text" name="precio" required>
								
								';
							while($fila=mysqli_fetch_array($ejecutar)){
							echo'				        		 
				        		<option value="'.$fila['precio_venta'].' " selected>'.$fila['precio_venta'].'</option>
								';
								}
							echo'</select>';

			        	 ?>
				        
			        </div>

			        <div class="grupo">
			        	<label for="talla">Talla:</label>
				        <input type="text" class="form-control" placeholder="Talla" name="talla" id="talla" required/>
			        </div>

			        <div class="grupo">
			        	<label for="img">Img:</label>
				        <input type="file" name="imagen"/>
			        </div>

			       
			     	<hr />

			         <div class="grupo">
			            <input type="submit"  value="Enviar"  name="enviar" id="enviar" />

			    	 </div>
			      </form>
			     </div>


				<script>
					$("#enviarimagenes").on("submit", function(e){
						e.preventDefault();
						var formData = new FormData(document.getElementById("enviarimagenes"));
					
						$.ajax({
							url: "registro_ropa.php",
							type: "POST",
							dataType: "HTML",
							data: formData,
							cache: false,
							contentType: false,
							processData: false
						}).done(function(echo){
							$("#error").html(echo);
						});
					});
				</script>
				
					
			</div>


			
		</div>

		</div>



</body>

</html>		

				
				