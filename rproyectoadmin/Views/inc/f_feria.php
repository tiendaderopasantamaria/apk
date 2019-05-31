<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Feria</h3>
            </div>
            
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Feria</h2>
                        <div class="text text-right">
                                <!--cambiar el onclick - funcion en el codigo para nuevo-->
                                <button onclick="nuevo_feria();" id="btn_nuevo_m" class="btn btn-app" data-toggle="modal" data-target="#Modal_Nuevo_Registro">                            
                                <i class="fa fa-plus"></i> Nuevo
                            </button>
                            <div id="msj_borrar" class="col-lg-8 col-xs-12 col-md-3 col-sm-3 col-md-offset-2">

                            </div>

                            <ul class="nav navbar-right panel_toolbox">
                                <br><li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>


                    </div>

                    <!--titulos de la tabla-->
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30"></p>
                        <div class="table-responsive" id="listar_mot">
                             <!--cambiar el id de la tabla-->
                            <table id="tabla_feria" class="table table-striped table-bordered">
                                <thead>
                                    <tr>                                
                                        <th width="10">N°</th>
                                        <th>Año</th>
                                        <th>Mes</th>
                                        <th>Detalle</th>
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
<div id="Modal_Nuevo_Registro" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!--Contenido del modal-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Nuevo Cargo Docente</h4>
            </div>
            <div class="modal-body">

                <!--Cambiar el nombre del formulario -->
                <form id="Formulario_feria" class="form-horizontal form-label-left" enctype="multipart/form-data" role="form" method="post">                    
                    <span class="section"></span>
                    
                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Año<span class="required">*</span></label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <input id="anio" class="form-control col-md-7 col-xs-12"  name="anio" placeholder="Año" type="text" required>
                            <input id="accion" name="accion" type="hidden" value="">
                            <!--nombre del id para editar-->
                            <input id="id_feria" name="id_feria" type="hidden" value="">
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Mes<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                             <input id="mes" class="form-control col-md-7 col-xs-12"  name="mes" placeholder="Mes" type="text" required>
                        </div>
                    </div>

                    <div class="item form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Detalle<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">                            
                             <input id="detalle" class="form-control col-md-7 col-xs-12"  name="detalle" placeholder="Detalle" type="text" required>
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



