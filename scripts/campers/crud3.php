<?php
    namespace App;
    
    class crud3 extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM campers");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll() {
            $res = $this->con->prepare("INSERT INTO campers(idCamper, nombreCamper, apellidoCamper, fechaNac, idReg) VALUES(:id, :nomCamper, :apCamper, :data, :idReg)");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomCamper', $this->_DATA->nomCamper);
            $res->bindParam(':apCamper', $this->_DATA->apCamper);
            $res->bindParam(':data', $this->_DATA->data);
            $res->bindParam(':idReg', $this->_DATA->idReg);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE campers SET nombreCamper = :nomCamper, apellidoCamper = :apCamper, fechaNac = :data, idReg =:idReg WHERE idCamper = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomCamper', $this->_DATA->nomCamper);
            $res->bindParam(':apCamper', $this->_DATA->apCamper);
            $res->bindParam(':data', $this->_DATA->data);
            $res->bindParam(':idReg', $this->_DATA->idReg);
            $res->execute();
            print_r($res->rowCount());
        }
        public function deleteAll(){
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM campers WHERE idCamper=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>