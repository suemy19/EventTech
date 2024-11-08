<?php
$servername = "sql106.infinityfree.com";
$username = "if0_37675598";
$password = "Palabra21";
$dbname = "if0_37675598_XXX";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
echo "Conexión exitosa";

// Datos del formulario (ejemplo)
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$correo = $_POST['correo'];
$carrera = $_POST['carrera'];
$enteraste = $_POST['enteraste'];
$organizacion = $_POST['organizacion'];
$interes = $_POST['interes'];
$calidad_actividades = $_POST['calidad_actividades'];
$recomendar_evento = $_POST['recomendar_evento'];
$mejorar = implode(',', $_POST['mejorar']); // Convertir array a string
$participar = $_POST['participar'];
$logistica = $_POST['logistica'];

// Insertar datos en la tabla
$sql = "INSERT INTO encuesta_tecnologia (nombre, apellido, correo, carrera, enteraste, organizacion, interes, calidad_actividades, recomendar_evento, mejorar, participar, logistica)
VALUES ('$nombre', '$apellido', '$correo', '$carrera', '$enteraste', '$organizacion', '$interes', '$calidad_actividades', '$recomendar_evento', '$mejorar', '$participar', '$logistica')";

if ($conn->query($sql) === TRUE) {
    echo "Nuevo registro creado exitosamente";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>

