<?php

// impportar la conexion a la base de datos
include 'conn.php';

// ejecutar la consulta
$resultado = $conn->query("SELECT * FROM usuarios");

// verificar si la consulta fue exitosa o si tiene errores
if($resultado === false) {
    die("Error en la consulta SQL: " . $conn->error);
}

// mostrar los resultados de la consulta
if ($resultado->num_rows == 0) {
    echo "no se encontraron resultados en la tabla 'usuarios' .";
} else {
    ?>
    <table border="1">
        <tr>
            <th>id</th>
            <th>usuario</th>
        </tr>
        
        <?php
        // recorre los resultados y mostrarlos en pantalla
        while($row = $resultado->fetch_assoc()) {
            echo "<tr><td>" . $row["id"] . "</td><td>" . $row["usuario"] . "</td></tr>";
        }
        ?>
    </table>
<?php
        
}
?>
    
    
       
        

            
        
    
        
    
 


   