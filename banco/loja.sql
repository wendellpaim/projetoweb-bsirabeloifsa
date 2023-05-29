# Host: 127.0.0.1  (Version 5.5.5-10.4.24-MariaDB)
# Date: 2023-03-08 02:09:35
# Generator: MySQL-Front 6.0  (Build 2.20)


#
# Structure for table "categoria"
#

DROP TABLE IF EXISTS `categoria`;
CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `nome_categoria` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL,
  `produto_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "categoria"
#

INSERT INTO `categoria` VALUES (1,'Eletrodoméstico',NULL),(2,'Smartphones',NULL),(3,'Móveis',NULL);

#
# Structure for table "produtos"
#

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE `produtos` (
  `id_produto` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `descricao` text NOT NULL,
  `preco` decimal(10,2) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_produto`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

#
# Data for table "produtos"
#

INSERT INTO `produtos` VALUES (1,'Geladeira Consul Frost Free Duplex 450 litros','A Geladeira Consul Frost Free 450 litros Espaço Flex tem flexibilidade e capacidade de sobra para organizar tudo da sua maneira.',4449.00,'Geladeira-Consul-CRM56HK.png\n',1),(2,'Geladeira Consul CRD37EB','A geladeira possui 334L',2200.00,'Geladeira-Consul-CRD37EB.png',1),(3,'Geladeira Electrolux Duplex DC35A','Com duas portas e design moderno, a Geladeira Electrolux DC35A vai facilitar suas tarefas diárias e te surpreender pela qualidade e pelos diversos recursos que ela oferece.',2450.00,'Geladeira-Electrolux-Duplex-DC35A.png',1),(4,'Fogão Esmaltec 4 Bocas Bali 4111','Com medidas de 84,50 x 51 x 58 cm (altura, largura e profundidade), o fogão 4 Bocas Esmaltec Bali vai se encaixar perfeitamente em qualquer cozinha, inclusive nas mais compactas.',540.00,'Fogão-Esmaltec-Bali.png',1),(5,'Samsung Galaxy A33 128GB 5G','Smartphone Samsung Galaxy A33 5G, Resistência a água e poeira IP67, 128GB 6GB RAM + até 6GB RAM Plus, Processador 5G de última geração, até 2 dias de bateria, Fotos mais nitidas com mais detalhes, Câmera Quádrupla Traseira de 48MP (Estabilização Optica) + 8MP + 5MP + 2MP, Selfie de 13MP, Tela Infinita de 6.4',1750.00,'Samsung-Galaxy-A33.jpg',2),(6,'Samsung Galaxy S22 128GB','Tenha todos os seus compromissos e aplicativos úteis na palma da sua mão, sem deixar nada para trás com o S22 Galaxy da Samsung. Seu processador Octa-Core Snapdragon 8 Gen 1 e memória RAM de 8GB permite que o seu smartphone funcione da melhor maneira possível e com total fluidez, evitando os indesejáveis travamentos nos aplicativos.',3399.00,'galaxys22.png',2),(7,'Smartphone Motorola Edge 30 256GB 5G','Conheça o motorola edge 30. Com design lindo, leve e único, ele cabe fácil na sua mão sem deixar de lado o desempenho que você precisa. ',2199.00,'motoedge30.png',2),(8,'Xiaomi Poco F4 256GB 8GB','Sistema operacional MIUI 13, 8GB de RAM, 256GB de armazenamento interno, junto de conexão 5G moderna, tela AMOLED de 6.6 polegadas e 3 câmeras de 64MP+8MP+2MP e 20MP a frontal, tudo isso e muito mais presente no smartphone POCO F4.',3299.00,'xiaomipocof4.png',2),(9,'Escrivaninha Office NT2070',' A Mesa Office NT 2070 da Notável Móveis é o produto ideal para seu quarto ou escritório, um produto compacto e funcional para lhe ajudar nos dias mais atarefados. Conta com 1 Gaveta e Espaço para Gabinete, tornando-se uma mesa multifuncional, podendo ser usada tanto para notebooks quanto para computadores de mesa.',183.99,'escrivaninha.png',3),(10,'Guarda-Roupa Bartira Brusque II','Essencial na composição de qualquer dormitório, o roupeiro é aquele móvel que auxilia na organização do ambiente e deixa a decoração com um estilo próprio. Portanto, se a sua intenção é deixar o quarto mais funcional, o Guarda-Roupa Brusque II da Bartira é uma ótima opção. Com design clássico, ele possui espaço de sobra para acomodar roupas, sapatos e outros objetos de uso pessoal ou coletivo.',600.00,'guarda_roupa.jpg',3),(11,'Cama Box Casal Acoplada Itapuã','A cama box Itapuã é produzida com madeira reflorestada selada com compensado de pinos e revestida com tecido bordado de poliéster com 1cm de espuma e na lateral revestida com veludo. ',349.99,'cama-box-itapua.png',3),(12,'Sofá 4 Lugares Linoforte Benetton','O descanso com aconchego e requinte, após um dia de trabalho, está garantido com o Sofá Linoforte Benetton. Assista a seus programas de TV preferidos, jogue videogame, leia um livro, acesse as redes sociais no celular e aproveite o conforto proporcionado por este móvel de 4 lugares!',1899.00,'sofalinoforte.jpg',3);

#
# Structure for table "usuario"
#

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `email` varchar(90) DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `cpf` varchar(11) DEFAULT NULL,
  `cep` varchar(9) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  `flagtipo` tinyint(3) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

#
# Data for table "usuario"
#

INSERT INTO `usuario` VALUES (1,'admin',NULL,NULL,NULL,NULL,NULL,NULL,'123456',0);
