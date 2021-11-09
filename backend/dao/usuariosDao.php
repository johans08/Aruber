<?php
require_once("../config.php");
require_once("adodb5/adodb.inc.php");
require_once("../domain/usuarios.php");

/**
 * 
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
//this attribute enable to see the SQL's executed in the data base


class UsuariosDao {

    private $labAdodb; //objeto de conexion con la base de datos    

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
        $this->labAdodb->debug = false;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Usuarios $usuarios) {
        try {
            $sql = sprintf("insert into mydb.usuarios (idUsuarios, nombreUsuario, apellido1Usuario, apellido2Usuario, fechaNacimientoUsuario, telefonoTrabajo, celular, usuario, correoUsuario, contrasenaUsuario,sexo, lastUser, lastModification) 
                                          values (%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,%s,CURDATE())",
                    $this->labAdodb->Param("idUsuarios"),
                    $this->labAdodb->Param("nombreUsuario"),
                    $this->labAdodb->Param("apellido1Usuario"),
                    $this->labAdodb->Param("apellido2Usuario"),
                    $this->labAdodb->Param("fechaNacimientoUsuario"),
                    $this->labAdodb->Param("telefonoTrabajo"),
                    $this->labAdodb->Param("celular"),
                    $this->labAdodb->Param("usuario"),
                    $this->labAdodb->Param("correoUsuario"),
                    $this->labAdodb->Param("contrasenaUsuario"),
                    $this->labAdodb->Param("sexo"),
                    $this->labAdodb->Param("lastUser"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();

            $valores["idUsuarios"] = $usuarios->getidUsuarios();
            $valores["nombreUsuario"] = $usuarios->getnombreUsuario();
            $valores["apellido1Usuario"] = $usuarios->getapellido1Usuario();
            $valores["apellido2Usuario"] = $usuarios->getapellido2Usuario();
            $valores["fechaNacimientoUsuario"] = $usuarios->getfechaNacimientoUsuario();
            $valores["telefonoTrabajo"] = $usuarios->gettelefonoTrabajo();
            $valores["celular"] = $usuarios->getcelular();
            $valores["usuario"] = $usuarios->getusuario();
            $valores["correoUsuario"] = $usuarios->getcorreoUsuario();
            $valores["contrasenaUsuario"] = $usuarios->getcontrasenaUsuario();
            $valores["sexo"] = $usuarios->getsexo();
            $valores["lastUser"] = $usuarios->getLastUser();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo insertar el registro (Error generado en el metodo add de la clase usuariosDao), error:' . $e->getMessage());
        }
    }

    //***********************************************************
    //verifica si una persona existe en la base de datos por ID
    //***********************************************************

    public function exist(Usuarios $usuarios) {
        $exist = false;
        try {
            $sql = sprintf("select * from mydb.usuarios where  idUsuarios = %s ",
                    $this->labAdodb->Param("idUsuarios"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idUsuarios"] = $usuarios->getidUsuarios();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
            if ($resultSql->RecordCount() > 0) {
                $exist = true;
            }
            return $exist;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener el registro (Error generado en el metodo exist de la clase usuariosDao), error:' . $e->getMessage());
        }
    }

    //***********************************************************
    //modifica una persona en la base de datoscelular = %s,
    //***********************************************************

    public function update(Usuarios $usuarios) {
        try {
            $sql = sprintf("update usuarios set nombreUsuario = %s, 
                                                apellido1Usuario = %s, 
                                                apellido2Usuario = %s, 
                                                fechaNacimientoUsuario = %s, 
                                                telefonoTrabajo = %s,
                                                celular = %s,
                                                usuario = %s,
                                                correoUsuario = %s,
                                                contrasenaUsuario = %s, 
                                                sexo = %s, 
                                                LASTUSER = %s, 
                                                LASTMODIFICATION = CURDATE() 
                            where idUsuarios = %s",
                    $this->labAdodb->Param("nombreUsuario"),
                    $this->labAdodb->Param("apellido1Usuario"),
                    $this->labAdodb->Param("apellido2Usuario"),
                    $this->labAdodb->Param("fechaNacimientoUsuario"),
                    $this->labAdodb->Param("telefonoTrabajo"),
                    $this->labAdodb->Param("celular"),
                    $this->labAdodb->Param("usuario"),
                    $this->labAdodb->Param("correoUsuario"),
                    $this->labAdodb->Param("contrasenaUsuario"),
                    $this->labAdodb->Param("sexo"),
                    $this->labAdodb->Param("lastUser"),
                    $this->labAdodb->Param("idUsuarios"),);
            
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["nombreUsuario"] = $usuarios->getnombreUsuario();
            $valores["apellido1Usuario"] = $usuarios->getapellido1Usuario();
            $valores["apellido2Usuario"] = $usuarios->getapellido2Usuario();
            $valores["fechaNacimientoUsuario"] = $usuarios->getfechaNacimientoUsuario();
            $valores["telefonoTrabajo"] = $usuarios->gettelefonoTrabajo();
            $valores["celular"] = $usuarios->getcelular();
            $valores["usuario"] = $usuarios->getusuario();
            $valores["correoUsuario"] = $usuarios->getcorreoUsuario();
            $valores["contrasenaUsuario"] = $usuarios->getcontrasenaUsuario();
            $valores["sexo"] = $usuarios->getsexo();
            $valores["lastUser"] = $usuarios->getLastUser();
            $valores["idUsuarios"] = $usuarios->getidUsuarios();
            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo actualizar el registro (Error generado en el metodo update de la clase usuariosDao), error:' . $e->getMessage());
        }
    }

    //***********************************************************
    //elimina una persona en la base de datos
    //***********************************************************

    public function delete(Usuarios $usuarios) {


        try {
            $sql = sprintf("delete from usuarios where  idUsuarios = %s",
                    $this->labAdodb->Param("idUsuarios"));
            $sqlParam = $this->labAdodb->Prepare($sql);
            $valores = array();
            $valores["idUsuarios"] = $usuarios->getidUsuarios();

            $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());
        } catch (Exception $e) {
            throw new Exception('No se pudo eliminar el registro (Error generado en el metodo delete de la clase usuariosDao), error:' . $e->getMessage());
        }
    }

    //***********************************************************
    //busca a una persona en la base de datos
    //***********************************************************

    public function searchById(Usuarios $usuarios) {
        $returnusuarios = null;
        try {
            $sql = sprintf("select * from usuarios where  idUsuarios = %s",
                    $this->labAdodb->Param("idUsuarios"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["idUsuarios"] = $usuarios->getidUsuarios();
            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if ($resultSql->RecordCount() > 0) {
                $returnusuarios = usuarios::createNullusuarios();
                $returnusuarios->setidUsuarios($resultSql->Fields("idUsuarios"));
                $returnusuarios->setnombreUsuario($resultSql->Fields("nombreUsuario"));
                $returnusuarios->setapellido1Usuario($resultSql->Fields("apellido1Usuario"));
                $returnusuarios->setapellido2Usuario($resultSql->Fields("apellido2Usuario"));
                $returnusuarios->setfechaNacimientoUsuario($resultSql->Fields("fechaNacimientoUsuario"));
                $returnusuarios->settelefonoTrabajo($resultSql->Fields("telefonoTrabajo"));
                $returnusuarios->setcelular($resultSql->Fields("celular"));
                $returnusuarios->setusuario($resultSql->Fields("usuario"));
                $returnusuarios->setcorreoUsuario($resultSql->Fields("correoUsuario"));
                $returnusuarios->setcontrasenaUsuario($resultSql->Fields("contrasenaUsuario"));
                $returnusuarios->setsexo($resultSql->Fields("sexo"));
            }
        } catch (Exception $e) {
            throw new Exception('No se pudo consultar el registro (Error generado en el metodo searchById de la clase usuariosDao), error:' . $e->getMessage());
        }
        return $returnusuarios;
    }

    //***********************************************************
    //obtiene la información de las usuarios en la base de datos
    //***********************************************************

    public function getAll() {
        try {
            $sql = sprintf("select * from mydb.usuarios");
            $resultSql = $this->labAdodb->Execute($sql);
            return $resultSql;
        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo getAll de la clase usuariosDao), error:' . $e->getMessage());
        }
    }

    //***********************************************************
    //login
    //***********************************************************

    public function login(Usuarios $usuarios) {
        try {

            $sql = sprintf("select * from mydb.usuarios where usuario = %s and contrasenaUsuario = %s",
                    $this->labAdodb->Param("usuario"),
                    $this->labAdodb->Param("contrasenaUsuario"));
            $sqlParam = $this->labAdodb->Prepare($sql);

            $valores = array();
            $valores["usuario"] = $usuarios->getUsuario();
            $valores["contrasenaUsuario"] = $usuarios->getcontrasenaUsuario();

            $resultSql = $this->labAdodb->Execute($sqlParam, $valores) or die($this->labAdodb->ErrorMsg());

            if($resultSql->RecordCount() > 0){

                session_start();
                
                $_SESSION['usuario'] = $resultSql->Fields("usuario");
                $_SESSION['tipo'] = "usuario";

                return true;

            }else{
                return false;
            }

        } catch (Exception $e) {
            throw new Exception('No se pudo obtener los registros (Error generado en el metodo login de la clase usuariosDao), error:' . $e->getMessage());
        }

    }

}
