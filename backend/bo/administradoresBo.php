<?php


require_once("../domain/Administradores.php");
require_once("../dao/AdministradoresDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class AdministradoresBo {

    private $administradoresDao;

    public function __construct() {
        $this->administradoresDao = new AdministradoresDao();
    }

    public function getAdministradoresDao() {
        return $this->administradoresDao;
    }

    public function setAdministradoresDao(AdministradoresDao $administradoresDao) {
        $this->administradoresDao = $administradoresDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Administradores $administradores) {
        try {
            if (!$this->administradoresDao->exist($administradores)) {
                $this->administradoresDao->add($administradores);
            } else {
                throw new Exception("El Administradores ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Administradores $administradores) {
        try {
            $this->administradoresDao->update($administradores);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Administradores $administradores) {
        try {
            $this->administradoresDao->delete($administradores);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Administradores $administradores) {
        try {
            return $this->administradoresDao->searchById($administradores);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las Administradores de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->administradoresDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

     //***********************************************************
    //login
    //***********************************************************

    public function login(Administradores $administradores){
        try {
            return $this->administradoresDao->login($administradores);
        }catch(Exception $e){
            throw $e;
        }
    }

}

//end of the class AdministradoresBo
?>