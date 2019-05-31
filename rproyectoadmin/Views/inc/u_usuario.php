<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Ropita</h3>
            </div>
            
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    

                    <!--titulos de la tabla-->
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30"></p>
                        <div class="table-responsive" id="listar_mot">
                             <!--cambiar el id de la tabla-->
                            <table id="tabla_usuario" class="table table-striped table-bordered">
                                <thead>
                                    <tr>                                
                                        <th width="10">N°</th>
                                        <th>Apellido</th>
                                        <th>Nombre</th>
                                        <th>Usuario</th>
                                        <th>Email</th>
                                        <th>Número</th>                                        
                                        <th></th>                                       
                                    </tr>
                                </thead>
                            </table>                                
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</div>
<!--Modal para Agregar y editar-->
<div id="m_nuevo_prenda" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!--Contenido del modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nueva Ropita</h4>
            </div>
            <div class="modal-body">

                <!--Cambiar el nombre del formulario -->
                <form id="Formulario_prend" class="form-horizontal form-label-left" enctype="multipart/form-data" role="form" method="post">                    
                    <span class="section"></span>
                    

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Feria</label>
                        <div id="sel" class="col-md-6 col-sm-6 col-xs-12">
                            <select id="sel_feria" name="sel_feria"  class="form-control" style="width: 100%" required><option></option></select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo  de Ropa</label>
                        <div id="sel" class="col-md-6 col-sm-6 col-xs-12">
                            <select id="sel_tipo_filtro" name="sel_tipo_filtro"  class="form-control" style="width: 100%" required><option></option></select>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Talla</label>
                        <div id="sel" class="col-md-6 col-sm-6 col-xs-12">
                            <input id="talla" class="form-control col-md-7 col-xs-12"  name="talla" placeholder="Talla" type="text" required>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Detalle</label>
                        <div id="sel" class="col-md-6 col-sm-6 col-xs-12">
                            <input id="detalle" class="form-control col-md-7 col-xs-12"  name="detalle" placeholder="Detalle" type="text" required>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Imagen<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                             <input id="imagen" class="form-control col-md-7 col-xs-12"  name="imagen" placeholder="Detalle" type="file" required>
                        </div>
                    </div>

                    <div id="alerta"></div>

                    <div class="modal-footer col-sm-12">
                        <button type="reset" class="btn btn-primary col-md-2">Borrar</button>
                        <input type="submit" class="btn btn-success col-md-2" value="Guardar">
                        <button type="button" class="btn btn-default col-md-2" data-dismiss="modal">Cancelar</button>
                    </div>            
                </form>

            </div>        
        </div>
    </div>
</div>

<!---modal Ver Codigo de Barra-->
<div id="m_vercod_so" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm ">
        <!--Modal content-->
        <div class="modal-content barra">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 id="nom_so" class="modal-title text text-info text-center">Nombre del Socio</h4>
                <a class="btn btn-circle btn-success" id="imprimir" href="" target="_blank" title="Imprimir">
                <span class="fa fa-print" ></span>
            </a>
            </div>
        </div>
    </div>
</div>

<div id="m_ver_ropita" class="modal fade" role="dialog">
  <div class="modal-dialog modal-md">
        <!--Modal content-->
        <div id="listar_ropita" class="modal-content">
                                                
              
        </div>
            

    </div>
</div>

<div id="m_vender" class="modal fade" role="dialog">
    <div class="modal-dialog modal-sm">
        <!--Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text text-danger text-center">Vender</h4>
            </div>
            <div class="modal-body">
                <p>Vender estos Productos</p>

                <!--cambiar el id eliminar para poder eliminar-->
                <input id="id_vender" type="hidden" value="" name="id_vender">
                <!--cambiar el id eliminar para el mensaje-->
                <button id="vender_si" type="button" class="btn btn-warning ">Si</button>                      
                <button id="exo_no" type="button" class="btn btn-default"  data-dismiss="modal">No</button>                
            </div>        
        </div>
    </div>
</div>

                <script>
                    $("#Formulario_prend").on("submit", function(e){
                        e.preventDefault();
                        var formData = new FormData(document.getElementById("Formulario_prend"));
                    
                        $.ajax({
                            url: "../rproyectoadmin/Views/eliar/registro_ropa.php",
                            type: "POST",
                            dataType: "HTML",
                            data: formData,
                            cache: false,
                            contentType: false,
                            processData: false
                        }).done(function(echo){
                            $("#alerta").html(echo);
                        });
                    });
                </script>
