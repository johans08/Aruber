//*****************************************************************
//Inyección de eventos en el HTML
//*****************************************************************

$(function () { //para la creación de los controles
    //agrega los eventos las capas necesarias
    $("#enviar").click(function () {
        addOrUpdateVehiculos();
    });
    //agrega los eventos las capas necesarias
    $("#cancelar").click(function () {
        cancelAction();
    });    //agrega los eventos las capas necesarias

    $("#btMostarForm").click(function () {
        //muestra el fomurlaior
        clearFormVehiculos();
        $("#typeAction").val("add_vehiculos");
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

function addOrUpdateVehiculos() {
    //Se envia la información por ajax
    if (validar()) {
        $.ajax({
            url: 'backend/controller/vehiculosController.php',
            data: {
                action:         $("#typeAction").val(),
                idPlaca:      $("#txtidPlaca").val(),
                modelo:         $("#txtmodelo").val(),
                color:      $("#txtcolor").val(),
                ano:      $("#txtano").val(),
                choferes_idchoferes: $("#txtchofer").val(),
                administradores_idAdministrador: $("#txtadministrador").val()
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
                    clearFormVehiculos();
                    $("#dt_vehiculos").DataTable().ajax.reload();
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
    if ($("#txtidPlaca").val() === "") {
        validacion = false;
    }

    if ($("#txtmodelo").val() === "") {
        validacion = false;
    }

    if ($("#txtcolor").val() === "") {
        validacion = false;
    }

    if ($("#txtano").val() === "") {
        validacion = false;
    }

    if ($("#txtchofer").val() === "") {
        validacion = false;
    }

    if ($("#txtadministrador").val() === "") {
        validacion = false;
    }

    return validacion;
}

//*****************************************************************
//*****************************************************************

function clearFormVehiculos() {
    $('#formVehiculos').trigger("reset");
}

//*****************************************************************
//*****************************************************************

function cancelAction() {
    //clean all fields of the form
    clearFormVehiculos();
    $("#typeAction").val("add_vehiculos");
    $("#myModalFormulario").modal("hide");
}



//*****************************************************************
//*****************************************************************

function showvehiculosByID(idPlaca) {
    //Se envia la información por ajax
    $.ajax({
        url: 'backend/controller/vehiculosController.php',
        data: {
            action: "show_vehiculos",
            idPlaca: idPlaca
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al consultar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var objvehiculosJSon = JSON.parse(data);
            console.log(objvehiculosJSon);
            $("#txtidPlaca").val(objvehiculosJSon.idPlaca);
            //$("#txtidPlaca").attr("readonly",true);
            $("#txtmodelo").val(objvehiculosJSon.modelo);
            $("#txtcolor").val(objvehiculosJSon.color);
            $("#txtano").val(objvehiculosJSon.ano);
            $("#txtchofer").val(objvehiculosJSon.choferes_idchoferes);
            $("#txtadministrador").val(objvehiculosJSon.administradores_idAdministrador);
            $("#typeAction").val("update_vehiculos");
            
            swal("Confirmacion", "Los datos de la persona fueron cargados correctamente", "success");
        },
        type: 'POST'
    });
}

//*****************************************************************
//*****************************************************************

function deletevehiculosByID(idPlaca) {
    //Se envia la información por ajax
    $.ajax({
        url: 'backend/controller/vehiculosController.php',
        data: {
            action: "delete_vehiculos",
            idPlaca: idPlaca
        },
        error: function () { //si existe un error en la respuesta del ajax
            swal("Error", "Se presento un error al eliminar la informacion", "error");
        },
        success: function (data) { //si todo esta correcto en la respuesta del ajax, la respuesta queda en el data
            var responseText = data.trim().substring(2);
            var typeOfMessage = data.trim().substring(0, 2);
            if (typeOfMessage === "M~") { //si todo esta corecto
                swal("Confirmacion", responseText, "success");
                clearFormVehiculos();
                $("#dt_vehiculos").DataTable().ajax.reload();
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



    var dataTableVehiculos_const = function () {
        if ($("#dt_vehiculos").length) {
            $("#dt_vehiculos").DataTable({
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
                        targets: 5,
                        className: "dt-center",
                        render: function (data, type, row, meta) {
                            var botones = '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="showvehiculosByID(\''+row[0]+'\');">Cargar</button> ';
                            botones += '<button type="button" class="btn btn-default btn-xs" aria-label="Left Align" onclick="deletevehiculosByID(\''+row[0]+'\');">Eliminar</button>';
                            return botones;
                        }
                    }

                ],
                language: dt_lenguaje_espanol,
                ajax: {
                    url: 'backend/controller/vehiculosController.php',
                    type: "POST",
                    data: function (d) {
                        return $.extend({}, d, {
                            action: "showAll_vehiculos"
                        });
                    }
                },
                drawCallback: function (nRow, aData, iDisplayIndex, iDisplayIndexFull) {
                    $('#dt_vehiculos').DataTable().columns.adjust().responsive.recalc();
                }
            });
        }
    };



    TableManageButtons = function () {
        "use strict";
        return {
            init: function () {
                dataTableVehiculos_const();
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
    $('#dt_vehiculos').DataTable().columns.adjust().responsive.recalc();
};
