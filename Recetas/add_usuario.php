<?php
$servername = "localhost";
$username = "root";
$password = "root";
$dbname = "usuario";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los valores del formulario
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $celular = $_POST['celular'];

    // Preparar y enlazar
    $stmt = $conn->prepare("INSERT INTO datos (nombre, correo, celular) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $nombre, $correo, $celular);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo "Nuevo registro creado exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conn->close();
}
?>
