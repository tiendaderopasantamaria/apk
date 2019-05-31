<?php

include 'Core/Models/Class.Login.php';
include 'Core/Funciones/encrypt.php';
$Login = new Login();
if (isset($_SESSION['usuario'])) {
    header('Location:?view=index');
} else {
    if ($_POST) {
        $datos = $Login->Acceso($_POST['usuario'], Encrypt($_POST['pass']));
        if (mysqli_num_rows($datos) > 0) {
            $row = mysqli_fetch_array($datos);
            $_SESSION['usuario'] = $row['us_nom'];
            $_SESSION['cod_user'] = $row['idusuario'];
//            $_SESSION['evento'] = 'Asamblea General';
            
            echo 1;
        } else {
            echo 0;
        }
        exit();
    }
    include 'Views/login.php';
}
