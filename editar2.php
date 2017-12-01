<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>UT_3 DWES JM_Banchero</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/dwes.css">
    <!-- Latest compiled and minified JavaScript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link type="image/x-icon" href="img/ghost.png" rel="shortcut icon" />
</head>
<body>
	<nav class='navbar navbar-default'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <a class='navbar-brand'> <img alt='Brand' src='img/ghost.png'></a>
                </div>
                <ul class='nav navbar-nav'>
                    <li class='active'>
                        <a href='#'>  DWES-UT8 JM_B  <span class='sr-only'>(current)</span></a>
                    </li>
                    <li><a href='#'>DETALLE DE PLAYAS DESDE dB MYSQL</a>
                    </li>
                </ul>
            </div>
    </nav>
	<?php

		if (isset($_POST['idPlaya'])) $editPro = $_POST['idPlaya'];
			try {
				$opciones =array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
				$dwes = new PDO("mysql:host=localhost;dbname=playasdb", "dwes", "abc123.",$opciones);
				$dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}catch (PDOException $e) {
				$error = $e->getCode();
				$mensaje = $e->getMessage();
		}
	?>
	<div id="encabezado">
		<h1>DETALLE PLAYA</h1>
	</div>
	
	<?php
		if (!isset($error) && isset($editPro)) {

			$sql = <<<SQL
				SELECT  playas.*
				FROM playas
				WHERE playas.idPlaya='$editPro'
SQL;

// SELECT playas.*
// FROM playas INNER JOIN municipio ON municipio.idMunicipio = playas.idMun
// WHERE playas.idMun='$idSelect'
// $sql = 'SELECT cod,nombre, nombre_corto, descripcion, PVP, familia FROM producto
// WHERE producto.cod="$idSelect' SQL' ;
		$resultado = $dwes->query($sql);

		if($resultado) {
		
			$row = $resultado->fetch();
			
			$idPlaya=$row['idPlaya'];
			$idMun=$row['idMun'];
			$nombre=$row['nombre'];
			$direccion=$row['direccion'];
			$descripcion=$row['descripcion'];
			$playaSize=$row['playaSize'];
			$longitud=$row['longitud'];
			$latitud=$row['latitud'];
			$imagen=$row['imagen'];

			echo"	<div id='contenido' class='container container-fluid'>
			<h2>PLAYA SELECCIONADA: $nombre</h2>";

			echo "<div class='panel'>
			<form id='form_edit' action='actualizar.php' method='post'>";
echo "Código: <input type='text' style='color: #F00;background-color: #ccc;' name='cod' value='$idPlaya' readonly />";
			
			echo ' 	
			<div class="row">
			<div class="col-md-8 col-md-4">
				<div class="thumbnail">
				<img src="data:image/jpeg;base64,'.base64_encode($imagen).'" style="width="50px; height="50px;" 
				alt="...">
				<div class="caption">
					<h3>'.$nombre.'</h3> 
					<span class="badge">'.$idPlaya.'</span>
					<p>'.$direccion.'</p> 
					<p>'.$playaSize.' mts </p> 
					
						
						<textarea name="descripcion" rows="10" cols="100" >'.$descripcion.'</textarea>

						<div id="map"></div>




					<p><a href="test4.php" class="btn btn-primary" role="button" type="submit">Atras</a> 
				
					</p>
				</div>
				</div>
			</div>
			</div> ';
			

			echo "</form></div>";

			
		}

		}

		$idPlaya="";
		$idMun="";
		$nombre="";
		$direccion="";
		$descripcion="";
		$playaSize="";
		$longitud="";
		$latitud="";
		$imagen=""
		
//   <a href="test3.php" class="btn btn-default" role="button">Atras</a>
			// echo "<h2><span class='label label-danger'>CODIGO Playa:</span></h2>
				// <input type='text' class='disabled' name='codA'aria-describedby='basic-addon1' value='$idPlaya' readonly>";

			// 	echo "<div class='input-group'>
			// 	<span class='label label-danger' id='basic-addon1'>CODIGO:</span>
			// 	<input type='text' class='form-control' name='codA' aria-describedby='basic-addon1' value=' $codigoE'>
			//   </div>";

				// echo "<input type='hidden' name='idmunicipio' value='$idMun' />";

				// echo "<div class='input-group'>
				// <span class='input-group-addon' id='basic-addon1'>Nombre </span>
				// <input type='text' class='form-control' aria-describedby='basic-addon1' name='nombre' value='$nombre' readonly>
				// </div>";

				// echo "<div class='input-group'>
				// <span class='input-group-addon' id='basic-addon1'>Direccion : </span>
				// <input type='text' class='form-control' aria-describedby='basic-addon1' name='direccion' value='$direccion' readonly>
				// </div>";

				// echo "<div class='input-group'><span class='input-group-addon'>Descripción: </span>
				// <textarea name='descripcion' rows='10' cols='100' >$descripcion</textarea></div>";

				// echo "<div class='input-group'>
				// <span class='input-group-addon' id='basic-addon1'>Tamaño : </span>
				// <input type='text' class='form-control' aria-describedby='basic-addon1' name='playaSize' value='$playaSize m'>
				// </div>";

				// echo "<div class='input-group'>
				// <span class='input-group-addon' id='basic-addon1'>LONGITUD : </span>
				// <input type='text' class='form-control' aria-describedby='basic-addon1' name='longitud' value='$longitud º'>
				// </div>";

				// echo "<div class='input-group'>
				// <span class='input-group-addon' id='basic-addon1'>Latitud : </span>
				// <input type='text' class='form-control' aria-describedby='basic-addon1' name='latitud' value='$latitud º'>
				// </div>";

				// echo "<div class='input-group'>
				// <span class='input-group-addon' id='basic-addon1'>Imagen : </span>";
				// <img  class=' media-object' src='data:image/jpeg;base64,.base64_encode($imagen).' style='width=50px; height=50px;'/>
				// echo '<img src="data:image/jpeg;base64,'.base64_encode($imagen).'" style="width="50px; height="50px;"/>';
				// echo "</div>";
				 // echo '<img src="data:image/jpeg;base64,'.base64_encode($imagen).'" style="width="50px; height="50px;"/>';
				// <img class="media-object" src="..." alt="...">
				// echo "<button class='btn btn-success' type='submit' value='actualizar' name='actualizar'>Actualizar</button>";
				// echo "<button class='btn btn-danger' type='submit' value='cancelar' name='cancela'>Cancelar</button>";

	?>

	</div>
	<script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-33.863276, 151.207977),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSqx3tdkE1X-WnsRIzL8KYxKjOO5MfMTc&callback=initMap">
    </script>
</body>
</html>
