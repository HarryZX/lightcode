create database codelightdb;
use codelightdb;

create table roles(
	idRol int primary key not null auto_increment,
	rol varchar(20) not null
)Engine=InnoDB;

create table etiquetas(
	idEtiqueta int primary key not null auto_increment,
	Categoria varchar(115) not null
)Engine=InnoDB;

create table usuarios(
	idUsuario int primary key not null auto_increment,
	nombre varchar(75) not null,
	credencial varchar(30) not null,
	telefono varchar(15),
	correo varchar(200) not null,
	fechaNacimiento date not null,
	imagen varchar(70),
	idRol int not null,
	foreign key (idRol) references roles(idRol)
)Engine=InnoDB;

create table publicaciones(
	idPublicacion int primary key not null auto_increment,
	Titulo varchar(100) not null,
	fecha date not null,
	imagen varchar(70) not null,
	contenido mediumtext not null,
	idUsuario int not null,
	idEtiqueta int not null,
	foreign key (idUsuario) references usuarios(idUsuario),
	foreign key (idEtiqueta) references etiquetas(idEtiqueta)
)Engine=InnoDB;

create table comentarios(
	idComentario int primary key not null auto_increment,
	contenido varchar(200) not null,
	idUsuario int not null,
	idPublicacion int not null,
	foreign key (idUsuario) references usuarios(idUsuario),
	foreign key (idPublicacion) references publicaciones(idPublicacion)
)Engine=InnoDB;

create table puntajes(
	idPuntaje int primary key not null auto_increment,
	positivo smallint,
	negativo smallint,
	idPublicacion int not null,
	foreign key (idPublicacion) references publicaciones(idPublicacion)
)Engine=InnoDB;
