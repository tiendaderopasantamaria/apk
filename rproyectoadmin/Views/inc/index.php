<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            
            <div class="row top_tiles" style="margin: 10px 0;">
                <div class="col-md-3 col-sm-3 col-xs-6 tile">
                    <span>Total Ingreso del Día</span>
                    <h2 id="total_venta_dia">S/0.00</h2>
                    <span class="sparkline_one" style="height: 160px;">
                        <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                    </span>
                </div>
            </div>
            <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">

                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Bienvenido <?php echo $_SESSION['usuario'] ?></h2>
                        <ul class="nav navbar-right panel_toolbox">

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="table-responsive" id="prod_stock">

                        </div>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /page content -->
<!--------------------------------------Modal abastecer----------------------------------> 
<div id="modal_abast" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">

        <!--Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Abastecer Producto</h4>
            </div>
            <div class="modal-body">
                <form id="form_abs" class="form-inline form-label-left" enctype="multipart/form-data" role="form" method="post">                    
                    <span class="section"></span>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Producto <span class="required"></span></label>                          
                    </div>
                    <div class="form-group">
                        <input id="list-p" class="form-control" type="text" name="abs_prod" placeholder="Seleccione Producto" list="abs_prod" required>
                        <datalist id="abs_prod" > 
                        </datalist>                                                 
                        <input id="accion" name="accion" type="hidden" value="10">                        
                    </div>  
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Cantidad <span class="required"></span></label>                       
                    </div>
                    <div class="form-group">
                        <input id="cant" class="form-control col-md-7 col-xs-12"  name="cant" placeholder="Cantidad" type="number" step="any">  
                    </div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Precio <span class="required"></span></label>
                    </div>
                    <div class="form-group">                        
                        <input id="precio_c" class="form-control col-md-7 col-xs-12"  name="precio_c" placeholder="Precio de Compra" type="number" step="any">   

                    </div>  
                    <div class="divider"></div>
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Proveedor <span class="required"></span></label>                            
                    </div>
                    <div class="form-group">
<!--                        <select name="abs_prov" class="form-control" id="abs_prov">                                
                        </select>   -->
                        <input id="list-prov" class="form-control" type="text" name="list-prov" placeholder="Seleccione Proveedor" list="abs_prov_" required>
                        <datalist id="abs_prov_" >                            
                        </datalist>                                                 
                        <input id="abs_prov" name="abs_prov" type="hidden" value="">
                    </div> 
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> TipoDoc. <span class="required"></span></label>                            
                    </div>
                    <div class="form-group" id="tipo_doc" name="tipo_doc">

                    </div> 
                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> NumDoc. <span class="required"></span></label>                            
                    </div>
                    <div class="form-group">
                        <input id="num_doc" class="form-control col-md-7 col-xs-12"  name="num_doc" placeholder="Número de Doc." type="text">  
                    </div>
                    <div class="divider"></div>

                    <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name"> Fecha <span class="required"></span></label>                            
                    </div>
                    <div class="form-group">
                        <input id="num_doc" class="form-control col-md-7 col-xs-12"  name="fecha_abs" type="date">  
                    </div>
                    <div class="form-group">
                        <button type="button" id="agregar_carrito" class="btn btn-app">                            
                            <i class="fa fa-shopping-cart"></i> Agregar
                        </button> 
                    </div>
                    <div class="divider">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <h3 class="panel-title">Productos</h3>
                            </div>
                            <div class=" table-responsive panel-body detalle-producto">

                            </div>
                        </div>
                    </div>


                    <div class="modal-footer col-sm-12">
                        <button type="reset" class="btn btn-primary col-md-2">Limpiar</button>
                        <input id="guardar_abs" type="submit" class="btn btn-success col-md-2" value="Guardar">
                        <button type="button" class="btn btn-default col-md-2" data-dismiss="modal">Cancelar</button>
                    </div>            
                </form>
            </div>        
        </div>
    </div>
</div>