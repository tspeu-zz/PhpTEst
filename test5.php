<?php

include_once("./crud/db.php");
// require_once("crud/Crud.php");

function creaFormularioProductos(){
    if (isset($_POST['id'])) $idSelect = $_POST['id'];
    $municipios = DB::obtieneMunicipios();

    // echo "<p><form id='" . $p->getcodigo() . "' action='productos.php' method='post' onsubmit='return anadeCesta();'>";
    echo    " 
            <div class='panel panel-default'>
            <div class='panel-heading'>SELECCION DE PLAYAS</div>";

    echo    "<div class='panel panel-info tn-group'>       
            <div class='row'>
            <div class='col-md-4'><h3 style='padding: 2% !important;'>Seleccione un Municipio</h3></div>                 
                <div class='col-md-4 '>
                <select name='id' id='id' style=' width: 100% !important;
                    height: 100% !important;padding: 8% !important;
                    font-size: 18px;text-align: center !important;
                    background-color: #EEEEEE;'>";
    foreach ($municipios as $p) {
            // echo "<input type='hidden' name='cod' id='cod' value='. $p->getcodigoMunicipio().'/>";
            // echo     "<option value='${value['".$p->getcodigoMunicipio()."']}'>";
            
            // echo htmlentities($value['.$p->getnombreMunicipio().'])."</option>"; 
            
    // echo "<input type='hidden' name='cod' id='cod' value='" . $p->getcodigo() . "'/>";
                echo "<option value='".$p->getcodigoMunicipio()."'>";
                echo  htmlentities($p->getnombreMunicipio());
        // echo "<input type='hidden' name='numAle' id='numAle' value='" . $_SESSION['codigoAleatorio'] . "'/>";
        // echo "<input type='submit' name='enviar' class='boton' value='Añadir'/>";
        // echo $p->getnombrecorto() . ": ";
        // echo $p->getPVP() . " euros.";
        // echo "</form>";
        // echo "</p>";
        }  
    echo    "</select></div><div class='col-md-4'>
            <button class='btn btn-success' type='submit' name='enviar' 
            style='width: 50% !important;padding: 5% !important;'>enviar</button>
            </div></div></div>";      
}



?>
<!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>TEST </title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">
        
        
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <link type="image/x-icon" href="img/ghost.png" rel="shortcut icon" />

    </head>

    <body>

    <div class="container container-fluid">
         <h1 id="encabezado">Tarea 3: Listado de playas</h1>
        <div> 
        <form id="form" name="formulario" action="<?php $_SERVER['PHP_SELF'] ?>" method="post">                   
            <?php creaFormularioProductos(); ?>
        </form>
        </div>
    </div> 
    <br>

    <!-- <input type="submit" value="Grabar" name="enviar"> <br> -->
     
      
    



    <br>
    <div class="spacio"></div>
    <div class="well well-sm footer-info text-primary">
        <p>DWE 2017-UT8 JM_Banchero</p>
    </div>
</body>
</html>