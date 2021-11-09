<?php
require_once("../config.php");
require_once("adodb5/adodb.inc.php");
require_once("../domain/vehiculos.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base


class VehiculosDao {

    
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
    //***********************************************************

    public function add(Vehiculos $vehiculos) {
        try {
            $sql = sprintf("insert into mydb.vehiculos (idPlaca, modelo, color, ano,choferes_idchoferes,administradores_idAdministrador, LASTMODIFICATION) 
                                          values (%s,%s,%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("idPlaca"),
                    $this->labAdodb->Param("modelo"),
                    $this->labAdodb->Param("color"),
                    $this->labAdodb->Param("ano"),
                    $this->labAdodb->Param("choferes_idchoferes"),
                    $this->labAdodb->Param("administradores_idAdministrador"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idPlaca"]       = $vehiculos->getidPlaca();
            $valores["modelo"]          = $vehiculos->getmodelo();
            $valores["color"]       = $vehiculos->getcolor();
            $valores["ano"]       = $vehiculos->getano();
            $valores["choferes_idchoferes"] = $vehiculos->getChoferes_idchoferes();
            $valores["administradores_idAdministrador"] = $vehiculos->getAdministradores_idAdministrador();
            //die($sql);
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase VehiculosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Vehiculos $vehiculos) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.vehiculos where idPlaca = %s ",
                            $this->labAdodb->Param("idPlaca"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idPlaca"] = $vehiculos->getidPlaca();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase VehiculosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Vehiculos $vehiculos) {
        try {
            $sql = sprintf("update Vehiculos set modelo = %s, 
                                                color = %s, 
                                                ano = %s,
                                                choferes_idchoferes = %s ,
                                                administradores_idAdministrador = %s,
                                                LASTMODIFICATION = CURDATE() 
                            where idPlaca = %s",
                    $this->labAdodb->Param("modelo"),
                    $this->labAdodb->Param("color"),
                    $this->labAdodb->Param("ano"),
                    $this->labAdodb->Param("choferes_idchoferes"),
                    $this->labAdodb->Param("administradores_idAdministrador"),
                    $this->labAdodb->Param("idPlaca"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["modelo"]          = $vehiculos->getmodelo();
            $valores["color"]       = $vehiculos->getcolor();
            $valores["ano"]       = $vehiculos->getano();
            $valores["choferes_idchoferes"]       = $vehiculos->getChoferes_idchoferes();
            $valores["administradores_idAdministrador"]       = $vehiculos->getAdministradores_idAdministrador();
            $valores["idPlaca"]       = $vehiculos->getidPlaca();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase VehiculosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Vehiculos $vehiculos) {

        
        try {
            $sql = sprintf("delete from Vehiculos where  idPlaca = %s",
                            $this->labAdodb->Param("idPlaca"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idPlaca"] = $vehiculos->getidPlaca();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase VehiculosDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Vehiculos $vehiculos) {
        $returnVehiculos = null;
        try {
            $sql = sprintf("select * from Vehiculos where  idPlaca = %s",
                            $this->labAdodb->Param("idPlaca"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idPlaca"] = $vehiculos->getidPlaca();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnVehiculos = vehiculos::createNullvehiculos();
                $returnVehiculos->setidPlaca($resultSql->Fields("idPlaca"));
                $returnVehiculos->setmodelo($resultSql->Fields("modelo"));
                $returnVehiculos->setcolor($resultSql->Fields("color"));
                $returnVehiculos->setano($resultSql->Fields("ano"));
                $returnVehiculos->setChoferes_idchoferes($resultSql->Fields("choferes_idchoferes"));
                $returnVehiculos->setAdministradores_idAdministrador($resultSql->Fields("administradores_idAdministrador"));

            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase VehiculosDao), error:'.$e->getMessage());
        }
        return $returnVehiculos;
    }

    //***********************************************************
    //obtiene la información de las Vehiculos en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.vehiculos");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase vehiculosDao), error:'.$e->getMessage());
        }
    }

}

