<?php

include_once("./crud/conexion.php");
include_once("./crud/Crud.php");

if (isset($_POST['enviar'])){

 $id_municipio="";
 $model = new Crud();

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
        <link rel="stylesheet" type="text/css" href="css/DWES04_TAR_R05_tarea.css">

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

        <link type="image/x-icon" href="img/ghost.png" rel="shortcut icon" />

    </head>

    <body>

    <div class="container">  
    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                               
<!--SELECT EN HTML   -->
        <!-- <span class="label label-primary">MUNICIPIOS</span>
            <select name="idioma">
                <option value="municipio"></option>
                <option value="ingles"></option>
            </select> -->

     
    <br>
            <input type="submit" value="Grabar" name="enviar"> <br>
     
        </form>

    </div>



<br>
<div class="spacio"></div>
<div class="well well-sm footer-info text-primary">
    <p>DWE 2017-UT4 JM_Banchero</p>
</div>

</body>
</html>