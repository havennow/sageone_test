# ************************************************************
# Sequel Pro SQL dump
# Versão 4499
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: xguizao (MySQL 5.6.16)
# Base de Dados: sageone
# Tempo de Geração: 2015-11-10 03:42:03 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump da tabela sage_categoria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sage_categoria`;

CREATE TABLE `sage_categoria` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sage_categoria` WRITE;
/*!40000 ALTER TABLE `sage_categoria` DISABLE KEYS */;

INSERT INTO `sage_categoria` (`id`, `nome`)
VALUES
	(1,'Diversos'),
	(2,'Não informado');

/*!40000 ALTER TABLE `sage_categoria` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela sage_fornecedor
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sage_fornecedor`;

CREATE TABLE `sage_fornecedor` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(500) DEFAULT NULL,
  `endereco` varchar(500) DEFAULT NULL,
  `contato` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sage_fornecedor` WRITE;
/*!40000 ALTER TABLE `sage_fornecedor` DISABLE KEYS */;

INSERT INTO `sage_fornecedor` (`id`, `nome`, `endereco`, `contato`)
VALUES
	(1,'Não informado',NULL,NULL),
	(2,'Teste','Rua XV de Novembro 17','teste@gmail.com');

/*!40000 ALTER TABLE `sage_fornecedor` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela sage_produto
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sage_produto`;

CREATE TABLE `sage_produto` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_subcategoria1` int(11) unsigned NOT NULL,
  `unidade` varchar(5) DEFAULT NULL,
  `descricao` text,
  `identificacao` varchar(10) DEFAULT NULL,
  `custo` double(12,2) DEFAULT NULL,
  `preco_venda1` double(12,2) DEFAULT NULL,
  `observacoes` text,
  `id_fornecedor` int(11) unsigned NOT NULL,
  `estoque` int(11) DEFAULT NULL,
  `codbarras` varchar(20) DEFAULT NULL,
  `preco_venda2` double(12,2) DEFAULT NULL,
  `preco_venda3` double(12,2) DEFAULT NULL,
  `estoque_minimo` int(11) DEFAULT NULL,
  `estoque_maximo` int(11) DEFAULT NULL,
  `estoque_compra` int(11) DEFAULT NULL,
  `fator_unidade_venda` varchar(100) DEFAULT NULL,
  `ncm` int(8) DEFAULT NULL,
  `marca` varchar(500) DEFAULT NULL,
  `peso` double DEFAULT NULL,
  `tamanho` double DEFAULT NULL,
  `inativo` int(1) DEFAULT NULL,
  `tipo` varchar(2) DEFAULT NULL,
  `id_subcategoria2` int(11) unsigned NOT NULL,
  `composicao` varchar(100) DEFAULT NULL,
  `materia_prima` varchar(100) DEFAULT NULL,
  `paravenda` double(12,2) DEFAULT NULL,
  `material_expediente` varchar(100) DEFAULT NULL,
  `moeda` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_fornecedor` (`id_fornecedor`),
  KEY `fk_subcategoria1` (`id_subcategoria1`),
  KEY `fk_subcategoria2` (`id_subcategoria2`),
  CONSTRAINT `fk_fornecedor` FOREIGN KEY (`id_fornecedor`) REFERENCES `sage_fornecedor` (`id`),
  CONSTRAINT `fk_subcategoria1` FOREIGN KEY (`id_subcategoria1`) REFERENCES `sage_subcategoria` (`id`),
  CONSTRAINT `fk_subcategoria2` FOREIGN KEY (`id_subcategoria2`) REFERENCES `sage_subcategoria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump da tabela sage_subcategoria
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sage_subcategoria`;

CREATE TABLE `sage_subcategoria` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `id_categoria` int(11) unsigned NOT NULL,
  `nome` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categoria` (`id_categoria`),
  CONSTRAINT `fk_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `sage_categoria` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sage_subcategoria` WRITE;
/*!40000 ALTER TABLE `sage_subcategoria` DISABLE KEYS */;

INSERT INTO `sage_subcategoria` (`id`, `id_categoria`, `nome`)
VALUES
	(2,1,'Diversos'),
	(3,2,'Não informado');

/*!40000 ALTER TABLE `sage_subcategoria` ENABLE KEYS */;
UNLOCK TABLES;


# Dump da tabela sage_user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `sage_user`;

CREATE TABLE `sage_user` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL DEFAULT '',
  `password` varchar(200) NOT NULL DEFAULT '',
  `name` varchar(500) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `sage_user` WRITE;
/*!40000 ALTER TABLE `sage_user` DISABLE KEYS */;

INSERT INTO `sage_user` (`id`, `username`, `password`, `name`)
VALUES
	(1,'sage','sageone','SageOne');

/*!40000 ALTER TABLE `sage_user` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
