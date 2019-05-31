<?php 
session_start(); 

$url = isset($_GET['view']) ? $_GET['view']:'index';
require 'Core/Config/conexion.php';
define('PAG', 'Views/inc/'.$url.'.php');
#echo $url; 
if (file_exists('Core/Controllers/controller'.$url.'.php')) {
	include ('Core/Controllers/controller'.$url.'.php');
	

}else{
	echo 'Error no se encontro url';
}
