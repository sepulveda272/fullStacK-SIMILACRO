CREATE DATABASE alquilartemisjuan;

USE alquilartemisjuan;


CREATE TABLE empleado(
    idEmpleados INT primary key auto_increment,
    nombres_Empleados VARCHAR (200) NOT NULL,
    celular_Empleados INT (50) NOT NULL,
    direccion VARCHAR (200) NOT NULL
);

CREATE TABLE clientes(
    idClientes INT primary key auto_increment,
    nombres_Clientes VARCHAR (200) NOT NULL,
    celular_Clientes INT (50) NOT NULL,
    compañia VARCHAR (200) NOT NULL
);

CREATE TABLE productos(
    idProducto INT PRIMARY KEY AUTO_INCREMENT,
    nombres_productos VARCHAR (200) NOT NULL,
    precios_productos INT (50) NOT NULL
);

CREATE TABLE cotizaciones (
  idCotizacion INT AUTO_INCREMENT PRIMARY KEY,
  idClientes INT,
  idEmpleados INT,
  idProducto INT(50),
  fecha_alquiler VARCHAR (200),
  total INT (50),
  FOREIGN KEY (idClientes) REFERENCES clientes(idClientes),
  FOREIGN KEY (idEmpleados) REFERENCES empleado(idEmpleados),
  FOREIGN KEY (idProducto) REFERENCES productos(idProducto)
);


CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    IDEmpleado INT NOT NULL,
    email VARCHAR (200) NOT NULL,
    username VARCHAR (200) NOT NULL,
    password VARCHAR (200) NOT NULL,
    FOREIGN KEY (IDEmpleado) REFERENCES empleado(idEmpleados)
);