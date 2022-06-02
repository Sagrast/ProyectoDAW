use proyecto;
-- -------------------------------------------------------------
-- Trigger que impide meter un kilometraje inferior al actual
-- -------------------------------------------------------------
DROP TRIGGER IF EXISTS comprobacion_km;
DELIMITER $$
CREATE TRIGGER comprobacion_km BEFORE UPDATE ON proyecto.vehicles
FOR EACH ROW
BEGIN
IF (new.kilometros < old.kilometros) THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error. El Numero de KM es
inferior al ya establecido';
END IF;
END $$
DELIMITER ;


-- -------------------------------------------------------------
-- Triggers que verifica la correcta inserción de las lecturas
-- -------------------------------------------------------------
DROP TRIGGER IF EXISTS comprobacion_lectura;
DELIMITER $$
CREATE TRIGGER comprobacion_lectura BEFORE INSERT ON proyecto.machines
FOR EACH ROW
BEGIN
DECLARE v_lectura INT;
SELECT lectura from machines into v_lectura;
IF (NEW.lectura < v_lectura) THEN
SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'Error. La lectura es
inferior a la actual';
END IF;
END $$
DELIMITER ;


-- -------------------------------------------------------------
-- Trigger para guardar copia de seguridad de los clientes dados de baja
-- -------------------------------------------------------------
DROP TABLE IF EXISTS clientes_historico;
create table if not exists clientes_historico (
Cliente_historico_PK serial,
Fecha_baja date,
ID varchar(5),
Nombre varchar(90) Not Null,
Direccion varchar (150) Not Null,
CIF varchar(9) Not Null,
servicio ENUM ('TBM','CFM','SNK','AGU') not null,
Telefono varchar (15) not null,
email varchar (30),
Unique uq_clie_cif (CIF),
Primary Key (Cliente_historico_PK)
);

DROP TRIGGER IF EXISTS historico_cliente;

DELIMITER $$
CREATE TRIGGER historico_cliente BEFORE DELETE ON clients
FOR EACH ROW
BEGIN
DECLARE baja_fecha DATE;
select curdate() into baja_fecha;
INSERT INTO clientes_historico (
Fecha_baja,ID,Nombre,Direccion,CIF,servicio,Telefono,email)
VALUES (baja_fecha,old.ID,old.Nombre,old.Direccion,old.CIF,old.servicio,old.Telefono,old.email);
END $$

DELIMITER ;