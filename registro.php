<?php
    include 'conn.php';

    //ejecutar la consulta
    $rconsultaestatus = $conn->query("SELECT * FROM  id_estatus");

    //verificar si la consulta fue exitosa o si tiene errores
    if($rconsultaestatus === 0) {
         die("Error en la consulta SQL: " . $conn->error);
    }
?>

<!DOCTYPE HTML>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuarios</title>
</head>
<body>
    <h1>Registro de usuarios</h1>
    <form action="guardar_registro.php" method="POST">
        <input type="text" name="usuario" id="usuario" required placeholder ="username">
        <input type="password" name="contrasena" id="contrasena" required placeholder="password">

        <select name="estatus" id="estatus" required placeholder="estatus">
        
        <?php
        //verificar si la consulta fue exitosa y si hay resultados
       if ($rconsultaestatus->num_rows > 0) {
         echo "no se encontraron resultados en la tabla 'kev' .";
        } else {
          while($row = $rconsultaestatus->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['estatus'] . "</option>";
            }
        }

        ?>
               <option value="">Seleccione un estatus</option>
            <option value="activo">Activo</option>
            <option value="baja">Baja</option>
            <option value="suspencion">Suspención</option>
            <option value="inactivo">Inactivo</option>
            <option value="cancelado">Cancelado</option>

        </select>


        <input type="submit" value="Registrar">
    </form>