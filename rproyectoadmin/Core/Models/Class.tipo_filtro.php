<?php

class Alumno {

    private $con;

    public function __construct() {
        $this->con = new Conexion();
    }

    public function set($atributo, $contenido) {
        $this->$atributo = $contenido;
    }

    public function listar() {
        $tabla = '';
        $sql = "SELECT * FROM alumno alum  
                    INNER JOIN socio soc ON soc.id_socio = alum.id_socio
                    WHERE   alum.estado_borrar = '1' {$this->estado}";
        $datos = $this->con->query($sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($datos)) {
            $c = $i++;
            if ($this->op == 1) {
                $tabla .= '<tr>';
                $tabla .= '<td>' . $c . '</td>';

                $tabla .= '<td>' . $row['apellido_alumno'] . '</td>';
                $tabla .= '<td>' . $row['nombre_alumno'] . '</td>';
                $tabla .= '<td>' . $row['dni_alumno'] . '</td>';              
                $tabla .= '<td>' . $row['apellido'] . ' ' . $row['nombre'] . '</td>';
                $tabla .= '<td>' . $row['dni'] . '</td>';
                $tabla .= '<td>' . $row['so_codigo'] . '</td>';
                
                if ($row['estado_alumno'] == 1) {
                    $estado = '<h4><span class="label label-primary">Activo</span></h4>';
                    $habilitar_btn = 'disabled';
                    $modal_eliminar = '';
                    $modal_debaja_al = '#m_dar_baja';
                    $borrar = '';
                    $debaja = '<a onclick="dar_baja_alumno(' . $row['id_alumno'] . ');" 
                                class="btn btn-circle btn-success"
                                data-toggle="modal" data-target="#m_dar_baja" 
                                title="Eliminar" ><span class="fa fa-power-off">
                                </span>
                                </a>';
                    $editar = '<a onclick="editar_alumno(' . $row['id_alumno'] . ');" 
                                class="btn btn-circle btn-warning"
                                data-toggle="modal" data-target="#m_nuevo" 
                                title="Editar"><span class="glyphicon glyphicon-edit" >
                                </span>
                                </a>';
                } 
                elseif($row['estado_alumno'] == 0) {
                    $estado = '<h4><span class="label label-danger">Sin Aula</span></h4>';
                    $habilitar_btn = '';
                    $modal_eliminar = '#m_eliminar';
                    $modal_debaja_al = '#m_dar_baja';
                    $borrar = '';
                    $debaja = '<a onclick="dar_baja_alumno(' . $row['id_alumno'] . ');" 
                                class="btn btn-circle btn-success"
                                data-toggle="modal" data-target="#m_dar_baja" 
                                title="Eliminar" ><span class="fa fa-power-off">
                                </span>
                                </a>';
                    $editar = '<a onclick="editar_alumno(' . $row['id_alumno'] . ');" 
                                class="btn btn-circle btn-warning"
                                data-toggle="modal" data-target="#m_nuevo" 
                                title="Editar"><span class="glyphicon glyphicon-edit" >
                                </span>
                                </a>';
                }
                elseif($row['estado_alumno'] == 2) {
                    $estado = '<h4><span class="label label-success">De baja</span></h4>';
                    $habilitar_btn = '';
                    $modal_eliminar = '#m_eliminar';
                    $modal_debaja_al = '';
                    $borrar = '<a onclick="eliminar_alumno(' . $row['id_alumno'] . ');" 
                                class="btn btn-circle btn-danger"
                                data-toggle="modal" data-target="'.$modal_eliminar.'" 
                                title="Eliminar" '. $habilitar_btn .'><span class="glyphicon glyphicon-trash">
                                </span>
                                </a>';
                    $debaja = '';
                    $editar = '<a onclick="revertir_estado_al(' . $row['id_alumno'] . ');" 
                                class="btn btn-circle btn-default"
                                data-toggle="modal" data-target="#m_revertir_estado" 
                                title="Revertir su estado"><span class="fa fa-mail-reply" >
                                </span>
                                </a>';
                }
                $tabla .= '<td>'.$estado.'</td>';
                $tabla .= '<td>';
                            
                $tabla .= $editar ;
                $tabla .= $debaja ;

                $tabla .= $borrar ;
                        
                $tabla .= '</td>';
                $tabla .= '</tr>';
            } 
        }


        $sql2 = "SELECT * FROM alumno alum  
                    INNER JOIN socio soc ON soc.id_socio = alum.id_socio
                    WHERE alum.estado_alumno ='0'  AND  alum.estado_borrar = '1' AND soc.estado='1'";
        $datos = $this->con->query($sql2);

        while ($row = mysqli_fetch_assoc($datos)) {
            if ($this->op == 2) {
                $tabla .= '<option value="' . $row['id_alumno'] . '">' . $row['apellido_alumno'] . ' ' . $row['nombre_alumno'] . ' - ' . $row['dni_alumno'] . '</option>';
            }
        }






        return $tabla;
    }

    public function add() {
        $sql = "INSERT INTO `alumno` (
                                `id_socio`,
                                `nombre_alumno`,
                                `apellido_alumno`, 
                                `dni_alumno`, 
                                `fecha_nacimiento_al` ,
                                `edad_alumno`,
                                `estado_alumno`,
                                `estado_borrar`
                                ) 
                    VALUES (
                                '{$this->sel_socio}',
                                '{$this->nombres}',
                                '{$this->apellidos}',
                                '{$this->dni}',
                                '{$this->fecha}',
                                '{$this->edad}',
                                '{$this->estado}' , 
                                '1' 
                            )";
        $datos = $this->con->query($sql);
        if ($datos == TRUE) {
            $res = 1;
        } else {
            $res = 0;
        }
        return $res;
    }

    
    public function ver() {
        $alumno = array();
        $sql = "SELECT * FROM alumno alum  
                    INNER JOIN socio soc ON soc.id_socio = alum.id_socio
                    WHERE alum.estado_borrar = '1' AND id_alumno = '{$this->id}'";
        $datos = $this->con->query($sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($datos)) {
            $c = $i++;
            $alumno[] = array(
                'id' => $row['id_alumno'],
                'id_socio' => $row['id_socio'],
                'nombres' => $row['nombre_alumno'],
                'apellidos' => $row['apellido_alumno'],
                'dni' => $row['dni_alumno'],        
                'fecha' => $row['fecha_nacimiento_al'],
                'edad' => $row['edad_alumno'],
                'estado' => $row['estado_alumno'],
                'c' => $c
            );
        }
        $alumno['success'] = true;
        return json_encode($alumno);
    }

    public function editar() {
        $sql = "UPDATE `alumno` 
                   SET
                        `id_socio`= '{$this->sel_socio}', 
                        `nombre_alumno`= '{$this->nombres}',
                        `apellido_alumno`= '{$this->apellidos}',
                        `dni_alumno`= '{$this->dni}',
                        `fecha_nacimiento_al`= '{$this->fecha}',
                        `edad_alumno`= '{$this->edad}',
                        `estado_alumno`= '{$this->estado}' 

                 WHERE 
                        id_alumno = '{$this->id}' ";

        $datos = $this->con->query($sql);
        if ($datos == TRUE) {
            $res = 1;
        } else {
            $res = 0;
        }

        return $res;
    }


    public function eliminar() {
        $sql = "UPDATE `alumno` SET estado_borrar = '0' WHERE id_alumno ='{$this->id}' ";
        $datos = $this->con->query($sql);
        if ($datos == TRUE) {
            $res = 1;
        } else {
            $res = 0;
        }
        return $res;
    }

    public function revertir() {

        $sql = "UPDATE `alumno` SET estado_alumno = '0' WHERE id_alumno ='{$this->id}' ";
        $datos = $this->con->query($sql);
        if ($datos == TRUE) {
            $res = 1;
        } else {
            $res = 0;
        }
        return $res;
    }
    
    public function verificar() {
        $sql = "SELECT * FROM alumno WHERE dni_alumno = '{$this->dni}' ";
        $datos = $this->con->query($sql);
        if (mysqli_num_rows($datos) >= 1) {
            $res = 1;
        } else {
            $res = 0;
        }
        return $res;
    }
    


    public function debaja() {
        $sql3 = "SELECT * FROM activar WHERE estado = '1' ORDER BY nombre_activar ASC";
        $datos = $this->con->query($sql3);

        while ($row = mysqli_fetch_assoc($datos)) {

            $activar = $row['id_activar'];
        }

        $sql2 = "UPDATE `aula_alumno` SET estado_al = '2' WHERE id_alumno ='{$this->id_dar_debaja}' AND id_activar = '$activar' AND estado_al= '1' ";
        $datos = $this->con->query($sql2);

        $sql3 = "UPDATE `alumno` SET estado_alumno = '2' WHERE id_alumno ='{$this->id_dar_debaja}' ";
        $datos = $this->con->query($sql3);

        $sql = "SELECT * FROM activar WHERE estado = '1' ORDER BY nombre_activar ASC";
        $datos = $this->con->query($sql);

        while ($row = mysqli_fetch_assoc($datos)) {

            $activar = $row['id_activar'];
        }

        $sql = "INSERT INTO `de_baja_alumno`(
 
                            `idalumno`,
                            `idmotivo`,
                            `idactivar`

                            )

                       VALUES (

                            '{$this->id_dar_debaja}',
                            '{$this->sel_motivo}',
                            '$activar'                            

                            )";

        $datos = $this->con->query($sql);
        if ($datos == TRUE) {
            $res = 1;
        } else {
            $res = 0;
        }

        return $res;
    }

}
