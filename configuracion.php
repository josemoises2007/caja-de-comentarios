<?php
header("Access-Control-Allow-Origin: https://josemoises2007.github.io");
header("Access-Control-Allow-Headers: content-type, x-type");

// Configuración de la base de datos
$servername = "localhost";
$username = "id22092413_arround";
$password = "Miraxus.4";
$dbname = "id22092413_jake";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario si se envió
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // Escapar caracteres especiales para evitar inyección SQL
    $name = $conn->real_escape_string($name);
    $email = $conn->real_escape_string($email);
    $comment = $conn->real_escape_string($comment);

    // Insertar el comentario en la base de datos
    $sql = "INSERT INTO comentarios (name, email, comment) VALUES ('$name', '$email', '$comment')";

    if ($conn->query($sql) === TRUE) {
        echo "Comentario añadido exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Mostrar comentarios
$sql = "SELECT name, comment, created_at FROM comentarios ORDER BY created_at DESC";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<div class='comment-box'>";
        echo "<h3>" . htmlspecialchars($row['name']) . "</h3>";
        echo "<p>" . htmlspecialchars($row['comment']) . "</p>";
        echo "<small>" . $row['created_at'] . "</small>";
        echo "</div>";
    }
} else {
    echo "No hay comentarios aún.";
}

$conn->close();
?>

