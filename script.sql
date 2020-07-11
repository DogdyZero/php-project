create database livraria;

create table perfil(
    id int PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(50)
);

create table usuario(
    login varchar(100),
    senha varchar(100),
    id int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(100),
    reset boolean,
    idperfil int, 
    FOREIGN KEY(idperfil) references perfil(id)
);

create table estilo(
    id int PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(50)
);

create table livro(
    id int PRIMARY KEY AUTO_INCREMENT,
    titulo varchar(100),
    descricao varchar(100),
    idestilo int, 
    FOREIGN KEY(idestilo) references estilo(id),
    autor varchar(100),
    editora varchar(100),
    paginas int
);

insert into perfil (titulo) values ('admin');
insert into perfil (titulo) values ('cliente');

insert into usuario(login,senha,nome,reset,idperfil)
    select 'admin','e10adc3949ba59abbe56e057f20f883e','admin',1, 
        id from perfil where titulo='admin';
