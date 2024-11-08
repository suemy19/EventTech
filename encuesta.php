<?php
// Conexión a la base de datos
$servername = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "eventos_db";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $carrera = $_POST['carrera'];
    $enteraste = $_POST['enteraste'];
    $organizacion = $_POST['organizacion'];
    $interes = $_POST['interes'];
    $calidad = $_POST['calidad'];
    $recomendar = $_POST['recomendar'];
    $mejorar = implode(", ", $_POST['mejorar']); // Para múltiples opciones
    $participar = $_POST['participar'];
    $logistica = $_POST['logistica'];

    // Insertar datos en la tabla
    $sql = "INSERT INTO encuestas (nombre, apellido, correo, carrera, enteraste, organizacion, interes, calidad, recomendar, mejorar, participar, logistica)
            VALUES ('$nombre', '$apellido', '$correo', '$carrera', '$enteraste', '$organizacion', '$interes', '$calidad', '$recomendar', '$mejorar', '$participar', '$logistica')";

    if ($conn->query($sql) === TRUE) {
        echo "Encuesta enviada con éxito.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Cerrar conexión
$conn->close();
?>