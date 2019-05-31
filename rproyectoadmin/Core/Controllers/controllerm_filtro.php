<?php 
include 'Core/Models/Class.m_filtro.php';

$m_filtro = new m_filtro();
if (isset($_SESSION['usuario'])) {
    if ($_POST) { 
        switch ($_POST['accion']) {
            case 1:
                $m_filtro->set('op', $_POST['op']);
                print $m_filtro->listar();                 
                break;

            case 5:
                $m_filtro->set('nombre', $_POST['nombre']);
                print $m_filtro->add();                
                break;

            case 2:
                $m_filtro->set('id', $_POST['id_filtro']);
                $m_filtro->set('nombre', $_POST['nombre']);
                print $m_filtro->editar();                
                break;

            case 3:
                $m_filtro->set('id', $_POST['id_filtro']);
                print $m_filtro->ver();
                break;            
        }
    }else{
        include 'Views/index.php';
    }
        
 } else{
    header('Location:?view=login');
    exit();
 }
    