-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.1.19-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win32
-- HeidiSQL Versão:              9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para rhsys
CREATE DATABASE IF NOT EXISTS `rhsys` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `rhsys`;

-- Copiando estrutura para tabela rhsys.cad_absenteismo
CREATE TABLE IF NOT EXISTS `cad_absenteismo` (
  `id_absenteismo` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_funcionario` smallint(6) DEFAULT NULL,
  `id_medico` smallint(6) DEFAULT NULL,
  `cid` int(11) DEFAULT NULL,
  `tipo_abs` varchar(50) DEFAULT NULL,
  `tipo_doc` varchar(50) DEFAULT NULL,
  `data_inicio` datetime DEFAULT NULL,
  `data_final` datetime DEFAULT NULL,
  `cad_observacao` varchar(500) DEFAULT NULL,
  `tipo_afastamento` varchar(20) DEFAULT NULL,
  `arquivo_nome` varchar(50) DEFAULT NULL,
  `arquivo_upload` varchar(50) DEFAULT NULL,
  `tamanho_upload` int(20) DEFAULT NULL,
  `data_upload` datetime DEFAULT NULL,
  PRIMARY KEY (`id_absenteismo`),
  KEY `FK_CAD_ABSENTEISMO_CAD_FUNCIONARIO` (`id_funcionario`),
  KEY `FK_CAD_ABSENTEISMO_CAD_MEDICO` (`id_medico`),
  CONSTRAINT `FK_CAD_ABSENTEISMO_CAD_FUNCIONARIO` FOREIGN KEY (`id_funcionario`) REFERENCES `cad_funcionario` (`id_funcionario`),
  CONSTRAINT `FK_CAD_ABSENTEISMO_CAD_MEDICO` FOREIGN KEY (`id_medico`) REFERENCES `cad_medico` (`id_medico`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela rhsys.cad_absenteismo: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_absenteismo` DISABLE KEYS */;
INSERT INTO `cad_absenteismo` (`id_absenteismo`, `id_funcionario`, `id_medico`, `cid`, `tipo_abs`, `tipo_doc`, `data_inicio`, `data_final`, `cad_observacao`, `tipo_afastamento`, `arquivo_nome`, `arquivo_upload`, `tamanho_upload`, `data_upload`) VALUES
	(33, 1, 1, 0, 'absenteismo_medico', 'atestado', '1994-08-01 19:59:04', '1995-08-01 19:59:04', '                 Teste de update              ', 'luto', 'soft-livre-direito-autoral.pdf', '../uploads/atestados/1494370745.pdf', 149200, '2017-05-09 19:59:04'),
	(34, 2, 2, 0, 'absenteismo_medico', 'atestado', '1994-08-01 19:45:58', '1994-08-01 19:45:58', '\r\n              ', 'nupcias', 'Tese_fernando_correa.pdf', '../uploads/atestados/1494369959.pdf', 0, '2017-05-09 19:45:58'),
	(35, 2, 2, 0, 'absenteismo_medico', 'atestado', '1994-08-01 19:46:44', '1994-08-01 19:46:44', '\r\n              ', 'nupcias', 'Tese_fernando_correa.pdf', '../uploads/atestados/1494370005.pdf', 0, '2017-05-09 19:46:44'),
	(36, 2, 2, 0, 'absenteismo_odontologico', 'atestado', '1994-08-01 19:49:53', '1994-08-01 19:49:53', '\r\n              ', 'luto', 'Tese_fernando_correa.pdf', '../uploads/atestados/1494370194.pdf', 0, '2017-05-09 19:49:53');
/*!40000 ALTER TABLE `cad_absenteismo` ENABLE KEYS */;

-- Copiando estrutura para tabela rhsys.cad_campus
CREATE TABLE IF NOT EXISTS `cad_campus` (
  `id_campus` smallint(6) NOT NULL AUTO_INCREMENT,
  `dsc_campus` varchar(100) DEFAULT NULL,
  `id_cidade` smallint(6) DEFAULT NULL,
  `id_estado` smallint(6) DEFAULT NULL,
  PRIMARY KEY (`id_campus`),
  KEY `FK_CAD_CAMPUS_CAD_CIDADE` (`id_cidade`),
  KEY `FK_CAD_CAMPUS_CAD_ESTADO` (`id_estado`),
  CONSTRAINT `FK_CAD_CAMPUS_CAD_CIDADE` FOREIGN KEY (`id_cidade`) REFERENCES `cad_cidade` (`id_cidade`),
  CONSTRAINT `FK_CAD_CAMPUS_CAD_ESTADO` FOREIGN KEY (`id_estado`) REFERENCES `cad_estado` (`id_uf`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela rhsys.cad_campus: ~5 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_campus` DISABLE KEYS */;
INSERT INTO `cad_campus` (`id_campus`, `dsc_campus`, `id_cidade`, `id_estado`) VALUES
	(1, '', 3, 5),
	(3, '', 1, 1),
	(4, '', 10, 18),
	(5, 'teste updatecampus', 146, 19),
	(6, 'teste insert campus', 1041, 19);
/*!40000 ALTER TABLE `cad_campus` ENABLE KEYS */;

-- Copiando estrutura para tabela rhsys.cad_cargo
CREATE TABLE IF NOT EXISTS `cad_cargo` (
  `id_cargo` smallint(6) NOT NULL AUTO_INCREMENT,
  `id_setor` smallint(6) DEFAULT NULL,
  `dsc_cargo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_cargo`),
  KEY `FK_CAD_CARGO_CAD_SETOR` (`id_setor`),
  CONSTRAINT `FK_CAD_CARGO_CAD_SETOR` FOREIGN KEY (`id_setor`) REFERENCES `cad_setor` (`id_setor`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela rhsys.cad_cargo: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_cargo` DISABLE KEYS */;
INSERT INTO `cad_cargo` (`id_cargo`, `id_setor`, `dsc_cargo`) VALUES
	(1, 1, 'Cargo 1 do Setor 1'),
	(2, 1, 'Cargo 2 do setor 1'),
	(3, 1, 'teste'),
	(4, 2, 'Teste cargo Alterado'),
	(5, 5, 'teste update'),
	(6, 3, 'Novo Cargo Alterado');
/*!40000 ALTER TABLE `cad_cargo` ENABLE KEYS */;

-- Copiando estrutura para tabela rhsys.cad_cid
CREATE TABLE IF NOT EXISTS `cad_cid` (
  `id_cid` int(11) NOT NULL AUTO_INCREMENT,
  `dsc_cid` varchar(50) NOT NULL DEFAULT '0',
  `cod_cid` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_cid`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela rhsys.cad_cid: ~3 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_cid` DISABLE KEYS */;
INSERT INTO `cad_cid` (`id_cid`, `dsc_cid`, `cod_cid`) VALUES
	(1, 'diarreia', 1),
	(2, 'diabete', 2),
	(3, 'ataque cardiaco', 3);
/*!40000 ALTER TABLE `cad_cid` ENABLE KEYS */;

-- Copiando estrutura para tabela rhsys.cad_cidade
CREATE TABLE IF NOT EXISTS `cad_cidade` (
  `id_cidade` smallint(6) NOT NULL AUTO_INCREMENT,
  `nome_cidade` varchar(100) NOT NULL,
  `cod_uf` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id_cidade`)
) ENGINE=InnoDB AUTO_INCREMENT=5569 DEFAULT CHARSET=latin1;

-- Copiando dados para a tabela rhsys.cad_cidade: ~5.568 rows (aproximadamente)
/*!40000 ALTER TABLE `cad_cidade` DISABLE KEYS */;
INSERT INTO `cad_cidade` (`id_cidade`, `nome_cidade`, `cod_uf`) VALUES
	(1, 'Abadia de Goiás', 'GO'),
	(2, 'Abadia dos Dourados', 'MG'),
	(3, 'Abadiânia', 'GO'),
	(4, 'Abaeté', 'MG'),
	(5, 'Abaetetuba', 'PA'),
	(6, 'Abaiara', 'CE'),
	(7, 'Abaíra', 'BA'),
	(8, 'Abaré', 'BA'),
	(9, 'Abatiá', 'PR'),
	(10, 'Abdon Batista', 'SC'),
	(11, 'Abel Figueiredo', 'PA'),
	(12, 'Abelardo Luz', 'SC'),
	(13, 'Abre Campo', 'MG'),
	(14, 'Abreu e Lima', 'PE'),
	(15, 'Abreulândia', 'TO'),
	(16, 'Acaiaca', 'MG'),
	(17, 'Açailândia', 'MA'),
	(18, 'Acajutiba', 'BA'),
	(19, 'Acará', 'PA'),
	(20, 'Acarape', 'CE'),
	(21, 'Acaraú', 'CE'),
	(22, 'Acari', 'RN'),
	(23, 'Acauã', 'PI'),
	(24, 'Aceguá', 'RS'),
	(25, 'Acopiara', 'CE'),
	(26, 'Acorizal', 'MT'),
	(27, 'Acrelândia', 'AC'),
	(28, 'Acreúna', 'GO'),
	(29, 'Açu', 'RN'),
	(30, 'Açucena', 'MG'),
	(31, 'Adamantina', 'SP'),
	(32, 'Adelândia', 'GO'),
	(33, 'Adolfo', 'SP')