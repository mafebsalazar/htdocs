<!DOCTYPE html>
<html>
<head>
    <title>busquedaMiembros</title>
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
    <h1>Buscar el usuario</h1>
    <form action="" method="GET">
        Documento: 
        <input type="text" name="documento">
        <input type="submit" value="Buscar">
    </form>
    <?php 
    if(isset($_GET["documento"])) {
        $documento = $_GET["documento"];
        echo "Busqueda por $documento";

        $dbuser = "mafe";
        $dbpassword = "mafe1234";

        $conn = new PDO("mysql:host=localhost;port=3310;dbname=gym", $dbuser, $dbpassword);
        $consultaSQL = $conn->prepare("SELECT nombre, documento, celular FROM ingreso_usuarios WHERE documento = '$documento'");
        $consultaSQL->execute();
    ?>
    <table border="1">
        <tr>
            <th>NOMBRE Y APELLIDO</th>
            <th>DOCUMENTO</th>
            <th>CELULAR</th>
        </tr>
    <?php
        while ($row = $consultaSQL->fetch(PDO::FETCH_ASSOC)) {
    ?>
        <tr>
            <td><?php echo $row["nombre"] ?></td>
            <td><?php echo $row["documento"] ?></td>
            <td><?php echo $row["celular"] ?></td>
        </tr>
    <?php
        }
    }
    ?>
    </table>
</body>
</html>
