drop database photo_here;

create database photo_here
default charset utf8
default collate utf8_general_ci;

use photo_here;

CREATE TABLE `cliente` (
  `idCliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sobreNome` varchar(45) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `senha` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  PRIMARY KEY(idCliente)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `fotografo` (
  `idFotografo` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(45) NOT NULL,
  `sobreNome` varchar(45) NOT NULL,
  `usuario` varchar(45) NOT NULL,
  `senha` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cep` varchar(10),
  `apresentação` varchar(255),
  `intagram` varchar(55),
  `facebook` varchar(55),
  `whats` varchar(30),
  PRIMARY KEY(idFotografo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `Ensaio` (
  `idEnsaio` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `etapa` int(11) NOT NULL,
  `avaliacao`int(11),
  `cliente` int(11),
  `fotografo` int(11),
  PRIMARY KEY(idEnsaio),
  FOREIGN KEY(cliente) REFERENCES cliente(idCliente),
  FOREIGN KEY(fotografo) REFERENCES fotografo(idFotografo)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;