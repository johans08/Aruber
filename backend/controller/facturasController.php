<?php

require_once("../bo/facturasBo.php");
require_once("../domain/facturas.php");


/**
 * This class contain all services methods of the table Facturas
 * @author ChGari
 * Date Last  modification: Fri Jul 24 11:28:43 CST 2020
 * Comment: It was created
 * private $idFactura;
    private $nombreFactura;
    private $direccionFactura;
    private $fechaFactura;
    private $numeroPedido;
    private $monto;
 *
 */
//************************************************************
// Facturas Controller 
//************************************************************

if (filter_input(INPUT_POST, 'action') != null) {
    $action = filter_input(INPUT_POST, 'action');

    try {
        $myFacturasBo = new FacturasBo();
        $myFacturas = Facturas::createNullFacturas();

        //***********************************************************
        //choose the action
        //***********************************************************

        if ($action === "add_facturas" or $action === "update_facturas") {
            //se valida que los parametros hayan sido enviados por post
            if ((filter_input(INPUT_POST, 'idFactura') != null) && (filter_input(INPUT_POST, 'nombreFactura') != null) && (filter_input(INPUT_POST, 'direccionFactura') != null) && (filter_input(INPUT_POST, 'fechaFactura') != null) && (filter_input(INPUT_POST, 'numeroPedido') != null) && (filter_input(INPUT_POST, 'monto') != null) && (filter_input(INPUT_POST, 'Usuarios_idUsuarios') != null)) {
                $myFacturas->setidFactura(filter_input(INPUT_POST, 'idFactura'));
                $myFacturas->setnombreFactura(filter_input(INPUT_POST, 'nombreFactura'));
                $myFacturas->setdireccionFactura(filter_input(INPUT_POST, 'direccionFactura'));
                $myFacturas->setfechaFactura(filter_input(INPUT_POST, 'fechaFactura'));
                $myFacturas->setnumeroPedido(filter_input(INPUT_POST, 'numeroPedido'));
                $myFacturas->setmonto(filter_input(INPUT_POST, 'monto'));
                $myFacturas->setUsuarios_idUsuarios(filter_input(INPUT_POST, 'Usuarios_idUsuarios'));
                $myFacturas->setLastUser('112540148');
                if ($action == "add_facturas") {
                    $myFacturasBo->add($myFacturas);
                    echo('M~Registro Incluido Correctamente');
                }
                if ($action == "update_facturas") {
                    $myFacturasBo->update($myFacturas);
                    echo('M~Registro Modificado Correctamente');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "showAll_facturas") {//accion de consultar todos los registros
            $resultDB   = $myFacturasBo->getAll();
            $json       = json_encode($resultDB->GetArray());
            $resultado = '{"data": ' . $json . '}';
            if($resultDB->RecordCount() === 0){
                $resultado = '{"data": []}';
            }
            echo $resultado;
        }

        //***********************************************************
        //***********************************************************

        
        if ($action === "show_facturas") {//accion de mostrar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idFactura') != null) {
                $myFacturas->setidFactura(filter_input(INPUT_POST, 'idFactura'));
                $myFacturas = $myFacturasBo->searchById($myFacturas);
                if ($myFacturas != null) {
                    echo json_encode(($myFacturas));
                } else {
                    echo('E~NO Existe un cliente con el ID especificado');
                }
            }
        }

        //***********************************************************
        //***********************************************************

        if ($action === "delete_facturas") {//accion de eliminar cliente por ID
            //se valida que los parametros hayan sido enviados por post
            if (filter_input(INPUT_POST, 'idFactura') != null) {
                $myFacturas->setidFactura(filter_input(INPUT_POST, 'idFactura'));
                $myFacturasBo->delete($myFacturas);
                echo('M~Registro Fue Eliminado Correctamente');
            }
        }

        //***********************************************************
        //se captura cualquier error generado
        //***********************************************************
    } catch (Exception $e) { //exception generated in the business object..
        echo("E~" . $e->getMessage());
    }
} else {
    echo('M~Parametros no enviados desde el formulario'); //se codifica un mensaje para enviar
}
?>
