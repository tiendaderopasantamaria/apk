<?php

class U_usuario {

    private $con;

    public function __construct() {
        $this->con = new Conexion();
    }

    public function set($atributo, $contenido) {
        $this->$atributo = $contenido;
    }

    public function listar() {
        $tabla = '';
        $sql = "SELECT * FROM usuarios
                
                ORDER BY usuario ASC
        ";
        $datos = $this->con->query($sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($datos)) {
            $c = $i++;
            if ($this->op == 1) {
                $tabla .= '<tr>';
                $tabla .= '<td>' . $c . '</td>';

                $tabla .= '<td>' . $row['apellido'] . '</td>';
                $tabla .= '<td>' . $row['nombre'] . '</td>';
                $tabla .= '<td>' . $row['usuario'] . '</td>';
                $tabla .= '<td>' . $row['email'] . '</td>';
                $tabla .= '<td>' . $row['numero'] . '</td>';
               

                $tabla .= '<td>';

                 $tabla .= '<a onclick="ver_ropita(' . $row['id_usuarios'] . ');" '
                        . 'class="btn btn-circle btn-info"'
                        . 'data-toggle="modal" data-target="#m_ver_ropita" '
                        . 'title="Ver facturación"><span class="fa fa-eye">'
                        . '</span>'
                        . '</a>


                        </td>';
                $tabla .= '</tr>';
            } else {
                $tabla .= '<option value="' . $row['id_usuarios'] . '">' . $row['usuario'] . '</option>';
            }
        }
        return $tabla;
    }


    public function ver() {
        $usuario = array();
        $sql = "SELECT * FROM usuarios WHERE id_usuarios = '{$this->id}' ORDER BY usuario ASC";
        $datos = $this->con->query($sql);
        $i = 1;
        while ($row = mysqli_fetch_assoc($datos)) {
            $c = $i++;
            $usuario[] = array(
                'id' => $row['id_usuarios'],
                'usuario' => $row['usuario'],
                'c' => $c
            );
//            $arreglo["data"][] = array_map("utf8_encode", $data);
        }
        $usuario['success'] = true;
        return json_encode($usuario);
    }


    public function ver_pagos() {
        $sql = "SELECT * FROM prenda  pren
                INNER JOIN carrito carr ON carr.id_prenda_c = pren.id_prenda
                INNER JOIN tipo_filtro tf ON tf.id_tipo_filtro = pren.id_tipo_filtro
                INNER JOIN usuarios us ON us.id_usuarios = carr.id_usuarios
                WHERE carr.id_usuarios = '{$this->id}' AND pren.estado_prenda = '1' AND estado_carrito = 'si'
                ORDER BY carr.id_carrito ASC";
        $datos = $this->con->query($sql);
        $datos2 = $this->con->query($sql);
        $i = 1;
        $total_pagos = 0;
        $deuda = 0;
        $cuota = 0;
        $row2 = mysqli_fetch_assoc($datos2);
//        $row2 = '';
        $tabla = '<div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title text text-danger text-center">'.$row2['usuario'].'</span></h4>
                    <h3 class="modal-title text text-info text-center">'.$row2['apellido'].'</h3>
                </div>';
        $tabla .= '<div class="modal-body">
                        <div class="table-responsive">
                            <table id="tabla_pagos" class="table table-striped table-bordered">
                                <thead>
                                    <tr> 
                                        <th>N°</th>
                                        <th>Tipo de ropa</th>
                                        <th>Detalle</th>
                                        <th>Talla</th>
                                        <th>Precio</th>
                                        <th width="100">Ropita</th>
                                    </tr>
                                </thead>';
        while ($row = mysqli_fetch_assoc($datos)) {
            $c = $i++;
            $pagos = $row['precio_venta'];
            $img = $row['img_prenda'];
           
            $total_pagos = $total_pagos + $pagos;
            $tabla .= '<tr>';
            $tabla .= '<td>' . $c . '</td>';
            $tabla .= '<td>' . $row['nombre_tf'] . '</td>';
            $tabla .= '<td>' . $row['detalle'] . '</td>';
            $tabla .= '<td>' . $row['talla'] . '</td>';
            $tabla .= '<td>S/.' . number_format($row['precio_venta'], 2) . '</td>';
            $tabla .= '<td><img src="../rproyecto/img_ropita/'.$img.'" alt="" style="width:80px" class="img-thumbnail"> </td>';
            $tabla .= '</tr>';
        }
        $tabla .= '</table>'
                . '</div>
                <div id="resumen" class="col-md-12">                     
                    
                    <p class="col col-md-4 text text-success">Importe: <span id="importe" class="text text-info">S/.' . number_format($total_pagos, 2) . '</span></p> 
                </div>
                
                                    
                <button id="btn_cerrar" type="button" class="btn btn-default"  data-dismiss="modal"><span class="fa fa-close"></span> Cerrar</button>

                <a onclick="vender(' . $row2['id_usuarios'] . ');" '
                        . 'class="btn btn-circle btn-info"'
                        . 'data-toggle="modal" data-target="#m_vender" '
                        . 'title="Ver facturación"><span class="fa fa-money">'
                        . '</span>'
                        . '</a>
          
</div>';
//        $tabla .= '';
//        $f_total_pagos = number_format($total_pagos,2);
        return $tabla;
    }


    public function vender_ropita() {

        $sql2 = "SELECT * FROM prenda  pren
                INNER JOIN carrito carr ON carr.id_prenda_c = pren.id_prenda
                INNER JOIN tipo_filtro tf ON tf.id_tipo_filtro = pren.id_tipo_filtro
                INNER JOIN usuarios us ON us.id_usuarios = carr.id_usuarios
                WHERE carr.id_usuarios = '{$this->id}' AND pren.estado_prenda = '1' AND estado_carrito = 'si'
                ORDER BY carr.id_carrito ASC";
        $datos2 = $this->con->query($sql2);

        while ($row = mysqli_fetch_assoc($datos2)) {
            $id_prenda = $row['id_prenda'];

            $sql3 = "UPDATE `prenda` SET estado_prenda = '0'
                     WHERE id_prenda = '$id_prenda'
            ";
            $datos3 = $this->con->query($sql3);        
        }









        $sql4 = "UPDATE `carrito` SET estado_carrito = 'ven'
                     WHERE id_usuarios = '{$this->id}'
            ";
            $datos4 = $this->con->query($sql4);

            if ($datos4 == TRUE) {
                $res = 1;

            } else {
                $res = 0;
            }
            return $res;
            }       
    

    
}
