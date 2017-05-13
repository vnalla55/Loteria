-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 20, 2014 at 09:49 AM
-- Server version: 5.0.41-community-nt
-- PHP Version: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lotto`
--
CREATE DATABASE IF NOT EXISTS `lotto` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `lotto`;

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `admin_id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) default NULL,
  PRIMARY KEY  (`admin_id`),
  KEY `role_id` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_id`, `username`, `password`, `role_id`) VALUES
(4, 'rabina', 'rabina1', 4),
(5, 'nixi', 'nixi', 4);

-- --------------------------------------------------------

--
-- Table structure for table `admin_setting`
--

CREATE TABLE IF NOT EXISTS `admin_setting` (
  `admin_name` varchar(50) NOT NULL,
  `admin_email` varchar(50) NOT NULL,
  `email_subject` varchar(50) NOT NULL,
  `offline_data` text NOT NULL,
  `website_status` enum('online','offline') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin_setting`
--

INSERT INTO `admin_setting` (`admin_name`, `admin_email`, `email_subject`, `offline_data`, `website_status`) VALUES
('Administrator', 'admin@lotto.com', 'Lotto Subject', '<p>This is my textarea to be replaced with CKEditor.</p>\n', 'online');

-- --------------------------------------------------------

--
-- Table structure for table `bet_history`
--

CREATE TABLE IF NOT EXISTS `bet_history` (
  `bet_id` int(11) NOT NULL auto_increment,
  `betno_slot1` varchar(11) default NULL,
  `betno_slot2` varchar(11) default NULL,
  `betno_slot3` varchar(11) default NULL,
  `betno_slot4` varchar(11) default NULL,
  `betno_slot5` varchar(11) default NULL,
  `lottery_id` int(11) default NULL,
  `better_id` int(11) default NULL,
  `gametype_id` int(11) default NULL,
  `bet_amount` double default NULL,
  `bet_date` date default NULL,
  `betstatus` enum('current','passed') NOT NULL default 'current',
  PRIMARY KEY  (`bet_id`),
  KEY `lottery_id` (`lottery_id`),
  KEY `better_id` (`better_id`),
  KEY `bet_history_ibfk_3` (`gametype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bet_history`
--

INSERT INTO `bet_history` (`bet_id`, `betno_slot1`, `betno_slot2`, `betno_slot3`, `betno_slot4`, `betno_slot5`, `lottery_id`, `better_id`, `gametype_id`, `bet_amount`, `bet_date`, `betstatus`) VALUES
(1, '2', '3', '4', '5', '6', 1, 59, 2, 100, '2014-12-17', 'current');

-- --------------------------------------------------------

--
-- Table structure for table `bonus`
--

CREATE TABLE IF NOT EXISTS `bonus` (
  `bonus_id` int(11) NOT NULL auto_increment,
  `beneficiary_id` int(11) default NULL,
  `bonus_amount` double default NULL,
  `bonus_date` date default NULL,
  PRIMARY KEY  (`bonus_id`),
  KEY `beneficiary_id` (`beneficiary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `bonus`
--

INSERT INTO `bonus` (`bonus_id`, `beneficiary_id`, `bonus_amount`, `bonus_date`) VALUES
(1, 59, 2000, '2014-11-12');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE IF NOT EXISTS `cms` (
  `page_id` int(11) NOT NULL auto_increment,
  `page_name` varchar(100) NOT NULL,
  `meta_name` varchar(100) NOT NULL,
  `meta_description` varchar(300) NOT NULL,
  `page_content` longtext NOT NULL,
  `published_status` enum('published','unpublished') NOT NULL,
  PRIMARY KEY  (`page_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`page_id`, `page_name`, `meta_name`, `meta_description`, `page_content`, `published_status`) VALUES
(2, 'Portada', 'home', 'this is contact us', '<p><strong><em>The 36Lotto site is very simple and e</em></strong><em><strong>sy to use. First, you </strong>will have to register and create an account with will have to register <strong>and create an account </strong>with will have to register and create an account with will have to register and create an account with will have to register and create an account with will hav<strong>e to register and create an account with </strong></em></p>\n\n<p><strong><em>The 36Lotto site is very simple and e</em></strong><em><strong>sy to use. First, you </strong>will have to register and create an account with will have to register <strong>and create an account </strong>with will have to register and create an account with will have to register and create an account with will have to register and create an account with will hav<strong>e to register and create an account with </strong></em></p>\n', 'unpublished'),
(3, 'Loteria', 'lottery', 'this is about us', '<h3><strong>Step by Step Guide</strong></h3>\n\n<p>Below you</p>\n\n<h3>Note:</h3>\n\n<ul>\n	<li>1st to drop. By choosing this game you must select 1number from 1-90. You\n	<h3>Note:</h3>\n	</li>\n	<li>1st to drop. By choosing this game you must select 1number from 1-90. You\n	<h3>Note:</h3>\n	</li>\n	<li>1st to drop. By choosing this game you must select 1number from 1-90. You\n	<h3>Note:</h3>\n	</li>\n	<li>1st to drop. By choosing this game you must select 1number from 1-90. You</li>\n</ul>\n', 'published'),
(4, '¿Quiénes Somos?', 'aboutus', 'this is how to play the game', '<p>Permutation. By choosing this game you must select 5 numbers from 1-90. YouPermutation. By choosing this game you must select 5 numbers from 1-90. YouPermutation. By choosing this game you must select 5 numbers from 1-90. YouPermutation. By choosing this game you must select 5 numbers from 1-90. YouPermutation. By choosing this game you must select 5 numbers from 1-90. YouPermutation. By choosing this game you must select 5 numbers from 1-90. You</p>\n', 'published'),
(5, 'FAQS', 'faq', 'this is how to play the game', '<h3><strong>Step by Step Guide</strong></h3>\n\n<p>Below you</p>\n', 'unpublished'),
(6, 'Consorcios', 'consortia', 'this is how to play the game', '<h3><strong>Step by Step Guide</strong></h3>\n\n<p>Below you</p>\n', 'unpublished'),
(7, 'Resultados', 'result', 'this is how to play the game', '<p><strong><em>The 36Lotto site is very simple and e</em></strong><em><strong>sy to use. First, you </strong>will have to register and create an account with will have to register <strong>and create an account </strong>with will have to register and create an account with will have to register and create an account with will have to register and create an account with will hav<strong>e to register and create an account with </strong></em></p>\n\n<p><strong><em>The 36Lotto site is very simple and e</em></strong><em><strong>sy to use. First, you </strong>will have to register and create an account with will have to register <strong>and create an account </strong>with will have to register and create an account with will have to register and create an account with will have to register and create an account with will hav<strong>e to register and create an account with </strong></em></p>\n', 'published'),
(8, 'Contáctanos', 'contact', 'this is new menu', ' <h5>Ayuda y Servicio al Cliente</h5>\n\n                    <p>Fames varius varius magnis et pharetra urna dictum consequat lacinia interdum facilisi leo tristique pretium felis fusce fringilla praesent dui</p>\n                    <ul class="list">\n                        <li><i class="icon-map-marker"></i> Dirección:  Santo Domingo, D.N., Rep. Dom., Código Postal 10101</li>\n                        <li><i class="icon-phone"></i> Teléfono: (809) 555-1111</li>\n                        <li><i class="icon-envelope"></i> E-mail: <a href="#">info@tubanquita.com</a>\n                        </li>\n                    </ul>', 'published');

-- --------------------------------------------------------

--
-- Table structure for table `deposit`
--

CREATE TABLE IF NOT EXISTS `deposit` (
  `diposit_id` int(11) NOT NULL auto_increment,
  `depositer_id` int(11) default NULL,
  `deposit_amount` double default NULL,
  `diposit_date` date default NULL,
  `gateway_name` varchar(100) NOT NULL,
  `transaction_id` varchar(100) NOT NULL,
  PRIMARY KEY  (`diposit_id`),
  KEY `depositer_id` (`depositer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `deposit`
--

INSERT INTO `deposit` (`diposit_id`, `depositer_id`, `deposit_amount`, `diposit_date`, `gateway_name`, `transaction_id`) VALUES
(1, 59, 2000, '2014-10-15', 'paynpaal', '56756757'),
(2, 59, 6000, '2014-10-27', 'paypaal', '5645646');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE IF NOT EXISTS `faq` (
  `q_id` int(11) NOT NULL auto_increment,
  `question` text NOT NULL,
  `answer` longtext NOT NULL,
  PRIMARY KEY  (`q_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`q_id`, `question`, `answer`) VALUES
(8, '¿Como funciona?', '<p>TuBanquita.com le permite crear un usuario mediante el cual usted podrá hacer sus jugadas en los principales Consorcios de Apuestas que formen parte de nuestra red de una manera segura, en cualquier parte donde se encuentre y a cualquier hora del día.</p>\n                                '),
(10, '¿Como puedo crear un usuario?', ' <p>Solo debe entrar a la parte de “Registro” (colocar link re direccionando a esta parte), colocar sus informaciones generales, asignar nombre de usuario y contraseña e inmediatamente está disponible para realizar las jugadas en el consorcio de su preferencia.</p>\n                            '),
(11, '¿Cuáles son las ventajas de jugar a través de TuBanquita.com?', '<p>Jugar a través de Tu Banquita.com es un método “Cool”, seguro y fácil de utilizar, accesible a todas horas (no tienes que esperar que los puestos de los Consorcios abran), elimina los costos de trasladarte hasta el punto físico de venta, elimina el riesgo de atracos y te da mayor libertad y privacidad al realizar tu jugada. Además de poder aprovechar las diferentes ofertas que se ofrecen por esta vía.</p>\n                              '),
(12, '¿Está segura mi información personal cuando me suscribo a TuBanquita.com? ', '<p>Absolutamente. Nuestro enfoque principal es el de proteger su privacidad. Usamos la última tecnología de 256-bit SSL para resguardar sus datos personales, sus jugadas e informaciones de pago. Toda la información suya y de sus ganancias son estrictamente confidenciales y nunca se le proporcionará a terceros.</p>\n                              '),
(13, '¿Como puedo realizar una jugada de lotería?', '<p>\n<ol>\n<li>Solo debe ir al área de "Lotería"</li>\n<li>Escoger su Consorcio de Apuestas Favorito</li>\n<li>Escoger el tipo de jugada que desea realizar y marcar en las loterías que desea se vaya ejecutando la jugada.</li>\n</ol>\n\nA medida vaya escogiendo los números y el tipo de jugada la misma se va colocando en su Ticket Pro-Forma. Cuando ya este seguro de su jugada, hace click en "Efectuar Jugada". Se le pedirá escoger la forma de pago y cuando esté listo haga click en "Realizar Pago". Su ticket con su jugada y su número único de identificación ya esta jugando en su Consorcio favorito. Buena Suerte. <a href="#"><i class="fa fa-file-video-o"></i> Ver video tutorial</a></p>\n                                '),
(14, '¿Como recibiré mis tickets?', ' <p>Los tickets generados pueden ser enviados a los usuarios por diferentes vias o de diferentes maneras. Una copia de los tickets es salvado en su usuario para su acceso hasta dos días haya pasado el sorteo correspondiente a ese ticket. Inmediatamente se ejecute la jugada una copia de su ticket es enviada a la dirección de correo electrónico que tiene registrado en su usuario. Usted puede también guardar en formato PDF su ticket en su ordenador o solicitar el número único sea enviado por SMS. Más importante que el ticket es su número único de su jugada que contiene la información pertinente a el usuario, consorcio de apuestas donde se realizo la jugada y número de identificación del ticket.</p>\n                                '),
(15, '¿Hasta que hora previo al sorteo o inicio de los juegos tengo para realizar la jugada?', '<p>Existe un proceso de validación de la información y la jugada por lo que las jugadas se cierran una hora previa al inicio de cada sorteo.</p>\n                               \n'),
(16, '¿Como se si mi ticket es ganador?', '<p>Puede verificar los resultados actualizados de cada lotería y de cada juego en nuestra página web. No obstante, si su ticket es ganador recibirá una notificación vía correo electrónico y/o Mensaje de texto.</p>\n                                \n'),
(17, '¿Dónde puedo canjear mi ticket ganador?', '<p>Su jugada ganadora deberá ser canjeada en las sucursales determinadas por cada consorcio de bancas de apuestas; dependiendo del Consorcio elegido por usted (no pueden ser canjeados tickets jugados en un Consorcio en otro). Si el valor del premio es considerable el mismo posiblemente deberá ser colectado en la central del Consorcio elegido. Si el usuario eligió la opción de que sus premios sean depositados en una cuenta bancaria especifica, su premio será depositado en dicha cuenta y no tendrá que trasladarse. Una notificación del depósito o transferencia realizada será enviado vía Correo electrónico y/o Mensaje de texto.</p>\n                               \n'),
(18, '¿Dónde puedo canjear mi ticket ganador?', '<p>Su jugada ganadora deberá ser canjeada en las sucursales determinadas por cada consorcio de bancas de apuestas; dependiendo del Consorcio elegido por usted (no pueden ser canjeados tickets jugados en un Consorcio en otro). Si el valor del premio es considerable el mismo posiblemente deberá ser colectado en la central del Consorcio elegido. Si el usuario eligió la opción de que sus premios sean depositados en una cuenta bancaria especifica, su premio será depositado en dicha cuenta y no tendrá que trasladarse. Una notificación del depósito o transferencia realizada será enviado vía Correo electrónico y/o Mensaje de texto.</p>\n                               \n'),
(19, '¿Qué garantías tengo con mi membrecía y con el Consorcio de Apuestas elegido?', ' <p>Los Consorcios de Apuestas al formar parte de la red TuBanquita.com firman un acuerdo contractual mediante el cual están avalando las jugadas a través del portal y se hacen 100% responsables al pago de la misma. En el caso de inconvenientes con un ticket y un cobro en específico favor contactar nuestro personal de Servicio al cliente.</p>\n                              '),
(20, '¿TuBanquita.com recibe parte del dinero ganador?', '<p>No participamos ni tenemos ningún derecho sobre los tickets ganadores de los usuarios. Usted tiene la garantía que recibirá el 100% del monto del premio cuando gane.</p>\n                              \n'),
(21, '¿TuBanquita.com vende directamente tickets de lotería y de deportes?', ' <p>TuBanquita.com no es un Consorcio de Bancas de Apuestas. TuBanquita.com solo le brinda el servicio a los Consorcios de Bancas de Apuestas de recibir las jugadas de los jugadores que estén registrados en el portal.</p>\n                              \n'),
(22, '¿Es este servicio legal?', ' <p>Si. TuBanquita.com es un portal administrado por LUDUS SRL, empresa registrada legalmente en la República Dominicana, la cual sostiene los Acuerdos Contractuales con cada una de las Casas de Apuestas que forman parte de la red y las cuales son responsables de sus licencias para vender las jugadas y recibir sus apuestas.</p>\n                               \n'),
(23, '¿Cuando se realizan cada uno de los sorteos de las loterías?', ' <p>\n<bl>\n<li>Gana Mas: 2:00 p.m. TE</li>\n<li>Real: 1:55 p.m. TE</li>\n<li>Leidsa Tarde: 1:50 p.m. TE</li>\n<li>Nacional: 8:45 p.m. TE</li>\n<li>Nacional Domingo: 6:00 p.m. TE</li>\n<li>Leidsa: 9:00 p.m. TE</li>\n<li>Leidsa Domingo: 5:45 p.m. TE</li>\n</bl>\n</p>\n'),
(24, '¿Puedo jugar de cualquier sitio del mundo?', ' <p>Si tiene más de 18 años de edad, puede realizar sus jugadas en TuBanquita.com de cualquier parte del mundo; no importa su nacionalidad o país de residencia. Solo estará restringido a recibir sus premios en las cuentas bancarias validadas durante su subscripción y si no existen restricciones puede recibir sus premios vía una empresa de envíos de valores.</p>\n                              \n');

-- --------------------------------------------------------

--
-- Table structure for table `game_type`
--

CREATE TABLE IF NOT EXISTS `game_type` (
  `game_id` int(11) NOT NULL auto_increment,
  `game_name` varchar(100) NOT NULL,
  `no_of_picks` int(11) NOT NULL,
  `multipleforonepick` varchar(11) NOT NULL default '0',
  `multiplefortwopicks` varchar(11) NOT NULL default '0',
  `multipleforthreepicks` varchar(11) NOT NULL default '0',
  `multipleforfourpicks` varchar(11) default '0',
  `multipleforallpicks` varchar(50) NOT NULL default '0',
  PRIMARY KEY  (`game_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `game_type`
--

INSERT INTO `game_type` (`game_id`, `game_name`, `no_of_picks`, `multipleforonepick`, `multiplefortwopicks`, `multipleforthreepicks`, `multipleforfourpicks`, `multipleforallpicks`) VALUES
(2, 'Permutation', 5, '0', '24', '72', '96', '120'),
(3, '2-Sure', 2, '0', '0', '0', '0', '240'),
(5, '1st to drop', 1, '0', '0', '0', '0', '24'),
(6, '3-Direct', 3, '0', '0', '0', '0', '2100');

-- --------------------------------------------------------

--
-- Table structure for table `lottery`
--

CREATE TABLE IF NOT EXISTS `lottery` (
  `lottery_id` int(100) NOT NULL auto_increment,
  `lottery_name` varchar(100) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `min_bet_amount` double NOT NULL,
  `max_bet_amount` double NOT NULL,
  `status` enum('current','passed','upcoming') NOT NULL,
  `lottogroup_id` int(11) NOT NULL,
  PRIMARY KEY  (`lottery_id`),
  KEY `lottery_ibfk_1` (`lottogroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `lottery`
--

INSERT INTO `lottery` (`lottery_id`, `lottery_name`, `start_time`, `end_time`, `min_bet_amount`, `max_bet_amount`, `status`, `lottogroup_id`) VALUES
(1, 'Gana Más', '2014-12-05 04:08:47', '2014-12-05 04:08:45', 1, 1000, 'current', 4),
(2, ' Billetes Domingo', '2014-12-05 04:08:47', '2014-12-05 04:08:45', 1, 1000, 'current', 3);

-- --------------------------------------------------------

--
-- Table structure for table `lotto_group`
--

CREATE TABLE IF NOT EXISTS `lotto_group` (
  `lottogroup_id` int(11) NOT NULL auto_increment,
  `lottogroupname` varchar(100) NOT NULL,
  PRIMARY KEY  (`lottogroup_id`),
  KEY `lottogroup_id` (`lottogroup_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `lotto_group`
--

INSERT INTO `lotto_group` (`lottogroup_id`, `lottogroupname`) VALUES
(1, 'Lotería Nacional'),
(3, 'Loteka '),
(4, 'Leidsa'),
(5, 'Loto Real ');

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

CREATE TABLE IF NOT EXISTS `modules` (
  `module_id` int(11) NOT NULL auto_increment,
  `module_name` varchar(200) NOT NULL,
  PRIMARY KEY  (`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`module_id`, `module_name`) VALUES
(1, 'configurations'),
(2, 'cms'),
(3, 'Admin Management'),
(4, 'Members'),
(5, 'Game Type'),
(6, 'Lottery'),
(7, 'Results'),
(8, 'Winners'),
(9, 'Bet History'),
(10, 'Withdrawal'),
(11, 'Deposit'),
(12, 'Bonus'),
(13, 'FAQS'),
(14, 'Role Management'),
(15, 'Change Password'),
(16, 'Email Subscription'),
(17, 'Subscription Users');

-- --------------------------------------------------------

--
-- Table structure for table `partner`
--

CREATE TABLE IF NOT EXISTS `partner` (
  `partner_id` int(11) NOT NULL auto_increment,
  `partner_name` varchar(70) NOT NULL,
  `username` varchar(70) NOT NULL,
  `password` varchar(70) NOT NULL,
  `email` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  PRIMARY KEY  (`partner_id`),
  UNIQUE KEY `partner_username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `partner`
--

INSERT INTO `partner` (`partner_id`, `partner_name`, `username`, `password`, `email`, `logo`) VALUES
(2, 'partner1', 'partner1', 'partner1', 'abc@yahoo.com', 'adfsfd.jpg'),
(3, 'partner2', 'partner2', 'partner2', 'parter2@gmail.com', 'partner2.jpeg'),
(4, 'Birat ', 'birat', 'birat', 'birat@gmail.com', 'birat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `partner_gametype`
--

CREATE TABLE IF NOT EXISTS `partner_gametype` (
  `p_gametypeid` int(11) NOT NULL auto_increment,
  `game_id` int(11) default NULL,
  `partner_id` int(11) default NULL,
  PRIMARY KEY  (`p_gametypeid`),
  KEY `game_id` (`game_id`),
  KEY `partner_id` (`partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `partner_gametype`
--

INSERT INTO `partner_gametype` (`p_gametypeid`, `game_id`, `partner_id`) VALUES
(2, 2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `partner_lotterygroup`
--

CREATE TABLE IF NOT EXISTS `partner_lotterygroup` (
  `p_lotterygroupid` int(11) NOT NULL auto_increment,
  `lottogroup_id` int(11) default NULL,
  `partner_id` int(11) default NULL,
  PRIMARY KEY  (`p_lotterygroupid`),
  KEY `lottogroup_id` (`lottogroup_id`),
  KEY `partner_id` (`partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `partner_lotterygroup`
--

INSERT INTO `partner_lotterygroup` (`p_lotterygroupid`, `lottogroup_id`, `partner_id`) VALUES
(2, 1, 2),
(3, 3, 4),
(4, 1, 4);

-- --------------------------------------------------------

--
-- Table structure for table `p_admin_login`
--

CREATE TABLE IF NOT EXISTS `p_admin_login` (
  `admin_id` int(11) NOT NULL auto_increment,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` int(11) default NULL,
  `partner_id` int(11) NOT NULL,
  PRIMARY KEY  (`admin_id`),
  KEY `role_id` (`role_id`),
  KEY `partner_id` (`partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `p_admin_login`
--

INSERT INTO `p_admin_login` (`admin_id`, `username`, `password`, `role_id`, `partner_id`) VALUES
(2, 'partner1subpartner1', 'partner1subpartner1', 3, 2),
(4, 'biratwife', 'biratwife', 9, 4),
(5, 'biratwife2', 'biratwife2', 9, 4),
(6, 'biratwife1', 'sdfsf', 9, 4);

-- --------------------------------------------------------

--
-- Table structure for table `p_bet_history`
--

CREATE TABLE IF NOT EXISTS `p_bet_history` (
  `bet_id` int(11) NOT NULL auto_increment,
  `betno_slot1` varchar(11) default NULL,
  `betno_slot2` varchar(11) default NULL,
  `betno_slot3` varchar(11) default NULL,
  `betno_slot4` varchar(11) default NULL,
  `betno_slot5` varchar(11) default NULL,
  `lottery_id` int(11) default NULL,
  `better_id` int(11) default NULL,
  `p_gametypeid` int(11) default NULL,
  `bet_amount` double default NULL,
  `bet_date` date default NULL,
  `betstatus` enum('current','passed') NOT NULL default 'current',
  `partner_id` int(11) default NULL,
  PRIMARY KEY  (`bet_id`),
  KEY `lottery_id` (`lottery_id`),
  KEY `better_id` (`better_id`),
  KEY `p_bet_history_ibfk_3` (`p_gametypeid`),
  KEY `partner_ibfk_4` (`partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `p_bet_history`
--

INSERT INTO `p_bet_history` (`bet_id`, `betno_slot1`, `betno_slot2`, `betno_slot3`, `betno_slot4`, `betno_slot5`, `lottery_id`, `better_id`, `p_gametypeid`, `bet_amount`, `bet_date`, `betstatus`, `partner_id`) VALUES
(1, '10', '2', '3', '4', '6', 4, 59, 2, 1000, '2014-12-09', 'passed', 4),
(2, '5', '7', '8', '9', '10', 3, 61, 2, 100, '2014-12-15', 'current', 4),
(3, '7', '8', '9', '12', '13', 4, 60, 2, 500, '2014-12-15', 'current', 4);

-- --------------------------------------------------------

--
-- Table structure for table `p_lottery`
--

CREATE TABLE IF NOT EXISTS `p_lottery` (
  `lottery_id` int(100) NOT NULL auto_increment,
  `lottery_name` varchar(100) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  `min_bet_amount` double NOT NULL,
  `max_bet_amount` double NOT NULL,
  `status` enum('current','passed','upcoming') NOT NULL,
  `p_lotterygroupid` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  PRIMARY KEY  (`lottery_id`),
  KEY `p_lottery_ibfk_1` (`p_lotterygroupid`),
  KEY `p_lottery_ibfk_2` (`partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `p_lottery`
--

INSERT INTO `p_lottery` (`lottery_id`, `lottery_name`, `start_time`, `end_time`, `min_bet_amount`, `max_bet_amount`, `status`, `p_lotterygroupid`, `partner_id`) VALUES
(2, 'partnerlottery1', '2014-12-11 00:00:00', '2014-12-11 00:00:00', 1, 1000, 'current', 2, 2),
(3, 'biratlottery', '2014-12-01 06:00:00', '2014-12-10 05:00:00', 1, 1000, 'passed', 3, 4),
(4, 'biratlottery2', '2014-12-12 12:54:40', '2014-12-25 12:54:42', 1, 1000, 'current', 4, 4),
(5, 'birat3', '2014-12-15 05:28:51', '2014-12-16 05:28:55', 1, 1000, 'current', 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `p_modules`
--

CREATE TABLE IF NOT EXISTS `p_modules` (
  `module_id` int(11) NOT NULL auto_increment,
  `module_name` varchar(200) NOT NULL,
  PRIMARY KEY  (`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `p_modules`
--

INSERT INTO `p_modules` (`module_id`, `module_name`) VALUES
(1, 'Admin Management'),
(2, 'Game Type'),
(3, 'Lottery'),
(4, 'Results'),
(5, 'Winners'),
(6, 'Bet History'),
(7, 'Role Management'),
(8, 'Change Password');

-- --------------------------------------------------------

--
-- Table structure for table `p_results`
--

CREATE TABLE IF NOT EXISTS `p_results` (
  `lottery_id` int(11) NOT NULL,
  `result_date` date default NULL,
  `result_slot1` int(11) NOT NULL,
  `result_slot2` int(11) NOT NULL,
  `result_slot3` int(11) NOT NULL,
  `result_slot4` int(11) NOT NULL,
  `result_slot5` int(11) NOT NULL,
  `partner_id` int(11) NOT NULL,
  PRIMARY KEY  (`lottery_id`),
  KEY `p_results_ibfk_2` (`partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `p_results`
--

INSERT INTO `p_results` (`lottery_id`, `result_date`, `result_slot1`, `result_slot2`, `result_slot3`, `result_slot4`, `result_slot5`, `partner_id`) VALUES
(3, '2014-12-12', 54, 24, 44, 4, 71, 4);

-- --------------------------------------------------------

--
-- Table structure for table `p_roles`
--

CREATE TABLE IF NOT EXISTS `p_roles` (
  `role_id` int(11) NOT NULL auto_increment,
  `rolename` varchar(50) NOT NULL,
  `partner_id` int(11) NOT NULL,
  PRIMARY KEY  (`role_id`),
  KEY `partner_id` (`partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `p_roles`
--

INSERT INTO `p_roles` (`role_id`, `rolename`, `partner_id`) VALUES
(3, 'partnerrole1updated1', 2),
(4, 'partner1role2', 2),
(5, 'partner2roleupdated2', 3),
(7, 'newrolepartner2', 3),
(9, 'biratrole1', 4),
(11, 'biratrole2', 4);

-- --------------------------------------------------------

--
-- Table structure for table `p_role_assignment`
--

CREATE TABLE IF NOT EXISTS `p_role_assignment` (
  `assignment_id` int(11) NOT NULL auto_increment,
  `role_id` int(11) default NULL,
  `module_id` int(11) default NULL,
  `viewtask` tinyint(4) default NULL,
  `addtask` tinyint(4) default NULL,
  `updatetask` tinyint(4) default NULL,
  `deletetask` tinyint(4) default NULL,
  `others` tinyint(11) NOT NULL default '0',
  `partner_id` int(11) NOT NULL,
  PRIMARY KEY  (`assignment_id`),
  KEY `role_id` (`role_id`),
  KEY `module_id` (`module_id`),
  KEY `partner_id` (`partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=74 ;

--
-- Dumping data for table `p_role_assignment`
--

INSERT INTO `p_role_assignment` (`assignment_id`, `role_id`, `module_id`, `viewtask`, `addtask`, `updatetask`, `deletetask`, `others`, `partner_id`) VALUES
(2, 3, 1, 1, 0, 0, 0, 0, 2),
(3, 3, 2, 1, 1, 0, 0, 0, 2),
(4, 3, 3, 1, 0, 1, 0, 0, 2),
(5, 3, 4, 1, 0, 0, 1, 0, 2),
(6, 3, 5, 0, 0, 0, 0, 1, 2),
(7, 3, 6, 0, 0, 0, 1, 0, 2),
(8, 3, 7, 0, 0, 1, 0, 0, 2),
(9, 3, 8, 0, 1, 0, 0, 0, 2),
(10, 4, 1, 0, 0, 0, 0, 0, 2),
(11, 4, 2, 0, 0, 0, 0, 0, 2),
(12, 4, 3, 0, 0, 0, 0, 0, 2),
(13, 4, 4, 0, 0, 0, 0, 0, 2),
(14, 4, 5, 0, 0, 0, 0, 0, 2),
(15, 4, 6, 0, 0, 0, 0, 0, 2),
(16, 4, 7, 0, 0, 0, 0, 0, 2),
(17, 4, 8, 0, 0, 0, 0, 0, 2),
(18, 5, 1, 1, 0, 1, 0, 1, 3),
(19, 5, 2, 0, 1, 0, 1, 0, 3),
(20, 5, 3, 0, 0, 0, 0, 0, 3),
(21, 5, 4, 0, 0, 0, 0, 0, 3),
(22, 5, 5, 0, 0, 0, 0, 0, 3),
(23, 5, 6, 0, 0, 0, 0, 0, 3),
(24, 5, 7, 0, 0, 0, 0, 0, 3),
(25, 5, 8, 0, 0, 0, 0, 0, 3),
(34, 7, 1, 0, 0, 0, 0, 0, 3),
(35, 4, 1, 0, 0, 0, 0, 0, 3),
(36, 4, 2, 1, 1, 1, 1, 1, 3),
(37, 4, 3, 1, 1, 1, 1, 1, 3),
(38, 4, 4, 0, 0, 0, 0, 0, 3),
(39, 4, 5, 0, 0, 0, 0, 0, 3),
(40, 4, 6, 0, 0, 0, 0, 0, 3),
(41, 4, 7, 0, 0, 0, 0, 0, 3),
(50, 9, 1, 1, 1, 1, 1, 1, 4),
(51, 9, 2, 1, 1, 0, 0, 0, 4),
(52, 9, 3, 1, 1, 0, 0, 0, 4),
(53, 9, 4, 1, 1, 0, 0, 0, 4),
(54, 9, 5, 1, 1, 0, 0, 0, 4),
(55, 9, 6, 1, 1, 0, 0, 0, 4),
(56, 9, 7, 1, 1, 1, 1, 1, 4),
(57, 9, 8, 1, 1, 0, 0, 0, 4),
(66, 11, 1, 1, 1, 1, 1, 1, 4),
(67, 11, 2, 0, 0, 0, 0, 0, 4),
(68, 11, 3, 0, 0, 0, 0, 0, 4),
(69, 11, 4, 0, 0, 0, 0, 0, 4),
(70, 11, 5, 0, 0, 0, 0, 0, 4),
(71, 11, 6, 0, 0, 0, 0, 0, 4),
(72, 11, 7, 0, 0, 0, 0, 0, 4),
(73, 11, 8, 0, 0, 0, 0, 0, 4);

-- --------------------------------------------------------

--
-- Table structure for table `p_winning_lottery`
--

CREATE TABLE IF NOT EXISTS `p_winning_lottery` (
  `winning_id` int(11) NOT NULL auto_increment,
  `lottery_id` int(11) default NULL,
  `winner_id` int(11) default NULL,
  `winning_amt` double default NULL,
  `winning_date` date default NULL,
  `partner_id` int(11) NOT NULL,
  PRIMARY KEY  (`winning_id`),
  KEY `lottery_id` (`lottery_id`),
  KEY `winner_id` (`winner_id`),
  KEY `partner_id` (`partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `p_winning_lottery`
--

INSERT INTO `p_winning_lottery` (`winning_id`, `lottery_id`, `winner_id`, `winning_amt`, `winning_date`, `partner_id`) VALUES
(2, 4, 60, 4000, '2014-12-02', 4),
(3, 4, 59, 2000, '2014-12-15', 4),
(4, 3, 59, 5000, '2014-12-15', 4);

-- --------------------------------------------------------

--
-- Table structure for table `results`
--

CREATE TABLE IF NOT EXISTS `results` (
  `lottery_id` int(11) NOT NULL,
  `result_date` date default NULL,
  `result_slot1` int(11) NOT NULL,
  `result_slot2` int(11) NOT NULL,
  `result_slot3` int(11) NOT NULL,
  `result_slot4` int(11) NOT NULL,
  `result_slot5` int(11) NOT NULL,
  PRIMARY KEY  (`lottery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `results`
--

INSERT INTO `results` (`lottery_id`, `result_date`, `result_slot1`, `result_slot2`, `result_slot3`, `result_slot4`, `result_slot5`) VALUES
(1, '2014-12-02', 1, 2, 33, 44, 55);

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int(11) NOT NULL auto_increment,
  `rolename` varchar(50) NOT NULL,
  PRIMARY KEY  (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `rolename`) VALUES
(4, 'subscriptionncms'),
(5, 'group3');

-- --------------------------------------------------------

--
-- Table structure for table `role_assignment`
--

CREATE TABLE IF NOT EXISTS `role_assignment` (
  `assignment_id` int(11) NOT NULL auto_increment,
  `role_id` int(11) default NULL,
  `module_id` int(11) default NULL,
  `viewtask` tinyint(4) default NULL,
  `addtask` tinyint(4) default NULL,
  `updatetask` tinyint(4) default NULL,
  `deletetask` tinyint(4) default NULL,
  `others` tinyint(11) NOT NULL default '0',
  PRIMARY KEY  (`assignment_id`),
  KEY `role_id` (`role_id`),
  KEY `module_id` (`module_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=69 ;

--
-- Dumping data for table `role_assignment`
--

INSERT INTO `role_assignment` (`assignment_id`, `role_id`, `module_id`, `viewtask`, `addtask`, `updatetask`, `deletetask`, `others`) VALUES
(35, 4, 1, 1, 1, 1, 1, 1),
(36, 4, 2, 1, 1, 1, 1, 1),
(37, 4, 3, 1, 1, 1, 1, 1),
(38, 4, 4, 1, 1, 1, 1, 1),
(39, 4, 5, 1, 1, 1, 1, 1),
(40, 4, 6, 0, 0, 0, 0, 0),
(41, 4, 7, 0, 0, 0, 0, 0),
(42, 4, 8, 0, 0, 0, 0, 0),
(43, 4, 9, 0, 0, 0, 0, 0),
(44, 4, 10, 0, 0, 0, 0, 0),
(45, 4, 11, 0, 0, 0, 0, 0),
(46, 4, 12, 0, 0, 0, 0, 0),
(47, 4, 13, 0, 0, 0, 0, 0),
(48, 4, 14, 1, 1, 1, 1, 1),
(49, 4, 15, 1, 1, 1, 1, 1),
(50, 4, 16, 1, 0, 1, 0, 0),
(51, 4, 17, 1, 1, 1, 1, 1),
(52, 5, 1, 0, 0, 0, 0, 0),
(53, 5, 2, 0, 0, 0, 0, 0),
(54, 5, 3, 0, 0, 0, 0, 0),
(55, 5, 4, 0, 0, 0, 0, 0),
(56, 5, 5, 0, 0, 0, 0, 0),
(57, 5, 6, 0, 0, 0, 0, 0),
(58, 5, 7, 0, 0, 0, 0, 0),
(59, 5, 8, 0, 0, 0, 0, 0),
(60, 5, 9, 0, 0, 0, 0, 0),
(61, 5, 10, 0, 0, 0, 0, 0),
(62, 5, 11, 0, 0, 0, 0, 0),
(63, 5, 12, 0, 0, 0, 0, 0),
(64, 5, 13, 0, 0, 0, 0, 0),
(65, 5, 14, 0, 0, 0, 0, 0),
(66, 5, 15, 0, 0, 0, 0, 0),
(67, 5, 16, 0, 0, 0, 0, 0),
(68, 5, 17, 0, 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `subscribed_user`
--

CREATE TABLE IF NOT EXISTS `subscribed_user` (
  `id` int(11) NOT NULL auto_increment,
  `subscribed_email` varchar(100) NOT NULL,
  `subscribed_status` tinyint(4) NOT NULL default '1',
  `subscribed_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `subscribed_email` (`subscribed_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `subscribed_user`
--

INSERT INTO `subscribed_user` (`id`, `subscribed_email`, `subscribed_status`, `subscribed_date`) VALUES
(1, '20wash.sharma@gmail.com', 1, '2014-11-27 20:23:59');

-- --------------------------------------------------------

--
-- Table structure for table `subscription_content`
--

CREATE TABLE IF NOT EXISTS `subscription_content` (
  `content_id` int(11) NOT NULL auto_increment,
  `content_title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `subscription_status` enum('current','passed') NOT NULL default 'current',
  `creation_date` date NOT NULL,
  PRIMARY KEY  (`content_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `subscription_content`
--

INSERT INTO `subscription_content` (`content_id`, `content_title`, `content`, `subscription_status`, `creation_date`) VALUES
(3, 'Dv', '<p>DV-2015 Program: Online Registration DV 2015 Program: Online registration for the DV 2015 Program began on Tuesday, October 1, 2013 at 12:00 noon, Eastern Daylight Time (EDT) (GMT-4), and concluded on Saturday, November 2, 2013 at 12:00 noon, Eastern Daylight Time (EDT) (GMT-4). DV-2015 Program Instructions Select the English version of the DV-2015 Program Instructions in PDF format for your convenience and required use. The English language version of the DV-2015 Program Instructions is the only official version. Unofficial translations in additional languages are available below. Check back later for additional translations.</p>\n', 'passed', '2014-11-27'),
(4, 'ssfdsdf', '<p>This is my textarea to be replaced with CKEditor.</p>\n', 'passed', '2014-11-27'),
(5, '28', '<p>This is my textarea to be replaced with CKEditor.</p>\n', 'passed', '2014-11-28'),
(6, 'Business', '<p>Business Foreign travelers coming to the United States to conduct temporary business, for example business meetings and consultations, attending conventions and conferences, or negotiating contracts, need visitor visas unless they qualify for entry under the Visa Waiver Program.</p>\n', 'passed', '2014-11-29'),
(7, 'Requires ESTA approval', '<p>entry under the Visa Waiver Program. Need Help Getting Started? TRY OUR VISA WIZARD Visitor Visa B Overview How to Apply Fees Required Documentation For travel to the United States to conduct temporary business. Visa Waiver Program VWP Passport Requirements Stays of 90 days or Less Most citizens of participating countries may travel to the United States for temporary business without a visa through the Visa Waiver Program. Chile Joins Visa Waiver Program Beginning March 31, 2014, Chileans meeting the criteria of the Visa Waiver Program may travel to the United States for business or tourism, for up to 90 days, without a visa.</p>\n', 'passed', '2014-11-30'),
(8, '1', '<p>This is my textarea to be replaced with CKEditor.</p>\n', 'passed', '2014-12-01'),
(9, '2', '<p>This is my textarea to be replaced with CKEditor.</p>\n', 'passed', '2014-12-02'),
(10, '3', '<p>This is my textarea to be replaced with CKEditor.</p>\n', 'passed', '2014-12-03'),
(12, '5', '<p>hi there my buddies</p>\n', 'current', '2014-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `super_admin`
--

CREATE TABLE IF NOT EXISTS `super_admin` (
  `admin_id` int(11) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `super_admin`
--

INSERT INTO `super_admin` (`admin_id`, `username`, `password`) VALUES
(2, 'admin', 'lotto');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(100) NOT NULL auto_increment,
  `username` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `gender` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `residenceaddress` varchar(100) NOT NULL,
  `postalcode` varchar(100) NOT NULL,
  `country` varchar(100) NOT NULL,
  `wallet_balance` varchar(100) NOT NULL,
  `bonus_balance` varchar(100) NOT NULL,
  `registration_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=62 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `name`, `gender`, `email`, `password`, `lastname`, `phone`, `residenceaddress`, `postalcode`, `country`, `wallet_balance`, `bonus_balance`, `registration_date`) VALUES
(59, '20wash', 'Bishwas', 'male', '20wash.sharma@gmail.com', 'abcdef', 'sharma', '54321', 'Baglung', '1234', 'Bangladesh', '47711', '400', '0000-00-00 00:00:00'),
(60, 'biswase', 'shybishwas', 'female', 'shybishwas2047@yahoo.com', 'gharmom1', 'sharma', '', 'gongabu', '233', 'Bangladesh', '', '', '0000-00-00 00:00:00'),
(61, 'ganga', 'spiritual bishwas', '', 'spiritual_chuda@yahoo.com', 'ab56b4d92b40713acc5af89985d4b786', '', '', '121', 'ewewe', '', '', '', '2014-11-23 09:46:45');

-- --------------------------------------------------------

--
-- Table structure for table `winning_lottery`
--

CREATE TABLE IF NOT EXISTS `winning_lottery` (
  `winning_id` int(11) NOT NULL auto_increment,
  `lottery_id` int(11) default NULL,
  `winner_id` int(11) default NULL,
  `winning_amt` double default NULL,
  `winning_date` date default NULL,
  PRIMARY KEY  (`winning_id`),
  KEY `lottery_id` (`lottery_id`),
  KEY `winner_id` (`winner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `withdrawals`
--

CREATE TABLE IF NOT EXISTS `withdrawals` (
  `withdrawal_id` int(11) NOT NULL auto_increment,
  `withdrawer_id` int(11) default NULL,
  `withdraw_amount` double default NULL,
  `withdraw_date` date default NULL,
  PRIMARY KEY  (`withdrawal_id`),
  KEY `withdrawer_id` (`withdrawer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `withdrawals`
--

INSERT INTO `withdrawals` (`withdrawal_id`, `withdrawer_id`, `withdraw_amount`, `withdraw_date`) VALUES
(18, 59, 4000, '2014-10-26'),
(19, 59, 9000, '2014-09-23');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_login`
--
ALTER TABLE `admin_login`
  ADD CONSTRAINT `admin_login_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bet_history`
--
ALTER TABLE `bet_history`
  ADD CONSTRAINT `bet_history_ibfk_1` FOREIGN KEY (`lottery_id`) REFERENCES `lottery` (`lottery_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bet_history_ibfk_2` FOREIGN KEY (`better_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bet_history_ibfk_3` FOREIGN KEY (`gametype_id`) REFERENCES `game_type` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bonus`
--
ALTER TABLE `bonus`
  ADD CONSTRAINT `bonus_ibfk_1` FOREIGN KEY (`beneficiary_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `deposit`
--
ALTER TABLE `deposit`
  ADD CONSTRAINT `deposit_ibfk_1` FOREIGN KEY (`depositer_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `lottery`
--
ALTER TABLE `lottery`
  ADD CONSTRAINT `lottery_ibfk_1` FOREIGN KEY (`lottogroup_id`) REFERENCES `lotto_group` (`lottogroup_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partner_gametype`
--
ALTER TABLE `partner_gametype`
  ADD CONSTRAINT `partner_gametype_ibfk_1` FOREIGN KEY (`game_id`) REFERENCES `game_type` (`game_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partner_gametype_ibfk_2` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `partner_lotterygroup`
--
ALTER TABLE `partner_lotterygroup`
  ADD CONSTRAINT `partner_lotterygroup_ibfk_1` FOREIGN KEY (`lottogroup_id`) REFERENCES `lotto_group` (`lottogroup_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `partner_lotterygroup_ibfk_2` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_admin_login`
--
ALTER TABLE `p_admin_login`
  ADD CONSTRAINT `p_admin_login_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `p_roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_admin_login_ibfk_2` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_bet_history`
--
ALTER TABLE `p_bet_history`
  ADD CONSTRAINT `partner_ibfk_4` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_bet_history_ibfk_1` FOREIGN KEY (`lottery_id`) REFERENCES `p_lottery` (`lottery_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_bet_history_ibfk_2` FOREIGN KEY (`better_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_bet_history_ibfk_3` FOREIGN KEY (`p_gametypeid`) REFERENCES `partner_gametype` (`p_gametypeid`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_lottery`
--
ALTER TABLE `p_lottery`
  ADD CONSTRAINT `p_lottery_ibfk_1` FOREIGN KEY (`p_lotterygroupid`) REFERENCES `partner_lotterygroup` (`p_lotterygroupid`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_lottery_ibfk_2` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_results`
--
ALTER TABLE `p_results`
  ADD CONSTRAINT `p_results_ibfk_1` FOREIGN KEY (`lottery_id`) REFERENCES `p_lottery` (`lottery_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_results_ibfk_2` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_roles`
--
ALTER TABLE `p_roles`
  ADD CONSTRAINT `p_roles_ibfk_1` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_role_assignment`
--
ALTER TABLE `p_role_assignment`
  ADD CONSTRAINT `p_role_assignment_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `p_roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_role_assignment_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `p_modules` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_role_assignment_ibfk_3` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `p_winning_lottery`
--
ALTER TABLE `p_winning_lottery`
  ADD CONSTRAINT `p_winning_lottery_ibfk_1` FOREIGN KEY (`lottery_id`) REFERENCES `p_lottery` (`lottery_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_winning_lottery_ibfk_2` FOREIGN KEY (`winner_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `p_winning_lottery_ibfk_3` FOREIGN KEY (`partner_id`) REFERENCES `partner` (`partner_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `results`
--
ALTER TABLE `results`
  ADD CONSTRAINT `results_ibfk_1` FOREIGN KEY (`lottery_id`) REFERENCES `lottery` (`lottery_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `role_assignment`
--
ALTER TABLE `role_assignment`
  ADD CONSTRAINT `role_assignment_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_assignment_ibfk_2` FOREIGN KEY (`module_id`) REFERENCES `modules` (`module_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `winning_lottery`
--
ALTER TABLE `winning_lottery`
  ADD CONSTRAINT `winning_lottery_ibfk_1` FOREIGN KEY (`lottery_id`) REFERENCES `lottery` (`lottery_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `winning_lottery_ibfk_2` FOREIGN KEY (`winner_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `withdrawals`
--
ALTER TABLE `withdrawals`
  ADD CONSTRAINT `withdrawals_ibfk_1` FOREIGN KEY (`withdrawer_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
