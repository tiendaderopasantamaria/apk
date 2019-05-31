<?php

class R_tipo_filtro {

    private $con;

    public function __construct() {
        $this->con = new Conexion();
    }

    public function set($atributo, $contenido) {
        $this->$atributo = $contenido;
    }

    public function listar() {
        $tabla = '';

        $sql = "SELECT * FROM tipo_filtro tf  
                    INNER JOIN filtro fil ON fil.id_filtro = tf.filtro
                ORDER BY id_tipo_filtro DESC"
                ;
        $datos = $this->con->query($sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($datos)) {
            $c = $i++;
            if ($this->op == 1) {
                $tabla .= '<tr>';
                $tabla .= '<td>' . $c . '</td>';

                $tabla .= '<td>' . $row['nombre_tf'] . '</td>';
                $tabla .= '<td>' . $row['precio'] . '</td>';
                $tabla .= '<td>' . $row['precio_venta'] . '</td>';
                $tabla .= '<td>' . $row['nombre_filtro'] . '</td>';

                $tabla .= '<td><a onclick="editar_tipo_filtro(' . $row['id_tipo_filtro'] . ');" '

                        . 'class="btn btn-circle btn-warning"'
                        . 'data-toggle="modal" data-target="#Modal_Nuevo_Registro" '
                        . 'title="Editar"><span class="glyphicon glyphicon-edit" >'
                        . '</span>'
                        . '</a></td>';
                $tabla .= '</tr>';
            } else {
                $tabla .= '<option value="' . $row['id_tipo_filtro'] . '">' . $row['nombre_tf'] . ' - S/.' . $row['precio'] . '.00 ' . '</option>';
            }
        }
        return $tabla;
    }

    public function add() {

        $sql = "INSERT INTO `tipo_filtro`(

                                    `tipo`,
                                    `filtro`, 
                                    `nombre_tf`,
                                    `precio`,
                                    `img`,
                                    `precio_venta`

                                    ) 
                     VALUES (

                                    't{$this->sel_filtro}',
                                    '{$this->sel_filtro}',
                                    '{$this->nombre}',
                                    '{$this->precio}',
                                    '{$this->nombreArchivo}',
                                    '{$this->precio_venta}'

                            )";
        $datos = $this->con->query($sql);
        if ($datos == TRUE) {
            $res = 1;
        } else {
            $res = 0;
        }

        return $res;
    }

    public function editar() {
        $sql = "UPDATE `tipo_filtro` 
                   SET 
                       `tipo`= 't{$this->sel_filtro}',
                       `filtro`= '{$this->sel_filtro}',
                       `nombre`= '{$this->nombre}',
                       `precio`= '{$this->precio}',
                       `precio_venta`= '{$this->precio_venta}'
                 WHERE 
                        id_tipo_filtro = '{$this->id}' ";
        $datos = $this->con->query($sql);
        if ($datos == TRUE) {
            $res = 1;
        } else {
            $res = 0;
        }

        return $res;
    }

    public function ver() {
        $tipo_filtro = array();
        $sql = "SELECT * FROM tipo_filtro tf  
                    INNER JOIN filtro fil ON fil.id_filtro = tf.filtro
                WHERE tf.id_tipo_filtro = '{$this->id}'";
        $datos = $this->con->query($sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($datos)) {
            $c = $i++;
            $tipo_filtro[] = array(
                'id' => $row['id_tipo_filtro'],
                'id_filtro' => $row['id_filtro'],
                'nombre' => $row['nombre'],
                'precio' => $row['precio'],
                'precio_venta' => $row['precio_venta'],
                'c' => $c
            );
//            $arreglo["data"][] = array_map("utf8_encode", $data);
        }
        $tipo_filtro['success'] = true;
        return json_encode($tipo_filtro);
    }

    
}
