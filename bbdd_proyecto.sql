-------------------------
-- CREACIÓN DE LA BBDD --
-------------------------
create database if not exists proyectodaw;
-- create user if not exists miniproyecto;
use proyectodaw;


------------------------
-- CREACIÓN DE TABLAS --
------------------------

-- Usuarios
create table if not exists usuario(
	id_usuario int auto_increment,
    username varchar(100) unique not null,
    email varchar(100) unique not null,
    pass varchar(100) not null,
    tipo_usuario int not null,
    nombre varchar(100),
    apellido1 varchar(100),
    apellido2 varchar(100),
    fechaRegistro date DEFAULT current_timestamp(),
    PRIMARY KEY (id_usuario)
);

-- Dirección
create table if not exists direccion(
	id_direccion int auto_increment,
    id_usuario int not null,
    calle varchar(255),
    numero int,
    piso int,
    letra varchar(10) ,
    codigoPostal int not null,
    ciudad varchar(255) not null,
    PRIMARY KEY (id_direccion),
    FOREIGN KEY (id_usuario) REFERENCES usuario(id_usuario) ON DELETE CASCADE
);


-- Categorías
create table if not exists categoria(
	id_categoria int auto_increment,
    nombre_categoria varchar(100) not null,
    PRIMARY KEY (id_categoria)
);

-- Productos
create table if not exists producto(
	id_producto int auto_increment,
    nombre_producto varchar(70) not null,
    descripcion varchar(350) not null,
    imagen longblob,
    precio float not null,
    categoria int not null,
    enventa enum('0', '1'), -- 0/false | 1/true 
    estado enum('1', '2', '3', '4', '5'), -- 1-Nuevo |2-Semi Nuevo |3-En buen estado |4-En condiciones aceptables |5-Necesita reparación
    propietario int not null,
    comprador int,
    fecha date DEFAULT current_timestamp(),
    fechaVenta date,
    codigoVenta varchar(12),
    estadoVenta enum('1', '2', '3', '4', '5' ), -- 1-En proceso de envío |2-Enviado |3-Recibido |4-Cancelado | 5-Devuelto,
    PRIMARY KEY (id_producto),
    FOREIGN KEY (propietario) REFERENCES usuario(id_usuario) ON DELETE CASCADE,
    FOREIGN KEY (comprador) REFERENCES usuario(id_usuario) ON DELETE SET NULL,
    FOREIGN KEY (categoria) REFERENCES categoria(id_categoria)
);


-------------------------
-- INSERCIÓN DE CAMPOS --
-------------------------

-- Usuarios
INSERT INTO usuario(username, nombre, apellido1, apellido2, email, pass, tipo_usuario) VALUES
('Admin1', 'Ángeles', 'Córdoba', 'García', 'adm1@admin.com', '1234', 0),
('Admin2', 'María', 'García', 'Consuegra', 'adm2@admin.com', '1234', 0),
('User1', 'User', 'Usuario', 'Web', 'user1@user.com', '1234', 0),
('Angela', 'Ángela', 'Córdoba', 'López', 'angela.cordoba@mail.com', '1234', 1),
('DaniFdz','Daniel', 'Fernández', 'García','daniel.fernandez@mail.com', 'abc123', 1),
('Jorge','Jorge', 'Rodríguez', '','jorge.rodriguez@mail.com', 'qwerty', 1),
('Alberto','Alberto', 'Martínez', '','alberto.martinez@mail.com', 'contraseña', 1),
('MarGar','Maria', 'García', '','maria.garcia@mail.com', '123456', 1),
('Josemaria', 'José María', 'Fernández', 'García', 'josemaria@mail.com', '1234', 1),
('Lucas88', 'Lucas', 'González', 'Ruíz', 'lucas88@mail.com', '1234', 1),
('Ana_r', 'Ana', 'Ramírez', 'Martínez', 'ana_r@mail.com', '1234', 1),
('Julio_g', 'Julio', 'Gutiérrez', 'Sánchez', 'julio_g@mail.com', '1234', 1),
('Mariapaz', 'María Paz', 'López', 'Pérez', 'mariapaz@mail.com', '1234', 1),
('Robertogm', 'Roberto', 'Gómez', 'Molina', 'robertogm@mail.com', '1234', 1),
('Lauras', 'Laura', 'Sanz', 'Hernández', 'lauras@mail.com', '1234', 1),
('Josefina', 'Josefina', 'Cano', 'Álvarez', 'josefina@mail.com', '1234', 1),
('Javierm', 'Javier', 'Martín', 'Romero', 'javierm@mail.com', '1234', 1),
('Danielar', 'Daniela', 'Rivas', 'García', 'danielar@mail.com', '1234', 1),
('Pabloj', 'Pablo', 'Jiménez', 'Moreno', 'pabloj@mail.com', '1234', 1),
('Sofiag', 'Sofía', 'García', 'Rodríguez', 'sofiag@mail.com', '1234', 1),
('Lucasr', 'Lucas', 'Rodríguez', 'García', 'lucasr@mail.com', '1234', 1),
('Veronicac', 'Verónica', 'Cortés', 'Sánchez', 'veronicac@mail.com', '1234', 1),
('Isabelh', 'Isabel', 'Hernández', 'González', 'isabelh@mail.com', '1234', 1);

-- Direcciones
INSERT INTO direccion(id_usuario, calle, numero, piso, letra, codigoPostal, ciudad) VALUES
(1, 'Calle Mayor', 5, 1, 'A', 28013, 'Madrid'),
(2, 'Calle San Vicente', 10, 2, 'B', 18002, 'Granada'),
(3, 'Calle del Carmen', 15, 3, 'C', 46003, 'Valencia'),
(4, 'Calle Marqués de Larios', 20, 4, 'D', 29005, 'Málaga'),
(5, 'Calle Alcalá', 25, 5, 'E', 28009, 'Madrid'),
(6, 'Calle Gran Vía', 30, 6, 'F', 48001, 'Bilbao'),
(7, 'Calle Cádiz', 35, 7, 'G', 11008, 'Cádiz'),
(8, 'Calle Sierpes', 40, 8, 'H', 41004, 'Sevilla'),
(9, 'Calle Alfonso I', 45, 9, 'I', 50003, 'Zaragoza'),
(10, 'Calle Real', 50, 10, 'J', 11001, 'Cádiz'),
(11, 'Calle San Francisco', 55, 11, 'K', 02001, 'Albacete'),
(12, 'Calle Mayor', 60, 12, 'L', 13001, 'Ciudad Real'),
(13, 'Calle del Sol', 65, 13, 'M', 23001, 'Jaén'),
(14, 'Calle de la Estación', 70, 14, 'N', 18012, 'Granada'),
(15, 'Calle Larios', 75, 15, 'O', 29001, 'Málaga');

-- Categoría
INSERT INTO categoria(nombre_categoria) VALUES 
('Instrumentos'),
('Música'),
('Firmado'),
('Ropa'),
('Complementos'),
('Hogar'),
('Otros');

-- Productos en venta
INSERT INTO producto(nombre_producto, descripcion, imagen, precio, categoria, enventa, estado, propietario) VALUES 
('Camiseta AC/DC', 'Camiseta negra con el logo de AC/DC en la parte frontal', null, 20, 4, '1', 1, 4),
('Guitarra eléctrica Fender Stratocaster', 'Guitarra eléctrica Fender Stratocaster modelo American Standard, color sunburst', null, 1500, 1, '1', 2, 2),
('Disco de vinilo The Beatles - Abbey Road', 'Edición especial del disco de vinilo Abbey Road de The Beatles, remasterizado', null, 29.99, 2, '1', 1, 3),
('Póster Guns N Roses', 'Póster en formato grande con la imagen de la banda Guns N Roses en directo', null, 9, 6, '1', 1, 5),
('Set de baquetas para batería', 'Set de baquetas para batería modelo 5A, marca Vic Firth', null, 12.99, 1,'1', 1, 1),
('Figura Funko Pop! Freddie Mercury', 'Figura coleccionable Funko Pop! de Freddie Mercury con su icónico traje amarillo', null, 15, 7, '1', 1, 6),
('Guitarra acústica Yamaha FG820', 'Guitarra acústica Yamaha FG820, acabado natural', null, 430, 1, '1', 1, 2),
('CD Pink Floyd - The Wall', 'CD remasterizado de la mítica banda Pink Floyd con su disco The Wall', null, 12, 2, '1', 1, 5),
('Bufanda AC/DC', 'Bufanda negra con el logo de AC/DC en blanco', null, 15.99, 5, '1', 1, 3),
('Batería electrónica Yamaha DTX432K', 'Batería electrónica Yamaha DTX432K, con 10 kits de batería y 415 voces', null, 650, 1, '1', 1, 4),
('Sudadera Metallica', 'Sudadera negra con el logo de Metallica en la parte frontal', null, 30, 4,'1', 1, 2),
('LP David Bowie - Ziggy Stardust', 'LP del disco Ziggy Stardust de David Bowie, edición especial de aniversario', null, 24.30, 2, '1', 1, 6),
('Set de guitarra eléctrica para principiantes', 'Set de guitarra eléctrica para principiantes, incluye guitarra, amplificador, afinador y accesorios', null, 220, 1, '1', 1, 3),
('Póster Queen', 'Póster en formato grande con la imagen de la banda Queen en directo', null, 8.50, 6, '1', 1, 5),
('CD Led Zeppelin - IV', 'CD remasterizado de la legendaria banda Led Zeppelin con su disco IV', null, 10, 2, '1', 3, 3),
('Guitarra eléctrica firmada por Steve Vai', 'Guitarra eléctrica modelo JEM7V firmada por el legendario guitarrista Steve Vai. Incluye estuche rígido y certificado de autenticidad.', NULL, 2000, 3, '1', '1', 2),
('Poster autografiado por Robert Plant', 'Poster tamaño 50x70cm con la imagen de la portada del album Led Zeppelin IV autografiado por el vocalista Robert Plant.', NULL, 50, 3, '1', '1', 3),
('Disco de vinilo autografiado por David Bowie', 'Vinilo edición limitada del álbum Hunky Dory firmado por el icónico músico David Bowie. Incluye certificado de autenticidad.', NULL, 150, 3, '1', '1', 4),
('Libro autografiado por Bruce Springsteen', 'Libro "Born to Run" de Bruce Springsteen autografiado por el cantante. Edición especial con cubierta dura y marcador de página.', NULL, 75, 3, '1', '1', 5),
('Fotografía autografiada por John Lennon', 'Fotografía en blanco y negro de John Lennon autografiada por el músico. Tamaño 30x40cm.', NULL, 100, 3, '1', '1', 2),
('Guitarra acústica firmada por Taylor Swift', 'Guitarra acústica modelo GS Mini firmada por la cantante Taylor Swift. Incluye estuche rígido y certificado de autenticidad.', NULL, 1500, 3, '1', '1', 3),
('Guitarra eléctrica Fender Stratocaster', 'Guitarra eléctrica Fender Stratocaster en excelente estado, ideal para tocar rock, blues y pop', NULL, 850.00, 1, '1', '2', 1),
('Amplificador Marshall JCM900', 'Amplificador de guitarra Marshall JCM900, en buenas condiciones', NULL, 750.00, 1, '1', '3', 2),
('Batería acústica Tama', 'Batería acústica Tama con platillos Zildjian, en perfecto estado', NULL, 1200.00, 1, '1', '1', 3),
('Teclado Yamaha PSR-S970', 'Teclado Yamaha PSR-S970 con estuche y soporte, en muy buen estado', NULL, 1200.00, 1, '1', '2', 4),
('Vinilo de Queen - Greatest Hits', 'Vinilo de Queen - Greatest Hits en perfecto estado, incluye portada y encarte', NULL, 30.00, 2, '1', '1', 5),
('Poster de Nirvana', 'Poster de Nirvana de edición limitada, enmarcado y en excelentes condiciones', NULL, 20.00, 2, '1', '2', 6),
('Playera de Metallica', 'Playera negra de Metallica con logo del grupo, talla M, en buen estado', NULL, 15.00, 3, '1', '3', 7),
('Taza de AC/DC', 'Taza negra de AC/DC con logo de la banda, en excelente estado', NULL, 10.00, 4, '1', '1', 8),
('Póster de Led Zeppelin', 'Póster de Led Zeppelin de edición limitada, enmarcado y en excelentes condiciones', NULL, 25.00, 2, '1', '4', 9),
('Libro de Jimi Hendrix', 'Libro biográfico de Jimi Hendrix, en buen estado', NULL, 15.00, 5, '1', '2', 10),
('Guitarra acústica Gibson', 'Guitarra acústica Gibson en excelente estado, con estuche rígido', NULL, 1500.00, 1, '1', '1', 11),
('Set de platillos Sabian B8', 'Set de platillos Sabian B8 en muy buen estado, incluye hi-hat, crash y ride', NULL, 200.00, 1, '1', '3', 12),
('Playera de Guns N Roses', 'Playera blanca de Guns N Roses con logo del grupo, talla L, en buen estado', NULL, 10.00, 3, '1', '5', 13),
('Poster de Pink Floyd', 'Poster de Pink Floyd de edición limitada, enmarcado y en excelentes condiciones', NULL, 30.00, 2, '1', '2', 14),
('Libro de Kurt Cobain', 'Libro biográfico de Kurt Cobain, en muy buen estado', NULL, 18.00, 5, '1', '1', 15);