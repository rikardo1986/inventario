<?php
// Incluir el archivo de conexión
require_once 'conexion.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=productos.xls");

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Consultar los datos de la tabla
    $stmt = $pdo->query("SELECT * FROM productos");
    echo "ID\tTipo\tCódigo UAF\tS/N\tMarca\tModelo\tDescripción\tEstado\tUsuario\tEdificio\tPiso\tAsignado\tUnidad FL\tFecha Asignación\tFecha Baja\n";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo implode("\t", array_map("utf8_decode", $row)) . "\n";
    }
} catch (PDOException $e) {
    echo "Error al exportar datos: " . $e->getMessage();
}
?>
