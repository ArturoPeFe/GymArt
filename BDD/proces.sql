***************
-- Proce para insertar cliente

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS InsertarCliente(
    IN n_dni VARCHAR(20),
    IN n_nome VARCHAR(50),
    IN n_ap1 VARCHAR(50),
    IN n_ap2 VARCHAR(50),
    IN n_email VARCHAR(100),
    IN n_telefono VARCHAR(20),
    IN n_direccion VARCHAR(100),
    IN n_suscripcion VARCHAR(8),
    IN n_pass VARCHAR(255)
)
BEGIN
    DECLARE last_inserted_id INT;
    INSERT INTO contrasenas (pass) VALUES (n_pass);
    SET last_inserted_id = LAST_INSERT_ID();
    INSERT INTO clientes (dni, nombre, apellido1, apellido2, email, telefono, direccion, suscripcion, id_contrasena) VALUES (n_dni, n_nome, n_ap1, n_ap2, n_email, n_telefono, n_direccion, n_suscripcion, last_inserted_id);
    
END;
//

DELIMITER ;


**********
-- Proce para insertar trabajador

DELIMITER //
 
CREATE PROCEDURE IF NOT EXISTS InsertarTrabajador(
    IN n_dni VARCHAR(20),
    IN n_nome VARCHAR(50),
    IN n_ap1 VARCHAR(50),
    IN n_ap2 VARCHAR(50),
    IN n_email VARCHAR(100),
    IN n_puesto VARCHAR(30),
    IN n_descripcion VARCHAR(1000),
    IN n_pass VARCHAR(255)
)
BEGIN
    DECLARE last_inserted_id INT;
    INSERT INTO contrasenas (pass) VALUES (n_pass);
    SET last_inserted_id = LAST_INSERT_ID();
    INSERT INTO trabajadores (dni, nombre, apellido1, apellido2, email, puesto, descripcion_puesto, id_contrasena) VALUES (n_dni, n_nome, n_ap1, n_ap2, n_email, n_puesto, n_descripcion, last_inserted_id);
    
END
//

DELIMITER ;


******
-- Proce para borrado trabajador

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS BorrarTrabajador(
    IN n_dni VARCHAR(20)
)
BEGIN
    DECLARE id_borrar INT;
    SELECT id_contrasena INTO id_borrar FROM trabajadores WHERE dni = n_dni;
    DELETE FROM trabajadores WHERE dni = n_dni;
    DELETE FROM contrasenas WHERE id_contrasena = id_borrar;
    
END
//

DELIMITER ;


******
-- Proce para borrado clientes

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS BorrarCliente(
    IN n_dni VARCHAR(20)
)
BEGIN
    DECLARE id_borrar INT;
    SELECT id_contrasena INTO id_borrar FROM clientes WHERE dni = n_dni;
    DELETE FROM clientes WHERE dni = n_dni;
    DELETE FROM contrasenas WHERE id_contrasena = id_borrar;
    
END
//

DELIMITER ;


******
-- Proce update trabajadores

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS UpdateTrabajador(
    IN n_dni VARCHAR(20),
    IN n_nome VARCHAR(50),
    IN n_ap1 VARCHAR(50),
    IN n_ap2 VARCHAR(50),
    IN n_email VARCHAR(100),
    IN n_pass VARCHAR(255)
)
BEGIN
    UPDATE trabajadores SET nombre=n_nom,apellido1=n_ap1,apellido2=n_ap2,email=n_email WHERE dni=n_dni;
END
//

DELIMITER ;


******
-- Proce update trabajadores

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS UpdateTrabajador(
    IN n_dni VARCHAR(20),
    IN n_nome VARCHAR(50),
    IN n_ap1 VARCHAR(50),
    IN n_ap2 VARCHAR(50),
    IN n_email VARCHAR(100),
    IN n_puesto VARCHAR(30),
    IN n_descripcion VARCHAR(1000)
)
BEGIN
    UPDATE trabajadores SET nombre=n_nome,apellido1=n_ap1,apellido2=n_ap2,email=n_email, puesto=n_puesto, descripcion_puesto=n_descripcion WHERE dni=n_dni;
END
//

DELIMITER ;


***************
-- Proce update cliente

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS UpdateCliente(
    IN n_dni VARCHAR(20),
    IN n_nome VARCHAR(50),
    IN n_ap1 VARCHAR(50),
    IN n_ap2 VARCHAR(50),
    IN n_email VARCHAR(100),
    IN n_telefono VARCHAR(20),
    IN n_direccion VARCHAR(100),
    IN n_suscripcion VARCHAR(8)
)
BEGIN
    UPDATE clientes SET nombre=n_nome,apellido1=n_ap1,apellido2=n_ap2,email=n_email,telefono=n_telefono, direccion=n_direccion, suscripcion=n_suscripcion WHERE dni=n_dni;
END;
//

DELIMITER ;


***************
-- Proce actualizar pass cliente

DELIMITER //

CREATE PROCEDURE IF NOT EXISTS ActualizarPass(
    IN n_dni VARCHAR(20),
    IN nueva_pass VARCHAR(255)
)
BEGIN
    DECLARE id INT;
    SELECT id_contrasena INTO id FROM clientes WHERE dni = n_dni;
    UPDATE contrasenas SET pass=nueva_pass WHERE id_contrasena=id;
END;
//

DELIMITER ;



***************
-- Proce obtener valoraciones

DELIMITER //
CREATE PROCEDURE ObtenerValoraciones()
BEGIN
  SELECT c.nombre, v.comentario
  FROM valoraciones v
  INNER JOIN clientes c ON v.id_cliente = c.id_cliente;
END //
DELIMITER ;