//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdatechoferes();
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormchoferes();
        $("#typeAction").val("add_choferes");
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

function addOrUpdatechoferes() {
    //Se envia la información por ajax
    
    if (validar()) {
        $.ajax({
            url: 'backend/controller/choferesController.php',
            data: {
                action:         $("#typeAction").val(),
                idChoferes:      $("#txtidChoferes").val(),
                usuario:         $("#txtusuario").val(),
                contraseña:      $("#txtcontrasena").val(),
                ubicacion:      $("#txtubicacion").val(),
                tiempo:  $("#txttiempo").val(),
                latActual:           $("#txtlatActual").val(),
                longActual:  $("#txtlongActual").val(),
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
                    clearFormchoferes();
                    $("#dt_choferes").DataTable().ajax.reload();
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
    if ($("#txtidChorefes").val() === "") {
        validacion = false;
    }

    if ($("#txtusuario").val() === "") {
        validacion = false;
    }

    if ($("#txtcontrasena").val() === "") {
        validacion = false;
    }

    if ($("#txtUbicacion").val() === "") {
        validacion = false;
    }

    if ($("#txttiempo").val() === "") {
        validacion = false;
    }

    if ($("#txtlatActual").val() === "") {
        validacion = false;
    }

    if ($("#txtlongActual").val() === "") {
        validacion = false;
    }
    if ($("#txtusuario").val() === "") {
        validacion = false;
    }
        if ($("#txtcorreoUsuario").val() === "") {
        validacion = false;
    }
        if ($("#txtcontrasenaUsuario").val() === "") {
        validacion = false;
    }
        if ($("#txtsexo").val() === "") {
        validacion = false;
    }

    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormchoferes() {
    $('#formchoferes').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormchoferes();
    $("#typeAction").val("add_choferes");
    $("#myModalFormulario").modal("hide");
}



//*****************************************************************
//*****************************************************************

function showchoferesByID(idChoferes) {
    //Se envia la información por ajax
    $.ajax({
        url: 'backend/controller/choferesController.php',
        data: {
            action: "show_choferes",
            idChoferes: idChoferes
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objchoferesJSon = JSON.parse(data);
            console.log(objchoferesJSon);
            $("#txtidChoferes").val(objchoferesJSon.idChoferes);
            //$("#txtidChorefes").attr("readonly",true);
            $("#txtusuario").val(objchoferesJSon.usuario);
            $("#txtcontrasena").val(objchoferesJSon.contraseña);
            $("#txtubicacion").val(objchoferesJSon.Ubicacion);
            $("#txttiempo").val(objchoferesJSon.tiempo);
            $("#txtlatActual").val(objchoferesJSon.latActual);
            $("#txtlongActual").val(objchoferesJSon.longActual);
            $("#typeAction").val("update_choferes");
            
            swal("Confirmacion", "Los datos de la persona fueron cargados correctamente", "success");
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deletechoferesByID(idUsuario) {
    //Se envia la información por ajax
    $.ajax({
        url: 'backend/controller/choferesController.php',
        data: {
            action: "delete_choferes",
            idChoferes: idUsuario
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormchoferes();
                $("#dt_choferes").DataTable().ajax.reload();
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



    var dataTablechoferes_const = function () {
        if ($("#dt_choferes").length) {
            $("#dt_choferes").DataTable({
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
                "columnDefs": [
                    {
                        targets: 6,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="showchoferesByID(\''+row[0]+'\');">Cargar</button> ';
                            botones += '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="deletechoferesByID(\''+row[0]+'\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                language: dt_lenguaje_espanol,
                ajax: {
                    url: 'backend/controller/choferesController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_choferes"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_choferes').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTablechoferes_const();
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
    $('#dt_choferes').DataTable().columns.adjust().responsive.recalc();
};
