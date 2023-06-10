CREATE DATABASE alquilartemis;

USE alquilartemis;


CREATE TABLE empleado(
    idEmpleados INT primary key auto_increment,
    nombres VARCHAR (50) NOT NULL,
    celular INT (20) NOT NULL,
    direccion VARCHAR (50) NOT NULL
);

CREATE TABLE clientes(
    idClientes INT primary key auto_increment,
    nombre VARCHAR (50) NOT NULL,
    celular INT (20) NOT NULL,
    compañia VARCHAR (50) NOT NULL
);

CREATE TABLE productos(
    idProducto INT PRIMARY KEY AUTO_INCREMENT,
    nombre_producto VARCHAR (50) NOT NULL,
    precio_productos INT (20) NOT NULL
);

CREATE TABLE cotizaciones (
  cotizacionid INT AUTO_INCREMENT PRIMARY KEY,
  idClientes INT,
  idEmpleados INT,
  idProducto INT(20),
  fecha_alquiler DATETIME,
  total DECIMAL(10, 2),
  FOREIGN KEY (idClientes) REFERENCES clientes(idClientes),
  FOREIGN KEY (idEmpleados) REFERENCES empleado(idEmpleados),
  FOREIGN KEY (idProducto) REFERENCES productos(idProducto)
);


CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    IDEmpleado INT NOT NULL,
    email VARCHAR (80) NOT NULL,
    username VARCHAR (80) NOT NULL,
    password VARCHAR (60) NOT NULL,
    FOREIGN KEY (IDEmpleado) REFERENCES empleado(idEmpleados)
);