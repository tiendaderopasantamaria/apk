var id_event;

$(document).on("ready", function () {

//------------------------------------------------------------------------------
//-------------Estilo para el Seleccionar---------------------------------------
//------------------------------------------------------------------------------
    select_2('#sel_feria');
    select_2('#sel_filtro');
    select_2('#sel_tipo_filtro');
    select_2('#sel_usuario');


//------------------------------------------------------------------------------
//---------------MODULO FERIA---------------------------------------------------
//------------------------------------------------------------------------------
    //--------------------------------------------------------------------------
    //-----------Tabla feria-----------------------------------------------------
    listar('', '?view=f_feria', '1', '1', '#tabla_feria', 'si');
    listar('', '?view=f_feria', '1', '2', '#sel_feria', 'no'); //->para poder seleccionar en otra tabla
    agregar('#Formulario_feria', '', '#accion', '?view=f_feria', '6', '#alerta', '#tabla_feria', '', '1', '1', 'si');

//------------------------------------------------------------------------------
//---------------MODULO ROPITA--------------------------------------------------
//------------------------------------------------------------------------------
    //--------------------------------------------------------------------------
    //-----------Tabla Tipo Filtro----------------------------------------------
    listar('', '?view=r_tipo_filtro', '1', '1', '#tabla_tipo_filtro', 'si');
    listar('', '?view=r_tipo_filtro', '1', '2', '#sel_tipo_filtro', 'no'); //->para poder seleccionar en otra tabla
    agregar('#Formulario_tipo_filtro', '', '#accion', '?view=r_tipo_filtro', '6', '#alerta', '#tabla_tipo_filtro', '', '1', '1', 'si');
    //--------------------------------------------------------------------------
    //-----------Tabla Prenda---------------------------------------------------
    listar('', '?view=r_prenda', '1', '1', '#tabla_ropita', 'si');
    agregar('#Formulario_prenda', '', '#accion', '?view=r_prenda', '6', '#alerta', '#tabla_ropita', '', '1', '1', 'si');
    
//------------------------------------------------------------------------------
//---------------MODULO MANTENIMIENTO-------------------------------------------
//------------------------------------------------------------------------------
    //--------------------------------------------------------------------------
    //-----------Tabla Filtro---------------------------------------------------
    listar('', '?view=m_filtro', '1', '1', '#tabla_filtro', 'si');
    listar('', '?view=m_filtro', '1', '2', '#sel_filtro', 'no'); //->para poder seleccionar en otra tabla
    agregar('#Formulario_filtro', '', '#accion', '?view=m_filtro', '6', '#alerta', '#tabla_filtro', '', '1', '1', 'si');

//------------------------------------------------------------------------------
//---------------MODULO USUARIOS------------------------------------------------
//------------------------------------------------------------------------------
    //--------------------------------------------------------------------------
    //-----------Tabla Filtro---------------------------------------------------
    listar('', '?view=u_usuario', '1', '1', '#tabla_usuario', 'si');
    listar('', '?view=u_usuario', '1', '2', '#sel_usuario', 'no'); //->para poder seleccionar en otra tabla
    eliminar('#msj_borrar', '#vender_si', '#m_vender', '#id_vender', '?view=u_usuario', '5', '#tabla_usuario', '', '1', '1', 'si');
    

});







//------------------------------------------------------------------------------
//----------MODULO MANTENIMIENTO------------------------------------------------
//------------------------------------------------------------------------------
    //--------------------------------------------------------------------------PRINCIPIO DE LA TABLA
    //----------Tabla Feria-----------------------------------------------------Feria-----------------
    //--------------------------------------------------------------------------MANTENIMIENTO--------
        //--------------------------------------------------------------------------
        //----------*Agregar Feria---------------------------------------------------
            function nuevo_feria()
            {
                $("#Formulario_feria").resetear();
                $('#accion').attr('value', '5');
            }
        //--------------------------------------------------------------------------
        //----------*Editar Feria----------------------------------------------------
            function editar_feria(id)
            {
                $('#id_feria').attr('value', id);
                $('#accion').attr('value', '2');
                $.post('?view=f_feria', {accion: '3', id_feria: id}, function (data, textStatus) {
                    if (data.success) {
                        $.each(data, function (index, d) {
                            if ($.isNumeric(index)) {
                                $('#anio').val(d.anio);
                                $('#mes').val(d.mes);
                                $('#detalle').val(d.detalle);
                            }
                        });
                    }
                }, "json");
            }
//------------------------------------------------------------------------------
//----------MODULO ROPITA-------------------------------------------------------
//------------------------------------------------------------------------------
    //--------------------------------------------------------------------------PRINCIPIO DE LA TABLA
    //----------Tabla tipo Filtro-----------------------------------------------TIPO_FILTRO----------
    //--------------------------------------------------------------------------ROPITA---------------
        //--------------------------------------------------------------------------
        //----------*Agregar tipo filtro--------------------------------------------
            function nuevo_tipo_filtro()
            {
                $("#Formulario_tipo_filtro").resetear();
                $('#accion').attr('value', '5');
            }
        //--------------------------------------------------------------------------
        //----------*Editar tipo filtro---------------------------------------------
            function editar_tipo_filtro(id)
            {
                $('#sel_filtro').html('');
                listar('', '?view=m_filtro', '1', '2', '#sel_filtro', 'no'); //->para poder seleccionar en otra tabla

                $('#id_tipo_filtro').attr('value', id);
                $('#accion').attr('value', '2');
                $.post('?view=r_tipo_filtro', {accion: '3', id_tipo_filtro: id}, function (data, textStatus) {
                    if (data.success) {
                        $.each(data, function (index, d) {
                            if ($.isNumeric(index)) {

                                $('#sel_filtro>option[value="' + d.id_filtro + '"]').attr('selected', 'selected');
                                $("#sel_filtro").select2().select2("val", d.sel_filtro);

                                $('#nombre').val(d.nombre);
                                $('#precio').val(d.precio);
                                $('#precio_venta').val(d.precio_venta);
                            }
                        });
                    }
                }, "json");
            }

//------------------------------------------------------------------------------
//----------MODULO MANTENIMIENTO------------------------------------------------
//------------------------------------------------------------------------------
    //--------------------------------------------------------------------------PRINCIPIO DE LA TABLA
    //----------Tabla Filtro----------------------------------------------------FILTRO---------------
    //--------------------------------------------------------------------------MANTENIMIENTO--------
        //--------------------------------------------------------------------------
        //----------*Agregar filtro---------------------------------------------------
            function nuevo_filtro()
            {
                $("#Formulario_filtro").resetear();
                $('#accion').attr('value', '5');
            }
        //--------------------------------------------------------------------------
        //----------*Editar filtro----------------------------------------------------
            function editar_filtro(id)
            {
                $('#id_filtro').attr('value', id);
                $('#accion').attr('value', '2');
                $.post('?view=m_filtro', {accion: '3', id_filtro: id}, function (data, textStatus) {
                    if (data.success) {
                        $.each(data, function (index, d) {
                            if ($.isNumeric(index)) {
                                $('#nombre').val(d.nombre);
                            }
                        });
                    }
                }, "json");
            }


        //--------------------------------------------------------------------------
        //----------*Ver el codigo de barras-----------------------------------------
            function vercod_so(id) {
                $('#imprimir').attr('href','Views/inc/codigo_barras/pdf.php?idcog='+id);
                
                $.post('?view=u_usuario', {accion: '3', id_usuario: id}, function (data, textStatus) {
                    if (data.success) {
                        $.each(data, function (index, d) {
                            if ($.isNumeric(index)) {
                                $('#nom_so').text(d.usuario);
                                JsBarcode("#codbar", d.codigo);
                            }
                        });
                    }
                }, "json");
            }

//------------------------------------------------------------------------------
//----------MODULO USUARIOS-----------------------------------------------------
//------------------------------------------------------------------------------
    //--------------------------------------------------------------------------PRINCIPIO DE LA TABLA
    //----------Tabla Usuarios--------------------------------------------------USUARIOS-------------
    //--------------------------------------------------------------------------USUARIOS-------------
        //--------------------------------------------------------------------------
        //----------*Agregar filtro---------------------------------------------------

            function ver_ropita(id) {
                $.post('?view=u_usuario', {accion: '4', idpago: id}, function (data) {
                    $('#listar_ropita').html(data);
                });
            }

        //--------------------------------------------------------------------------
        //----------*Eliminar Aula--------------------------------------------------
            function vender(id) {
                $('#id_vender').attr('value', id);
            }







//------------------------------------------------------------------------------
//--------------------------------Codigo que se repite--------------------------
//------------------------------------------------------------------------------

function buscar_activos(nom_sel, nom_tabla, url, ac, op, lst_tabla) {
    $(nom_sel).change(function () {
        var f1 = $(nom_sel).val();
        listar(f1, url, ac, op, nom_tabla, lst_tabla);
        $(nom_tabla).empty();
    });
}

$.fn.resetear = function () {
    $(this).each(function () {
        this.reset();
    });
};
//function formReset(frm) {
//    document.getElementById(frm).reset();
//}
var idioma_es = {
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    }
};
function isValidDate(day, month, year) {
    var dteDate;
    // En javascript, el mes empieza en la posicion 0 y termina en la 11 
    //   siendo 0 el mes de enero
    // Por esta razon, tenemos que restar 1 al mes
    month = month - 1;
    // Establecemos un objeto Data con los valore recibidos
    // Los parametros son: año, mes, dia, hora, minuto y segundos
    // getDate(); devuelve el dia como un entero entre 1 y 31
    // getDay(); devuelve un num del 0 al 6 indicando siel dia es lunes,
    //   martes, miercoles ...
    // getHours(); Devuelve la hora
    // getMinutes(); Devuelve los minutos
    // getMonth(); devuelve el mes como un numero de 0 a 11
    // getTime(); Devuelve el tiempo transcurrido en milisegundos desde el 1
    //   de enero de 1970 hasta el momento definido en el objeto date
    // setTime(); Establece una fecha pasandole en milisegundos el valor de esta.
    // getYear(); devuelve el año
    // getFullYear(); devuelve el año
    dteDate = new Date(year, month, day);
    //Devuelva true o false...
    return ((day == dteDate.getDate()) && (month == dteDate.getMonth()) && (year == dteDate.getFullYear()));
}
function validate_fecha(fecha) {
    var patron = new RegExp("^(19|20)+([0-9]{2})([-])([0-9]{1,2})([-])([0-9]{1,2})$");
    if (fecha.search(patron) == 0)
    {
        var values = fecha.split("-");
        if (isValidDate(values[2], values[1], values[0]))
        {
            return true;
        }
    }
    return false;
}
function calcularEdad(fecha_n) {
    var fecha = fecha_n;
    if (validate_fecha(fecha) == true)
    {
// Si la fecha es correcta, calculamos la edad
        var values = fecha.split("-");
        var dia = values[2];
        var mes = values[1];
        var ano = values[0];
        // cogemos los valores actuales
        var fecha_hoy = new Date();
        var ahora_ano = fecha_hoy.getYear();
        var ahora_mes = fecha_hoy.getMonth() + 1;
        var ahora_dia = fecha_hoy.getDate();
        // realizamos el calculo
        var edad = (ahora_ano + 1900) - ano;
        if (ahora_mes < mes)
        {
            edad--;
        }
        if ((mes == ahora_mes) && (ahora_dia < dia))
        {
            edad--;
        }
        if (edad > 1900)
        {
            edad -= 1900;
        }

// calculamos los meses
        var meses = 0;
        if (ahora_mes > mes)
            meses = ahora_mes - mes;
        if (ahora_mes < mes)
            meses = 12 - (mes - ahora_mes);
        if (ahora_mes == mes && dia > ahora_dia)
            meses = 11;
        // calculamos los dias
        var dias = 0;
        if (ahora_dia > dia)
            dias = ahora_dia - dia;
        if (ahora_dia < dia)
        {
            ultimoDiaMes = new Date(ahora_ano, ahora_mes, 0);
            dias = ultimoDiaMes.getDate() - (dia - ahora_dia);
        }

//        document.getElementById("result").innerHTML="Tienes "+edad+" años, "+meses+" meses y "+dias+" días";
        return edad;
    } else {
//        document.getElementById("result").innerHTML="La fecha "+fecha+" es incorrecta";
    }
}
//document.oncontextmenu = function(){return false;}

//---------------------------Probando Funciones---------------------------------
function agregar(frm_nom, cam_veri, cam_ac, url, ac, nom_alert, nom_tabla, cond, ac_l, op, lst_tabla) {
    $(frm_nom).submit(function (e) {
        e.preventDefault();

        var datos = $(this).serialize();
        var dni = $(cam_veri).val();
        var alerta = '';
        var accion = $(cam_ac).val();
        if (accion == 5) {
            var dni2 = dni;
        } else {
            dni2 = dni + '12345678';
        }
        $.post(url, {accion: ac, dni: dni2}, function (d) {
            if (d == 1) {
                alerta = '<div class="alert alert-danger alert-dismissible fade in" \n\
                            role="alert"><button type="button" class="close" data-dismiss="alert" \n\\n\
                            aria-label="Close"><span aria-hidden="true">×</span></button><strong>\n\
                           <h5>Este Nombre ya se encuentra registrado</h5></strong>\n\
                       </div>';
            } else {
                $.ajax({
                    url: url,
                    type: 'POST',
                    data: datos
                }).done(function (dat) {
                    alerta = '';
                    if (dat == 1) {
                        alerta = '<div class="alert alert-success alert-dismissible fade in" \n\
                            role="alert"><button type="button" class="close" data-dismiss="alert" \n\
                            aria-label="Close"><span aria-hidden="true">×</span></button><strong>\n\
                            <h5>Se Guardó Correctamente</h5></strong>\n\
                        </div>';
                        generarCodigo('?view=socio', '#so_codigo', '7');
                    } else {
                        alerta = '<div class="alert alert-warning alert-dismissible fade in" \n\
                            role="alert"><button type="button" class="close" data-dismiss="alert" \n\
                            aria-label="Close"><span aria-hidden="true">×</span></button><strong>\n\
                            <h5>No se pudo Guardar</h5></strong>\n\
                    </div>';
                    }
                    setTimeout(function () {
                        $(nom_alert).fadeIn(1);
                    }, 1);
                    $(nom_alert).html(alerta);
                    listar(cond, url, ac_l, op, nom_tabla, lst_tabla);
//                    list_socios('');
//                    list_motivos();
//                    list_estudiantes('');
                    $(nom_tabla).empty();
                    setTimeout(function () {
                        $(nom_alert).fadeOut(1000);
                    }, 2000);
                    $(frm_nom).resetear();
                });
            }


            setTimeout(function () {
                $(nom_alert).fadeIn(1);
            }, 1);
            $(nom_alert).html(alerta);
            setTimeout(function () {
                $(nom_alert).fadeOut(1000);
            }, 2000);
        });
    });
}
function eliminar(nom_msj, btn_si, modal, id_env, url, num_ac, nom_tabla, cond, ac, op, lst_tabla) {
    setTimeout(function () {
        $('' + nom_msj + '').fadeOut(1);
    }, 1);
    $('' + btn_si + '').click(function () {
        var id = $('' + id_env + '').val();
        var alerta = '';
        $.post(url, {accion: num_ac, id: id}, function (data) {
            if (data == 1) {
                alerta = '  <div class="alert alert-info alert-dismissable text text-center ">\n\
                                <button type="button" class="close" data-dismiss="alert">&times;</button>\n\
                                <p>¡Se borró correctamente!</p>\n\
                            </div>';
            } else {
                alerta = '  <div class="alert alert-warning alert-dismissable text text-center ">\n\
                                <button type="button" class="close" data-dismiss="alert">&times;</button>\n\
                                <p>¡No se pudo borrar!</p>\n\
                            </div>';
            }
            setTimeout(function () {
                $('' + nom_msj + '').fadeIn(1);
            }, 1);
            $('' + nom_msj + '').html(alerta);
            listar(cond, url, ac, op, nom_tabla, lst_tabla);
            $('' + nom_tabla + '').empty();
            $(modal + ' .close').click();
            setTimeout(function () {
                $('' + nom_msj + '').fadeOut(1000);
            }, 2000);
        });
    });
}
function exonerar(nom_msj, btn_si, modal, id_env, url, num_ac, nom_tabla, cond, ac, op, lst_tabla) {
    setTimeout(function () {
        $('' + nom_msj + '').fadeOut(1);
    }, 1);
    $('' + btn_si + '').click(function () {
        var id = $('' + id_env + '').val();
        var alerta = '';
        $.post(url, {accion: num_ac, id: id}, function (data) {
            if (data == 1) {
                alerta = '  <div class="alert alert-info alert-dismissable text text-center ">\n\
                                <button type="button" class="close" data-dismiss="alert">&times;</button>\n\
                                <p>¡Se exonero exitosamente!</p>\n\
                            </div>';
            } else {
                alerta = '  <div class="alert alert-warning alert-dismissable text text-center ">\n\
                                <button type="button" class="close" data-dismiss="alert">&times;</button>\n\
                                <p>¡No se pudo exonerar!</p>\n\
                            </div>';
            }
            setTimeout(function () {
                $('' + nom_msj + '').fadeIn(1);
            }, 1);
            $('' + nom_msj + '').html(alerta);
            listar(cond, url, ac, op, nom_tabla, lst_tabla);
            $('' + nom_tabla + '').empty();
            $(modal + ' .close').click();
            setTimeout(function () {
                $('' + nom_msj + '').fadeOut(1000);
            }, 2000);
        });
    });
}

function revertir_estado(nom_msj, btn_si, modal, id_env, url, num_ac, nom_tabla, cond, ac, op, lst_tabla) {
    setTimeout(function () {
        $('' + nom_msj + '').fadeOut(1);
    }, 1);
    $('' + btn_si + '').click(function () {
        var id = $('' + id_env + '').val();
        var alerta = '';
        $.post(url, {accion: num_ac, id: id}, function (data) {
            if (data == 1) {
                alerta = '  <div class="alert alert-info alert-dismissable text text-center ">\n\
                                <button type="button" class="close" data-dismiss="alert">&times;</button>\n\
                                <p>¡Se retiró la exoneración exitosamente!</p>\n\
                            </div>';
            } else {
                alerta = '  <div class="alert alert-warning alert-dismissable text text-center ">\n\
                                <button type="button" class="close" data-dismiss="alert">&times;</button>\n\
                                <p>¡Error al retirar la exoneración!</p>\n\
                            </div>';
            }
            setTimeout(function () {
                $('' + nom_msj + '').fadeIn(1);
            }, 1);
            $('' + nom_msj + '').html(alerta);
            listar(cond, url, ac, op, nom_tabla, lst_tabla);
            $('' + nom_tabla + '').empty();
            $(modal + ' .close').click();
            setTimeout(function () {
                $('' + nom_msj + '').fadeOut(1000);
            }, 2000);
        });
    });
}

function listar(cond, url, ac, op, nom_tabla, lst_tabla) {
    $.post(url, {accion: ac, estado: cond, op: op}, function (data) {
        $(nom_tabla).append(data);
        if (lst_tabla == 'si') {
            $(nom_tabla).DataTable({
                "destroy": true,
                "language": idioma_es
            });
        }

    });
}

function ingresototal(url, ac, id_ing) {
    
     $.post(url, {accion: ac }, function (data, textStatus) {
        if (data.success) {
            $.each(data, function (index, d) {
                if ($.isNumeric(index)) {
                    
                    $(id_ing).text('Ingreso Total: S/. '+d.ingreso_total);
                }
            });
        }
    }, "json");
}

function deudatotal(url, ac, id_ing) {
    
     $.post(url, {accion: ac}, function (data, textStatus) {
        if (data.success) {
            $.each(data, function (index, d) {
                if ($.isNumeric(index)) {
                    $(id_ing).text('Deuda Total: S/. '+d.deuda_total);
                    
                }
            });
        }
    }, "json");
}



    



function generarCodigo(url, nom_campo, ac) {
    $.post(url, {accion: ac}, function (data) {
        $(nom_campo).val(data);
    });
}

function nuevos(nom_ac, v) {
    $(nom_ac).attr('value', v);
}

function select_2(nom_sel) {
    $(nom_sel).select2({
        placeholder: "Seleccione una opción",
        allowClear: true
    });
}
//------------------------------------hora--------------------------------------
var $dOut = $('#date'),
        $hOut = $('#hours');
//    $mOut = $('#minutes'),
//    $sOut = $('#seconds'),
//    $ampmOut = $('#ampm');
var months = [
    'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'
];

var days = [
    'Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'
];

function update() {
    var date = new Date();

    var ampm = date.getHours() < 12
            ? 'AM'
            : 'PM';

    var hours = date.getHours() == 0
            ? 12
            : date.getHours() > 12
            ? date.getHours() - 12
            : date.getHours();

    var minutes = date.getMinutes() < 10
            ? '0' + date.getMinutes()
            : date.getMinutes();

    var seconds = date.getSeconds() < 10
            ? '0' + date.getSeconds()
            : date.getSeconds();

    var dayOfWeek = days[date.getDay()];
    var month = months[date.getMonth()];
    var day = date.getDate();
    var year = date.getFullYear();

    var dateString = dayOfWeek + ', ' + day + ' de ' + month + ' de ' + year;

    $dOut.text(dateString);
    $hOut.text(hours + ':' + minutes + ':' + seconds + ' ' + ampm);
//  $mOut.text(minutes);
//  $sOut.text(seconds);
//  $ampmOut.text(ampm);
}
update();
window.setInterval(update, 1000);
