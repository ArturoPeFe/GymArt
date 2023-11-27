CREATE TABLE IF NOT EXISTS contrasenas (
    id_contrasena INT AUTO_INCREMENT PRIMARY KEY,
    pass VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS clientes (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    dni VARCHAR(20) UNIQUE,
    nombre VARCHAR(50) NOT NULL,
    apellido1 VARCHAR(50) NOT NULL,
    apellido2 VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE,
    telefono VARCHAR(20),
    direccion VARCHAR(100),
    suscripcion VARCHAR(8) NOT NULL,
    id_contrasena INT, 
    FOREIGN KEY (id_contrasena) REFERENCES contrasenas (id_contrasena)
);

CREATE TABLE IF NOT EXISTS trabajadores (
    id_trabajador INT AUTO_INCREMENT PRIMARY KEY,
    dni VARCHAR(20) UNIQUE,
    nombre VARCHAR(50) NOT NULL,
    apellido1 VARCHAR(50) NOT NULL,
    apellido2 VARCHAR(50) NOT NULL,
    email VARCHAR(100) UNIQUE,
    puesto VARCHAR(30),
    descripcion_puesto VARCHAR(1000),
    id_contrasena INT,
    FOREIGN KEY (id_contrasena) REFERENCES contrasenas (id_contrasena)
);

CREATE TABLE IF NOT EXISTS valoraciones (
    id_valoracion INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    comentario TEXT,
    FOREIGN KEY (id_cliente) REFERENCES clientes (id_cliente)
);
