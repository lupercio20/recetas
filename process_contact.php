<?php
$servername = "localhost";
$username = "root"; // MAMP default user
$password = "root"; // MAMP default password
$dbname = "recetas";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener datos del formulario
$nombre = $_POST['name'];
$telefono = $_POST['phone'];
$tipo_receta = $_POST['recipe_type'];

// Preparar y vincular
$stmt = $conn->prepare("INSERT INTO contactos (nombre, telefono, tipo_receta) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $nombre, $telefono, $tipo_receta);

// Ejecutar
if ($stmt->execute()) {
    echo "Nuevo registro creado con éxito";
} else {
    echo "Error: " . $stmt->error;
}

// Cerrar conexión
$stmt->close();
$conn->close();
?>
