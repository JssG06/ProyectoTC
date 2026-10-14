CREATE TABLE PUESTO (
    cve_puesto SERIAL PRIMARY KEY, 
    nombre VARCHAR(40)
);

CREATE TABLE TALLER (
    rfc_taller VARCHAR(21) PRIMARY KEY, 
    nombre VARCHAR(40),
    direccion VARCHAR(81)
);

CREATE TABLE MECANICO (
    rfc VARCHAR(40) PRIMARY KEY,       
    nombre VARCHAR(40),
    cve_puesto INTEGER,
    activo INTEGER,                    
    CONSTRAINT fk_cve_puesto_mecanico 
        FOREIGN KEY (cve_puesto) REFERENCES PUESTO (cve_puesto)
);

CREATE TABLE CLIENTE (
    cve_cliente SERIAL PRIMARY KEY, 
    nombre VARCHAR(44),
    direccion VARCHAR(81),
    tarifa NUMERIC(10,2)            
);

CREATE TABLE AUTOM (
    placa VARCHAR(10) PRIMARY KEY, 
    marca VARCHAR(21),
    anio_fab INTEGER,       
    modelo VARCHAR(21),
    color VARCHAR(11)
);

CREATE TABLE CLIENTE_AUTO (
    cve_cliente INTEGER,
    placa VARCHAR(10),
    
    
    CONSTRAINT fk_cve_cliente 
        FOREIGN KEY (cve_cliente) REFERENCES CLIENTE (cve_cliente),
    
    CONSTRAINT fk_placa_cliente 
        FOREIGN KEY (placa) REFERENCES AUTOM (placa),
        
    PRIMARY KEY (cve_cliente, placa)
);

CREATE TABLE ACCIDENTE (
    num_accidente SERIAL PRIMARY KEY, 
    cve_cliente INTEGER,
    placa VARCHAR(10),
    rfc_taller VARCHAR(21),
    fecha DATE,
    costo DECIMAL(12,2),                 

    CONSTRAINT fk_cve_cliente_accidente 
        FOREIGN KEY (cve_cliente) REFERENCES CLIENTE (cve_cliente),
    
    CONSTRAINT fk_placa_accidente 
        FOREIGN KEY (placa) REFERENCES AUTOM (placa),
        
    CONSTRAINT fk_rfc_taller 
        FOREIGN KEY (rfc_taller) REFERENCES TALLER (rfc_taller)
);

CREATE TABLE TRABAJOS (
    id SERIAL PRIMARY KEY,       
    rfc VARCHAR(21),
    placa VARCHAR(10),
    horas_rep DECIMAL(10,2),      
    fecha_rep DATE,
    CONSTRAINT fk_placa_trabajos 
        FOREIGN KEY (placa) REFERENCES AUTOM (placa),
        
    CONSTRAINT fk_rfc_trabajos 
        FOREIGN KEY (rfc) REFERENCES MECANICO (rfc) 
        
);

INSERT INTO PUESTO (cve_puesto, nombre) VALUES (1, 'Pedro Miguel Sanchez Perez');
INSERT INTO PUESTO (cve_puesto, nombre) VALUES (2, 'Pepe Siman Lopez Jimenez');
INSERT INTO PUESTO (cve_puesto, nombre) VALUES (3, 'Joaquin Mendoza Montes');
INSERT INTO PUESTO (cve_puesto, nombre) VALUES (4, 'Salvador Fuentes Cruz');
INSERT INTO PUESTO (cve_puesto, nombre) VALUES (5, 'Puesto de Prueba o Marco');
INSERT INTO PUESTO (cve_puesto, nombre) VALUES (6, 'Arturo Alejandro Sanchez Albirde');
INSERT INTO PUESTO (cve_puesto, nombre) VALUES (7, 'Kevin Medina Esquivel');
INSERT INTO PUESTO (cve_puesto, nombre) VALUES (8, 'Samuel Ramos Perez');
INSERT INTO PUESTO (cve_puesto, nombre) VALUES (9, 'Carlos Emanuel Galindo Salazar');
INSERT INTO PUESTO (cve_puesto, nombre) VALUES (10, 'Daniel Salazar Jaimes');

INSERT INTO TALLER (rfc_taller, nombre, direccion) VALUES ('MERC791104R70', 'Taller Martinez MX', 'Benito Juarez Ote. 203. Ciudad de Mexico');
INSERT INTO TALLER (rfc_taller, nombre, direccion) VALUES ('GUMH620127CM2', 'Taller Mecanico Hermanos Guzman', 'Av. Insurgentes, Gpe. Victoria 105; Tenancingo, Mex');

INSERT INTO MECANICO (rfc, nombre, cve_puesto, activo) VALUES ('SAPM8901119E4', 'Pedro Miguel Sanchez Perez', 1, 1);
INSERT INTO MECANICO (rfc, nombre, cve_puesto, activo) VALUES ('LOJP791104GY7', 'Pepe Simon Lopez Jimenez', 2, 1);
INSERT INTO MECANICO (rfc, nombre, cve_puesto, activo) VALUES ('MEMJ930906289', 'Joaquin Mendoza Montes', 3, 1);
INSERT INTO MECANICO (rfc, nombre, cve_puesto, activo) VALUES ('FUCS010814QQ9', 'Salvador Fuentes Cruz', 4, 1);
INSERT INTO MECANICO (rfc, nombre, cve_puesto, activo) VALUES ('OISM9802091Y7', 'Marco Ortiz Serrano', 5, 1);
INSERT INTO MECANICO (rfc, nombre, cve_puesto, activo) VALUES ('SAAA90081154A', 'Sanchez Albirde Arturo Alejandro', 6, 1);
INSERT INTO MECANICO (rfc, nombre, cve_puesto, activo) VALUES ('MEEK890222QH3', 'Kevin Medina Esquivel', 7, 1);
INSERT INTO MECANICO (rfc, nombre, cve_puesto, activo) VALUES ('RAPS9106095410', 'Samuel Ramos Perez', 8, 1);
INSERT INTO MECANICO (rfc, nombre, cve_puesto, activo) VALUES ('GASC010305AJ10', 'Carlos Emanuel Galindo Salazar', 9, 1);
INSERT INTO MECANICO (rfc, nombre, cve_puesto, activo) VALUES ('SAJD971214L53', 'Daniel Salazar Jaimes', 10, 1);
INSERT INTO MECANICO (rfc, nombre, cve_puesto, activo) VALUES ('AIAX011213NT10', 'Xavier Atilano Alvarez', 1, 1);

INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (2211, 'Horacio Carrera Vidal', 'Pelones de La Piedra 115, Tenango; Edo. Mex', 2999.8);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (3245, 'Elian Peralta Chavez', 'Tulipanes 41, Sn. Antonio; Edo. Mex', 3155.01);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (71, 'Martin Carmona Camacho', 'Hidalgo 26, Tenancingo; Edo. Mex', 8009.02);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (4024, 'Ariana Somera Gomez', 'San Jose 14, Tenancingo; Edo. Mex', 4050.01);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (1356, 'Alonso Del Rio Vasquez', 'Zaragoza, Malinalco; Edo. Mex', 3526.01);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (1265, 'Sergio Mendoza Sanchez', 'Alfredo del Mazo 565, Villa Gro.; Edo. Mex', 6642.12);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (9623, 'Flor Itzel Dominguez Segura', 'Fuentes Gasca 45, Tepetzingo; Edo. Mex', 3462.11);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (4667, 'Emanuel Gonzalez Hernandez', 'Calle del IMSS 175, Santa Ana; Edo. Mex', 5623.44);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (8725, 'Gonzalo Montes Garcia', 'Simon Velasco 346, Balle de Bravo; Edo. Mex', 6852.21);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (7254, 'Lorena Adali Garcia Garcia', 'Iturbide, Santa Maria; Edo. Mex', 14577.99);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (1978, 'Guillermo Fuentes del Toro', 'Morelos 813, La Campana; Edo. Mex', 5573.33);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (5635, 'Josue Arias Guadarrama', 'Tecolotzin, San Martin; Edo. Mex', 2346.22);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (4623, 'Diego Mejia Olivares', 'Carranza 553, Tenancingo; Edo. Mex', 3463.11);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (2356, 'Francisco Martinez Sabueso', 'Ayala 164, Los Juzgados, Tenancingo; Edo. Mex', 4623.44);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (6146, 'Uriel Segura Baca', 'Jose Quintero 887, San Lucas; Edo. Mex', 5244.92);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (3252, 'Jesus Lizarraga Torres', 'Montes del Rio 23, El Capulin; Edo. Mex', 1993.26);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (7211, 'Jorge Montes Carrizo', 'Bajada del Salto 163, Joquicingo; Edo. Mex', 4672.77);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (3421, 'Diego Martinez Cruz', 'Col. Los Maestros 16, El Salitre; Edo. Mex', 7734.11);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (225, 'Jaime Ruiz Pelaez', 'Francisco Ochoa 332, San Alejo; Edo. Mex', 6234.68);
INSERT INTO CLIENTE (cve_cliente, nombre, direccion, tarifa) VALUES (1233, 'Chalino Sanchez', 'De la Garza, Las Casuarinas; Veracruz', 1999.00);

INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('GPT-7312', 'Nissan', 2017, 'March', 'ROJO');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('MQZ-4122', 'Mazda', 2020, 'CX-3', 'BLANCO');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('KFJ-9174', 'Chevrolet', 2003, 'Chevy', 'AZUL');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('QMH-9841', 'Renault', 2021, 'Captur', 'NEGRO');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('CXZ-8916', 'Ford', 2021, 'Mustang', 'BLANCO');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('GPT-9110', 'DODGE', 2019, 'CHALLENGER', 'ROJO');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('QKP-9801', 'VOLKSWAGWEN', 2001, 'JETTA', 'BLANCO');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('MHK-4566', 'VOLKSWAGWEN', 2009, 'BEETLE', 'GRIS');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('ERS-7270', 'AUDI', 2020, 'R8', 'ROJO');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('CSA-7523', 'Chevrolet', 2021, 'CAMARO', 'VERDE');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('XSP-9344', 'DODGE', 2021, 'CHARGER', 'BLANCO');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('HER-9812', 'NISSAN', 2004, 'VERSA', 'NEGRO');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('LKJ-2348', 'NISSAN', 2007, 'TSURU', 'ROJO');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('ASW-8812', 'HONDA', 2012, 'CIVIC', 'AMARILLO');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('YGY-5433', 'FORD', 2016, 'F-150', 'ROJO');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('PPH-1120', 'CHEVROLET', 2016, 'CAVALIER', 'GRIS');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('SBR-8425', 'MAZDA', 2022, 'RX8', 'NEGRO');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('LOI-7765', 'MAZDA', 2021, 'RX5', 'AZUL');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('CVD-9062', 'TESLA', 2021, 'CYBERTRUCK', 'GRIS');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('MDW-3072', 'NISSAN', 2009, 'MARCH', 'GRIS');
INSERT INTO AUTOM (placa, marca, anio_fab, modelo, color) VALUES ('KSQ-4562', 'Nissan', 2019, 'Sentra', 'Gris');

INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (2211, 'GPT-7312');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (3245, 'MQZ-4122');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (71, 'KFJ-9174');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (4024, 'QMH-9841');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (1356, 'CXZ-8916');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (1265, 'GPT-9110');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (9623, 'QKP-9801');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (4667, 'MHK-4566');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (7254, 'ERS-7270');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (1978, 'CSA-7523');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (8725, 'XSP-9344');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (5635, 'HER-9812');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (4623, 'LKJ-2348');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (2356, 'ASW-8812');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (6146, 'YGY-5433');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (3252, 'PPH-1120');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (7211, 'SBR-8425');
INSERT INTO CLIENTE_AUTO (cve_cliente, placa) VALUES (3421, 'LOI-7765');

INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (101, 2211, 'GPT-7312', 'MERC791104R70', '2022-10-14', 6300.14);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (211, 3245, 'MQZ-4122', 'MERC791104R70', '2022-11-05', 9710);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (33, 71, 'KFJ-9174', 'MERC791104R70', '2003-04-15', 1788.5);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (123, 4024, 'QMH-9841', 'MERC791104R70', '2016-12-16', 5320.01);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (99, 1356, 'CXZ-8916', 'MERC791104R70', '2021-12-15', 899.01);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (100, 1265, 'GPT-9110', 'MERC791104R70', '2019-09-16', 4113.1);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (431, 9623, 'QKP-9801', 'MERC791104R70', '2019-11-07', 2975.4);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (515, 4667, 'MHK-4566', 'MERC791104R70', '2020-08-12', 3200);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (207, 7254, 'ERS-7270', 'MERC791104R70', '2019-01-30', 4168.9);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (22, 1978, 'CSA-7523', 'MERC791104R70', '0022-10-14', 4168.9);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (43, 8725, 'XSP-9344', 'GUMH620127CM2', '0022-05-06', 6311.25);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (17, 5635, 'HER-9812', 'GUMH620127CM2', '2022-04-07', 4116.7);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (340, 4623, 'LKJ-2348', 'GUMH620127CM2', '0020-03-15', 3188.5);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (142, 2356, 'ASW-8812', 'GUMH620127CM2', '0021-07-04', 1050.3);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (701, 6146, 'YGY-5433', 'GUMH620127CM2', '0020-09-27', 9018.22);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (427, 3252, 'PPH-1120', 'GUMH620127CM2', '0018-02-28', 8721.14);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (106, 7211, 'SBR-8425', 'GUMH620127CM2', '0019-06-26', 7205.18);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (554, 3421, 'LOI-7765', 'GUMH620127CM2', '0022-10-10', 2308);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (923, 225, 'CVD-9062', 'GUMH620127CM2', '0019-12-03', 9941.19);
INSERT INTO ACCIDENTE (num_accidente, cve_cliente, placa, rfc_taller, fecha, costo) VALUES (899, 1233, 'MDW-3072', 'GUMH620127CM2', '2009-05-20', 6321.7);

INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (1353, 'SAPM8901119E4', 'GPT-7312', 45, '2022-10-14');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (1915, 'LOJP791104GY7', 'MQZ-4122', 35.65, '2022-11-05');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (3695, 'MEMJ930906289', 'KFJ-9174', 29, '2003-04-15');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (6497, 'FUCS010814QQ9', 'QMH-9841', 33, '2016-12-16');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (7110, 'OISM9802091Y7', 'CXZ-8916', 55, '2021-12-15');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (8795, 'SAAA90081154A', 'GPT-9110', 19, '2019-09-16');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (9323, 'MEEK890222QH3', 'QKP-9801', 21, '2019-11-07');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (6243, 'RAPS9106095410', 'MHK-4566', 22, '2020-08-12');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (9911, 'GASC010305AJ10', 'ERS-7270', 33, '2019-01-30');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (9832, 'SAJD971214L53', 'CSA-7523', 12, '2022-10-14');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (7751, 'SAPM8901119E4', 'XSP-9344', 27, '2022-05-06');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (1246, 'LOJP791104GY7', 'HER-9812', 18, '2022-04-07');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (3351, 'MEMJ930906289', 'LKJ-2348', 44, '2020-03-15');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (8482, 'FUCS010814QQ9', 'ASW-8812', 36, '2021-07-04');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (4431, 'OISM9802091Y7', 'YGY-5433', 98, '2020-09-27');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (81, 'SAAA90081154A', 'PPH-1120', 115, '2018-02-28');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (5932, 'MEEK890222QH3', 'SBR-8425', 74, '2019-06-26');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (6643, 'RAPS9106095410', 'LOI-7765', 52, '2022-10-10');
INSERT INTO TRABAJOS (id, rfc, placa, horas_rep, fecha_rep) VALUES (3245, 'GASC010305AJ10', 'CVD-9062', 86, '2019-12-03');