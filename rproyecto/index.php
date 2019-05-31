<?php

session_start();

if(isset($_SESSION['user_session'])!="")
{
	header("Location: casa.php");
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>S.M.</title>
	<link rel="icon" type="image/png" href="img/maria.png" />
	<!-- JS -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="validation.min.js"></script>

	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"  />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel=stylesheet href="css/main.css" type="text/css" />
	<link rel=stylesheet href="css/ico.css" type="text/css" />
	<link rel=stylesheet href="css/main_modal_filtro.css" type="text/css" />
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
	

	
	<div id="contenedor">			

		<div id="cuerpo">
			
			<div class="empresa">Santa María</div>
			
			<div id="ingresar">
				<form class="formulario" method="post" id="login-form">
      
			        <h2>Ingresar</h2><hr/>
			        
			        <div id="error"></div>
			        
			        <div class="grupo">
			        	<label>Ingrese su Correo o usuario:</label>
				        <input type="text" class="form-control" placeholder="Email" name="user_email" id="user_email" />
				        <span id="check-e"></span>
			        </div>
			        
			        <div class="grupo">
			        	<label>Ingrese su Contraseña:</label>
			        	<input type="password" class="form-control" placeholder="Contraseña" name="password" id="password" />
			        	<span id="check-e"></span>
			        </div>
			       
			     	<hr />
			        
			        <div class="grupo">
			            <input type="submit"  value="Entrar"  name="enviar" id="enviar" />

						<a Class="registro">Registrate</a>

						<script type='text/javascript'>
								$(document).ready(function() {
								   $('.registro').click(function(){
								      $.ajax({
									    type: 'GET',
									    url: 'registrousuario.php',
									    success: function(a) {
								                
								                $('.cuerpo-modal').html(a);								                
									    }
								       });
								   });
								});
							</script>

							<script type='text/javascript'>
								$('.registro').on('click', function(){
									$('.contenedor-modal').addClass('mostrar-modal');
									$('body').addClass('scroll-oculto');
								})
							</script>



							
			        </div>

			        <script type="text/javascript" src="script_login.js"></script>
		      
		     	</form>

		      

			</div>

			<div id="registrar">
				

			</div>


			
			</div>

			<div class="foter">Derechos Reservados:<hr> <span>Kevin Arnold Peña Bardalez</span></div>

		</div>



</body>

</html>
