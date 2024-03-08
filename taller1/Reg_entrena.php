<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>entrenamiento</title>
</head>
<body>
    <?php

    if(isset($_POST["fechaEntrenamiento"]) && isset($_POST["tipoEntrenamiento"]) && isset($_POST["duracionEntrenamiento"]) && isset($_POST["ejerciciosRealizados"])){
        
        $fechaEntrenamiento =$_POST["fechaEntrenamiento"];
        $tipoEntrenamiento =$_POST["tipoEntrenamiento"];
        $duracionEntrenamiento =$_POST["duracionEntrenamiento"];
        $ejerciciosRealizados =$_POST["ejerciciosRealizados"];

        $dbuser="mafe";
        $dbpassword="mafe1234";

        $conn = new PDO("mysql:host=localhost;port=3310;dbname=gym", $dbuser, $dbpassword);
        //limpiar datos
        $dbuser ="";
        $dbpassword="";
        
        $query ="INSERT INTO `entrenamientos` (`id`, `fechaEntrenamiento`, `tipoEntrenamiento`, `duracionEntrenamiento`, `ejerciciosRealizados`) VALUES (NULL, '$fechaEntrenamiento', '$tipoEntrenamiento', '$duracionEntrenamiento', '$ejerciciosRealizados');";
        $q = $conn->prepare($query);
        $result =$q->execute();

    }
    ?>
    <h1>Registro Entrenamientos</h1>
<hr>
    <form action="" method="post">       
        FechaEntrenamiento: <input type="date" name="fechaEntrenamiento"><br>
        TipoEntrenamiento: <input type="text" name="tipoEntrenamiento"><br>
        DuracionEntrenamiento: <input type="text" name="duracionEntrenamiento"><br>
        EjerciciosRealizados: <input type="text" name="ejerciciosRealizados"><br>
        
        
        <input type="submit" value="Guardar">
    <hr>
       
    </form>
    <a href="http://localhost:81/taller1/Reg_miemb.php">Regresar a registro de usuarios</a>

</body>
</html>