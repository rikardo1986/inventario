<?php
$host = "localhost";
$dbname = "inventario";
$user = "inventariosur";
$password = "frms2024.";

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);

    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {

    die("Error al conectar a la base de datos: " . $e->getMessage());
}
?>