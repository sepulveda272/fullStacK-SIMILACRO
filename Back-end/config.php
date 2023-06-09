<?php
require_once("db.php");

class ConexionPDO{
    protected $dbCnx;
    public function __construct(){
        $this -> dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
}

class Empleados extends ConexionPDO{
    private $idEmpleados;
    private $nombres;
    private $celular;
    private $direccion;

    public function __construct($idEmpleados = 0, $nombres = "", $celular= 0, $direccion=""){
        $this -> idEmpleados = $idEmpleados;
        $this -> nombres = $nombres;
        $this -> celular = $celular;
        $this -> direccion = $direccion;
        parent::__construct();
    }

    public function setIdEmpleados($idEmpleados){
        $this->idEmpleados = $idEmpleados;
    }

    public function getIdEmpleados(){
        return $this->idEmpleados;
    }

    public function setNombres($nombres){
        $this->nombres = $nombres;
    }

    public function getNombres(){
        return $this->nombres;
    }

    public function setCelular($celular){
        $this->celular = $celular;
    }

    public function getCelular(){
        return $this->celular;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx -> prepare("INSERT INTO empleado (nombres, celular, direccion) values(?,?,?)");
            $stm -> execute([$this->nombres, $this->celular,$this->direccion]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        
    }
    public function obtainAll(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM empleado");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

?>