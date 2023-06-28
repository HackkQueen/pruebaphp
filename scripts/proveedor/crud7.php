<?php
    namespace App;
    
    class crud7 extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM proveedor");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll() {
            $res = $this->con->prepare("INSERT INTO proveedor(NitProveedor, NombreProveedor) VALUES(:nit, :nomProveedor)");
            $res->bindParam(':nit', $this->_DATA->nit);
            $res->bindParam(':nomProveedor', $this->_DATA->nomProveedor);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE proveedor SET NombreProveedor = :nomProveedor WHERE NitProveedor = :nit");
            $res->bindParam(':nit', $this->_DATA->nit);
            $res->bindParam(':nomProveedor', $this->_DATA->nomProveedor);
            $res->execute();
            print_r($res->rowCount());
        }
        public function deleteAll(){
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM proveedor WHERE NitProveedor=:nit");
            $res->bindParam(':nit', $_DATA->nit);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>