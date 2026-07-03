<?php
    //importar la conexion a la base de datos
    include 'conn.php';

   //generar las variables que contienenlos datos del formulario
   $id = "15";
   $id_clientes= "paletas de fresa";
    
   
    //construccion de la consulta sql para insertar los datos en la tabla "kev"
    $stmt = $conn-> prepare ("INSERT INTO banco (id, id_clientes) VALUES (?, ?)");

    //comprobacion de la preparacion de la consulta 
    if ($stmt === false) {
        die("Error en la preparacion de la consulta: " . $conn->error);
    } 

    // vincular los parametros a la consulta preparada (s=string, i=integer, etc.)  
    $stmt->bind_param("ss", $id, $id_clientes);

    // ejecutar la consulta
    if ($stmt->execute()) {
        echo "Nuevo registro creado correctamente con el ID: " . $stmt->insert_id;
    } else {
        echo "Error al guardar el registro: " . $stmt->error;
    }
        
?>  