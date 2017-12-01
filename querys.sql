
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