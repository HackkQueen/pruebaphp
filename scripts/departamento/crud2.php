<?php
    namespace App;
    
    class crud2 extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM departamento");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll() {
            $res = $this->con->prepare("INSERT INTO departamento(idDep, nombreDep, idPais) VALUES(:id, :nomDep, :idPais)");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomDep', $this->_DATA->nomDep);
            $res->bindParam(':idPais', $this->_DATA->idPais);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE departamento SET nombreDep = :nomDep, idPais = :idPais WHERE idDep = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomDep', $this->_DATA->nomDep);
            $res->bindParam(':idPais', $this->_DATA->idPais);
            $res->execute();
            print_r($res->rowCount());
        }
        public function deleteAll(){
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM departamento WHERE idDep=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>