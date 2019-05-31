<?php
	session_start();
	require_once 'dbconfig.php';

	if(isset($_POST['enviar']))
	{
		//$user_name = $_POST['user_name'];
		$user_email = trim($_POST['user_email']);
		$user_password = trim($_POST['password']);
		
		$password = ($user_password);
		
		try
		{	
		
			$stmt = $db_con->prepare("SELECT * FROM usuarios WHERE email= '$user_email' or usuario='$user_email' ");
			$stmt->execute(array(":email"=>$user_email));
			$row = $stmt->fetch(PDO::FETCH_ASSOC);
			$count = $stmt->rowCount();
			
			if($row['contrasena']==$user_password){
				
				echo "ok"; // log in
				$_SESSION['user_session'] = $row['id_usuarios'];
			}
			else{
				
				echo "La Contraseña o el Email son Incorrectos"; // wrong details 
			}
				
		}
		catch(PDOException $e){
			echo $e->getMessage();
		}
	}

?>