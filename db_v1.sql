CREATE DATABASE nicedev90 CHARACTER SET utf8 COLLATE utf8_general_ci;

use nicedev90;

create table roles (
  id INT NOT NULL AUTO_INCREMENT,
  rol VARCHAR(20) NOT NULL,
  PRIMARY KEY (id)
)ENGINE=INNODB;

INSERT INTO roles (rol) VALUES ('admin');
INSERT INTO roles (rol) VALUES ('usuario');

CREATE TABLE usuarios (
	id INT NOT NULL AUTO_INCREMENT,
	rol_id INT NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	email VARCHAR(100) NOT NULL,
	password VARCHAR(100) NOT NULL,
	telefono VARCHAR(40) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
)ENGINE=INNODB;


CREATE TABLE proyectos (
	id INT NOT NULL AUTO_INCREMENT,
	usuario_id INT NOT NULL,
	nombre VARCHAR(50) NOT NULL,
	genero VARCHAR(100) NOT NULL,
	descripcion TEXT NOT NULL,
	autor VARCHAR(100) NOT NULL,
	portada VARCHAR(100) NOT NULL,
	formato VARCHAR(100) NOT NULL,
	estado VARCHAR(40) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
)ENGINE=INNODB;


CREATE TABLE pagos (
	id INT NOT NULL AUTO_INCREMENT,
  usuario_id int(11) NOT NULL,
  proyecto_id int(11) NOT NULL,
  cap_num int(11) NOT NULL,
  monto varchar(10) NOT NULL,
  order_id varchar(50) DEFAULT NULL,
  invoice_id varchar(50) DEFAULT NULL,
  procesador varchar(40) DEFAULT NULL,
  estado varchar(40) NOT NULL,
	fecha TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY (id)
)ENGINE=INNODB;


CREATE TABLE capitulos (
	id INT NOT NULL AUTO_INCREMENT,
	proyecto_id INT NOT NULL,
	cap_num INT NOT NULL,
	titulo VARCHAR(100) NOT NULL,
	subtitulo VARCHAR(100) NOT NULL,
	sinopsis TEXT NOT NULL,
	autor VARCHAR(100) NOT NULL,
	portada VARCHAR(100) NOT NULL,
	paginas INT NOT NULL,
	formato VARCHAR(100) NOT NULL,
	precio DECIMAL(6,2) NOT NULL,
	estado VARCHAR(30) NOT NULL,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id)
)ENGINE=INNODB;

CREATE TABLE autores (
	id INT NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(100) NOT NULL,
	funcion VARCHAR(100) NOT NULL,
	presentacion TEXT NOT NULL,
	imagen VARCHAR(100),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
	PRIMARY KEY(id)
)ENGINE=INNODB;



insert  into `capitulos`(`id`,`proyecto_id`,`cap_num`,`titulo`,`subtitulo`,`sinopsis`,`autor`,`portada`,`paginas`,`formato`,`precio`,`estado`,`created_at`) values 
(1,1,1,'Capitulo 1','El inicio','&quot;Es el d&iacute;a m&aacute;s importante de Liam y est&aacute; esperando en el altar a la mujer con la que escogi&oacute; casarse, el problema es... que ella nunca apareci&oacute;.... Luego de que el dolor lo cambiara para siempre este conoce a una mujer que despierta en el sentimientos los cuales cre&iacute;a olvidados. &iquest;Liam podr&aacute; dejar atr&aacute;s el dolor o los recuerdos de la traici&oacute;n le impedir&aacute;n abrir su coraz&oacute;n una vez m&aacute;s?&quot;','JY Ediciones','img/portadas/after.png',55,'Digital A4',2.50,'publicado','2023-03-30 17:01:07');


insert  into `autores`(`id`,`nombre`,`funcion`,`presentacion`,`imagen`,`created_at`) values 
(1,'Tenshi','Ilustrador','Lorem, ipsum, dolor sit amet consectetur adipisicing elit. Ipsum autem quibusdam harum repellendus officia iusto fugiat porro. Consequatur, eveniet nam unde blanditiis et, architecto error tenetur tempora facere doloremque, officia?',NULL,'2023-03-30 17:01:07');

/*Data for the table `pagos` */

insert  into `pagos`(`id`,`usuario_id`,`proyecto_id`,`cap_num`,`monto`,`order_id`,`invoice_id`,`procesador`,`estado`,`fecha`) values 
(1,1,1,1,'2.50','6NY322460L675472G','invoice_1','paypal','COMPLETED','2023-03-30 19:34:46');

/*Data for the table `proyectos` */

insert  into `proyectos`(`id`,`usuario_id`,`nombre`,`genero`,`descripcion`,`autor`,`portada`,`formato`,`estado`,`created_at`,`updated_at`) values 
(1,1,'After Pain','Romance','&quot;Es el d&iacute;a m&aacute;s importante de Liam y est&aacute; esperando en el altar a la mujer con la que escogi&oacute; casarse, el problema es... que ella nunca apareci&oacute;.... Luego de que el dolor lo cambiara para siempre este conoce a una mujer que despierta en el sentimientos los cuales cre&iacute;a olvidados. &iquest;Liam podr&aacute; dejar atr&aacute;s el dolor o los recuerdos de la traici&oacute;n le impedir&aacute;n abrir su coraz&oacute;n una vez m&aacute;s?&quot;','JY Ediciones','img/portadas/after.png','Digital A4','En Emision','2023-03-30 17:01:06','2023-03-30 20:08:47');


/*Data for the table `usuarios` */

insert  into `usuarios`(`id`,`rol_id`,`nombre`,`email`,`password`,`telefono`,`created_at`,`updated_at`) values 
(1,1,'cesar','cesar@g.com','$2y$10$OSphuj5J.tY6pmJHsFwvEeJcNbWtJ57y00iBXUAnf9JkALysTX992','+51 992819526','2023-03-30 17:02:39','2023-03-30 17:02:39'),
(2,2,'usuario','user@g.com','$2y$10$/FdtT8Wek7yy8z3oU.rLPuZmMnnE//AfH3kG7NlDlKSFl1A3AXKkC','+51 992819526','2023-03-30 17:40:49','2023-03-30 17:40:49');



ALTER TABLE usuarios ADD CONSTRAINT fk_roles FOREIGN KEY (rol_id) REFERENCES roles(id);
ALTER TABLE proyectos ADD CONSTRAINT fk_autor FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
ALTER TABLE pagos ADD CONSTRAINT fk_pago_usuario FOREIGN KEY (usuario_id) REFERENCES usuarios(id);
ALTER TABLE pagos ADD CONSTRAINT fk_pago_proyecto FOREIGN KEY (proyecto_id) REFERENCES proyectos(id);
ALTER TABLE capitulos ADD CONSTRAINT fk_cap_proyecto FOREIGN KEY (proyecto_id) REFERENCES proyectos(id);
