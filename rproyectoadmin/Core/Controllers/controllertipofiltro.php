<?php 
include 'Core/Models/Class.tipo_filtro.php';

$alumno = new Alumno();
if (isset($_SESSION['usuario'])) {
    if ($_POST) { 
        switch ($_POST['accion']) {
            case 1:
                if ($_POST['estado']=='') {
                    $estado = "";
                }else{
                    $estado = "AND estado_alumno = '".$_POST['estado']."' ";
                }
                $alumno->set('estado', $estado);
                $alumno->set('op', $_POST['op']);
                print $alumno->listar();                 
                break;

            case 5:
                $alumno->set('sel_socio', $_POST['sel_socio']);
                $alumno->set('nombres', $_POST['nombres']);
                $alumno->set('apellidos', $_POST['apellidos']);
                $alumno->set('dni', $_POST['dni']);
                $alumno->set('fecha', $_POST['fecha']);
                $alumno->set('edad', $_POST['edad']);                
                $alumno->set('estado', '0');
                print $alumno->add();                
                break;

            case 3:
                $alumno->set('id', $_POST['id_alumno']);
                print $alumno->ver();
                break;

            case 2:
                $alumno->set('id', $_POST['id_alumno']);

                $alumno->set('sel_socio', $_POST['sel_socio']);
                $alumno->set('nombres', $_POST['nombres']);
                $alumno->set('apellidos', $_POST['apellidos']);
                $alumno->set('dni', $_POST['dni']);
                $alumno->set('fecha', $_POST['fecha']);
                $alumno->set('edad', $_POST['edad']);      

                if (isset($_POST['al_estado'])) {
                    if ($_POST['al_estado'] == 'on') {
                        $estado = 1;
                    } else {
                        $estado = 0;
                    }
                } else {
                    $estado = 0;
                }
                $alumno->set('estado', $estado);
                
                print $alumno->editar();                
                break;

            
                
            case 4:
                $alumno->set('id',$_POST['id']);
                print $alumno->eliminar();                
                break;
            
            
            
            case 6:
                $alumno->set('dni', $_POST['dni']);
                print $alumno->verificar();
                break;

            case 7:
                $alumno->set('sel_motivo', $_POST['sel_motivo']);
                $alumno->set('id_dar_debaja', $_POST['id_dar_debaja']);
                print $alumno->debaja(); 
                break;

             case 8:
                $alumno->set('id',$_POST['id']);
                print $alumno->revertir();
                break;
        }
    }else{
        include 'Views/index.php';
    }
		
 } else{
 	header('Location:?view=login');
 	exit();
 }
	