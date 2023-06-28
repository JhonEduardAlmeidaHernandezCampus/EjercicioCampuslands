<?php
namespace App;
    class campers extends connect{
        use getInstance;
        private $message;

        private $queryPostCampers = 'INSERT INTO campers (idCamper, nombreCamper, apellidoCamper, fechaNac, idReg) VALUES (:idCamper, :nombreCamper, :apellidoCamper, :fechaNac, :idReg)';

        private $queryGetAllMostrarTodo = 'SELECT * FROM campers INNER JOIN region ON campers.idReg = region.idReg INNER JOIN departamento ON region.idDep = departamento.idDep INNER JOIN pais ON departamento.idPais = pais.idPais';
        private $queryGetAllCampers = 'SELECT * FROM campers';
        private $queryGetCampers = 'SELECT * FROM campers WHERE idCamper = :idCamper';

        private $queryGetAllPais = 'SELECT * FROM pais';
        private $queryGetAllDepartamento = 'SELECT * FROM departamento';
        private $queryGetAllRegion = 'SELECT * FROM region';

        private $queryUpdateCampers = 'UPDATE campers SET nombreCamper = :nombreCamper, apellidoCamper = :apellidoCamper, fechaNac = :fechaNac, idReg = :idReg  WHERE idCamper = :idCamper';

        private $queryDeleteCampers = 'DELETE FROM campers WHERE idCamper = :idCamper';

        public function __construct(){parent::__construct();}

        public function postCampers($idCamper, $nombreCamper, $apellidoCamper, $fechaNac, $idReg){
            try {
                $res = $this->connec->prepare($this->queryPostCampers);
                $res->bindValue("idCamper", $idCamper);
                $res->bindValue("nombreCamper", $nombreCamper);
                $res->bindValue("apellidoCamper", $apellidoCamper);
                $res->bindValue("fechaNac", $fechaNac);
                $res->bindValue("idReg", $idReg);
                $res->execute();
                $this->message = [ "STATUS" => 200, "MESSAGE" => "Agregado Exitosamente"];

            } catch (\PDOException $error) {
            $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllMostrarTodo(){
            try {
                $res = $this->connec->prepare($this->queryGetAllMostrarTodo);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllCampers(){
            try {
                $res = $this->connec->prepare($this->queryGetAllCampers);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getCampers($idCamper){
            try {
                $res = $this->connec->prepare($this->queryGetCampers);
                $res->bindValue("idCamper", $idCamper);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllPais(){
            try {
                $res = $this->connec->prepare($this->queryGetAllPais);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllDepartamento(){
            try {
                $res = $this->connec->prepare($this->queryGetAllDepartamento);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function getAllRegion(){
            try {
                $res = $this->connec->prepare($this->queryGetAllRegion);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" =>$res->fetchAll(\PDO::FETCH_ASSOC)];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally {
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }

        public function updateCampers($data, $idCamper){
            $nombreCamper = $data["nombreCamper"];
            $apellidoCamper = $data["apellidoCamper"];
            $fechaNac = $data["fechaNac"];
            $idReg = $data["idReg"];
            try {
                $res = $this->connec->prepare($this->queryUpdateCampers);
                $res->bindValue("nombreCamper", $nombreCamper);
                $res->bindValue("apellidoCamper", $apellidoCamper);
                $res->bindValue("fechaNac", $fechaNac);
                $res->bindValue("idReg", $idReg);
                $res->bindValue("idCamper", $idCamper);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Actualizado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();
                
            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }






        public function deleteCampers($idCamper){
            try {
                $res = $this->connec->prepare($this->queryDeleteCampers);
                $res->bindValue("idCamper", $idCamper);
                $res->execute();
                $this->message = ["STATUS" => 200, "MESSAGE" => "Eliminado Exitosamente"];

            } catch (\PDOException $error) {
                $this->message = $error->getMessage();

            } finally{
                echo json_encode($this->message, JSON_PRETTY_PRINT);
            }
        }
    }
?>