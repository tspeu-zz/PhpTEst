
select nombreMun from municipio 
inner JOIN playas on playas.idMun = municipio.idMunicipio GROUP by playas.idMun

*************
select nombreMun from municipio 
inner JOIN playas on playas.idMun = municipio.idMunicipio
 GROUP by municipio.idMunicipio

 **************************
SELECT * FROM `playas` 
inner JOIN municipio on municipio.idMunicipio = playas.idMun 
where playas.idMun = 1

*******************
SELECT * FROM `playas` 
inner JOIN municipio on municipio.idMunicipio = playas.idMun
----------------------------
DETALLE
SELECT * FROM `playas` 
inner JOIN municipio on municipio.idMunicipio = playas.idMun 
ORDER BY `idMun`
--------------------

MUNICIPIOS
************************
SELECT nombreMun FROM `municipio` 

GRANT ALL PRIVILEGES ON playasdb.* TO 'dwes'@'%';
en php => 
$sql  = 'GRANT ALL PRIVILEGES ON playasdb.* TO \'dwes\'@\'%\'';

*-*
SELECT * FROM `playas` 
inner JOIN municipio on municipio.idMunicipio = playas.idMun 
where playas.idMun = 1


idPlaya
idMun
nombre
descripcion
direccion
playaSize
longitud
latitud
imagen
SELECT * FROM `playas` WHERE 1

INSERT INTO `playas` 
(`idPlaya`, `idMun`, 
`nombre`, `descripcion`,
 `direccion`, `playaSize`, 
 `longitud`, `latitud`, `imagen`)
 VALUES
(1171, 1,
 'Playa Mesa del Mar enTacoronte',
  'Sin descripción', 'Mesa del Mar', '
  Desconocido', 28.5052, -16.4229, imagen)

  INSERT INTO `playas` 
  (`idPlaya`, `idMun`, `nombre`, `descripcion`, `direccion`, `playaSize`, `longitud`, `latitud`, `imagen`) 
  VALUES ('1', '1', 'test', 'cosas', 'dir', 'Desconocido', '1', '1', NULL);


errrrr

  ! ) PDOException: SQLSTATE[42000]: Syntax error or access violation: 
  1064 You have an error in your SQL syntax; check the manual that corresponds 
  to your MariaDB server version for the right syntax to use near '
   test2,tamaño2,di2, des2,222,333)' 
   at line 6 in C:\xampp\htdocs\UT_8\altaplaya.php on line 82

   ( ! ) Fatal error: Uncaught exception 'PDOException' with message
    'SQLSTATE[42S22]: Column not found: 1054 Unknown column 'test2' in 
    'field list'' in C:\xampp\htdocs\UT_8\altaplaya.php on line 99
