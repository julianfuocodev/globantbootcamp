/*-- Creo una base de datos en SQL --*/



/*-- Name --*/
CREATE DATABASE testing3;
USE testing3;



/*--Tabla usuarios -------------------------------------------------------*/

CREATE TABLE usuarios(

id              int(255) auto_increment not null,
nombre          varchar(100) not null,
apellidos       varchar(255),
email           varchar(255) not null,
password        varchar(255) not null,
rol             varchar(20),
imagen          varchar(255),

CONSTRAINT pk_usuarios PRIMARY KEY(id),
CONSTRAINT uq_email UNIQUE(email)  
)ENGINE=InnoDb;

/*-- agrego el primer usuario --*/
INSERT INTO usuarios VALUES(NULL, 'Admin', 'Admin', 'admin@admin.com', '1234', 'admin', null);



/*--Tabla categorias -------------------------------------------------------*/

CREATE TABLE categorias(

id              int(255) auto_increment not null,
nombre          varchar(100) not null,

CONSTRAINT pk_categorias PRIMARY KEY(id) 

)ENGINE=InnoDb;

/*-- agrego las primeras categorias --*/

INSERT INTO categorias VALUES(null, 'Nike');
INSERT INTO categorias VALUES(null, 'Adidas');
INSERT INTO categorias VALUES(null, 'Reebook');
INSERT INTO categorias VALUES(null, 'Topper');



/*--Tabla productos -------------------------------------------------------*/

CREATE TABLE productos(

id              int(255) auto_increment not null,
categoria_id    int(255) not null,
nombre          varchar(100) not null,
descripcion     text,
precio          float(100,2) not null,
stock           int(255) not null,
oferta          varchar(2),
fecha           date not null,
imagen          varchar(255),

CONSTRAINT pk_categorias PRIMARY KEY(id),
CONSTRAINT fk_producto_categoria FOREIGN KEY(categoria_id) REFERENCES categorias(id)

)ENGINE=InnoDb;

/*-- agrego los primeros productos --*/

INSERT INTO productos VALUES(NULL, 1,"zapatilla Nike 1", 'descripcion random', 7800, 20, NULL, 1/3 ,"nike1.png" );
INSERT INTO productos VALUES(NULL, 1,"zapatilla Nike 2", 'descripcion random', 6500, 15, NULL, 1/3 ,"nike2.png" );
INSERT INTO productos VALUES(NULL, 2,"zapatilla Adidas 1", 'descripcion random', 10000, 10, NULL, 1/3 ,"adidas1.png" );
INSERT INTO productos VALUES(NULL, 2,"zapatilla Adidas 2", 'descripcion random', 5000, 10, NULL, 1/3 ,"adidas2.png" );
INSERT INTO productos VALUES(NULL, 3,"zapatilla Reebook 1", 'descripcion random', 7000, 15, NULL, 1/3 ,"reebook1.png" );
INSERT INTO productos VALUES(NULL, 3,"zapatilla Reebook 2", 'descripcion random', 5500, 20, NULL, 1/3 ,"reebook2.png" );
INSERT INTO productos VALUES(NULL, 4,"zapatilla Topper 1", 'descripcion random', 4000, 20, NULL, 1/3 ,"topper1.png" );
INSERT INTO productos VALUES(NULL, 4,"zapatilla Topper 2", 'descripcion random', 2500, 5, NULL, 1/3 ,"topper2.png" );


/*--Tabla pedidos -------------------------------------------------------*/

CREATE TABLE pedidos(

id              int(255) auto_increment not null,
usuario_id      int(255) not null,
provincia       varchar(100) not null,
localidad       varchar(100) not null,
direccion       varchar(255) not null,
coste           float(200,2) not null,
estado          varchar(20) not null,
fecha           date,
hora            time,

CONSTRAINT pk_pedidos PRIMARY KEY(id),
CONSTRAINT fk_pedido_usuario FOREIGN KEY(usuario_id) REFERENCES usuarios(id)

)ENGINE=InnoDb;



/*--Tabla linkeo de pedidos -------------------------------------------------------*/

CREATE TABLE lineas_pedidos(

id              int(255) auto_increment not null,
pedido_id       int(255) not null,
producto_id     int(255) not null,
unidades        int(255) not null,

CONSTRAINT pk_lineas_pedidos PRIMARY KEY(id),
CONSTRAINT fk_linea_pedido FOREIGN KEY(pedido_id) REFERENCES pedidos(id),
CONSTRAINT fk_linea_producto FOREIGN KEY(producto_id) REFERENCES productos(id)

)ENGINE=InnoDb;




