-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Jun-2016 às 01:12
-- Versão do servidor: 10.1.8-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `artista`
--

CREATE TABLE `artista` (
  `id` int(255) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` longtext NOT NULL,
  `est_musical` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `artista`
--

INSERT INTO `artista` (`id`, `nome`, `descricao`, `est_musical`) VALUES
(1, 'Iron Maiden', 'Iron Maiden é uma banda britânica de heavy metal, formada em 19751 pelo baixista Steve Harris, ex-integrante das bandas Gypsy''s Kiss e Smiler. Originária de Londres, foi uma das principais bandas do movimento musical que ficou conhecido como NWOBHM (New Wave of British Heavy Metal). O nome "Iron Maiden", homônimo de um instrumento de tortura medieval que aparece no filme O Homem da Máscara de Ferro, foi baseado na obra de Alexandre Dumas.  Com quase quatro décadas de existência, quinze álbuns de estúdio, seis álbuns ao vivo, quatorze vídeos e diversos compactos, o Iron Maiden é uma das mais importantes e bem sucedidas bandas de toda a história do heavy metal, tendo vendido mais de 100 milhões de álbuns registrados em todo o mundo.2 Seu trabalho influenciou diversas bandas de rock e metal. São citados como influência por diversas bandas, antigas e modernas.  Em 2002, a banda recebeu o prêmio Ivor Novello em reconhecimento às realizações em um parâmetro internacional como uma das mais bem-sucedidas parcerias de composição da Inglaterra. Durante a turnê americana de 2005, foi adicionada à Calçada da Fama do Rock de Hollywood.3 Em 2011, ganharam seu primeiro Grammy por "El Dorado".4 A banda também está presente nas principais listas de maiores bandas de rock de todos os tempos, assim, sendo considerada pela MTV a maior banda de heavy metal de todos os tempos.5  O Maiden já encabeçou diversos grandes eventos, entre eles Rock in Rio, Monsters of Rock em Donington, Ozzfest, Wacken Open Air, Gods of Metal, Download Festival e os Festivais de Reading e Leeds.6', 1),
(2, 'AC DC', 'ac dc', 3),
(3, 'Immortal', 'Immortal', 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `batalhas`
--

CREATE TABLE `batalhas` (
  `deid` int(32) NOT NULL,
  `simples` int(32) NOT NULL,
  `completa` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `batalhas`
--

INSERT INTO `batalhas` (`deid`, `simples`, `completa`) VALUES
(1, 1466351270, 1466351722),
(2, 1465392903, 1465346901),
(4, 1465485618, 1466431733);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cartas`
--

CREATE TABLE `cartas` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `artista` int(11) NOT NULL,
  `est_musical` int(11) NOT NULL,
  `ano` int(11) NOT NULL,
  `qtd_vendas` int(11) NOT NULL,
  `pts` int(11) NOT NULL,
  `qtd_fas` int(11) NOT NULL,
  `tip` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `cartas`
--

INSERT INTO `cartas` (`id`, `nome`, `artista`, `est_musical`, `ano`, `qtd_vendas`, `pts`, `qtd_fas`, `tip`, `valor`, `imagem`) VALUES
(1, 'Iron Maiden', 1, 1, 1980, 1500, 200, 2000, 1, 3000, 'maiden.jpg'),
(2, 'Killers', 1, 1, 1981, 1000, 210, 1800, 1, 2850, 'killers.jpg'),
(3, 'Back In Black', 2, 4, 1980, 51000, 6000, 55000, 1, 25000, 'ff1f686d7aec2bfd5661e225736389a6.jpg'),
(4, 'The Number Of The Beast', 1, 1, 1982, 15000, 560, 40000, 1, 8500, '4c08aa987f06a1e297f27ff06d0d89e9.jpg'),
(5, 'At Heart Of The Winter', 3, 5, 1999, 6566, 650, 7800, 1, 4500, 'e189229d30ffa55d9026483dd1321fb4.jpg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE `contato` (
  `deid` int(255) NOT NULL,
  `cotid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`deid`, `cotid`) VALUES
(1, 0),
(1, 1),
(1, 2),
(2, 1),
(2, 0),
(3, 4),
(3, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ee`
--

CREATE TABLE `ee` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `ganho` int(11) NOT NULL,
  `valor` int(11) NOT NULL,
  `tip` int(11) NOT NULL,
  `imagem` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `ee`
--

INSERT INTO `ee` (`id`, `nome`, `ganho`, `valor`, `tip`, `imagem`) VALUES
(1, 'EAST WEST', 5, 1000, 1, '98fe39d95afab7a8e7d65ccb76a93bff.jpg'),
(2, 'SUNSET SOUND', 10, 1500, 1, 'sunset.jpg'),
(3, 'CAPITOL RECORDS', 15, 2000, 1, 'capital.jpg'),
(4, 'ABBEY ROAD', 25, 3000, 1, 'abbey.jpeg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `est_musical`
--

CREATE TABLE `est_musical` (
  `id` int(255) NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `est_musical`
--

INSERT INTO `est_musical` (`id`, `nome`) VALUES
(1, 'Heavy Metal'),
(2, 'Thrash Metal'),
(3, 'Hard Rock'),
(4, 'Rock'),
(5, 'Black Metal');

-- --------------------------------------------------------

--
-- Estrutura da tabela `gostar`
--

CREATE TABLE `gostar` (
  `id` int(255) NOT NULL,
  `id_post` int(255) DEFAULT NULL,
  `id_repost` int(255) DEFAULT NULL,
  `id_us` int(255) NOT NULL,
  `gostei` tinyint(1) NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `links`
--

CREATE TABLE `links` (
  `id` int(255) NOT NULL,
  `id_us` int(255) NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nome` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `links`
--

INSERT INTO `links` (`id`, `id_us`, `link`, `nome`) VALUES
(6, 1, 'www.ironmaiden.com/', 'Iron Maiden');

-- --------------------------------------------------------

--
-- Estrutura da tabela `msg`
--

CREATE TABLE `msg` (
  `id` int(255) NOT NULL,
  `deid` int(255) NOT NULL,
  `paraid` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `msg` varchar(255) NOT NULL,
  `data` datetime DEFAULT NULL,
  `nw` tinyint(1) NOT NULL,
  `nwus` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `msg`
--

INSERT INTO `msg` (`id`, `deid`, `paraid`, `titulo`, `msg`, `data`, `nw`, `nwus`) VALUES
(1, 1, 2, 'coco viadao', 'coco viad?o', '2016-06-08 02:06:27', 0, 1),
(2, 3, 4, 'c ? m? viadao hein', 'to de observando aqui de tras', '2016-06-09 16:06:21', 0, 3),
(3, 1, 2, 'coco viadão', 'coco viadããããããooo', '2016-06-14 00:06:43', 0, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `news`
--

CREATE TABLE `news` (
  `id` int(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `conteudo` varchar(255) NOT NULL,
  `data` date NOT NULL,
  `rev` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

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
  `pais` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `data_nasc`, `telefone`, `telefone2`, `descricao1`, `descricao2`, `cidade`, `estado`, `regiao`, `pais`) VALUES
(0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(1, '1995-07-09', '03535711201', '03591608827', 'acentuação', 'fghfg', 'Muzambinho', 'MG', 'Nenhuma', 'Merda'),
(2, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `post`
--

CREATE TABLE `post` (
  `id` int(15) NOT NULL,
  `id_us` varchar(255) CHARACTER SET latin1 NOT NULL,
  `msg` varchar(255) CHARACTER SET latin1 NOT NULL,
  `foto` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `arquivo` varchar(255) CHARACTER SET latin1 DEFAULT NULL,
  `data` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `post`
--

INSERT INTO `post` (`id`, `id_us`, `msg`, `foto`, `arquivo`, `data`) VALUES
(1, '1', 'testandooooo', '', '', '2016-06-08 02:06:31');

-- --------------------------------------------------------

--
-- Estrutura da tabela `rel`
--

CREATE TABLE `rel` (
  `id` int(11) NOT NULL,
  `deid` int(11) NOT NULL,
  `paraid` int(11) NOT NULL,
  `res` int(11) NOT NULL,
  `pts_ataque` int(11) DEFAULT NULL,
  `pts_defesa` int(11) DEFAULT NULL,
  `pts_ganho` int(11) DEFAULT NULL,
  `cash_ganho` int(11) DEFAULT NULL,
  `data` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `rel`
--

INSERT INTO `rel` (`id`, `deid`, `paraid`, `res`, `pts_ataque`, `pts_defesa`, `pts_ganho`, `cash_ganho`, `data`) VALUES
(1, 1, 0, 8, 0, 0, 100, 100, 1465340069),
(2, 1, 2, 8, 0, 0, 100, 100, 1465341632),
(3, 2, 0, 4, 0, 0, 100, NULL, 1465346228),
(4, 2, 1, 7, 1500, 56100, 0, 0, 1465392603),
(5, 1, 2, 5, 1875, 1500, 38, 475, 1465852894),
(6, 1, 2, 7, 1250, 1500, 0, 0, 1466350970);

-- --------------------------------------------------------

--
-- Estrutura da tabela `repost`
--

CREATE TABLE `repost` (
  `id` int(255) NOT NULL,
  `id_post` int(255) NOT NULL,
  `id_us` int(255) DEFAULT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rmsg`
--

CREATE TABLE `rmsg` (
  `id` int(255) NOT NULL,
  `deid` int(255) NOT NULL,
  `idpert` int(255) NOT NULL,
  `msg` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `rmsg`
--

INSERT INTO `rmsg` (`id`, `deid`, `idpert`, `msg`, `data`) VALUES
(1, 1, 1, 'porra viu', '2016-06-08 02:06:41'),
(2, 1, 1, 'acentua', '2016-06-08 02:06:52'),
(3, 1, 1, 'nao pega as porra dos acento memu', '2016-06-08 02:06:12'),
(4, 1, 1, 'foda-se', '2016-06-08 02:06:16'),
(5, 2, 1, 'Perses boiolão', '2016-06-08 02:06:32'),
(6, 1, 1, 'pega no meu aqui tududi', '2016-06-08 02:06:56'),
(7, 2, 1, 'vc ficou calminho já??????', '2016-06-08 02:06:50'),
(8, 1, 1, 'se ferrar vai', '2016-06-08 02:06:41'),
(9, 1, 1, 'acentuação', '2016-06-14 00:06:20'),
(10, 1, 1, 'agora foi viado', '2016-06-14 00:06:27'),
(11, 2, 3, 'Perses Viadão, boiolão', '2016-06-14 00:06:54');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tip`
--

CREATE TABLE `tip` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tip`
--

INSERT INTO `tip` (`id`, `nome`) VALUES
(1, 'Estúdio'),
(2, 'Ao Vivo'),
(3, 'Coletânea'),
(4, 'Single'),
(5, 'Remasterizado'),
(6, 'Deluxe');

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
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
  `adm` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user`
--

INSERT INTO `user` (`id`, `login`, `nome`, `sobrenome`, `senha`, `email`, `foto`, `cash`, `pts`, `epp`, `rec`, `adm`) VALUES
(0, 'showme', 'Show', 'Me', 'admin', 'admin@admin', 'new/new.png', 10000, 0, 30, NULL, NULL),
(1, 'perses', 'Perses', 'Vilhena', 'e959088c6049f1104c84c9bde5560a13', 'persesvilhena@gmail.com', '87a5e6d464bf02815ec51c49bd4ca64a.png', 38990569, 10983, 10, NULL, 1),
(2, 'Magus', 'Gustavo', 'Melo', '25d55ad283aa400af464c76d713c07ad', 'gustavomb2008@hotmail.com', '19c336bfdd6a49348051686125b66d78.jpg', 2150, 103, 30, NULL, 1),
(3, 'igorvreis', 'Igor', 'Reis', 'd8e33c6a9753812920f5cedd6ad698d0', 'igorvreis@hotmail.com', 'e2dd60699ea5f021cc4520b17492cfea.jpg', 5000, 0, 30, NULL, 1),
(4, 'Juninho', 'Marcelo', 'de Melo JR', 'f89c4fb3d78f05814a31c78d808edd4b', 'juninhomb2008@hotmail.com', '544bbba335eb46db1d9b7d954261b79c.jpg', 2450, 9, 30, NULL, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_cartas`
--

CREATE TABLE `user_cartas` (
  `id` int(255) NOT NULL,
  `deid` int(32) NOT NULL,
  `carta` int(32) NOT NULL,
  `tipo` int(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_cartas`
--

INSERT INTO `user_cartas` (`id`, `deid`, `carta`, `tipo`) VALUES
(4, 1, 1, 0),
(5, 1, 1, 2),
(6, 1, 1, 1),
(7, 1, 1, 3),
(10, 1, 2, 1),
(11, 1, 3, 2),
(12, 1, 3, 1),
(13, 1, 3, 2),
(14, 1, 3, NULL),
(15, 2, 1, 1),
(16, 4, 1, NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `user_ee`
--

CREATE TABLE `user_ee` (
  `id` int(11) NOT NULL,
  `deid` int(11) NOT NULL,
  `ee` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `user_ee`
--

INSERT INTO `user_ee` (`id`, `deid`, `ee`) VALUES
(6, 1, 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artista`
--
ALTER TABLE `artista`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `batalhas`
--
ALTER TABLE `batalhas`
  ADD PRIMARY KEY (`deid`),
  ADD UNIQUE KEY `deid` (`deid`);

--
-- Indexes for table `cartas`
--
ALTER TABLE `cartas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ee`
--
ALTER TABLE `ee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `est_musical`
--
ALTER TABLE `est_musical`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gostar`
--
ALTER TABLE `gostar`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `links`
--
ALTER TABLE `links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `msg`
--
ALTER TABLE `msg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rel`
--
ALTER TABLE `rel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `repost`
--
ALTER TABLE `repost`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rmsg`
--
ALTER TABLE `rmsg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tip`
--
ALTER TABLE `tip`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_cartas`
--
ALTER TABLE `user_cartas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_ee`
--
ALTER TABLE `user_ee`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artista`
--
ALTER TABLE `artista`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `cartas`
--
ALTER TABLE `cartas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `ee`
--
ALTER TABLE `ee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `est_musical`
--
ALTER TABLE `est_musical`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `gostar`
--
ALTER TABLE `gostar`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `links`
--
ALTER TABLE `links`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `msg`
--
ALTER TABLE `msg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `rel`
--
ALTER TABLE `rel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `repost`
--
ALTER TABLE `repost`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `rmsg`
--
ALTER TABLE `rmsg`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tip`
--
ALTER TABLE `tip`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user_cartas`
--
ALTER TABLE `user_cartas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `user_ee`
--
ALTER TABLE `user_ee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
