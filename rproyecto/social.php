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
					

								

	<div class='informacion'>									
		<div class='cerrar'><div class='close-modal'><span class='icon-cross'></div></div>							
	</div>


<?php $idusuario=$row['usuario']; 
	echo"

	<div class='social'>

		<a class='ims' target='_blank' id='wtp' href='https://wa.me/51935066499?text=Estoy%20interesado%20en%20alguna%20de%20sus%20prendas%20revise%20mi%20perfil%3D$idusuario'><img src='img/w.png'></a>
		
	</div>
"
?>

	<div class="gia">
		<div class="info">
			Agregenos en el Whatsapp antes de presionar en la imagen de whatsapp "930640102"
			<br><br>
			Gracias por confiar en nuestra empresa.
		</div>
	</div>

	<script type='text/javascript'>
		$('.close-modal').on('click', function(){
			$('.contenedor-modal').removeClass('mostrar-modal');
			$('body').removeClass('scroll-oculto');
		})
	</script>