<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso GYM</title>
</head>
<body>
    <?php

    if(isset($_POST["nombre"]) && isset($_POST["documento"]) && isset($_POST["celular"]) && isset($_POST["email"])&& isset($_POST["fechaNacimiento"])&& isset($_POST["altura"])&& isset($_POST["peso"])&& isset($_POST["objetivoFitness"])){
        
        $nombre =$_POST["nombre"];
        $documento=$_POST["documento"];
        $celular =$_POST["celular"];
        $email =$_POST["email"];
        $fechaNacimiento =$_POST["fechaNacimiento"];
        $altura =$_POST["altura"];
        $peso =$_POST["peso"];
        $objetivoFitness =$_POST["objetivoFitness"];

        $dbuser="root";
        $dbpassword="";

        $conn = new PDO("mysql:host=localhost;dbname=gym", $dbuser, $dbpassword);
        //limpiar datos
        $dbuser ="";
        $dbpassword="";
        
        $query ="INSERT INTO `ingreso_usuarios` (`id`, `nombre`, `documento`, `celular`, `email`, `fechaNacimiento`, `altura`, `peso`, `objetivoFitness`) VALUES (NULL, '$nombre', '$documento', '$celular', '$email', '$fechaNacimiento', '$altura', '$peso', '$objetivoFitness');";
        $q = $conn->prepare($query);
        $result =$q->execute();

    }
    ?>
    <h1>Registro de Miembros GYM</h1>
<hr>
    <form action="" method="post">       
        Nombre: <input type="text" name="nombre"><br>
        Documento: <input type="text" name="documento"><br>
        Celular: <input type="text" name="celular"><br>
        email: <input type="email" name="email"><br>
        FechaNacimiento: <input type="date" name="fechaNacimiento"><br>
        Altura: <input type="text" name="altura"><br>
        Peso: <input type="text" name="peso"><br>
        Objetivo Fitness: <br>
        <input type="radio" name="objetivoFitness" value="subir_peso"> Subir de Peso<br>
        <input type="radio" name="objetivoFitness" value="bajar_peso"> Bajar de Peso<br>
        <input type="radio" name="objetivoFitness" value="tonificar"> Tonificar<br>
        
        <input type="submit" value="Registrar">
    <hr>
       
    </form>
    <a href="http://localhost:8080/taller1/prueba.php">IR AL PAGO</a>

</body>
</html>