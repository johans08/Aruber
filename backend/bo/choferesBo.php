
<?php


require_once("../domain/choferes.php");
require_once("../dao/choferesDao.php");

/**
 * @author ChGari
 * Date Last  modification: Tue Jul 07 16:42:51 CST 2020
 * Comment: It was created
 *
 */
class ChoferesBo {

    private $ChoferesDao;

    public function __construct() {
        $this->choferesDao = new ChoferesDao();
    }

    public function getChoferesDao() {
        return $this->choferesDao;
    }

    public function setChoferesDao(ChoferesDao $choferesDao) {
        $this->choferesDao = $choferesDao;
    }

    //***********************************************************
    //agrega a una persona a la base de datos
    //***********************************************************

    public function add(Choferes $choferes) {
        try {
            if (!$this->choferesDao->exist($choferes)) {
                $this->choferesDao->add($choferes);
            } else {
                throw new Exception("El Choferes ya existe en la base de datos!!");
            }
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //modifica a una persona a la base de datos
    //***********************************************************

    public function update(Choferes $choferes) {
        try {
            $this->choferesDao->update($choferes);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //eliminar a una persona a la base de datos
    //***********************************************************

    public function delete(Choferes $choferes) {
        try {
            $this->choferesDao->delete($choferes);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consulta a una persona a la base de datos
    //***********************************************************

    public function searchById(Choferes $choferes) {
        try {
            return $this->choferesDao->searchById($choferes);
        } catch (Exception $e) {
            throw $e;
        }
    }

    //***********************************************************
    //consultar todas las Choferes de la base de datos
    //***********************************************************

    public function getAll() {
        try {
            return $this->choferesDao->getAll();
        } catch (Exception $e) {
            throw $e;
        }
    }

     //***********************************************************
    //login
    //***********************************************************

    public function login(Choferes $choferes){
        try {
            return $this->choferesDao->login($choferes);
        }catch(Exception $e){
            throw $e;
        }
    }

}

//end of the class ChoferesBo
?>

