CREATE DATABASE tienda;
CREATE TABLE producto(
    pro_id SERIAL,
    pro_nombre VARCHAR (10),
    pro_precio MONEY (10,2),
    PRIMARY KEY (pro_id)
);