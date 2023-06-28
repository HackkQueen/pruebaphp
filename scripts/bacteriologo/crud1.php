<?php
    namespace App;
    
    class crud1 extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM bacteriologo");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll() {
            $res = $this->con->prepare("INSERT INTO bacteriologo(IdBacteriologo, NombreBacteriologo, FechaIngreso) VALUES(:id, :nomBacteriologo, :FecIngreso)");
            $res->bindParam(':IdBacteriologo', $this->_DATA->id);
            $res->bindParam(':nomBacteriologo', $this->_DATA->nomBacteriologo);
            $res->bindParam(':FecIngreso', $this->_DATA->FecIngreso);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE bacteriologo SET NombreBacteriologo = :nomBacteriologo, FechaIngreso = :FecIngreso WHERE IdBacteriologo = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomBacteriologo', $this->_DATA->nomBacteriologo);
            $res->bindParam(':FecIngreso', $this->_DATA->FecIngreso);
            $res->execute();
            print_r($res->rowCount());
        }
        public function deleteAll(){
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM bacteriologo WHERE IdBacteriologo=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>