<?php

class R_prenda {

    private $con;

    public function __construct() {
        $this->con = new Conexion();
    }

    public function set($atributo, $contenido) {
        $this->$atributo = $contenido;
    }

    public function listar() {
        $tabla = '';
        $sql = "SELECT * FROM prenda  pren
                INNER JOIN feria fer ON fer.id_feria = pren.feria_prenda
                INNER JOIN tipo_filtro tf ON tf.id_tipo_filtro = pren.id_tipo_filtro
                WHERE pren.estado_prenda = '1'
                ORDER BY pren.id_tipo_filtro ASC
        ";
        $datos = $this->con->query($sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($datos)) {
            $c = $i++;
            if ($this->op == 1) {
                $tabla .= '<tr>';
                $tabla .= '<td>' . $c . '</td>';

                $tabla .= '<td>' . $row['anio'] . '</td>';
                $tabla .= '<td>' . $row['mes'] . '</td>';
                $tabla .= '<td>' . $row['nombre_tf'] . '</td>';
                $tabla .= '<td>' . $row['talla'] . '</td>';
                $tabla .= '<td>' . $row['precio'] . '</td>';
                $tabla .= '<td>' . $row['precio_venta'] . '</td>';
               

                $tabla .= '<td><a onclick="editar_feria(' . $row['id_prenda'] . ');" '

                        . 'class="btn btn-circle btn-warning"'
                        . 'data-toggle="modal" data-target="#Modal_Nuevo_Registro" '
                        . 'title="Editar"><span class="glyphicon glyphicon-edit" >'
                        . '</span>'
                        . '</a></td>';
                $tabla .= '</tr>';
            } else {
                $tabla .= '<option value="' . $row['id_prenda'] . '">' . $row['anio'] . ' ' . $row['mes'] . '</option>';
            }
        }
        return $tabla;
    }

    public function add() {
        $sql = "INSERT INTO `feria`(

                                    `anio`, 
                                    `mes`, 
                                    `detalle`

                                    ) 
                     VALUES (

                                    '{$this->anio}',
                                    '{$this->mes}',
                                    '{$this->detalle}'

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
        $sql = "UPDATE `feria` 
                   SET 
                       `anio`= '{$this->anio}',
                       `mes`= '{$this->mes}',
                       `detalle`= '{$this->detalle}'
                 WHERE 
                        id_feria = '{$this->id}' ";
        $datos = $this->con->query($sql);
        if ($datos == TRUE) {
            $res = 1;
        } else {
            $res = 0;
        }

        return $res;
    }

    public function ver() {
        $feria = array();
        $sql = "SELECT * FROM feria WHERE id_feria = '{$this->id}' ORDER BY anio ASC";
        $datos = $this->con->query($sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($datos)) {
            $c = $i++;
            $feria[] = array(
                'id' => $row['id_feria'],
                'anio' => $row['anio'],
                'mes' => $row['mes'],
                'detalle' => $row['detalle'],
                'c' => $c
            );
//            $arreglo["data"][] = array_map("utf8_encode", $data);
        }
        $feria['success'] = true;
        return json_encode($feria);
    }

    
}
