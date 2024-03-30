<!DOCTYPE html>
<html>
<head>
    <title>busquedaPagos</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            padding: 8px;
            text-align: left; 
            border-bottom: 1px solid #ddd;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Color de fondo para filas pares */
        }

        h1 {
            color: #333; /* Color del título */
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #fff; /* Color de fondo de la página */
        }

        input[type="text"], input[type="submit"] {
            padding: 5px;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Pago a buscar</h1>
    <form action="" method="GET">

        FECHA : 
        <input type="date" name="fechaPago">
        <input type="submit" value="Buscar">
    
    </form>
    <?php 

    if(isset($_GET["fechaPago"])) {
        $fechaPago = $_GET["fechaPago"]; 
        echo "Busqueda por $fechaPago";
      
            $dbuser = "mafe";
            $dbpassword = "mafe1234";

                $conn = new PDO("mysql:host=localhost;port=3310;dbname=gym", $dbuser, $dbpassword);
                //VUL 
                //$consultaSQL = $conn->prepare("SELECT metodoPago, fechaPago, email FROM pago WHERE fechaPago= '$fechaPago' ");
                //$consultaSQL->execute();
        
                //SEG
                $sentencia= "SELECT metodoPago, fechaPago, email FROM pago WHERE fechaPago = :fechaPago;";

                $consultaSQL = $conn->prepare($sentencia);

                $consultaSQL->execute(array(
                  ':fechaPago' => $fechaPago,

                ) );
    ?>


                

    
    <table border="1">
        <tr>
            <th>METODO DE PAGO</th>
            <th>FECHA DE PAGO</th>
            <th>CORREO ELECTRONICO</th>
        </tr>
    <?php
        while ($row = $consultaSQL->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr>
            <td><?php echo $row["metodoPago"] ?></td>
            <td><?php echo $row["fechaPago"] ?></td>
            <td><?php echo $row["email"] ?></td>
        </tr>
    <?php
        }
    }
    ?>
    </table>
</body>
</html>
