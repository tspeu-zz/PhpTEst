<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>UT_8 DWES JM_Banchero</title>
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
                    <li><a href='#'>VER DETALLES PLAYAS</a> 
                    </li>
                </ul>
            </div>
    </nav>
	<?php
		if (isset($_POST['idMun'])) $codigo = $_POST['idMun'];
		
		try {
			$opciones =array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
			$dwes = new PDO("mysql:host=localhost;dbname=playasdb", "dwes", "abc123.",$opciones);
			$dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch (PDOException $e) {
			$error = $e->getCode();
			$mensaje = $e->getMessage();
		}
	?>
		<div id="contenido" class="container container-fluid">
			<h2>PLAYA:</h2>
			<?php
		
				if (!isset($error) && isset($codigo)) {
					$valido=true;
					// $nombre=$_POST['nombre'];
					// $nombre_corto=$_POST['nombre_corto'];
					// $descripcion=$_POST['descripcion'];
					// $PVP=$_POST['PVP'];
					// $familia=$_POST['familia'];
						$idPlaya=$_POST['idPlaya'];
						$idMun=$_POST['idMun'];
						$nombre=$_POST['nombre'];
						$direccion=$_POST['direccion'];
						$descripcion=$_POST['descripcion'];
						$playaSize=$_POST['playaSize'];
						$longitud=$_POST['longitud'];
						$latitud=$_POST['latitud'];
						$imagen=$_POST['imagen'];
			// $sql="SELECT * FROM producto WHERE cod='$codigo'";
			$sql="SELECT * FROM playas WHERE cod='$codigo'";
			
/*ELECT  playas.*
				FROM playas
				WHERE playas.idMun='$idMun'*/		
			echo "<div class='panel panel-primary'><form id='form_actualiza' action='test3.php' method='post'>";

			echo "<div class='input-group'>
			<span class='input-group-addon' id='basic-addon1'>Codigo : </span>
			<input type='text' class='form-control' aria-describedby='basic-addon1'  value='$codigo' disabled>
			</div>";		

			echo "<div class='input-group'>
			<span class='input-group-addon' id='basic-addon1'>Nombre : </span>
			<input type='text' class='form-control' aria-describedby='basic-addon1' name='nombre' value='$nombre' disabled>
			</div>";
	

			echo "<div class='input-group'>
			<span class='input-group-addon' id='basic-addon1'>Nombre corto: </span>
			<input type='text' class='form-control' aria-describedby='basic-addon1' name='nombre_corto' value='$nombre_corto' disabled>
			</div>";		

			echo "<div class='input-group'>
			<span class='input-group-addon' id='basic-addon1'>Nombre : </span>
			<input type='text' class='form-control' aria-describedby='basic-addon1' name='desc' value='".substr($descripcion,0,60)."...' disabled>
			</div>";


			echo "<div class='input-group'>
			<span class='input-group-addon' id='basic-addon1'>Precio : </span>
			<input type='text' class='form-control' aria-describedby='basic-addon1' name='PVP' value='$PVP €'>
			</div>";

			echo "<div class='input-group'>
			<span class='input-group-addon' id='basic-addon1'>Tipo : </span>
			<input type='text' class='form-control' aria-describedby='basic-addon1' name='tipo' value='$familia ' disabled>
			</div>";


		if(isset($_POST['actualizar'])){
		
			$dwes->beginTransaction();
		
			$sql = "UPDATE producto SET nombre='$nombre',nombre_corto='$nombre_corto',descripcion='$descripcion',PVP='$PVP' ";
			$sql .= "WHERE cod='$codigo'";
		
			if ($dwes->exec($sql) == 0) 
				$valido = false;
			
			if($valido==true){
				$dwes->commit();
				echo "<h2><span class='label label-success'>Los datos han ido actualizado con éxito!</span></h2>";
		
			}else{
				$dwes->rollback();
				echo "<h2><span class='label label-danger'>Los datos no han sido actualizados!</span></h2>";
			}
	
			unset($dwes);
	
		}else{
			echo "<h2><span class='label label-warning'>Accion cancelada!</span></h2>";
		}
				

			echo "<input type='hidden' name='cod' value='$familia' />";
			
			
			echo "<button class='btn btn-success' type='submit' value='continuar' name='actualizar'>Continuar</button>";
			
			echo "</form></div>";
		}

		?>
		</div>
	</body>
</html>