# Host: localhost  (Version 5.7.33)
# Date: 2022-07-28 11:31:09
# Generator: MySQL-Front 6.1  (Build 1.21)


#
# Structure for table "login"
#

CREATE TABLE `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `password` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `rol` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "login"
#

INSERT INTO `login` VALUES (1,'Donato','drakho','123456','Administrador');

#
# Structure for table "postulantes"
#

CREATE TABLE `postulantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ape_paterno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ape_materno` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `ci` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `edad` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `estado_CD` varchar(50) COLLATE utf8_spanish_ci DEFAULT 'Sin Evaluar',
  `estado_CB` varchar(50) COLLATE utf8_spanish_ci DEFAULT 'Sin Evaluar',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "postulantes"
#

INSERT INTO `postulantes` VALUES (1,'Dario Pablo','Nina','Guzman','43658756','33','87563456','Evaluado','Evaluado'),(2,'Juan Diego','Mendieta','Vidal','4567356','33','76878966','Evaluado','Evaluado'),(3,'Fabio Hugo','Bustos','Medinacelli','4565667','33','77685674','Evaluado','Evaluado'),(4,'Paola','Mendoza','Higuera','4354467','32','78666456','Evaluado','Evaluado'),(5,'Gustavo','Figueroa','Duran','64575783','33','77765788','Evaluado','Evaluado'),(6,'Doris','Guzman','Pinedo','4354567','25','77654567','Evaluado','Evaluado');

#
# Structure for table "evaluacion"
#

CREATE TABLE `evaluacion` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_postulante` int(11) NOT NULL,
  `vcd_fap` int(11) NOT NULL DEFAULT '0',
  `vcd_fas` int(11) NOT NULL DEFAULT '0',
  `vcd_elg` int(11) NOT NULL DEFAULT '0',
  `vcd_ele` int(11) NOT NULL DEFAULT '0',
  `vcd_cte` int(11) NOT NULL DEFAULT '0',
  `vcd_suma` int(11) NOT NULL DEFAULT '0',
  `vcd_salida` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `vcb_com` int(11) NOT NULL DEFAULT '0',
  `vcb_cdd` int(11) NOT NULL DEFAULT '0',
  `vcb_ini` int(11) NOT NULL DEFAULT '0',
  `vcb_tre` int(11) NOT NULL DEFAULT '0',
  `vcb_inte` int(11) NOT NULL DEFAULT '0',
  `vcb_pro` int(11) NOT NULL DEFAULT '0',
  `vcb_salida` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `res_texto` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `res_num` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_34` (`id_postulante`),
  CONSTRAINT `FK_eval` FOREIGN KEY (`id_postulante`) REFERENCES `postulantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "evaluacion"
#

INSERT INTO `evaluacion` VALUES (1,1,25,7,10,20,30,92,'Habilitado',73,79,66,86,55,72,'Aceptado','0',0),(2,2,30,6,10,20,30,96,'Habilitado',81,96,90,73,79,84,'Aceptado','0',0),(3,3,20,7,10,20,30,87,'Habilitado',98,87,99,73,83,88,'Aceptado','0',0),(4,4,30,7,10,20,30,97,'Habilitado',90,83,96,64,48,76,'Aceptado','0',0),(5,5,25,3,10,20,30,88,'Habilitado',10,12,37,38,55,30,'Rechazado','0',0),(6,6,30,10,10,20,30,100,'Habilitado',71,77,60,72,53,67,'Aceptado','0',0);

#
# Structure for table "cd_notas"
#

CREATE TABLE `cd_notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL DEFAULT '0',
  `fap` int(11) NOT NULL DEFAULT '0',
  `fas` int(11) NOT NULL DEFAULT '0',
  `elg` int(11) NOT NULL DEFAULT '0',
  `ele` int(11) NOT NULL DEFAULT '0',
  `cte` int(11) NOT NULL DEFAULT '0',
  `suma_cd` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_cd` (`id_post`),
  CONSTRAINT `FK_cd` FOREIGN KEY (`id_post`) REFERENCES `postulantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "cd_notas"
#

INSERT INTO `cd_notas` VALUES (1,1,25,7,10,20,30,92),(2,2,30,6,10,20,30,96),(3,3,20,7,10,20,30,87),(4,4,30,7,10,20,30,97),(5,5,25,3,10,20,30,88),(6,6,30,10,10,20,30,100);

#
# Structure for table "cb_notas"
#

CREATE TABLE `cb_notas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL DEFAULT '0',
  `com` int(11) NOT NULL DEFAULT '0',
  `cdd` int(11) NOT NULL DEFAULT '0',
  `ini` int(11) NOT NULL DEFAULT '0',
  `tre` int(11) NOT NULL DEFAULT '0',
  `inte` int(11) NOT NULL DEFAULT '0',
  `suma_cb` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_cb` (`id_post`),
  CONSTRAINT `FK_cb` FOREIGN KEY (`id_post`) REFERENCES `postulantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

#
# Data for table "cb_notas"
#

INSERT INTO `cb_notas` VALUES (1,1,73,79,66,86,55,359),(2,2,81,96,90,73,79,419),(3,3,98,87,99,73,83,440),(4,4,90,83,96,64,48,381),(5,5,10,12,37,38,55,152),(6,6,71,77,60,72,53,333);

#
# Structure for table "variables_lin"
#

CREATE TABLE `variables_lin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_post` int(11) NOT NULL DEFAULT '0',
  `var_com` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `var_cdd` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `var_ini` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `var_tre` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `var_int` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `var_salida` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `resultado` varchar(50) COLLATE utf8_spanish_ci NOT NULL DEFAULT '',
  `grado` float(3,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`),
  KEY `FK_var` (`id_post`),
  CONSTRAINT `FK_var` FOREIGN KEY (`id_post`) REFERENCES `postulantes` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

#
# Data for table "variables_lin"
#

INSERT INTO `variables_lin` VALUES (1,1,'alto','alto','alto','optimo','alto','Optimo','Aceptado',0.66),(2,2,'optimo','optimo','optimo','alto','alto','Excelente','Aceptado',0.59),(3,3,'optimo','optimo','optimo','alto','optimo','Excelente','Aceptado',0.87),(4,4,'optimo','optimo','optimo','alto','medio','Optimo','Aceptado',0.44),(5,5,'bajo','bajo','medio','medio','alto','Malo','Rechazado',0.00),(6,6,'alto','alto','alto','alto','alto','Optimo','Aceptado',0.92);
