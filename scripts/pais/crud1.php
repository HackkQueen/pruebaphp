<?php
    namespace App;
    
    class crud1 extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM pais");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll() {
            $res = $this->con->prepare("INSERT INTO pais(idPais, nombrePais) VALUES(:id, :nomPais)");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomPais', $this->_DATA->nomPais);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE pais SET nombrePais = :nomPais WHERE idPais = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomPais', $this->_DATA->nomPais);
            $res->execute();
            print_r($res->rowCount());
        }
        public function deleteAll(){
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM pais WHERE idPais=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>