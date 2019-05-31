<?php 
include 'Core/Models/Class.f_feria.php';

$f_feria = new F_feria();
if (isset($_SESSION['usuario'])) {
    if ($_POST) { 
        switch ($_POST['accion']) {
            case 1:
                $f_feria->set('op', $_POST['op']);
                print $f_feria->listar();                 
                break;

            case 5:
                $f_feria->set('anio', $_POST['anio']);
                $f_feria->set('mes', $_POST['mes']);
                $f_feria->set('detalle', $_POST['detalle']);
                print $f_feria->add();                
                break;

            case 2:
                $f_feria->set('id', $_POST['id_feria']);
                $f_feria->set('anio', $_POST['anio']);
                $f_feria->set('mes', $_POST['mes']);
                $f_feria->set('detalle', $_POST['detalle']);
                print $f_feria->editar();                
                break;

            case 3:
                $f_feria->set('id', $_POST['id_feria']);
                print $f_feria->ver();
                break;            
        }
    }else{
        include 'Views/index.php';
    }
        
 } else{
    header('Location:?view=login');
    exit();
 }
    