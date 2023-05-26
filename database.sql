CREATE TABLE `tutores` (
  `idTutor` int(11) NOT NULL,
  `nome` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `email` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `pets` (
  `idPet` int(11) NOT NULL,
  `genero` int(1) NOT NULL,
  `especie` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `nome` varchar(40) CHARACTER SET latin1 DEFAULT NULL,
  `dataNascimento` date,
  `observacoes` varchar(200) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

ALTER TABLE `tutores`
  ADD PRIMARY KEY (`idTutor`);

ALTER TABLE `tutores`
  MODIFY `idTutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

ALTER TABLE `pets`
  ADD PRIMARY KEY (`idPet`);

ALTER TABLE `pets`
  MODIFY `idPet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;