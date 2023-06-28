<?php
    namespace App;
    
    class crud6 extends connect{
        public $_DATA;
        function __construct(){
            parent::__construct();
            $this->_DATA =(file_get_contents('php://input')=="") ? ["Mensaje"=>"Envien datos"] : json_decode(file_get_contents('php://input',true));
        }
        public function getAll(){
            $res = $this->con->prepare("SELECT * FROM paciente");
            $res->execute();
            echo json_encode($res->fetchAll(\PDO::FETCH_ASSOC));
        }
        public function postAll() {
            $res = $this->con->prepare("INSERT INTO paciente(IdPaciente, NombrePaciente, FechaNacimiento, TipoSangre, IdEps, IdCiudad) VALUES(:id, :nomPaciente, :data, :tipoSangre, :idEps, :idCiudad)");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomPaciente', $this->_DATA->nomPaciente);
            $res->bindParam(':data', $this->_DATA->data);
            $res->bindParam(':tipoSangre', $this->_DATA->tipoSangre);
            $res->bindParam(':idEps', $this->_DATA->idEps);
            $res->bindParam(':idCiudad', $this->_DATA->idCiudad);
            $res->execute();
            print_r($res->rowCount());
        }
        public function putAll(){
            $res = $this->con->prepare("UPDATE paciente SET NombrePaciente = :nomPaciente, FechaNacimiento = :data, TipoSangre = :tipoSangre, IdEps = :idEps, IdCiudad = :idCiudad WHERE IdPaciente = :id");
            $res->bindParam(':id', $this->_DATA->id);
            $res->bindParam(':nomPaciente', $this->_DATA->nomPaciente);
            $res->bindParam(':data', $this->_DATA->data);
            $res->bindParam(':tipoSangre', $this->_DATA->tipoSangre);
            $res->bindParam(':idEps', $this->_DATA->idEps);
            $res->bindParam(':idCiudad', $this->_DATA->idCiudad);
            $res->execute();
            print_r($res->rowCount());
        }
        public function deleteAll(){
            $cox = new \App\connect();
            $_DATA = json_decode(file_get_contents("php://input"));
            $res = $cox->con->prepare("DELETE FROM paciente WHERE IdPaciente=:id");
            $res->bindParam(':id', $_DATA->id);
            $res->execute();
            print_r($res->rowCount());
        }
    }
?>