-- MySQL dump 10.16  Distrib 10.2.16-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: u289875908_game
-- ------------------------------------------------------
-- Server version	10.2.16-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `artista`
--

DROP TABLE IF EXISTS `artista`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `artista` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` longtext NOT NULL,
  `est_musical` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `artista`
--

/*!40000 ALTER TABLE `artista` DISABLE KEYS */;
INSERT INTO `artista` VALUES (1,'Iron Maiden','Iron Maiden é uma banda britânica de heavy metal, formada em 19751 pelo baixista Steve Harris, ex-integrante das bandas Gypsy\'s Kiss e Smiler. Originária de Londres, foi uma das principais bandas do movimento musical que ficou conhecido como NWOBHM (New Wave of British Heavy Metal). O nome \"Iron Maiden\", homônimo de um instrumento de tortura medieval que aparece no filme O Homem da Máscara de Ferro, foi baseado na obra de Alexandre Dumas.  Com quase quatro décadas de existência, quinze álbuns de estúdio, seis álbuns ao vivo, quatorze vídeos e diversos compactos, o Iron Maiden é uma das mais importantes e bem sucedidas bandas de toda a história do heavy metal, tendo vendido mais de 100 milhões de álbuns registrados em todo o mundo.2 Seu trabalho influenciou diversas bandas de rock e metal. São citados como influência por diversas bandas, antigas e modernas.  Em 2002, a banda recebeu o prêmio Ivor Novello em reconhecimento às realizações em um parâmetro internacional como uma das mais bem-sucedidas parcerias de composição da Inglaterra. Durante a turnê americana de 2005, foi adicionada à Calçada da Fama do Rock de Hollywood.3 Em 2011, ganharam seu primeiro Grammy por \"El Dorado\".4 A banda também está presente nas principais listas de maiores bandas de rock de todos os tempos, assim, sendo considerada pela MTV a maior banda de heavy metal de todos os tempos.5  O Maiden já encabeçou diversos grandes eventos, entre eles Rock in Rio, Monsters of Rock em Donington, Ozzfest, Wacken Open Air, Gods of Metal, Download Festival e os Festivais de Reading e Leeds.6',1),(2,'AC DC','ac dc',3),(3,'Immortal','Immortal',5);
/*!40000 ALTER TABLE `artista` ENABLE KEYS */;

--
-- Table structure for table `batalhas`
--

DROP TABLE IF EXISTS `batalhas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `batalhas` (
  `deid` int(32) NOT NULL,
  `simples` int(32) NOT NULL,
  `completa` int(32) NOT NULL,
  PRIMARY KEY (`deid`),
  UNIQUE KEY `deid` (`deid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `batalhas`
--

/*!40000 ALTER TABLE `batalhas` DISABLE KEYS */;
INSERT INTO `batalhas` VALUES (1,1510051231,1510051685),(2,1466520209,1465346901),(4,1465485618,1466431733),(6,1504093340,1504093580);
/*!40000 ALTER TABLE `batalhas` ENABLE KEYS */;

--
-- Table structure for table `cartas`
--

DROP TABLE IF EXISTS `cartas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cartas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `artista` int(11) NOT NULL,
  `est_musical` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `qtd_vendas` int(11) NOT NULL,
  `pts` int(11) NOT NULL,
  `qtd_fas` int(11) NOT NULL,
  `tip` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cartas`
--

/*!40000 ALTER TABLE `cartas` DISABLE KEYS */;
INSERT INTO `cartas` VALUES (1,'Iron Maiden',1,1,1980,1500,200,2000,1,3000,'maiden.jpg'),(2,'Killers',1,1,1981,1000,210,1800,1,2850,'killers.jpg'),(3,'Back In Black',2,4,1980,51000,6000,55000,1,25000,'ff1f686d7aec2bfd5661e225736389a6.jpg'),(4,'The Number Of The Beast',1,1,1982,15000,560,40000,1,8500,'4c08aa987f06a1e297f27ff06d0d89e9.jpg'),(5,'At Heart Of The Winter',3,5,1999,6566,650,7800,1,4500,'e189229d30ffa55d9026483dd1321fb4.jpg');
/*!40000 ALTER TABLE `cartas` ENABLE KEYS */;

--
-- Table structure for table `contato`
--

DROP TABLE IF EXISTS `contato`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `contato` (
  `deid` int(255) NOT NULL,
  `cotid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `contato`
--

/*!40000 ALTER TABLE `contato` DISABLE KEYS */;
INSERT INTO `contato` VALUES (1,0),(1,1),(1,2),(2,1),(2,0),(3,4),(3,2),(6,3);
/*!40000 ALTER TABLE `contato` ENABLE KEYS */;

--
-- Table structure for table `ee`
--

DROP TABLE IF EXISTS `ee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `ee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `ganho` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `tip` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ee`
--

/*!40000 ALTER TABLE `ee` DISABLE KEYS */;
INSERT INTO `ee` VALUES (1,'EAST WEST',5,1000,1,'98fe39d95afab7a8e7d65ccb76a93bff.jpg'),(2,'SUNSET SOUND',10,1500,1,'sunset.jpg'),(3,'CAPITOL RECORDS',15,2000,1,'capital.jpg'),(4,'ABBEY ROAD',25,3000,1,'abbey.jpeg');
/*!40000 ALTER TABLE `ee` ENABLE KEYS */;

--
-- Table structure for table `est_musical`
--

DROP TABLE IF EXISTS `est_musical`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `est_musical` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `est_musical`
--

/*!40000 ALTER TABLE `est_musical` DISABLE KEYS */;
INSERT INTO `est_musical` VALUES (1,'Heavy Metal'),(2,'Thrash Metal'),(3,'Hard Rock'),(4,'Rock'),(5,'Black Metal');
/*!40000 ALTER TABLE `est_musical` ENABLE KEYS */;

--
-- Table structure for table `gostar`
--

DROP TABLE IF EXISTS `gostar`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `gostar` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_post` int(255) DEFAULT NULL,
  `id_repost` int(255) DEFAULT NULL,
  `id_us` int(255) NOT NULL,
  `gostei` tinyint(1) NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `gostar`
--

/*!40000 ALTER TABLE `gostar` DISABLE KEYS */;
INSERT INTO `gostar` VALUES (1,1,NULL,1,1,'2016-06-21 01:06:03'),(2,2,NULL,6,1,'2017-08-30 14:08:19'),(3,NULL,2,6,0,'2017-08-30 14:08:44');
/*!40000 ALTER TABLE `gostar` ENABLE KEYS */;

--
-- Table structure for table `links`
--

DROP TABLE IF EXISTS `links`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `links` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_us` int(255) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `links`
--

/*!40000 ALTER TABLE `links` DISABLE KEYS */;
INSERT INTO `links` VALUES (6,1,'www.ironmaiden.com/','Iron Maiden');
/*!40000 ALTER TABLE `links` ENABLE KEYS */;

--
-- Table structure for table `msg`
--

DROP TABLE IF EXISTS `msg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `msg` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `deid` int(255) NOT NULL,
  `paraid` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `data` datetime DEFAULT NULL,
  `nw` tinyint(1) NOT NULL,
  `nwus` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `msg`
--

/*!40000 ALTER TABLE `msg` DISABLE KEYS */;
INSERT INTO `msg` VALUES (1,1,2,'coco viadao','coco viad?o','2016-06-08 02:06:27',0,1),(2,3,4,'c ? m? viadao hein','to de observando aqui de tras','2016-06-09 16:06:21',0,3),(3,1,2,'coco viadão','coco viadããããããooo','2016-06-14 00:06:43',0,2);
/*!40000 ALTER TABLE `msg` ENABLE KEYS */;

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `news` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `autor` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `rev` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `news`
--

/*!40000 ALTER TABLE `news` DISABLE KEYS */;
/*!40000 ALTER TABLE `news` ENABLE KEYS */;

--
-- Table structure for table `perfil`
--

DROP TABLE IF EXISTS `perfil`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `perfil` (
  `id` int(255) NOT NULL,
  `data_nasc` date DEFAULT NULL,
  `telefone` varchar(255) DEFAULT NULL,
  `telefone2` varchar(255) DEFAULT NULL,
  `descricao1` varchar(255) DEFAULT NULL,
  `descricao2` varchar(255) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `estado` varchar(255) DEFAULT NULL,
  `regiao` varchar(255) DEFAULT NULL,
  `pais` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `perfil`
--

/*!40000 ALTER TABLE `perfil` DISABLE KEYS */;
INSERT INTO `perfil` VALUES (0,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(1,'1995-07-09','03535711201','03591608827','acentuação','aaaaa','Muzambinho','MG','Nenhuma','Merda'),(2,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(3,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(4,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL),(6,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `perfil` ENABLE KEYS */;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `post` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `id_us` varchar(255) CHARACTER SET latin1 NOT NULL,
  `msg` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `arquivo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,'1','testandooooo','','','2016-06-08 02:06:31'),(2,'6','hj acordei triste','','','2017-08-30 14:08:14');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;

--
-- Table structure for table `rel`
--

DROP TABLE IF EXISTS `rel`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deid` int(11) NOT NULL,
  `paraid` int(11) NOT NULL,
  `res` int(11) NOT NULL,
  `pts_ataque` int(11) DEFAULT NULL,
  `pts_defesa` int(11) DEFAULT NULL,
  `pts_ganho` int(11) DEFAULT NULL,
  `cash_ganho` int(11) DEFAULT NULL,
  `data` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rel`
--

/*!40000 ALTER TABLE `rel` DISABLE KEYS */;
INSERT INTO `rel` VALUES (1,1,0,8,0,0,100,100,1465340069),(2,1,2,8,0,0,100,100,1465341632),(3,2,0,4,0,0,100,NULL,1465346228),(4,2,1,7,1500,56100,0,0,1465392603),(5,1,2,5,1875,1500,38,475,1465852894),(6,1,2,7,1250,1500,0,0,1466350970),(7,2,1,7,1500,1650,0,0,1466519909),(8,1,2,5,63750,1500,6225,62350,1466961726),(9,1,2,5,1875,1500,38,475,1471450153),(10,1,2,5,1875,1500,38,475,1479933662),(11,6,3,8,0,0,100,100,1504093040),(12,1,2,3,1250,1500,0,NULL,1510050931);
/*!40000 ALTER TABLE `rel` ENABLE KEYS */;

--
-- Table structure for table `repost`
--

DROP TABLE IF EXISTS `repost`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `repost` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `id_post` int(255) NOT NULL,
  `id_us` int(255) DEFAULT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `repost`
--

/*!40000 ALTER TABLE `repost` DISABLE KEYS */;
INSERT INTO `repost` VALUES (1,1,1,'uhull','2016-06-21 02:06:16'),(2,2,6,'pq cara?','2017-08-30 14:08:40');
/*!40000 ALTER TABLE `repost` ENABLE KEYS */;

--
-- Table structure for table `rmsg`
--

DROP TABLE IF EXISTS `rmsg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rmsg` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `deid` int(255) NOT NULL,
  `idpert` int(255) NOT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rmsg`
--

/*!40000 ALTER TABLE `rmsg` DISABLE KEYS */;
INSERT INTO `rmsg` VALUES (1,1,1,'porra viu','2016-06-08 02:06:41'),(2,1,1,'acentua','2016-06-08 02:06:52'),(3,1,1,'nao pega as porra dos acento memu','2016-06-08 02:06:12'),(4,1,1,'foda-se','2016-06-08 02:06:16'),(5,2,1,'Perses boiolão','2016-06-08 02:06:32'),(6,1,1,'pega no meu aqui tududi','2016-06-08 02:06:56'),(7,2,1,'vc ficou calminho já??????','2016-06-08 02:06:50'),(8,1,1,'se ferrar vai','2016-06-08 02:06:41'),(9,1,1,'acentuação','2016-06-14 00:06:20'),(10,1,1,'agora foi viado','2016-06-14 00:06:27'),(11,2,3,'Perses Viadão, boiolão','2016-06-14 00:06:54');
/*!40000 ALTER TABLE `rmsg` ENABLE KEYS */;

--
-- Table structure for table `tip`
--

DROP TABLE IF EXISTS `tip`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tip`
--

/*!40000 ALTER TABLE `tip` DISABLE KEYS */;
INSERT INTO `tip` VALUES (1,'Estúdio'),(2,'Ao Vivo'),(3,'Coletânea'),(4,'Single'),(5,'Remasterizado'),(6,'Deluxe');
/*!40000 ALTER TABLE `tip` ENABLE KEYS */;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `sobrenome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `cash` int(11) DEFAULT NULL,
  `pts` int(11) NOT NULL,
  `epp` int(10) NOT NULL,
  `rec` varchar(255) DEFAULT NULL,
  `adm` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (0,'showme','SGAME','GAME','admin','admin@admin','new/new.png',10000,0,30,NULL,NULL),(1,'perses','Perses','Vilhena','698dc19d489c4e4db73e28a713eab07b','persesvilhena@gmail.com','87a5e6d464bf02815ec51c49bd4ca64a.png',39087741,17719,10,NULL,1),(2,'Magus','Gustavo','Melo','25f9e794323b453885f5181f1b624d0b','gustavomb2008@hotmail.com','19c336bfdd6a49348051686125b66d78.jpg',2150,103,30,NULL,1),(3,'igorvreis','Igor','Reis','d8e33c6a9753812920f5cedd6ad698d0','igorvreis@hotmail.com','e2dd60699ea5f021cc4520b17492cfea.jpg',5000,0,30,NULL,1),(4,'Juninho','Marcelo','de Melo JR','f89c4fb3d78f05814a31c78d808edd4b','juninhomb2008@hotmail.com','544bbba335eb46db1d9b7d954261b79c.jpg',2450,9,30,NULL,NULL),(5,'andre','andre','andre','e02a36800a48383696786b9497c15b30','andrelipe1@hol.com','new/new.png',5000,0,30,NULL,NULL),(6,'JVS',' JV',' S','25d55ad283aa400af464c76d713c07ad','jvscienciacomputacao@gmail.com','f62ea6241c0abe333214a03412cfd6d7.jpg',600,100,30,NULL,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;

--
-- Table structure for table `user_cartas`
--

DROP TABLE IF EXISTS `user_cartas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_cartas` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `deid` int(32) NOT NULL,
  `carta` int(32) NOT NULL,
  `tipo` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_cartas`
--

/*!40000 ALTER TABLE `user_cartas` DISABLE KEYS */;
INSERT INTO `user_cartas` VALUES (4,1,1,0),(5,1,1,2),(6,1,1,1),(7,1,1,3),(10,2,2,0),(11,1,3,1),(13,1,3,2),(14,1,3,NULL),(15,2,1,1),(16,4,1,NULL),(17,6,5,1),(18,1,2,NULL);
/*!40000 ALTER TABLE `user_cartas` ENABLE KEYS */;

--
-- Table structure for table `user_ee`
--

DROP TABLE IF EXISTS `user_ee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_ee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `deid` int(11) NOT NULL,
  `ee` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_ee`
--

/*!40000 ALTER TABLE `user_ee` DISABLE KEYS */;
INSERT INTO `user_ee` VALUES (6,1,4);
/*!40000 ALTER TABLE `user_ee` ENABLE KEYS */;

--
-- Dumping routines for database 'u289875908_game'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-09-08 19:29:26
