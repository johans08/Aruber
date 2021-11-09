<?php
require_once("../config.php");
require_once("adodb5/adodb.inc.php");
require_once("../domain/Choferes.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *         $instance = new self();
        $instance->idChoferes        = $idChoferes;
        $instance->usuario           = $usuario;
        $instance->contrasena        = $contrasena;
        $instance->Ubicacion        = $Ubicacion;
        $instance->tiempo    = $tiempo;
        $instance->latActual             = $latActual;
        $instance->longActual    = $longActual;
 *
 */

//this attribute enable to see the SQL's executed in the data base


class ChoferesDao {

    
    private $labAdodb;//objeto de conexion con la base de datos    
    
    public function __construct() {
        //se crea el objeto con la conexión de la base de datos
        //según los datos del servidor de mysql
        $driver = 'mysqli';
        $this->labAdodb = newAdoConnection($driver);
        //$this->labAdodb->setCharset('utf8');
        $this->labAdodb->setConnectionParameter('CharacterSet', 'WE8ISO8859P15');
        //los cados de conexión   host,       user,   pass,   basedatos
        //$this->labAdodb->Connect("localhost", "root", "chancho88XD", "mydb");   
        $this->labAdodb->Connect("localhost", "root", "root", "mydb");   
        
        //si se desea hacer debug del SQL que se genera en la base de datos
        //dependiendo del error es necesario ver si es un error directamente
        //en la base de datos
        $this->labAdodb->debug=false;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Choferes $choferes) {
        try {
            $sql = sprintf("insert into mydb.Choferes (idChoferes, usuario, contraseña, Ubicacion, tiempo, latActual, longActual, LASTMODIFICATION) 
                                          values (%s,%s,%s,%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("idChoferes"),
                    $this->labAdodb->Param("usuario"),
                    $this->labAdodb->Param("contraseña"),
                    $this->labAdodb->Param("Ubicacion"),
                    $this->labAdodb->Param("tiempo"),
                    $this->labAdodb->Param("latActual"),
                    $this->labAdodb->Param("longActual"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idChoferes"]       = $choferes->getidChoferes();
            $valores["usuario"]          = $choferes->getusuario();
            $valores["contraseña"]       = $choferes->getcontraseña();
            $valores["Ubicacion"]       = $choferes->getUbicacion();
            $valores["tiempo"]            = $choferes->gettiempo();
            $valores["latActual"]   = $choferes->getlatActual();
            $valores["longActual"]   = $choferes->getlongActual();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase ChoferesDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Choferes $choferes) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.choferes where  idChoferes = %s ",
                            $this->labAdodb->Param("idChoferes"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idChoferes"] = $choferes->getidChoferes();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase ChoferesDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Choferes $choferes) {
        try {
            $sql = sprintf("update Choferes set usuario = %s, 
                                                contraseña = %s, 
                                                Ubicacion = %s, 
                                                tiempo = %s, 
                                                latActual = %s,
                                                longActual = %s, 
                                                LASTMODIFICATION = CURDATE() 
                            where idChoferes = %s",
                    $this->labAdodb->Param("usuario"),
                    $this->labAdodb->Param("contraseña"),
                    $this->labAdodb->Param("Ubicacion"),
                    $this->labAdodb->Param("tiempo"),
                    $this->labAdodb->Param("latActual"),
                    $this->labAdodb->Param("longActual"),
                    $this->labAdodb->Param("idChoferes"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["usuario"]          = $choferes->getusuario();
            $valores["contraseña"]       = $choferes->getcontraseña();
            $valores["Ubicacion"]       = $choferes->getubicacion();
            $valores["tiempo"]            = $choferes->gettiempo();
            $valores["latActual"]   = $choferes->getlatActual();
            $valores["longActual"]        = $choferes->getlongActual();
            $valores["idChoferes"]       = $choferes->getidChoferes();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase ChoferesDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Choferes $choferes) {

        
        try {
            $sql = sprintf("delete from Choferes where  idChoferes = %s",
                            $this->labAdodb->Param("idChoferes"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idChoferes"] = $choferes->getidChoferes();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase ChoferesDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Choferes $choferes) {
        $returnchoferes = null;
        try {
            $sql = sprintf("select * from Choferes where  idChoferes = %s",
                            $this->labAdodb->Param("idChoferes"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idChoferes"] = $choferes->getidChoferes();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            
            if ($resultSql->RecordCount() > 0) {
                $returnchoferes = Choferes::createNullChoferes();
                $returnchoferes->setidChoferes($resultSql->Fields("idChoferes"));
                $returnchoferes->setusuario($resultSql->Fields("usuario"));
                $returnchoferes->setcontraseña($resultSql->Fields("contraseña"));
                $returnchoferes->setubicacion($resultSql->Fields("Ubicacion"));
                $returnchoferes->settiempo($resultSql->Fields("tiempo"));
                $returnchoferes->setlatActual($resultSql->Fields("latActual"));
                $returnchoferes->setlongActual($resultSql->Fields("longActual"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase ChoferesDao), error:'.$e->getMessage());
        }
        return $returnchoferes;
    }

    //***********************************************************
    //obtiene la información de las Choferes en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.choferes");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase choferesDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //login
    //***********************************************************

    public function login(Choferes $choferes) {
        try {

            $sql = sprintf("select * from mydb.choferes where usuario = %s and contraseña = %s",
                    $this->labAdodb->Param("usuario"),
                    $this->labAdodb->Param("contraseña"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["usuario"] = $choferes->getUsuario();
            $valores["contraseña"] = $choferes->getContraseña();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if($resultSql->RecordCount() > 0){

                session_start();
                
                $_SESSION['usuario'] = $resultSql->Fields("usuario");
                $_SESSION['tipo'] = "chofer";

                return true;

            }else{
                return false;
            }

        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo login de la clase choferesDao), error:' . $e->getMessage());
        }

    }

}


