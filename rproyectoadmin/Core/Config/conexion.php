<?php  

class Conexion extends mysqli
{
	
	public function __construct()
	{
		parent:: __construct('localhost','root','','ropita');
		$this->query('SET NAMES utf8');
	}

	public function recorrer($datos){
		return mysqli_fetch_array($datos);
	}
}