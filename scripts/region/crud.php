<?php
    namespace App;
    
    class crud extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM region");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll() {
            $res = $this->con->prepare("INSERT INTO region(idRegion, nombreReg, idDep) VALUES(:id, :nomReg, :idDep)");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomReg', $this->_DATA->nomReg);
            $res->bindParam(':idDep', $this->_DATA->idDep);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE region SET nombreReg = :nomReg, idDep = :idDep WHERE idRegion = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomReg', $this->_DATA->nomReg);
            $res->bindParam(':idDep', $this->_DATA->idDep);
            $res->execute();
            print_r($res->rowCount());
        }
        public function deleteAll(){
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM region WHERE idRegion=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>