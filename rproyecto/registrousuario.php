<div class='informacion'>
									
									<div class='cerrar'><div class='close-modal'><span class='icon-cross'></div></div>
									
									
								</div>
								<script type='text/javascript'>
								$('.close-modal').on('click', function(){
									$('.contenedor-modal').removeClass('mostrar-modal');
									$('body').removeClass('scroll-oculto');
								})
							</script>
<div class="formulario"  id="registro-form">
      
			        <h2>Registrate</h2><hr/>
			        
			        <div id="error">
			        <!-- error will be shown here ! -->
			        </div>

			         <div class="grupo">
			        	<label for="nombre">Usuario</label>
				        <input type="text" class="form-control" placeholder="Usuario" name="user_usuario" id="user_usuario" required/>
				        <span id="check-e"></span>
			        </div>
			        
			        <div class="grupo">
			        	<label for="nombre">Ingrese su Correo:</label>
				        <input type="email" class="form-control" placeholder="Email" name="user_email" id="user_email" required/>
				        <span id="check-e"></span>
			        </div>			        
			        
			        <div class="grupo">
			        	<label for="nombre">Ingrese su Contraseña:</label>
			        <input type="password" class="form-control" placeholder="Contraseña" name="user_password" id="user_password" required/>
			        </div>

			         <div class="grupo">
			        	<label for="nombre">Repita su Contraseña:</label>
			        <input type="password" class="form-control" placeholder="Contraseña" name="user_password2" id="user_password2" required/>
			        </div>
			       
			     	<hr />
			        
			        <div class="grupo">
			            <input type="submit"  value="Enviar"  name="enviar" id="enviar" />
			    		
						<script type='text/javascript'>
					$(document).ready(function() {
						$('#enviar').click(function(){

							var user_usuario = $("#user_usuario").val();
							var user_email = $("#user_email").val();
							var user_password = $("#user_password").val();
							var user_password2 = $("#user_password2").val();

							$.ajax({								
								url: 'provarregistro.php',
								data:{
									usuario:user_usuario,
									email:user_email,
									password:user_password,
									password2:user_password2
								},
								type: 'POST',
								success: function(datos) {
								                
								    $('#error').html(datos);								                
								}
							});
						});
					});
				</script>
				