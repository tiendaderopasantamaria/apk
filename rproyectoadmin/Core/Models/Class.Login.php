<?php  

class Login{
	public function __construct(){
		
	}
	public function Acceso($user,$pass){
		try{
			$con = new Conexion();
			$sql=$con->query("SELECT * FROM usuario WHERE us_nom = '$user' AND us_pass='$pass' AND us_estado = '1' ");
			return $sql;
		}catch(Exception $e){
			echo $e->getMessage();
		}
	}
}