<?php 
include 'Core/Models/Class.u_usuario.php';

$u_usuario = new U_usuario();
if (isset($_SESSION['usuario'])) {
    if ($_POST) { 
        switch ($_POST['accion']) {
            case 1:
                $u_usuario->set('op', $_POST['op']);
                print $u_usuario->listar();                 
                break;



            case 3:
                $u_usuario->set('id', $_POST['id_usuario']);
                print $u_usuario->ver();
                break;

            case 4:
                $u_usuario->set('id', $_POST['idpago']);
                print $u_usuario->ver_pagos();
                break;

            case 5:
                $u_usuario->set('id', $_POST['id']);
                print $u_usuario->vender_ropita();
                break;
        }
    }else{
        include 'Views/index.php';
    }
        
 } else{
    header('Location:?view=login');
    exit();
 }
    