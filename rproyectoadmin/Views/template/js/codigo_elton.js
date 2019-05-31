$(document).on("ready", function () {
    agregar('#frm_pago_asociado', '', '#accion', '?view=cuotaasociado', '6', '#alerta_pago', '#tabla_cuotaasociado', '', '1', '1', 'si');
    listar('', '?view=activar', '1', '2', '#sel_anioacademico', 'no'); //->para poder seleccionar en otra tabla
});

function pagar_cuota(id) {
    $('#id_pago_asociado').attr('value', id);
    $('#accion').attr('value', '2');
    $.post('?view=cuotaasociado', {accion: '3', id_pago_asociado: id}, function (data, textStatus) {
        if (data.success) {
            $.each(data, function (index, d) {
                if ($.isNumeric(index)) {
                    $('#nom_asociado').html(d.apellido + ' ' + d.nombre);
                    $('#monto_sobrante').attr('value', d.debe);
                    $('#monto').attr("max", d.debe);
                }
            });
        }
    }, "json");
}

function ver_pagos(id) {
//    $('#tabla_pagos').remove();
    $.post('?view=cuotaasociado', {accion: '4', idpago: id}, function (data) {
        $('#listar_pagos').html(data);
    });
}
//----------*Eliminar o desactivar------------------------------------------
function exonerar_pca(id) {
    $('#id_exonerar').attr('value', id);
}
function exonerar_pc(id) {
    $('#id_revertir_exonerar').attr('value', id);
}

//function verificar_monto() {
////    $('#monto').focusout(function () {
////        
////    });
//    var monto = $('#monto_sobrante').val();
//    var monto_pagar = $('#monto').val();
//    var alerta = '';
//    if (parseInt(monto_pagar) <= 0) {
//        alerta = '<div class="alert alert-danger alert-dismissible fade in" \n\
//                            role="alert"><button type="button" class="close" data-dismiss="alert" \n\\n\
//                            aria-label="Close"><span aria-hidden="true">×</span></button><strong>\n\
//                           <h5>Por favor ingrese un monto mayor a 0!!</h5></strong>\n\
//                       </div>';
//        $('#monto').focus();
//    } else {
//        if (parseInt(monto_pagar) > parseInt(monto)) {
//            alerta = '<div class="alert alert-danger alert-dismissible fade in" \n\
//                            role="alert"><button type="button" class="close" data-dismiss="alert" \n\\n\
//                            aria-label="Close"><span aria-hidden="true">×</span></button><strong>\n\
//                           <h5>Por favor ingrese un monto menor a la deuda!!</h5></strong>\n\
//                       </div>';
//
//            $('#monto').focus();
//            
//        }
//    }
//    $('#alerta_pago').html(alerta);
//    setTimeout(function () {
//        $('#alerta_pago').fadeIn(1);
//    }, 1);
//    setTimeout(function () {
//        $('#alerta_pago').fadeOut(1000);
//    }, 2000);
//}

//function printDiv() {
//     var contenido= document.getElementById('listar_pagos').innerHTML;
//     var contenidoOriginal= document.body.innerHTML;
//
//     document.body.innerHTML = contenido;
//
//     window.print();
//
//     document.body.innerHTML = contenidoOriginal;
//}

//
//function printDiv() {
//    var doc = new jsPDF();
//    var elementHandler = {
//        '#listar_pagos': function (element, renderer) {
//            return true;
//        }
//    };
//    var source = window.document.getElementsByTagName("listar_pagos")[0];
//    doc.fromHTML(
//            source,
//            15,
//            15,
//            {
//                'width': 100, 'elementHandlers': elementHandler
//            });
//
//    doc.output("dataurlnewwindow");
//}

function printDiv() {
    var doc = new jsPDF();

    doc.setFontSize(40);
    doc.text(40, 20, "Octocat loves jsPDF");
//    doc.addImage(imgData, 'JPEG', 10, 40, 180, 180);

    var string = doc.output('datauristring');

    $('iframe').attr('src', string);

    };


