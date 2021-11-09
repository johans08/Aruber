<?php
require_once("../config.php");
require_once("adodb5/adodb.inc.php");
require_once("../domain/Administradores.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */

//this attribute enable to see the SQL's executed in the data base


class AdministradoresDao {

    
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

    public function add(Administradores $administradores) {
        try {
            $sql = sprintf("insert into mydb.Administradores (idAdministrador, nombreAdmin, apellido1Admin, apellido2Admin, correoAdmin, usuarioAdmin, contrasenaAdmin, tipoUsuario, Activo, lastModification) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("idAdministrador"),
                    $this->labAdodb->Param("nombreAdmin"),
                    $this->labAdodb->Param("apellido1Admin"),
                    $this->labAdodb->Param("apellido2Admin"),
                    $this->labAdodb->Param("correoAdmin"),
                    $this->labAdodb->Param("usuarioAdmin"),
                    $this->labAdodb->Param("contrasenaAdmin"),
                    $this->labAdodb->Param("tipoUsuario"),
                    $this->labAdodb->Param("Activo"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idAdministrador"]       = $administradores->getidAdministrador();
            $valores["nombreAdmin"]          = $administradores->getnombreAdmin();
            $valores["apellido1Admin"]       = $administradores->getapellido1Admin();
            $valores["apellido2Admin"]       = $administradores->getapellido2Admin();
            $valores["correoAdmin"]   = $administradores->getcorreoAdmin();
            $valores["usuarioAdmin"]            = $administradores->getusuarioAdmin();
            $valores["contrasenaAdmin"]   = $administradores->getcontrasenaAdmin();
            $valores["tipoUsuario"]   = $administradores->gettipoUsuario();
            $valores["Activo"]   = $administradores->getActivo();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase AdministradoresDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Administradores $administradores) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.Administradores where  idAdministrador = %s ",
                            $this->labAdodb->Param("idAdministrador"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idAdministrador"] = $administradores->getidAdministrador();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase AdministradoresDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datos
    //***********************************************************

    public function update(Administradores $administradores) {
        try {
            $sql = sprintf("update Administradores set nombreAdmin = %s, 
                                                apellido1Admin = %s, 
                                                apellido2Admin = %s, 
                                                correoAdmin = %s, 
                                                usuarioAdmin = %s, 
                                                contrasenaAdmin = %s,
                                                tipoUsuario = %s,
                                                Activo = %s,
                                                lastModification = CURDATE() 
                            where idAdministrador = %s",
                    $this->labAdodb->Param("nombreAdmin"),
                    $this->labAdodb->Param("apellido1Admin"),
                    $this->labAdodb->Param("apellido2Admin"),
                    $this->labAdodb->Param("correoAdmin"),
                    $this->labAdodb->Param("usuarioAdmin"),
                    $this->labAdodb->Param("contrasenaAdmin"),
                    $this->labAdodb->Param("tipoUsuario"),
                    $this->labAdodb->Param("Activo"),
                    $this->labAdodb->Param("idAdministrador"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["nombreAdmin"]          = $administradores->getnombreAdmin();
            $valores["apellido1Admin"]       = $administradores->getapellido1Admin();
            $valores["apellido2Admin"]       = $administradores->getapellido2Admin();
            $valores["correoAdmin"]   = $administradores->getcorreoAdmin();
            $valores["usuarioAdmin"]            = $administradores->getusuarioAdmin();
            $valores["contrasenaAdmin"]   = $administradores->getcontrasenaAdmin();
            $valores["tipoUsuario"]        = $administradores->getTipoUsuario();
            $valores["Activo"]   = $administradores->getActivo();
            $valores["idAdministrador"]       = $administradores->getidAdministrador();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase AdministradoresDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Administradores $administradores) {

        
        try {
            $sql = sprintf("delete from Administradores where  idAdministrador = %s",
                            $this->labAdodb->Param("idAdministrador"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idAdministrador"] = $administradores->getidAdministrador();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase AdministradoresDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Administradores $administradores) {
        $returnAdministradores = null;
        try {
            $sql = sprintf("select * from mydb.administradores where idAdministrador = %s",
                            $this->labAdodb->Param("idAdministrador"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idAdministrador"] = $administradores->getidAdministrador();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $returnAdministradores = Administradores::createNullAdministradores();
                $returnAdministradores->setidAdministrador($resultSql->Fields("idAdministrador"));
                $returnAdministradores->setnombreAdmin($resultSql->Fields("nombreAdmin"));
                $returnAdministradores->setapellido1Admin($resultSql->Fields("apellido1Admin"));
                $returnAdministradores->setapellido2Admin($resultSql->Fields("apellido2Admin"));
                $returnAdministradores->setcorreoAdmin($resultSql->Fields("correoAdmin"));
                $returnAdministradores->setusuarioAdmin($resultSql->Fields("usuarioAdmin"));
                $returnAdministradores->setcontrasenaAdmin($resultSql->Fields("contrasenaAdmin"));
                $returnAdministradores->setTipoUsuario($resultSql->Fields("tipoUsuario"));
                $returnAdministradores->setActivo($resultSql->Fields("Activo"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase AdministradoresDao), error:'.$e->getMessage());
        }
        return $returnAdministradores;
    }

    //***********************************************************
    //obtiene la información de las Administradores en la base de datos
    //***********************************************************
    
    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.administradores");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase AdministradoresDao), error:'.$e->getMessage());
        }
    }

    //***********************************************************
    //login
    //***********************************************************

    public function login(Administradores $administradores) {
        try {

            $sql = sprintf("select * from mydb.administradores where usuarioAdmin = %s and contrasenaAdmin = %s",
                    $this->labAdodb->Param("usuarioAdmin"),
                    $this->labAdodb->Param("contrasenaAdmin"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["usuarioAdmin"] = $administradores->getUsuarioAdmin();
            $valores["contrasenaAdmin"] = $administradores->getcontrasenaAdmin();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if($resultSql->RecordCount() > 0){

                session_start();
                
                $_SESSION['usuario'] = $resultSql->Fields("usuarioAdmin");
                $_SESSION['tipo'] = "administrador";

                return true;

            }else{
                return false;
            }

        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo login de la clase administradoresDao), error:' . $e->getMessage());
        }

    }

}


