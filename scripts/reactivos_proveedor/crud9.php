<?php
    namespace App;
    
    class crud9 extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM reactivos_proveedor");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll() {
            $res = $this->con->prepare("INSERT INTO reactivos_proveedor(IdReactivosProveedor, IdReactivos, NitProveedor) VALUES(:id, :idReactivos, :nitProveedor)");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':idReactivos', $this->_DATA->idReactivos);
            $res->bindParam(':nitProveedor', $this->_DATA->nitProveedor);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE reactivos_proveedor SET IdReactivos = :idReactivos, NitProveedor = :nitProveedor WHERE IdReactivosProveedor = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':idReactivos', $this->_DATA->idReactivos);
            $res->bindParam(':nitProveedor', $this->_DATA->nitProveedor);
            $res->execute();
            print_r($res->rowCount());
        }
        public function deleteAll(){
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM reactivos_proveedor WHERE IdReactivosProveedor=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>