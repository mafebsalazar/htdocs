<!DOCTYPE html>
<html>
<head>
    <title>busquedaEjercicios</title>
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
    <h1>Busque el ejercicio</h1>
    <form action="" method="GET">
        entrenamientos a buscar:
        <input type="text" name="tipoEntrenamiento">
        <input type="submit" value="Buscar">
    </form>
    <?php 
    if(isset($_GET["tipoEntrenamiento"])) {
        $tipoEntrenamiento = $_GET["tipoEntrenamiento"];
        echo "Busqueda por $tipoEntrenamiento";

        $dbuser = "mafe";
        $dbpassword = "mafe1234";

        $conn = new PDO("mysql:host=localhost;port=3310;dbname=gym", $dbuser, $dbpassword);
        $consultaSQL = $conn->prepare("SELECT ejerciciosRealizados, tipoEntrenamiento,duracionEntrenamiento FROM entrenamientos WHERE tipoEntrenamiento = '$tipoEntrenamiento'");
        $consultaSQL->execute();
    ?>
    <table border="1">
        <tr>
            <th>Ejercicios Realizados</th>
            <th>Tipo Entrenamiento</th>
            <th>Duración Entrenamiento</th>
        </tr>
    <?php
        while ($row = $consultaSQL->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr>
            <td><?php echo $row["ejerciciosRealizados"] ?></td>
            <td><?php echo $row["tipoEntrenamiento"] ?></td>
            <td><?php echo $row["duracionEntrenamiento"] ?></td>
        </tr>
    <?php
        }
    }
    ?>
    </table>
</body>
</html>
