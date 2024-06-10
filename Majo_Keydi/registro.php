<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'conexion.php';

    $nombre = $_POST["nombre"];
    $cDif = $_POST["cDif"];
    $ingles = $_POST["Ingles"];
    $fisica = $_POST["Fisica"];
    $ecologia = $_POST["Ecologia"];
    $mod1 = $_POST["modulo1"];
    $mod2 = $_POST["modulo2"];
    $mod3 = $_POST["modulo3"];

    $sql = "INSERT INTO calif (nombre, cDif, ingles, fisica, ecologia, modulo1, modulo2, modulo3) VALUES ('$nombre', '$cDif', '$ingles', '$fisica', '$ecologia', '$mod1', '$mod2', '$mod3')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "Usuario registrado correctamente";
    } else {
        $error = "Error al registrar usuario: " . $conn->error;
    }
    $conn->close();
}


?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <nav>
        <a href="Menu.php"><button>Menu</button></a>
        <a href="registro.php"><button>Registrar datos</button></a>
        <a href="CrearBaseDeDatos.php"><button>Crear Base de datos</button></a>
        <a href="consulta_datos.php"><button>Consultar datos</button></a>
        <a href="consulta_elimina.php"><button>Borrar consulta</button></a>
    </nav>

    <div class="container">
        <h2>Registro de Usuarios</h2>
        <?php if (isset($mensaje)) { ?>
            <p class="mensaje"><?php echo $mensaje; ?></p>
        <?php } ?>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <form action="registro.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            <label for="cDif">Cálculo Diferencial:</label>
            <input type="number" name="cDif" min="0" max="10" required>
            <label for="Ingles">Inglés:</label>
            <input type="number" name="Ingles" min="0" max="10" required>
            <label for="Fisica">Física:</label>
            <input type="number" name="Fisica" min="0" max="10" required>
            <label for="Ecologia">Ecología:</label>
            <input type="number" name="Ecologia" min="0" max="10" required>   
            <label for="modulo1">Modulo 1:</label>
            <input type="number" name="modulo1" min="0" max="10" required>
            <label for="modulo2">Modulo 2:</label>
            <input type="number" name="modulo2" min="0" max="10" required>
            <label for="modulo3">Modulo 3:</label>
            <input type="number" name="modulo3" min="0" max="10" required>
            <input type="submit" value="Registrar Usuario">
        </form>
    </div>
</body>
</html>
