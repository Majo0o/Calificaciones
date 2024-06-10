

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <title>Document</title>
</head>
<body>
    <nav>
        <a href="Menu.php"><button>Menu</button></a>
        <a href="registro.php"><button>Registrar datos</button></a>
        <a href="consulta_datos.php"><button>Consultar datos</button></a>
        <a href="consulta_elimina.php"><button>Borrar consulta</button></a>
    </nav>
    <div class="container">
        <?php

        $servername = "localhost";
        $username = "root";
        $password = "";

        $conex = new mysqli($servername, $username, $password);

        if ($conex->connect_error) {
            die("Conexión fallida: " . $conex->connect_error);
        }

        $sql = "CREATE DATABASE califBase";

        if ($conex->query($sql) === TRUE) {
            echo "<h2>Base de datos creada correctamente</h2> \n";
        } else {
            die ("Erro al crear base de datos". $conex->error);
        }

        $conex->close();

        require_once 'conexion.php';

        $sqlTab = "CREATE TABLE calif(
            id INT(10) AUTO_INCREMENT PRIMARY KEY,
            nombre VARCHAR(50) NOT NULL,
            cDif INT(2)  NOT NULL,
            ingles INT(2) NOT NULL,
            fisica INT(2) NOT NULL,
            ecologia INT (2) NOT NULL,
            modulo1 INT(2) NOT NULL,
            modulo2 INT(2) NOT NULL,
            modulo3 INT(2) NOT NULL
        )";

        if ($conn->query($sqlTab) === TRUE) {
            echo "<h3>La tabla se ha creado correctamente.</h3>";
        } else {
            die("Error al crear la tabla: " . $conn->error);
        }

        $conn->close();

        ?>
        <div class="contbtn">
            <a href="registro.php"><button class="btnvolver" >Volver</button></a>
        </div>
    </div>
    
    
</body>
</html>


