<html>
    <head>
        <title>Red social login</title>
    </head>
    <body>
        <?php 
            if(isset($_POST['usuario']) && isset($_POST['clave'])){

                $usuario = $_POST['usuario'];
                $clave = $_POST['clave'];
                $fecha_nacimiento = $_POST["fecha_nacimiento"];
                $genero = $_POST["genero"];
                if($usuario == 'jose'){
                    if($clave == 'jose123.'){
                        echo "<h1>BIENVENIDO!!!!</h1>";
                        echo "<p>Fecha de Nacimiento: $fecha_nacimiento</p>";
                        echo "<p>Género: " . ($genero == "m" ? "Masculino" : "Femenino") . "</p>";
                    }
                    else {
                        echo "El usuario o la clave no son validos";
                    }
                }
                else {
                    echo "El usuario o la clave no son validos";
                }
            }
        ?>
        <h1>Login de usuario</h1>
        <form action="http://localhost/redsocial/login.php" method="post">
            Usuario <input type="text" name="usuario"> <br> <br>
            Password <input type="password" name="clave"> <br>
            fecha_nacimiento <input type="text" name="fecha de nacimeinto"> <br>
            $genero <input type="radio" name="genero"> <br>
            <input type="submit" value="Login">
            
        </form>
    </body>
</html>