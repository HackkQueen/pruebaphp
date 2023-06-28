<?php
    namespace App;
    
    class crud extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM eps");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll() {
            $res = $this->con->prepare("INSERT INTO eps(IdEps, NombreEps, DireccionEps) VALUES(:id, :nomEps, :dirEps)");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomEps', $this->_DATA->nomEps);
            $res->bindParam(':dirEps', $this->_DATA->dirEps);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE eps SET NombreEps = :nomEps, DireccionEps = :dirEps WHERE IdEps = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomEps', $this->_DATA->nomEps);
            $res->bindParam(':dirEps', $this->_DATA->dirEps);
            $res->execute();
            print_r($res->rowCount());
        }
        public function deleteAll(){
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM eps WHERE IdEps=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>