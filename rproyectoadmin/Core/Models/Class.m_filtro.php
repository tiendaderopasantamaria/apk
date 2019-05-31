<?php

class m_filtro {

    private $con;

    public function __construct() {
        $this->con = new Conexion();
    }

    public function set($atributo, $contenido) {
        $this->$atributo = $contenido;
    }

    public function listar() {
        $tabla = '';
        $sql = "SELECT * FROM filtro  ORDER BY nombre_filtro DESC";
        $datos = $this->con->query($sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($datos)) {
            $c = $i++;
            if ($this->op == 1) {
                $tabla .= '<tr>';
                $tabla .= '<td>' . $c . '</td>';

                $tabla .= '<td>' . $row['nombre_filtro'] . '</td>';

                $tabla .= '<td><a onclick="editar_filtro(' . $row['id_filtro'] . ');" '

                        . 'class="btn btn-circle btn-warning"'
                        . 'data-toggle="modal" data-target="#Modal_Nuevo_Registro" '
                        . 'title="Editar"><span class="glyphicon glyphicon-edit" >'
                        . '</span>'
                        . '</a></td>';
                $tabla .= '</tr>';
            } else {
                $tabla .= '<option value="' . $row['id_filtro'] . '">' . $row['nombre_filtro'] . '</option>';
            }
        }
        return $tabla;
    }

    public function add() {
        $sql = "INSERT INTO `filtro`(

                                    `nombre`

                                    ) 
                     VALUES (

                                    '{$this->nombre}'

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
        $sql = "UPDATE `filtro` 
                   SET 
                       `nombre`= '{$this->nombre}'
                 WHERE 
                        id_filtro = '{$this->id}' ";
        $datos = $this->con->query($sql);
        if ($datos == TRUE) {
            $res = 1;
        } else {
            $res = 0;
        }

        return $res;
    }

    public function ver() {
        $filtro = array();
        $sql = "SELECT * FROM filtro WHERE id_filtro = '{$this->id}' ORDER BY nombre ASC";
        $datos = $this->con->query($sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($datos)) {
            $c = $i++;
            $filtro[] = array(
                'id' => $row['id_filtro'],
                'nombre' => $row['nombre'],
                'c' => $c
            );
//            $arreglo["data"][] = array_map("utf8_encode", $data);
        }
        $filtro['success'] = true;
        return json_encode($filtro);
    }

    
}
