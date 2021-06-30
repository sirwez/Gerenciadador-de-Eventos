

CREATE TABLE `convidados` (
  `id_evento` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `especialidade` (
  `nome` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `evento` (
  `id_evento` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `data` date DEFAULT NULL,
  `organizador` int(11) DEFAULT NULL,
  `sala` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `sala` (
  `id_sala` int(11) NOT NULL,
  `nome` varchar(45) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL,
  `capacidade` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `sala_tem_especialidade` (
  `id_sala` int(11) NOT NULL,
  `especialidade` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `cpf` char(14) NOT NULL,
  `email` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `convidados`
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

ALTER TABLE `especialidade`
  ADD PRIMARY KEY (`nome`);

ALTER TABLE `evento`
  ADD PRIMARY KEY (`id_evento`),
  ADD KEY `organizador` (`organizador`),
  ADD KEY `sala` (`sala`);


ALTER TABLE `sala`
  ADD PRIMARY KEY (`id_sala`),
  ADD UNIQUE KEY `nome` (`nome`);


ALTER TABLE `sala_tem_especialidade`
  ADD KEY `id_sala` (`id_sala`),
  ADD KEY `especialidade` (`especialidade`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);


ALTER TABLE `evento`
  MODIFY `id_evento` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `convidados`
  ADD CONSTRAINT `convidados_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `evento` (`id_evento`),
  ADD CONSTRAINT `convidados_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

ALTER TABLE `evento`
  ADD CONSTRAINT `evento_ibfk_1` FOREIGN KEY (`organizador`) REFERENCES `usuario` (`id_usuario`),
  ADD CONSTRAINT `evento_ibfk_2` FOREIGN KEY (`sala`) REFERENCES `sala` (`id_sala`);

ALTER TABLE `sala_tem_especialidade`
  ADD CONSTRAINT `sala_tem_especialidade_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `sala` (`id_sala`),
  ADD CONSTRAINT `sala_tem_especialidade_ibfk_2` FOREIGN KEY (`especialidade`) REFERENCES `especialidade` (`nome`);
