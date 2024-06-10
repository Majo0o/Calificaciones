 <?php
require_once 'conexion.php';

// Proceso de eliminación si se recibe un ID válido
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["eliminar_id"])) {
    $id_a_eliminar = $_GET["eliminar_id"];

    $sql_delete = "DELETE FROM calif WHERE id = ?";
    $stmt = $conn->prepare($sql_delete);
    $stmt->bind_param("i", $id_a_eliminar);

    if ($stmt->execute()) {
        $mensaje = "Registro eliminado correctamente";
    } else {
        $error = "Error al eliminar el registro: " . $conn->error;
    }
}

// Consulta de datos después de la eliminación
$sql_select = "SELECT * FROM calif";
$result = $conn->query($sql_select);

if ($result->num_rows > 0) {
    $tabla_usuarios = "<table><caption><h2>Lista de Usuarios</h2></caption><tr><th>ID</th><th>Nombre</th><th>Calc diferencial</th><th>Ingles</th><th>Fisica</th><th>Ecologia</th><th>Modulo 1</th><th>Modulo 2</th><th>Modulo 3</th><th>Acciones</th></tr>";

    while ($row = $result->fetch_assoc()) {
        $tabla_usuarios .= "<tr><td>" . $row["id"] . "</td><td>" . $row["nombre"] . "</td><td>" . $row["cDif"] . "</td><td>" . $row["ingles"] . "</td><td>" . $row["fisica"] . "</td><td>" . $row["ecologia"] . "</td><td>" . $row["modulo1"] . "</td><td>" . $row["modulo2"] . "</td><td>" . $row["modulo3"] . "</td><td><a href='consulta_elimina.php?eliminar_id=" . $row["id"] . "'>Eliminar</a></td></tr>";
    }

    $tabla_usuarios .= "</table>";
} else {
    $mensaje = "No hay usuarios en la base de datos.";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta y Eliminación de Usuarios</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <nav>
        <a href="Menu.php"><button>Menu</button></a>
        <a href="registro.php"><button>Registrar datos</button></a>
        <a href="consulta_datos.php"><button>Consultar datos</button></a>
        <a href="consulta_elimina.php"><button>Borrar consulta</button></a>
    </nav>
    <div class="container">
        <?php if (isset($mensaje)) { ?>
            <p class="mensaje"><?php echo $mensaje; ?></p>
        <?php } ?>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <?php if (isset($tabla_usuarios)) { echo $tabla_usuarios; } ?>
        <div class="contbtn">
            <a href="registro.php"><button class="btnvolver" >Volver</button></a>
        </div>
    </div>
</body>
</html>
