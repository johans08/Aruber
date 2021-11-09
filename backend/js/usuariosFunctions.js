//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdateUsuarios();
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormUsuarios();
        $("#typeAction").val("add_usuarios");
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

function addOrUpdateUsuarios() {
    //Se envia la información por ajax
    
    if (validar()) {
        $.ajax({
            url: 'backend/controller/usuariosController.php',
            data: {
                action:         $("#typeAction").val(),
                idUsuarios:      $("#txtidUsuarios").val(),
                nombreUsuario:         $("#txtnombreUsuario").val(),
                apellido1Usuario:      $("#txtapellido1Usuario").val(),
                apellido2Usuario:      $("#txtapellido2Usuario").val(),
                fechaNacimientoUsuario:  $("#txtfechaNacimientoUsuario").val(),
                telefonoTrabajo:           $("#txttelefonoTrabajo").val(),
                celular:  $("#txtcelular").val(),
                usuario:  $("#txtusuario").val(),
                correoUsuario:  $("#txtcorreoUsuario").val(),
                contrasenaUsuario:  $("#txtcontrasenaUsuario").val(),
                sexo:  $("#txtsexo").val()
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
                    clearFormUsuarios();
                    $("#dt_usuarios").DataTable().ajax.reload();
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
    if ($("#txtidUsuarios").val() === "") {
        validacion = false;
    }

    if ($("#txtnombreUsuario").val() === "") {
        validacion = false;
    }

    if ($("#txtapellido1Usuario").val() === "") {
        validacion = false;
    }

    if ($("#txtapellido2Usuario").val() === "") {
        validacion = false;
    }

    if ($("#txtfechaNacimientoUsuario").val() === "") {
        validacion = false;
    }

    if ($("#txttelefonoTrabajo").val() === "") {
        validacion = false;
    }

    if ($("#txtcelular").val() === "") {
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

function clearFormUsuarios() {
    $('#formUsuarios').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormUsuarios();
    $("#typeAction").val("add_usuarios");
    $("#myModalFormulario").modal("hide");
}



//*****************************************************************
//*****************************************************************

function showUsuariosByID(idUsuarios) {
    //Se envia la información por ajax
    $.ajax({
        url: 'backend/controller/usuariosController.php',
        data: {
            action: "show_usuarios",
            idUsuarios: idUsuarios
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objUsuariosJSon = JSON.parse(data);
            console.log(objUsuariosJSon);
            $("#txtidUsuarios").val(objUsuariosJSon.idUsuarios);
            //$("#txtidUsuarios").attr("readonly",true);
            $("#txtnombreUsuario").val(objUsuariosJSon.nombreUsuario);
            $("#txtapellido1Usuario").val(objUsuariosJSon.apellido1Usuario);
            $("#txtapellido2Usuario").val(objUsuariosJSon.apellido2Usuario);
            $("#txtfechaNacimientoUsuario").val(objUsuariosJSon.fechaNacimientoUsuario);
            $("#txttelefonoTrabajo").val(objUsuariosJSon.telefonoTrabajo);
            $("#txtcelular").val(objUsuariosJSon.celular);
            $("#txtusuario").val(objUsuariosJSon.usuario);
            $("#txtcorreoUsuario").val(objUsuariosJSon.correoUsuario);
            $("#txtcontrasenaUsuario").val(objUsuariosJSon.contrasenaUsuario);
            $("#txtsexo").val(objUsuariosJSon.sexo);
            $("#typeAction").val("update_usuarios");
            
            swal("Confirmacion", "Los datos de la persona fueron cargados correctamente", "success");
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deleteUsuariosByID(idUsuario) {
    //Se envia la información por ajax
    $.ajax({
        url: 'backend/controller/usuariosController.php',
        data: {
            action: "delete_usuarios",
            idUsuarios: idUsuario
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormUsuarios();
                $("#dt_usuarios").DataTable().ajax.reload();
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



    var dataTableUsuarios_const = function () {
        if ($("#dt_usuarios").length) {
            $("#dt_usuarios").DataTable({
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
                        targets: 11,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="showUsuariosByID(\''+row[0]+'\');">Cargar</button> ';
                            botones += '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="deleteUsuariosByID(\''+row[0]+'\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                language: dt_lenguaje_espanol,
                ajax: {
                    url: 'backend/controller/usuariosController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_usuarios"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_usuarios').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTableUsuarios_const();
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
    $('#dt_usuarios').DataTable().columns.adjust().responsive.recalc();
};
