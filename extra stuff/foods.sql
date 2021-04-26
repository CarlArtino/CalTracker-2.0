DROP TABLE IF EXISTS `foods`;
CREATE TABLE IF NOT EXISTS `foods` (
  `foodID` int(11) NOT NULL AUTO_INCREMENT,
  `foodName` varchar(100) CHARACTER SET utf8 NOT NULL,
  `foodType` varchar(100) CHARACTER SET utf8 NOT NULL,
  `foodBrand` varchar(100) CHARACTER SET utf8 NOT NULL,
  `calories` FLOAT(11) NOT NULL,
  `fat` FLOAT(11) NOT NULL,
  `cholesterol` FLOAT(11) NOT NULL,
  `sodium` FLOAT(11) NOT NULL,
  `carbs` FLOAT(11) NOT NULL,
  `protein` FLOAT(11) NOT NULL,
  PRIMARY KEY (`foodID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;