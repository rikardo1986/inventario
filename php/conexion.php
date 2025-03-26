<?php
// Configuración de la base de datos
$host = "localhost";
$dbname = "inventario";
$user = "inventariosur";
$password = "frms2024.";

try {
    // Crear la conexión con PDO
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    // Configurar el modo de error a excepciones
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Mostrar error en caso de falla
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
?>