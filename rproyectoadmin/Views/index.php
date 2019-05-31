
<!DOCTYPE html>
<html lang="es">
    <head>

        
        <link rel=stylesheet href="Views/template/css/main_modal_filtro.css" type="text/css" />
        <link rel=stylesheet href="Views/template/css/admin_css.css" type="text/css" />


        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Santa Maria</title>
        <link rel="shortcut icon" href="Views/template/imagenes/favicon.png">
        <!-- Bootstrap -->
        <link href="Views/template/css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="Views/template/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
        <!-- NProgress -->
        <link href="Views/template/css/nprogress/nprogress.css" rel="stylesheet">

        <link href="Views/template/css/iCheck/skins/flat/green.css" rel="stylesheet">
        <!--<link href="Views/template/select2/css/select2.min.css" rel="stylesheet">-->
        
        <!--select2---->
        <link href="Views/template/select2/dist/css/select2.min.css" rel="stylesheet">
        <!-- Datatables -->
        <link href="Views/template/css/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
        <link href="Views/template/css/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">
        <link href="Views/template/css/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">
        <link href="Views/template/css/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">
        <link href="Views/template/css/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">
        <!-- Custom Theme Style -->
        <link href="Views/template/build/css/custom.min.css" rel="stylesheet">
        <link href="Views/template/css/estilos.css" rel="stylesheet">
        

        <script src="Views/template/js/jquery/dist/jquery.min.js"></script>
        <!--PDF -->
        <script src="Views/template/js/jquery-ui-1.10.4.custom.js"></script>
        <script src="Views/template/js/jquery.PrintArea.js" type="text/JavaScript" language="javascript"></script>

    </head>

    <body class="nav-md">
        <div class="container body">
            <div class="main_container">
                <div class="col-md-3 left_col">
                    <div class="left_col scroll-view">
                        <div class="navbar nav_title" style="border: 0;">
                            <a href="#" class="site_title"><span>Sistema</span></a>
                        </div>

                        <div class="clearfix"></div>

                        <!-- menu profile quick info -->
                        <div class="profile">
                            <div class="profile_pic">
                                <img src="Views/template/imagenes/usuarios/chico.png" alt="" class="img-circle profile_img">
                            </div>
                            <div class="profile_info">
                                <span>Bienvenido</span>
                                <h2><?php echo $_SESSION['usuario'] ?></h2>
                            </div>
                        </div>
                        <!-- /menu profile quick info -->

                        <br />

                        <!-- sidebar menu -->
                        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                            <div class="menu_section">
                                <br>
                                <h3>Menu</h3>

                                <ul class="nav side-menu">
                                    <li><a id="inicio" href="?view=index"><i class="fa fa-home"></i> Inicio </a>

                                    </li>
                                    
                                    <li><a><i class="fa fa-user"></i>User<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="?view=u_usuario">Usuarios</a></li>
                                        </ul>
                                    </li>

                                    <li><a><i class="fa fa-calendar"></i>Feria<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="?view=f_feria">Feria</a></li>
                                        </ul>
                                    </li>

                                    <li><a><i class="fa fa-money"></i>Ropita<span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="?view=r_tipo_filtro">Tipo de Ropa</a></li>
                                            <li><a href="?view=r_prenda">Prendas</a></li>
                                        </ul>
                                    </li>

                                    
                                    <li><a><i class="fa fa-wrench"></i> Mantenimiento <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="?view=m_filtro">Filtro</a></li>
                                        </ul>
                                    </li>
                                    <li><a><i class="fa fa-cogs"></i> Herramientas <span class="fa fa-chevron-down"></span></a>
                                        <ul class="nav child_menu">
                                            <li><a href="#">Respaldar Base de datos</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- /sidebar menu -->

                    </div>
                </div>

                <!-- top navigation -->
                <div class="top_nav">
                    <div class="nav_menu">
                        <nav>
                            <div class="nav toggle">
                                <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                            </div>

                            <ul class="nav navbar-nav navbar-right">
                                <li class="">
                                    <a href="" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <img src="Views/template/imagenes/usuarios/chico.png" alt=""><?php echo $_SESSION['usuario'] ?>
                                        <span class=" fa fa-angle-down"></span>
                                    </a>
                                    <ul class="dropdown-menu dropdown-usermenu pull-right">
                                        <li><a href="javascript:;"> Perfil</a></li>
                                        <li>
                                            <a href="javascript:;">
                                                <span>Configurar</span>
                                            </a>
                                        </li>
                                        <li><a href="?view=Salir"><i class="fa fa-sign-out pull-right"></i> Salir </a></li>
                                    </ul>
                                </li>


                            </ul>
                        </nav>
                    </div>
                </div>

                <?php include PAG; ?> 
                <footer>
                    <div class="pull-right">
                        Sistema<a href=""></a>
                    </div>
                    <div class="clearfix"></div>
                </footer>
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->


        <!-- Bootstrap -->


        <script src="Views/template/css/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- FastClick -->
        <script src="Views/template/css/fastclick/lib/fastclick.js"></script>
        <!-- NProgress -->
        <script src="Views/template/css/nprogress/nprogress.js"></script>
        <script src="Views/template/css/iCheck/icheck.min.js"></script>

        <script src="Views/template/css/jszip/dist/jszip.min.js"></script>
        <script src="Views/template/css/pdfmake/build/pdfmake.min.js"></script>
        <script src="Views/template/css/pdfmake/build/vfs_fonts.js"></script>

<!--<script src="Views/template/js/jquery-1.10.2.js"></script>-->

        <!-----------datatable-------------------------------------------------->
        <script src="Views/template/css/datatables.net/js/jquery.dataTables.min.js"></script>
        <script src="Views/template/css/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
        <script src="Views/template/css/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="Views/template/css//datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
        <script src="Views/template/css/datatables.net-buttons/js/buttons.flash.min.js"></script>
        <script src="Views/template/css/datatables.net-buttons/js/buttons.html5.min.js"></script>
        <script src="Views/template/css/datatables.net-buttons/js/buttons.print.min.js"></script>
        <script src="Views/template/css/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
        <script src="Views/template/css/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
        <script src="Views/template/css/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="Views/template/css/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
        <script src="Views/template/css/datatables.net-scroller/js/datatables.scroller.min.js"></script>        
        <script src="Views/template/select2/dist/js/select2.full.min.js"></script>
        <script src="Views/template/select2/dist/js/i18n/es.js"></script>
        <!--<script src="Views/template/select2/js/select2.full.min.js"></script>-->
        <script src="Views/template/js/JsBarcode.all.min.js"></script>
        
        <script src="Views/template/js/jspdf.min.js"></script>
        <script src="Views/template/js/html2canvas.js"></script>
        <script src="Views/template/js/pdfFromHTML.js"></script>
        
        
        
        <script src="Views/template/js/codigo.js"></script>
        <script src="Views/template/js/codigo_elton.js"></script>
        <!-- Custom Theme Scripts -->
        <script src="Views/template/build/js/custom.min.js"></script>
        <script type="text/javascript" src="Views/template/js/cssrefresh.js"></script>
    </body>
</html>

