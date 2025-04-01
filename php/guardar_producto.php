<?php
require_once 'conexion.php';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tipo = $_POST['tipo'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $sn = $_POST['sn'];
        $estado = $_POST['estado'];
        $asignado = $_POST['asignado'];
        $usuario = $_POST['usuario'];
        $edificio = $_POST['edificio'];
        $unidadFL = $_POST['unidadFL'];
        $piso = $_POST['piso'];
        $fechaAsignacion = $_POST['fechaAsignacion'];
        $fechaBaja = $_POST['fechaBaja'];
        $descripcion = $_POST['descripcion'];

        $sql = "INSERT INTO productos (tipo, marca, modelo,  sn, estado, asignado, usuario, edificio,  unidad_fl, piso, fecha_asignacion, fecha_baja, descripcion) 
                VALUES (:tipo,  :marca, :modelo, :sn, :estado, :asignado, :usuario, :edificio,  :unidadFL, :piso,  :fechaAsignacion, :fechaBaja :descripcion,)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':tipo' => $tipo,
            ':marca' => $marca,
            ':modelo' => $modelo,
            ':sn' => $sn,
            ':estado' => $estado,
            ':asignado' => $asignado,
            ':usuario' => $usuario,
            ':edificio' => $edificio,
            ':unidadFL' => $unidadFL,
            ':piso' => $piso,
            ':fechaAsignacion' => $fechaAsignacion,
            ':fechaBaja' => $fechaBaja,
            ':descripcion' => $descripcion,
        ]);

        echo "Producto guardado exitosamente.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

