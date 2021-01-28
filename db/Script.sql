-- Creación de la base de datos
CREATE DATABASE `Intelcost_bienes` /*!40100 COLLATE 'utf8_general_ci' */


-- Creación de la tabla bienes donde se almacenan los datos generales.
CREATE TABLE `bienes` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`direccion` VARCHAR(100) NULL DEFAULT NULL,
	`id_ciudad` INT NULL DEFAULT NULL,
	`telefono` VARCHAR(100) NULL DEFAULT NULL,
	`codigo_postal` VARCHAR(100) NULL DEFAULT NULL,
	`id_tipo` INT NULL DEFAULT NULL,
	`precio` INT NULL DEFAULT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci';


-- Creación de la tabla ciudades.
CREATE TABLE `ciudades` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(100) NOT NULL DEFAULT '0'
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci';


-- Creación de la tabla tipo de vivienda.
CREATE TABLE `tipo` (
	`id` INT NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(100) NOT NULL DEFAULT '0',
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci';

-- Asignar llave foranea a bienes desde ciudades
ALTER TABLE bienes
ADD CONSTRAINT FK_BienesCiudades
FOREIGN KEY (id_ciudad) REFERENCES ciudades(id);

-- Asignar llave foranea a bienes desde tipo
ALTER TABLE bienes
ADD CONSTRAINT FK_BienesTipo
FOREIGN KEY (id_tipo) REFERENCES tipo(id);


-- Insert de las ciudades 
INSERT INTO intelcost_bienes.ciudades (nombre)
VALUES
	('New York'),
	('Orlando'),
	('Los Angeles'),
	('Houston'),
	('Washington'),
	('Miami');
    

-- Insert de las tipo 	
INSERT INTO intelcost_bienes.tipo (nombre)
VALUES
	('Casa'),
	('Casa de Campo'),
	('Apartamento');
    
/*	NO EJECUTAR (Datos de prueba)
-- Insert de los bienes disponibles
INSERT INTO `intelcost_bienes`.`bienes` (`direccion`, `id_ciudad`,`telefono`,`codigo_postal`,`id_tipo`,`precio`) 
VALUES ('Ap #549-7395 Ut Rd.', 1,'334-052-0954', '85328', 1, '30746'),
		('P.O. Box 657, 9831 Cursus St.', 2,'488-441-5521', '04436', 2, '71045'),
		('Ap #325-2507 Quisque Av.', 3,'623-807-2869', '89804', 2, '36087'),
		('347-866 Laoreet Road', 3,'997-640-8188', '94526-134', 2, '16048'),		
		('4732 Ipsum. Rd.', 4,'802-414-8872', '162925', 1, '45912'),		
		('672-9576 Consectetuer Road', 2,'355-601-5749', '210020', 2, '64370'),		
		('549-5766 Sodales St.', 2,'557-228-6918', '16794', 1, '2846'),		
		('P.O. Box 847, 2589 In Av.', 5,'390-713-8687', '70689', 3, '60951'),		
		('175-4344 Nec, Ave', 2,'578-170-6179', 'P0C 0G3', 2, '58902'),		
		('P.O. Box 497, 8679 Turpis. St.', 1,'870-559-3430', '7029', 1, '17759'),		
		('844-8312 Molestie Road', 6,'147-920-5435', '5237JG', 1, '91067'),		
		('P.O. Box 494, 674 Amet, Street', 1,'056-617-2556', '684445', 1, '36155'),		
		('P.O. Box 466, 2795 Velit. Avenue', 1,'252-330-0116', '5422', 3, '78947'),		
		('P.O. Box 523, 2126 Aliquet Rd.', 2,'986-825-6899', '37045', 2, '51817'),		
		('Ap #669-7718 Cras St.', 1,'200-935-8531', 'RI9 6RT', 1, '39561'),		
		('2211 Malesuada Rd.', 3,'436-742-7954', '31519', 3, '52433'),		
		('P.O. Box 181, 7858 Nisi. St.', 4,'383-252-8216', '83594', 3, '85641'),		
		('741-2614 Accumsan Rd.', 6,'487-609-0106', '753543', 2, '78854'),		
		('829-3250 In Rd.', 1,'788-832-7076', '783917', 2, '64471'),		
		('Ap #393-3363 Fringilla Road', 2,'335-278-9678', '8635', 3, '47420'),		
		('Ap #247-8024 Curabitur St.', 6,'167-013-1429', '15971', 2, '28795'),		
		('995-1099 Id, Road', 5,'491-394-8799', '37-346', 3, '69505'),		
		('Ap #176-8333 Gravida St.', 6,'339-324-8859', '0318YB', 2, '73231'),		
		('340-985 Lobortis. Avenue', 5,'049-063-4896', '5411', 2, '83847'),		
		('992-7214 Pharetra Rd.', 6,'257-364-7011', '1045SO', 1, '93907'),		
		('7705 Fusce St.', 5,'363-540-9113', '9802', 2, '21796'),		
		('723-5458 Neque. Ave', 1,'512-886-8792', '1038', 1, '97134'),		
		('Ap #246-9877 Ultricies Rd.', 5,'423-014-6013', '61483', 1, '32659'),		
		('Ap #712-3234 Nunc Road', 6,'334-030-0048', '9738', 3, '14560'),		
		('4406 Justo Avenue', 4,'242-441-7733', '38707', 2, '69433'),		
		('Ap #172-6600 Vivamus St.', 1,'710-649-0830', '57503', 2, '1986'),		
		('Ap #728-4099 Et, Ave', 4,'535-501-0707', '0242AN', 1, '73668'),		
		('4648 Sem Rd.', 5,'956-749-3273', '94323', 3, '85996'),		
		('Ap #539-4295 Volutpat Avenue', 6,'904-312-9292', '894922', 1, '38835'),		
		('500-6214 Tempus, Street', 6,'168-671-0953', '5574', 2, '62069'),		
		('233-9001 Cum Rd.', 1,'670-701-8060', '20705', 2, '32174'),		
		('4084 Sit St.', 2,'326-023-8622', '02187', 3, '23492'),		
		('P.O. Box 825, 9762 Etiam Street', 6,'343-695-3228', '56309', 2, '42579'),		
		('5889 Luctus. Ave', 1,'259-039-5762', '6038', 3, '41843'),		
		('Ap #834-3873 Nullam St.', 4,'809-587-9484', '69526', 2, '94728'),		
		('P.O. Box 711, 706 Dis Rd.', 5,'354-038-8533', '65211', 2, '90451'),		
		('P.O. Box 315, 6041 Duis Avenue', 2,'186-671-4205', '893592', 2, '2261'),		
		('5640 Dapibus St.', 5,'906-342-4567', '4263', 2, '76404'),		
		('5260 Sed Rd.', 1,'9336-903-7567', '92501', 1, '2055'),		
		('Ap #864-1235 Mi Rd.', 2,'723-547-1102', 'G9T 9P2', 2, '99508'),		
		('8151 Rutrum Rd.', 6,'594-072-4670', '58567', 1, '7952'),		
		('P.O. Box 926, 1798 Pellentesque St.', 1,'328-063-3034', '0547ID', 1, '48882'),		
		('P.O. Box 264, 6488 Euismod Avenue', 3,'210-220-4305', 'J6H 9S9', 3, '33141'),		
		('Ap #694-1472 Orci Ave', 1,'362-652-3567', '63897', 3, '88980'),		
		('P.O. Box 354, 6477 Eget St.', 3,'593-092-8585', '90970-060', 1, '35831'),		
		('128-8013 Imperdiet Avenue', 1,'611-764-9648', '727883', 2, '99230'),		
		('Ap #394-8201 Pede. St.', 1,'057-000-7888', '6390', 3, '82679'),		
		('Ap #210-1906 Mauris St.', 1,'742-185-0661', '4116', 1, '96998'),		
		('228-2036 Tincidunt Road', 2,'565-750-7079', '7217', 1, '54710'),		
		('681-117 Facilisis Street', 5,'695-936-1302', '83809', 1, '96281'),		
		('P.O. Box 665, 3825 Nec St.', 5,'859-638-8140', '83809', 1, '3829'),		
		('Ap #800-4147 In Street', 3,'324-489-2139', '66013', 2, '70069'),		
		('297-8960 Libero. Rd.', 3,'626-297-1082', '9133', 2, '26514'),		
		('5605 Nisi Ave', 2,'842-236-6720', '188876', 1, '68927'),		
		('P.O. Box 870, 9855 Tristique Avenue', 6,'114-453-9481', '64899', 1, '67772'),
		('Ap #214-5963 Metus Road', 4,'337-930-6310', '5290KA', 1, '71048'),		
		('869 Tempus St.', 1,'235-726-7602', 'Y4V 5A1', 2, '90138'),		
		('P.O. Box 916, 4350 In Avenue', 1,'292-391-9640', '26271', 2, '70212'),		
		('Ap #768-2635 Eget, Avenue', 6,'909-006-0105', '93246', 1, '74320'),		
		('Ap #581-5945 Ullamcorper Road', 2,'820-970-3451', '35826', 3, '15782'),		
		('Ap #298-502 Dolor. Ave', 2,'339-015-5616', '8625GM', 2, '27530'),		
		('569-3972 Malesuada Street', 6,'712-181-4815', '857132', 2, '56359'),		
		('Ap #378-8818 Molestie Ave', 3,'286-311-5133', '39945', 2, '29789'),		
		('766 Consequat, St.', 3,'790-137-7352', '71804', 1, '57408'),		
		('729-3081 Cubilia Rd.', 5,'888-946-8086', 'F7 0YF', 1, '87871'),		
		('457-7987 Curae; Rd.', 5,'760-938-1297', '19418', 1, '43727'),		
		('6158 Tempor Rd.', 4,'690-850-4520', 'L18 9SC', 2, '30425'),		
		('Ap #693-2983 Class St.', 1,'213-536-0655', '21712', 1, '23311'),		
		('841 Scelerisque Rd.', 4,'367-551-7660', 'YY0A 3TD', 2, '72611'),		
		('792-7569 Dolor Rd.', 1,'261-470-7647', '14844', 1, '98815'),		
		('444-5718 Ut Rd.', 5,'041-009-6788', '8230', 1, '50861'),		
		('Ap #377-8404 Ipsum Street', 1,'534-916-5827', '37234', 2, '87808'),		
		('2425 Rutrum Street', 3,'494-431-4661', 'IC54 7IK', 1, '93263'),		
		('344-8412 Nisl. St.', 4,'050-082-4431', '99-113', 3, '99947'),		
		('9399 Sem Ave', 4,'909-320-3004', '03082', 1, '69922'),		
		('P.O. Box 284, 8629 Egestas. St.', 2,'196-562-2718', 'A8Z 9N1', 1, '25541'),		
		('283-2290 Aliquam Street', 1,'272-977-8230', 'G1C 0L5', 3, '97152'),		
		('P.O. Box 787, 1352 Mollis Rd.', 1,'580-328-0397', '63477', 1, '70429'),		
		('571-3448 Ipsum. St.', 1,'451-067-8082', '1688', 2, '9426'),		
		('626-4183 Eros. Road', 1,'818-932-2502', '3977', 3, '82655'),		
		('Ap #500-446 Accumsan Ave', 3,'453-561-4737', '3773', 2, '29354'),		
		('3703 Quisque Rd.', 2,'020-821-1050', '54983', 3, '96267'),		
		('5946 Consectetuer St.', 1,'773-538-6408', 'Q28 3PO', 1, '61691'),		
		('P.O. Box 556, 1951 Vulputate Av.', 4,'670-572-1780', '4484KP', 1, '95859'),		
		('727-198 A Road', 4,'821-444-9824', '5962', 3, '82504'),		
		('Ap #271-6835 Tempus St.', 5,'601-485-1049', '703157', 1, '80965'),		
		('P.O. Box 519, 981 Nostra, Avenue', 6,'440-469-6769', '61790-368', 2, '49957'),		
		('2759 Faucibus St.', 5,'510-056-8508', '612383', 1, '23498'),
		('5720 Urna, Street', 6,'581-094-0717', 'X45 0FA', 2, '8187'),		
		('283-1453 Amet, Avenue', 3,'751-107-3929', 'R1B 4Y7', 3, '32660'),		
		('P.O. Box 169, 7235 Quisque Road', 3,'782-078-8565', '86541', 1, '39721'),		
		('6840 Rhoncus. Ave', 6,'845-500-3131', '7112', 2, '97135'),		
		('967-7675 A, Rd.', 3,'751-125-7876', '34981', 3, '6672'),		
		('227-6771 Ut Street', 4,'262-186-7762', '7131', 2, '17160'),		
		('P.O. Box 432, 4652 Proin Ave', 5,'113-637-2816', '598072', 1, '42804');
*/