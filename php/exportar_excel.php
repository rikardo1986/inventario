<?php
require_once 'conexion.php';

header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=equipos.xls");

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $stmt = $pdo->query("SELECT * FROM productos");
    echo "ID\tTipo\tMarca\tModelo\tS/N\tMAC\tEstado\tAsignación\tUsuario\tEdificio\tUnidad FL\tPiso\tFecha Asignación\tFecha Baja\n";

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo implode("\t", array_map("utf8_decode", $row)) . "\n";
    }
} catch (PDOException $e) {
    echo "Error al exportar datos: " . $e->getMessage();
}
?>
