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
                    <div class="x_title">
                        <h2>Tipo Filtro</h2>
                        <div class="text text-right">
                                <!--cambiar el onclick - funcion en el codigo para nuevo-->
                                <button id="btn_nuevo_m" class="btn btn-app" data-toggle="modal">                            
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
                            <table id="tabla_tipo_filtro" class="table table-striped table-bordered">
                                <thead>
                                    <tr>                                
                                        <th width="10">N°</th>
                                        <th>Tipo de prendas</th>
                                        <th>Precio de Compra</th>
                                        <th>Precio de Venta</th>
                                        <th>Clasificación</th>
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



                <script type='text/javascript'>
                    $('#btn_nuevo_m').on('click', function(){
                       window.location="../rproyectoadmin/Views/eliar/nuevo_tipo_de_ropa.php";
                    })
                </script>
