CREATE TABLE tb_usuarios_usu
(id INTEGER PRIMARY KEY  AUTOINCREMENT,
nome varchar(255) not null,
email varchar(50) not null,
senha varchar(50) not null
);
INSERT INTO tb_usuarios_usu(nome, email, senha) values ('Bruce Wayne', 'bruce@waynetech.com', 'morcego');
INSERT INTO tb_usuarios_usu(nome, email, senha) values ('Clark Kent', 'kent@dailyplanet.com', 'krypton');
INSERT INTO tb_usuarios_usu(nome, email, senha) values ('Hal Jordan', 'jordan@ferris.com', 'oa');
INSERT INTO tb_usuarios_usu(nome, email, senha) values ('Barry Allen', 'barry_allen@ccpd.com', 'velocidade');