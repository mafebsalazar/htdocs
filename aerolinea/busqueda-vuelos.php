<html>
    <head>  
        <title> BUSQUEDA DE VUELOS DESTINO</title>
    </head> 
    <body>
    <h1>busqueda de vuelos por destino</h1>
    <form action="" method="GET">
        destino a buscar:
        <input type="text" name="destino">
        <input type="submit" name="BUSCAR">

    </form>
   <?php
        if(isset($_GET["destino"])){
            $destino = $_GET["destino"];
            echo "busqueda por $destino";
        
            $dbuser = "root";
            $dbpassword = "";

            $conn = new PDO("mysql:host=localhost;dbname=aerolinea", $dbuser, $dbpassword);
            $consultaSQL = $conn->prepare("SELECT origen,destino,aerolinea FROM vuelos WHERE destino = '$destino'");
            $consultaSQL->execute();

    ?>
    <table border="1">
        <tr>
            <th>
                Origen
            </th>
            <th>
                Destino
            </th>
            <th>
                Aerolinea
            </th>
        </tr>
    <?php
            while ($row = $consultaSQL->fetch(PDO::FETCH_ASSOC)){
    ?>
            <tr>
                <td><?php echo $row ["origen"] ?></td>
                <td><?php echo $row ["destino"] ?></td> 
                <td><?php echo $row ["aerolinea"] ?></td>
            </tr>
    <?<php></php>          
    </body>

</html>
