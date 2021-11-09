<?php
require_once("../config.php");
require_once("adodb5/adodb.inc.php");
require_once("../domain/Facturas.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
private $idFactura;
    private $nombreFactura;
    private $direccionFactura;
    private $fechaFactura;
    private $numeroPedido;
    private $monto;
 */

//this attribute enable to see the SQL's executed in the data base


class FacturasDao {

    
    private $labAdodb;//objeto de conexion con la base de datos    
    
    public function __construct() {
        //se crea el objeto con la conexión de la base de datos
        //según los datos del servidor de mysql
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        //$this->labAdodb->setCharset('utf8');
        $this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        //los cados de conexión   host,       user,   pass,   basedatos
        $this->labAdodb->Connect("localhost", "root", "root", "mydb");    
        
        //si se desea hacer debug del SQL que se genera en la base de datos
        //dependiendo del error es necesario ver si es un error directamente
        //en la base de datos
        $this->labAdodb->debug=false;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //
    //***********************************************************

    public function add(Facturas $facturas) {
        try {
            $sql = sprintf("insert into mydb.Facturas (idFactura, nombreFactura, direccionFactura, fechaFactura, numeroPedido, monto, Usuarios_idUsuarios, lastUser, lastModification) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("idFactura"),
                    $this->labAdodb->Param("nombreFactura"),
                    $this->labAdodb->Param("direccionFactura"),
                    $this->labAdodb->Param("fechaFactura"),
                    $this->labAdodb->Param("numeroPedido"),
                    $this->labAdodb->Param("monto"),
                    $this->labAdodb->Param("Usuarios_idUsuarios"),
                    $this->labAdodb->Param("lastUser"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idFactura"]       = $facturas->getidFactura();
            $valores["nombreFactura"]          = $facturas->getnombreFactura();
            $valores["direccionFactura"]       = $facturas->getdireccionFactura();
            $valores["fechaFactura"]       = $facturas->getfechaFactura();
            $valores["numeroPedido"]   = $facturas->getnumeroPedido();
            $valores["monto"]            = $facturas->getmonto();
            $valores["Usuarios_idUsuarios"]            = $facturas->getUsuarios_idUsuarios();
            $valores["lastUser"]        = $facturas->getLastUser();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase FacturasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Facturas $facturas) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Facturas where  idFactura = %s ",
                            $this->labAdodb->Param("idFactura"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idFactura"] = $facturas->getidFactura();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase FacturasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Facturas $facturas) {
        try {
            $sql = sprintf("update Facturas set nombreFactura = %s, 
                                                direccionFactura = %s, 
                                                direccionFactura = %s, 
                                                numeroPedido = %s, 
                                                monto = %s, 
                                                Usuarios_idUsuarios = %s,
                                                lastUser = %s, 
                                                LASTMODIFICATION = CURDATE() 
                            where idFactura = %s",
                    $this->labAdodb->Param("nombreFactura"),
                    $this->labAdodb->Param("direccionFactura"),
                    $this->labAdodb->Param("fechaFactura"),
                    $this->labAdodb->Param("numeroPedido"),
                    $this->labAdodb->Param("monto"),
                    $this->labAdodb->Param("Usuarios_idUsuarios"),
                    $this->labAdodb->Param("lastUser"),
                    $this->labAdodb->Param("idFactura"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["nombreFactura"]          = $facturas->getnombreFactura();
            $valores["direccionFactura"]       = $facturas->getdireccionFactura();
            $valores["fechaFactura"]       = $facturas->getdireccionFactura();
            $valores["numeroPedido"]   = $facturas->getnumeroPedido();
            $valores["monto"]            = $facturas->getmonto();
            $valores["Usuarios_idUsuarios"]            = $facturas->getUsuarios_idUsuarios();
            $valores["lastUser"]        = $facturas->getLastUser();
            $valores["idFactura"]       = $facturas->getidFactura();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase FacturasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Facturas $facturas) {

        
        try {
            $sql = sprintf("delete from Facturas where  idFactura = %s",
                            $this->labAdodb->Param("idFactura"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idFactura"] = $facturas->getidFactura();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase FacturasDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Facturas $facturas) {
        $returnfacturas = null;
        try {
            $sql = sprintf("select * from Facturas where  idFactura = %s",
                            $this->labAdodb->Param("idFactura"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idFactura"] = $facturas->getidFactura();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnfacturas = Facturas::createNullFacturas();
                $returnfacturas->setidFactura($resultSql->Fields("idFactura"));
                $returnfacturas->setnombreFactura($resultSql->Fields("nombreFactura"));
                $returnfacturas->setdireccionFactura($resultSql->Fields("direccionFactura"));
                $returnfacturas->setdireccionFactura($resultSql->Fields("fechaFactura"));
                $returnfacturas->setnumeroPedido($resultSql->Fields("numeroPedido"));
                $returnfacturas->setmonto($resultSql->Fields("monto"));
                $returnfacturas->setUsuarios_idUsuarios($resultSql->Fields("Usuarios_idUsuarios"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase FacturasDao), error:'.$e->getMessage());
        }
        return $returnfacturas;
    }

    //***********************************************************
    //obtiene la información de las Facturas en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.facturas");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase facturasDao), error:'.$e->getMessage());
        }
    }

}
