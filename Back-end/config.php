<?php

ini_set("display_errors", 1);

ini_set("display_startup_errors", 1);

error_reporting(E_ALL);

require_once("db.php");

class ConexionPDO{
    protected $dbCnx;
    public function __construct(){
        $this -> dbCnx = new PDO(DB_TYPE.":host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PWD, [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
    }
}

class Empleados extends ConexionPDO{
    private $idEmpleados;
    private $nombres_Empleados;
    private $celular_Empleados;
    private $direccion;

    public function __construct($idEmpleados = 0, $nombres_Empleados = "", $celular_Empleados= 0, $direccion="" , $dbCnx = ""){
        $this -> idEmpleados = $idEmpleados;
        $this -> nombres_Empleados = $nombres_Empleados;
        $this -> celular_Empleados = $celular_Empleados;
        $this -> direccion = $direccion;
        parent::__construct($dbCnx);
    }

    public function setIdEmpleados($idEmpleados){
        $this->idEmpleados = $idEmpleados;
    }

    public function getIdEmpleados(){
        return $this->idEmpleados;
    }

    public function setNombres_Empleados($nombres_Empleados){
        $this->nombres_Empleados = $nombres_Empleados;
    }

    public function getNombres_Empleados(){
        return $this->nombres_Empleados;
    }

    public function setCelular_Empleados($celular_Empleados){
        $this->celular_Empleados = $celular_Empleados;
    }

    public function getCelular_Empleados(){
        return $this->celular_Empleados;
    }

    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    public function getDireccion(){
        return $this->direccion;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx -> prepare("INSERT INTO empleado (nombres_Empleados, celular_Empleados, direccion) values(?,?,?)");
            $stm -> execute([$this->nombres_Empleados, $this->celular_Empleados,$this->direccion]);
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
    public function delete(){
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM empleado WHERE idEmpleados = ?");
            $stm -> execute([$this->idEmpleados]);
            return $stm -> fetchAll();
            /* echo "<script>alert('Registro eliminadoo');document.location='empleados.php'</script>"; */
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function selectOne(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM empleado WHERE idEmpleados = ?");
            $stm -> execute([$this->idEmpleados]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx ->prepare("UPDATE empleado SET nombres_Empleados = ?, celular_Empleados = ?, direccion = ? WHERE idEmpleados =?");
            $stm -> execute([$this->nombres_Empleados,$this->celular_Empleados, $this->direccion,$this->idEmpleados]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

}

class Clientes extends ConexionPDO{
    private $idClientes;
    private $nombres_Clientes;
    private $celular_Clientes;
    private $compañia;

    public function __construct($idClientes = 0, $nombres_Clientes = "", $celular_Clientes = 0, $compañia = "", $dbCnx = ""){
        $this -> idClientes = $idClientes;
        $this -> nombres_Clientes = $nombres_Clientes;
        $this -> celular_Clientes = $celular_Clientes;
        $this -> compañia = $compañia;
        parent::__construct($dbCnx);
    }

    public function setIdClientes($idClientes){
        $this->idClientes = $idClientes;
    }

    public function getIdClientes(){
        return $this->idClientes;
    }

    public function setNombres_Clientes($nombres_Clientes){
        $this->nombres_Clientes = $nombres_Clientes;
    }

    public function getNombres_Clientes(){
        return $this->nombres_Clientes;
    }

    public function setCelular_Clientes($celular_Clientes){
        $this->celular_Clientes = $celular_Clientes;
    }

    public function getCelular_Clientes(){
        return $this->celular_Clientes;
    }

    public function setCompañia($compañia){
        $this->compañia = $compañia;
    }

    public function getCompañia(){
        return $this->compañia;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx -> prepare("INSERT INTO clientes (nombres_Clientes, celular_Clientes, compañia) values(?,?,?)");
            $stm -> execute([$this->nombres_Clientes, $this->celular_Clientes,$this->compañia]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM clientes");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete(){
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM clientes WHERE idClientes = ?");
            $stm -> execute([$this->idClientes]);
            return $stm -> fetchAll();
            /* echo "<script>alert('Registro eliminadoo');document.location='empleados.php'</script>"; */
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function selectOne(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM clientes WHERE idClientes = ?");
            $stm -> execute([$this->idClientes]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx ->prepare("UPDATE clientes SET nombres_Clientes = ?, celular_clientes = ?, compañia = ? WHERE idClientes =?");
            $stm -> execute([$this->nombres_Clientes,$this->celular_Clientes, $this->compañia,$this->idClientes]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

class Productos extends ConexionPDO{
    private $idProducto;
    private $nombres_productos;
    private $precios_productos;
    
    public function __construct($idProducto = 0, $nombres_productos = "", $precios_productos = 0, $dbCnx = ""){
        $this -> idProducto = $idProducto;
        $this -> nombres_productos = $nombres_productos;
        $this -> precios_productos = $precios_productos;
        parent::__construct($dbCnx);
    }

    public function setIdProducto($idProducto){
        $this->idProducto = $idProducto;
    }

    public function getIdProducto(){
        return $this->idProducto;
    }

    public function setNombres_productos($nombres_productos){
        $this->nombres_productos = $nombres_productos;
    }

    public function getNombres_productos(){
        return $this->nombres_productos;
    }

    public function setPrecios_productos($precios_productos){
        $this->precios_productos = $precios_productos;
    }

    public function getPrecios_productos(){
        return $this->precios_productos;
    }

    public function insertData(){
        try {
            $stm = $this->dbCnx -> prepare("INSERT INTO productos (nombres_productos, precios_productos) values(?,?)");
            $stm -> execute([$this->nombres_productos, $this->precios_productos]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function obtainAll(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM productos");
            $stm -> execute();
            return $stm -> fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function delete(){
        try {
            $stm = $this->dbCnx -> prepare("DELETE FROM productos WHERE idProducto = ?");
            $stm -> execute([$this->idProducto]);
            return $stm -> fetchAll();
            /* echo "<script>alert('Registro eliminadoo');document.location='empleados.php'</script>"; */
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function selectOne(){
        try {
            $stm = $this->dbCnx -> prepare("SELECT * FROM productos WHERE idProducto = ?");
            $stm -> execute([$this->idProducto]);
            return $stm->fetchAll();
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function update(){
        try {
            $stm = $this->dbCnx ->prepare("UPDATE productos SET nombres_productos = ?, precios_productos = ? WHERE idProducto =?");
            $stm -> execute([$this->nombres_productos,$this->precios_productos,$this->idProducto]);
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}

class Cotizaciones extends ConexionPDO{
    
}

?>