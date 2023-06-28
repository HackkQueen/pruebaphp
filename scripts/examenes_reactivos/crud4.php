<?php
    namespace App;
    
    class crud4 extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM examenes_reactivos");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll() {
            $res = $this->con->prepare("INSERT INTO examenes_reactivos(IdExamenes_Reactivos, Codigo, IdReactivos) VALUES(:id, :cod, :idReac)");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':cod', $this->_DATA->cod);
            $res->bindParam(':idReac', $this->_DATA->idReac);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE examenes_reactivos SET Codigo = :cod, IdReactivos = :idReac WHERE IdExamenes_Reactivos = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':cod', $this->_DATA->cod);
            $res->bindParam(':idReac', $this->_DATA->idReac);
            $res->execute();
            print_r($res->rowCount());
        }
        public function deleteAll(){
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM examenes_reactivos WHERE IdExamenes_Reactivos=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>