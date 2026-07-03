<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JAKS</title>
</head>
<body>
    <h1>banco banco  don kevin</h1>
    <h3>registro de nuevas cuentas</h3>

    <!-- importar la conexion a la base de datos -->
    <?php
    include 'conn.php';

    // Consulta a la tabla correcta de usuarios
    $resultado = $conn->query("SELECT * FROM usuarios");

    // Verifica errores
    if($resultado === false) {
        die("Error en la consulta sql: " . $conn->error);
    }

    if($resultado->num_rows === 0) {
        echo "No se encontraron resultados en la tabla 'usuarios'.";
    } else {
        echo "Se encontraron resultados en la tabla.<br><br>";
        ?>
        <table border="1">
            <tr>
                <th>id</th>
                <th>usuario</th>
                <th>contraseña</th>
                <th>estatus</th>
            </tr>
            <?php
            // Recorre los resultados y los muestra estructurados en la tabla
            while($fila = $resultado->fetch_assoc()){
                echo "<tr>";
                echo "<td>" . $fila["id"] . "</td>";
                echo "<td>" . $fila["usuario"] . "</td>";
                echo "<td>" . $fila["contrasena"] . "</td>";
                echo "<td>" . $fila["id_estatus"] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    <?php 
    } 
    ?>
</body>
</html>
   
    




