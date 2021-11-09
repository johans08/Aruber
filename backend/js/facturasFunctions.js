//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdateFacturas();
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormFacturas();
        $("#typeAction").val("add_facturas");
        $("#myModalFormulario").modal();
    });
    
    
    
});

//*********************************************************************
//cuando el documento esta cargado se procede a cargar la información
//*********************************************************************

$(document).ready(function () {
    cargarTablas();
});


//*********************************************************************
//Agregar o modificar la información
//*********************************************************************

function addOrUpdateFacturas() {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: 'backend/controller/facturasController.php',
            data: {
                action:         $("#typeAction").val(),
                idFactura:         $("#txtidFactura").val(),
                nombreFactura:      $("#txtnombreFactura").val(),
                direccionFactura:         $("#txtdireccionFactura").val(),
                fechaFactura:      $("#txtfechaFactura").val(),
                numeroPedido:      $("#txtnumeroPedido").val(),
                monto: $("#txtmonto").val(),
                Usuarios_idUsuarios: $("#txtUsuarios_idUsuarios").val()
            },
            error: function () { //si existe un error en la respuesta del ajax
                swal("Error", "Se presento un error al enviar la informacion", "error");
            },
            success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
                var messageComplete = data.trim();
                var responseText = messageComplete.substring(2);
                var typeOfMessage = messageComplete.substring(0, 2);
                if (typeOfMessage === "M~") { //si todo esta corecto
                    swal("Confirmacion", responseText, "success");
                    clearFormFacturas();
                    $("#dt_facturas").DataTable().ajax.reload();
                } else {//existe un error
                    swal("Error", responseText, "error");
                }
            },
            type: 'POST'
        });
    }else{
        swal("Error de validación", "Los datos del formulario no fueron digitados, por favor verificar", "error");
    }
}

//*****************************************************************
//*****************************************************************
function validar() {
    var validacion = true;

    
    //valida cada uno de los campos del formulario
    //Nota: Solo si fueron digitados
    if ($("#txtidFactura").val() === "") {
        validacion = false;
    }

    if ($("#txtnombreFactura").val() === "") {
        validacion = false;
    }

    if ($("#txtdireccionFactura").val() === "") {
        validacion = false;
    }

    if ($("#txtfechaFactura").val() === "") {
        validacion = false;
    }

    if ($("#txtnumeroPedido").val() === "") {
        validacion = false;
    }

    if ($("#txtmonto").val() === "") {
        validacion = false;
    }
    
    if ($("#txtUsuarios_idUsuarios").val() === "") {
        validacion = false;
    }

    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormFacturas() {
    $('#formFacturas').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormFacturas();
    $("#typeAction").val("add_facturas");
    $("#myModalFormulario").modal("hide");
}



//*****************************************************************
//*****************************************************************

function showfacturasByID(idFactura) {
    //Se envia la información por ajax
    $.ajax({
        url: 'backend/controller/facturasController.php',
        data: {
            action: "show_facturas",
            idFactura: idFactura
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objfacturasJSon = JSON.parse(data);
            console.log(objfacturasJSon);
            $("#txtidFactura").val(objfacturasJSon.idFactura);
            //$("#txtidFactura").attr("readonly",true);
            $("#txtnombreFactura").val(objfacturasJSon.nombreFactura);
            $("#txtdireccionFactura").val(objfacturasJSon.direccionFactura);
            $("#txtfechaFactura").val(objfacturasJSon.fechaFactura);
            $("#txtnumeroPedido").val(objfacturasJSon.numeroPedido);
            $("#txtmonto").val(objfacturasJSon.monto);
            $("#txtUsuarios_idUsuarios").val(objfacturasJSon.Usuarios_idUsuarios);
            $("#typeAction").val("update_facturas");
            
            swal("Confirmacion", "Los datos de la persona fueron cargados correctamente", "success");
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deletefacturasByID(idFactura) {
    //Se envia la información por ajax
    $.ajax({
        url: 'backend/controller/facturasController.php',
        data: {
            action: "delete_facturas",
            idFactura: idFactura
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormFacturas();
                $("#dt_facturas").DataTable().ajax.reload();
            } else {//existe un error
                swal("Error", responseText, "error");
            }
        },
        type: 'POST'
    });
}




//*******************************************************************************
//Metodo para cargar las tablas
//*******************************************************************************


function cargarTablas() {



    var dataTableFacturas_const = function () {
        if ($("#dt_facturas").length) {
            $("#dt_facturas").DataTable({
                dom: "Bfrtip",
                bFilter: false,
                ordering: false,
                buttons: [
                    {
                        extend: "copy",
                        className: "btn-sm",
                        text: "Copiar"
                    },
                    {
                        extend: "csv",
                        className: "btn-sm",
                        text: "Exportar a CSV"
                    },
                    {
                        extend: "print",
                        className: "btn-sm",
                        text: "Imprimir"
                    }

                ],
                columnDefs: [
                    {
                        targets: 6,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="showfacturasByID(\''+row[0]+'\');">Cargar</button> ';
                            botones += '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="deletefacturasByID(\''+row[0]+'\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                language: dt_lenguaje_espanol,
                ajax: {
                    url: 'backend/controller/facturasController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_facturas"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_facturas').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTableFacturas_const();
                $(".dataTables_filter input").addClass("form-control input-rounded ml-sm");
            }
        };
    }();

    TableManageButtons.init();
}

//*******************************************************************************
//evento que reajusta la tabla en el tamaño de la pantall
//*******************************************************************************

window.onresize = function () {
    $('#dt_facturas').DataTable().columns.adjust().responsive.recalc();
};
