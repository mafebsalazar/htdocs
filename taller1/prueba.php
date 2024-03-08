<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso GYM</title>
</head>
<body>
    <?php

    if(isset($_POST["nombre"]) && isset($_POST["documento"]) && isset($_POST["fechaIngreso"]) && isset($_POST["fechaPago"])&& isset($_POST["email"])){
        
        $nombre =$_POST["nombre"];
        $documento=$_POST["documento"];
        $fechaIngreso =$_POST["fechaIngreso"];
        $fechaPago =$_POST["fechaPago"];
        $email =$_POST["email"];

        $dbuser="root";
        $dbpassword="";

        $conn = new PDO("mysql:host=localhost;dbname=gym", $dbuser, $dbpassword);
        //limpiar datos
        $dbuser ="";
        $dbpassword="";
        
        $query ="INSERT INTO `usuarios` (`id`, `nombre`, `documento`, `fechaIngreso`, `fechaPago`, `correo`) VALUES (NULL, '$nombre', '$documento', '$fechaIngreso', '$fechaPago', '$email');";
        $q = $conn->prepare($query);
        $result =$q->execute();

    }
    ?>
    <h1>Registros de Pago</h1>
<hr>
    <form action="" method="post">       
        Nombre: <input type="text" name="nombre"><br>
        Documento: <input type="text" name="documento"><br>
        FechaIngreso: <input type="date" name="fechaIngreso"><br>
        FechaPago: <input type="date" name="fechaPago"><br>
        Correo: <input type="email" name="email"><br>
        
        Método de Pago: <br>
        <input type="radio" name="metodoPago" value="efectivo"> Efectivo<br>
        <input type="radio" name="metodoPago" value="tarjeta_credito"> Tarjeta de Crédito<br>
        <input type="radio" name="metodoPago" value="transferencia"> Transferencia Bancaria<br>
        <input type="radio" name="metodoPago" value="paypal"> PayPal<br>
                
        <input type="submit" value="Registrar">
    <hr>
       
    </form>
    <a href="http://localhost/jose/inicio/Trabajo2/login.php">Ingresar login</a>

</body>
</html>