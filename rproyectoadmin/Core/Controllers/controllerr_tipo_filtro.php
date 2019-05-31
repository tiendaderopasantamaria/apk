<?php 
include 'Core/Models/Class.r_tipo_filtro.php';

$r_tipo_filtro = new R_tipo_filtro();
if (isset($_SESSION['usuario'])) {
    if ($_POST) { 
        switch ($_POST['accion']) {
            case 1:
                $r_tipo_filtro->set('op', $_POST['op']);
                print $r_tipo_filtro->listar();                 
                break;

            case 5:
                $r_tipo_filtro->set('sel_filtro', $_POST['sel_filtro']);
                $r_tipo_filtro->set('nombre', $_POST['nombre']);
                $r_tipo_filtro->set('precio', $_POST['precio']);
                $r_tipo_filtro->set('precio_venta', $_POST['precio_venta']);

                $r_tipo_filtro->set('nombreArchivo', $_FILE['img']['name'] );

                print $r_tipo_filtro->add();                
                break;

            case 2:
                $r_tipo_filtro->set('id', $_POST['id_tipo_filtro']);
                $r_tipo_filtro->set('sel_filtro', $_POST['sel_filtro']);
                $r_tipo_filtro->set('nombre', $_POST['nombre']);
                $r_tipo_filtro->set('precio', $_POST['precio']);
                $r_tipo_filtro->set('precio_venta', $_POST['precio_venta']);
                print $r_tipo_filtro->editar();                
                break;

            case 3:
                $r_tipo_filtro->set('id', $_POST['id_tipo_filtro']);
                print $r_tipo_filtro->ver();
                break;            
        }
    }else{
        include 'Views/index.php';
    }
        
 } else{
    header('Location:?view=login');
    exit();
 }
    