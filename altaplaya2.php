
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>test4 UT_8 DWES JM_Banchero</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/dwes.css">
    <!-- Latest compiled and minified JavaScript -->
    <!-- <script src="js/jquery.min.js"></script> -->
    <!-- <script src="js/bootstrap.min.js"></script> -->
    

    <link type="image/x-icon" href="img/ghost.png" rel="shortcut icon" />
</head>

<body >
    <nav class='navbar navbar-default'>
            <div class='container-fluid'>
                <div class='navbar-header'>
                    <a class='navbar-brand'> <img alt='Brand' src='img/ghost.png'></a>
                </div>
                <ul class='nav navbar-nav'>
                    <li class='active'>
                        <a href='#'> test4 PROYECTO_8 JM_B  <span class='sr-only'>(current)</span></a>
                    </li>
                    <li><a href='test4.php'>Lista DE PLAYAS DESDE dB MYSQL</a></li>
                    <li><a href='#'>ALTA PLAYA DESDE dB MYSQL</a> 
                    </li>
                </ul>
            </div>
    </nav>
<div class="container">    

        
<?php

    $nameErr = $dirErr = $longErr = $latErr = "";
    $idPlaya=$idMun=$nombrePlaya=$tamañoPlaya=$direccionPlaya=$descripcionPlaya=$latitudPlaya=$longitudPlaya=$imagenPlaya="";

        if (isset($_POST['submit'])) 
        // $idMun = test_input($_POST["idmunicipio"]);
        // $codigo = $_POST['codA'];
        try {
            $opciones =array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
            $dwes = new PDO("mysql:host=localhost;dbname=playasdb", "dwes", "abc123.", $opciones);
            $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e) {
            $error = $e->getCode();
            $mensaje = $e->getMessage();
        }     


// && $_SERVER["REQUEST_METHOD"] == "POST"
    if (!isset($error) && $_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nombre"])) {
            $nameErr = "Name is required";
        } else {

                // $valido=true;

                $idPlaya= test_input($_POST["idplaya"]);
                $idMun = inputParseInteger($_POST["idmunicipio"]);
                $nombrePlaya = test_input($_POST["nombre"]);
                $tamañoPlaya = test_input($_POST["tamaño"]);
                $direccionPlaya = test_input($_POST["direccion"]);
                $descripcionPlaya = test_input($_POST["descripcion"]);
                $latitudPlaya = inputParseFloat($_POST["latitud"]);
                $longitudPlaya = inputParseFloat($_POST["longitud"]);
                $imagenPlaya = test_input($_POST["imagen"]);

                // $dwes->beginTransaction();        

                                 
    $sql= "INSERT INTO playas 
                (idMun, nombre, descripcion,
                direccion, playaSize, 
                longitud, latitud) 
            VALUES (:idMun, :nombrePlaya,:descripcionPlaya,
                    :direccionPlaya,:playaSize,
                    :longitudPlaya, :latitudPlaya)";
              

        $stmt = $dwes->prepare($sql);
      
            $stmt->bindParam(':idMun', $idMun, PDO::PARAM_STR);       
            $stmt->bindParam(':nombrePlaya', $nombrePlaya, PDO::PARAM_STR); 
            $stmt->bindParam(':descripcionPlaya', $descripcionPlaya, PDO::PARAM_STR); 
            $stmt->bindParam(':direccionPlaya', $direccionPlaya, PDO::PARAM_STR);            
            $stmt->bindParam(':playaSize', $tamañoPlaya, PDO::PARAM_STR);
            $stmt->bindParam(':longitudPlaya', $longitudPlaya, PDO::PARAM_STR);
            $stmt->bindParam(':latitudPlaya', $latitudPlaya, PDO::PARAM_STR);

     
// , PDO::PARAM_INT, PDO::PARAM_STR , PDO::PARAM_STR , PDO::PARAM_STR, PDO::PARAM_STR
// , PDO::PARAM_STR, PDO::PARAM_STR
                if(!$stmt){
                    // $dwes->rollback();
                    echo "<h2><span class='label label-danger'>ERR: Los datos no han sido insertadps!</span></h2>";
                    $this->mensaje="error al crear registro";
                }else{
                     // $dwes->commit();
                     $stmt->execute();
                     echo "<h2><span class='label label-success'>Los datos han ido insertado con éxito!</span></h2>";
                     echo "<h2>DATOS PLAYA:</h2>";
                     echo "id:$idPlaya | idMUN:$idMun|NomPlaya:$nombrePlaya|tamañoPla: $tamañoPlaya<br>";
                     echo "direc: $direccionPlaya|Desc:$descripcionPlaya<br>";
                     echo "Lat: $latitudPlaya||Long:$longitudPlaya||Imagen: $imagenPlaya";
                }
                
                // if(!$consulta)
                // {
                //     $this->mensaje="error al crear registro";
                // }else{
                //     $consulta->execute();
                //     $this->mensaje="resgistro creado ok";
                // }
                // $stmt->close();
                // $dwes->close();
                unset($dwes);
            }

        }  
        // else{
        // echo "<h2><span class='label label-warning'>Accion cancelada!</span></h2>";
        // }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
/*$int = (int)$num;
$float = (float)$num; */

    function inputParseInteger($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data=(int)$data;
        return $data;
    }

    function inputParseFloat($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        $data=(float)$data;
        return $data;
    }


?>
    <div class="panel panel-default">
        <h2>Alta DE PLAYA </h2>
        <p><span class="error">* required field.</span></p>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
            <span> ID Playa:</span> <input type="text" name="idplaya" value="<?php echo $idPlaya;?>"> 
            <span>MUNICIPIO: </span>
            <select name="idmunicipio" id="idmunicipio">
                    <?php 
                          if (isset($_POST['idmunicipio'])) $idSelect = $_POST['idmunicipio'];
                          try {
                              $opciones =array(PDO::MYSQL_ATTR_INIT_COMMAND=>"SET NAMES utf8");
                              $dwes = new PDO("mysql:host=localhost;dbname=playasdb", "dwes", "abc123.", $opciones);
                              $dwes->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                          }catch (PDOException $e) {
                              $error = $e->getCode();
                              $mensaje = $e->getMessage();
                          }
                    // $sql = "SELECT * FROM familia";
                    $sql= "SELECT idMunicipio,nombreMun FROM municipio";
                    $res = $dwes->query($sql);
                        if($res){
                            $value = $res->fetch();
                            while ($value != null) {
                                echo "<option value='${value['idMunicipio']}'>";
                                // if (isset($idSelect) && $idSelect == $value['idMunicipio']){
                                    // echo " selected='true'";  
                                // }
                                
                                echo htmlentities($value['nombreMun'])."</option>";     
                                $value  = $res->fetch();
                            }     
                        }   
                    ?>  
            </select><br>
            <span> Nombre Playa:*</span> <input type="text" name="nombre" value="<?php echo $nombrePlaya;?>">
            <span class="err">* <?php echo $nameErr;?></span>
            <br><br>
            <span>Tamaño:</span> <input type="text" name="tamaño" value="<?php echo $tamañoPlaya;?>">
           
            <br><br>
            <span>Direccion:*</span> <input type="text" name="direccion" value="<?php echo $direccionPlaya;?>">
          
            <br><br>
            <span>Descripcion:</span> <textarea name="descripcion" rows="5" cols="40"><?php echo $descripcionPlaya;?></textarea>
            <br><br>
            <span> Latitud:*</span> <input type="text" name="latitud" value="<?php echo $latitudPlaya;?>"> 
            <span> Longitud:*</span> <input type="text" name="longitud" value="<?php echo $longitudPlaya;?>">
            <br><br>
            <span> IMAGEN?¿?¿:</span> <input type="text" name="imagen" value="<?php echo $imagenPlaya;?>">
            <input type="submit" name="submit" value="Submit">  
        </form>
    </div>





</div>



    <br><div class="spacio"></div>
    <div class="well well-sm footer-info text-primary">
        <p>DWE 2017-UT8 JM_Banchero</p>
    </div>
</body>
</html>
<!--  style=" width: 100% !important;
                        height: 100% !important;padding: 8% !important;
                        font-size: 18px;text-align: center !important;
                        background-color: #EEEEEE;" -->