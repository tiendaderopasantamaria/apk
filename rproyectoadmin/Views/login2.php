<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>APAFA-Juan Clímaco </title>
    <link rel="shortcut icon" href="Views/template/imagenes/favicon.ico">
    <!-- Bootstrap -->
    <link href="Views/template/css/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="Views/template/css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="Views/template/css/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="Views/template/css/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
     <link href="Views/template/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="frm_login">
              <h1>Iniciar Sesión</h1>
              <div>
                <input type="text" class="form-control" name="usuario" placeholder="Usuario" required />
              </div>
              <div>
                <input type="password" class="form-control" name="pass" placeholder="Contraseña" required/>
              </div>
              <div>
                  <div id="alerta">
                      
                  </div>
                <input type="submit" name="" value="Iniciar" class="btn btn-default submit">
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">
                  <a href="#signup" class="to_register"> </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
           
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
     <script src="Views/template/js/jquery/dist/jquery.min.js"></script>
  </body>
<script type="text/javascript">
  $(document).ready(function(){
    var url='?view=login2';
    $('#frm_login').submit(function(e){
      e.preventDefault();
      var data = $(this).serialize();
      $.ajax({
        url:url,
        type:'POST',
        data:data
      }).done(function(data){
         
        if (data==1) {
          $(location).attr('href','?view=asistencias'); 
        }else{
         var alerta = '<div class="alert alert-danger alert-dismissible fade in" \n\
                    role="alert"><button type="button" class="close" data-dismiss="alert" \n\
                    aria-label="Close"><span aria-hidden="true"></span></button> Datos Incorrectos </div>';
            $('#alerta').html(alerta);
        }
      });
    });
  }); 
</script>
