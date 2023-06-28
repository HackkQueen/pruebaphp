<?php
    namespace App;
    
    class crud5 extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM ordenes");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll() {
            $res = $this->con->prepare("INSERT INTO ordenes(IdOrdenes, NombreOrdenes, Medico, IdPaciente, IdBacteriologo) VALUES(:id, :nomOrdenes, :medico, :idPaciente, :idBacteriologo)");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomOrdenes', $this->_DATA->nomOrdenes);
            $res->bindParam(':medico', $this->_DATA->medico);
            $res->bindParam(':idPaciente', $this->_DATA->idPaciente);
            $res->bindParam(':idBacteriologo', $this->_DATA->idBacteriologo);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE ordenes SET NombreOrdenes = :nomOrdenes, Medico = :medico, IdPaciente = :idPaciente,  IdBacteriologo = :idBacteriologo WHERE IdOrdenes = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomOrdenes', $this->_DATA->nomOrdenes);
            $res->bindParam(':medico', $this->_DATA->medico);
            $res->bindParam(':idPaciente', $this->_DATA->idPaciente);
            $res->bindParam(':idBacteriologo', $this->_DATA->idBacteriologo);
            $res->execute();
            print_r($res->rowCount());
        }
        public function deleteAll(){
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM ordenes WHERE IdOrdenes=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>