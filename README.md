Projeto proprio executado como exercicio.
# Crud-images-PHP
Upload image com php. html, css e mysql
upload apenas de imagens JPG.
obs: Foi modificado arquivo php.ini , para possibilitar upload de arquivos de imagem até 6 M
upload_max_filesize = 6M

#Sql referente aos exemplos usados de produto:

CREATE table tb_unit(
desid INT auto_increment NOT NULL,
desnome varchar(50),
desinfo varchar(100),
desval  dec(10,2),
CONSTRAINT pk_unit PRIMARY KEY(desid));

CREATE TABLE tb_post(
desid int NOT NULL,
idimg int auto_increment not null,
CONSTRAINT pK_post PRIMARY KEY (idimg),
CONSTRAINT fk_unit_post foreign key(desid) REFERENCES tb_unit(desid));

obs: O "produto" só sera deletado quando todas imagens referente ao mesmo forem excluidas
