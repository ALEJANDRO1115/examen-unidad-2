<?php
// Conexión forzada directa a la base de datos del examen
$host = "localhost";      
$user = "root";           
$password = "";   
$database = "banco";      

$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4");

// Validar qué formulario se está enviando
$accion= isset($_GET['accion']) ? $_GET['accion'] : 'usuario';

if ($accion == 'usuario') {
    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];
    $estatus = $_POST['estatus']; 

    echo "Usuario: " . $usuario . "<br>";
    echo "Contrasena: " . $contrasena . "<br>";
    echo "Estatus ID: " . $estatus . "<br>";

    // Corrección: Usamos 'id_status' o 'id_estatus' según tu tabla
    $stmt = $conn->prepare("INSERT INTO usuarios (usuario, contrasena, id_estatus) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $usuario, $contrasena, $estatus);

    if ($stmt->execute()) {
        echo " Nuevo registro de usuario creado correctamente con el ID: " . $stmt->insert_id;
        echo "<br><br><a href='registro.php'>Volver a registros</a>";
    } else {
        echo "Error al guardar el registro: " . $stmt->error;
    }
}

if ($accion == 'cuenta') {
    $id_usuario = $_POST['id_usuario'];
    $numero_cuenta = $_POST['numero_cuenta'];
    $saldo = $_POST['saldo'];

    $stmt = $conn->prepare("INSERT INTO cuentas (id_usuario, numero_cuenta, saldo) VALUES (?, ?, ?)");
    $stmt->bind_param("isd", $id_usuario, $numero_cuenta, $saldo);

    if ($stmt->execute()) {
        echo " Nueva cuenta bancaria registrada con éxito.";
        echo "<br><br><a href='registro.php'>Volver a registros</a>";
    } else {
        echo "Error al guardar la cuenta: " . $stmt->error;
    }
}
?>