<?php 
include 'Core/Models/Class.r_prenda.php';

$r_prenda = new R_prenda();
if (isset($_SESSION['usuario'])) {
    if ($_POST) { 
        switch ($_POST['accion']) {
            case 1:
                $r_prenda->set('op', $_POST['op']);
                print $r_prenda->listar();                 
                break;

            case 2:
                $r_prenda->set('id', $_POST['id_feria']);
                $r_prenda->set('anio', $_POST['anio']);
                $r_prenda->set('mes', $_POST['mes']);
                $r_prenda->set('detalle', $_POST['detalle']);
                print $r_prenda->editar();                
                break;

            case 3:
                $r_prenda->set('id', $_POST['id_feria']);
                print $r_prenda->ver();
                break;            
        }
    }else{
        include 'Views/index.php';
    }
        
 } else{
    header('Location:?view=login');
    exit();
 }
    