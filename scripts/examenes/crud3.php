<?php
    namespace App;
    
    class crud3 extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM examenes");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll() {
            $res = $this->con->prepare("INSERT INTO examenes(Codigo, NombreExamenes, Costo, IdBacteriologo) VALUES(:cd, :nomExamenes, :cost, :idBact)");
            $res->bindParam(':cd', $this->_DATA->cd);
            $res->bindParam(':nomExamenes', $this->_DATA->nomExamenes);
            $res->bindParam(':cost', $this->_DATA->cost);
            $res->bindParam(':idBact', $this->_DATA->idBact);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE examenes SET NombreExamenes = :nomExamenes, Costo = :cost, IdBacteriologo = :idBact WHERE Codigo = :cd");
            $res->bindParam(':cd', $this->_DATA->cd);
            $res->bindParam(':nomExamenes', $this->_DATA->nomExamenes);
            $res->bindParam(':cost', $this->_DATA->cost);
            $res->bindParam(':idBact', $this->_DATA->idBact);
            $res->execute();
            print_r($res->rowCount());
        }
        public function deleteAll(){
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM examenes WHERE Codigo=:cd");
            $res->bindParam(':cd', $_DATA->cd);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>