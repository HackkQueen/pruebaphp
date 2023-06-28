<?php
    namespace App;
    
    class crud8 extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM reactivos");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll() {
            $res = $this->con->prepare("INSERT INTO reactivos(IdReactivos, NombreReactivos, Existencias) VALUES(:id, :nomReactivos, :ex)");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomReactivos', $this->_DATA->nomReactivos);
            $res->bindParam(':ex', $this->_DATA->ex);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE reactivos SET NombreReactivos = :nomReactivos, Existencias = :ex WHERE IdReactivos = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomReactivos', $this->_DATA->nomReactivos);
            $res->bindParam(':ex', $this->_DATA->ex);
            $res->execute();
            print_r($res->rowCount());
        }
        public function deleteAll(){
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM reactivos WHERE IdReactivos=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>