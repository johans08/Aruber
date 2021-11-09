//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdateAdministradores();
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormAdministradores();
        $("#typeAction").val("add_administradores");
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

function addOrUpdateAdministradores() {
    //Se envia la información por ajax
    
    if (validar()) {
        $.ajax({
            url: 'backend/controller/administradoresController.php',
            data: {
                action:         $("#typeAction").val(),
                idAdministrador:      $("#txtidAdministrador").val(),
                nombreAdmin:         $("#txtnombreAdmin").val(),
                apellido1Admin:      $("#txtapellido1Admin").val(),
                apellido2Admin:      $("#txtapellido2Admin").val(),
                correoAdmin:  $("#txtcorreoAdmin").val(),
                usuarioAdmin:           $("#txtusuarioAdmin").val(),
                contrasenaAdmin:  $("#txtcontrasenaAdmin").val(),
                tipoUsuario:  $("#txttipoUsuario").val(),
                Activo:  $("#txtActivo").val()
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
                    clearFormAdministradores();
                    $("#dt_administradores").DataTable().ajax.reload();
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
    if ($("#txtidAdministrador").val() === "") {
        validacion = false;
    }

    if ($("#txtnombreAdmin").val() === "") {
        validacion = false;
    }

    if ($("#txtapellido1Admin").val() === "") {
        validacion = false;
    }

    if ($("#txtapellido2Admin").val() === "") {
        validacion = false;
    }

    if ($("#txtcorreoAdmin").val() === "") {
        validacion = false;
    }

    if ($("#txtusuarioAdmin").val() === "") {
        validacion = false;
    }

    if ($("#txtcontrasenaAdmin").val() === "") {
        validacion = false;
    }
    if ($("#txttipoUsuario").val() === "") {
        validacion = false;
    }
        if ($("#txtActivo").val() === "") {
        validacion = false;
    }


    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormAdministradores() {
    $('#formAdministradores').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormAdministradores();
    $("#typeAction").val("add_administradores");
    $("#myModalFormulario").modal("hide");
}



//*****************************************************************
//*****************************************************************

function showAdministradoresByID(idAdministrador) {
    //Se envia la información por ajax
    $.ajax({
        url: 'backend/controller/administradoresController.php',
        data: {
            action: "show_administradores",
            idAdministrador: idAdministrador
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objAdministradoresJSon = JSON.parse(data);
            console.log(objAdministradoresJSon);
            $("#txtidAdministrador").val(objAdministradoresJSon.idAdministrador);
            //$("#txtidAdministradors").attr("readonly",true);
            $("#txtnombreAdmin").val(objAdministradoresJSon.nombreAdmin);
            $("#txtapellido1Admin").val(objAdministradoresJSon.apellido1Admin);
            $("#txtapellido2Admin").val(objAdministradoresJSon.apellido2Admin);
            $("#txtcorreoAdmin").val(objAdministradoresJSon.correoAdmin);
            $("#txtusuarioAdmin").val(objAdministradoresJSon.usuarioAdmin);
            $("#txtcontrasenaAdmin").val(objAdministradoresJSon.contrasenaAdmin);
            $("#txttipoUsuario").val(objAdministradoresJSon.tipoUsuario);
            $("#txtActivo").val(objAdministradoresJSon.Activo);
            $("#typeAction").val("update_administradores");
            
            swal("Confirmacion", "Los datos de la persona fueron cargados correctamente", "success");
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deleteAdministradoresByID(idAdministrador) {
    //Se envia la información por ajax
    $.ajax({
        url: 'backend/controller/administradoresController.php',
        data: {
            action: "delete_administradores",
            idAdministrador: idAdministrador
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormAdministradores();
                $("#dt_administradores").DataTable().ajax.reload();
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



    var dataTableAdministradores_const = function () {
        if ($("#dt_administradores").length) {
            $("#dt_administradores").DataTable({
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
                        targets: 9,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="showAdministradoresByID(\''+row[0]+'\');">Cargar</button> ';
                            botones += '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="deleteAdministradoresByID(\''+row[0]+'\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                language: dt_lenguaje_espanol,
                ajax: {
                    url: 'backend/controller/administradoresController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_administradores"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_administradores').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTableAdministradores_const();
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
    $('#dt_administradores').DataTable().columns.adjust().responsive.recalc();
};
