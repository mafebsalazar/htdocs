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

        Metodo de Pago: 
        <input type="text" name="metodoPago">
        <input type="submit" value="Buscar">
    
    </form>
    <?php 

    if(isset($_GET["metodoPago"])) {
        $metodoPago = $_GET["metodoPago"]; 
        echo "Busqueda por $metodoPago";
      
            $dbuser = "mafe";
            $dbpassword = "mafe1234";

                $conn = new PDO("mysql:host=localhost;port=3310;dbname=gym", $dbuser, $dbpassword);
                $consultaSQL = $conn->prepare("SELECT metodoPago, fechaPago, email FROM pago WHERE metodoPago= '$metodoPago' ");
                $consultaSQL->execute();
        
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
