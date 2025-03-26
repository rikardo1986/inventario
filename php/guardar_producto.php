<?php
// Incluir el archivo de conexión
require_once 'conexion.php';

try {
    $pdo = new PDO("pgsql:host=$host;dbname=$dbname", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Verificar si los datos fueron enviados
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tipo = $_POST['tipo'];
        $codigoUAF = $_POST['codigoUAF'];
        $sn = $_POST['sn'];
        $marca = $_POST['marca'];
        $modelo = $_POST['modelo'];
        $descripcion = $_POST['descripcion'];
        $estado = $_POST['estado'];
        $usuario = $_POST['usuario'];
        $edificio = $_POST['edificio'];
        $piso = $_POST['piso'];
        $asignado = $_POST['asignado'];
        $unidadFL = $_POST['unidadFL'];
        $fechaAsignacion = $_POST['fechaAsignacion'];
        $fechaBaja = $_POST['fechaBaja'];

        // Insertar en la base de datos
        $sql = "INSERT INTO productos (tipo, codigo_uaf, sn, marca, modelo, descripcion, estado, usuario, edificio, piso, asignado, unidad_fl, fecha_asignacion, fecha_baja) 
                VALUES (:tipo, :codigoUAF, :sn, :marca, :modelo, :descripcion, :estado, :usuario, :edificio, :piso, :asignado, :unidadFL, :fechaAsignacion, :fechaBaja)";
        $stmt = $pdo->prepare($sql);

        $stmt->execute([
            ':tipo' => $tipo,
            ':codigoUAF' => $codigoUAF,
            ':sn' => $sn,
            ':marca' => $marca,
            ':modelo' => $modelo,
            ':descripcion' => $descripcion,
            ':estado' => $estado,
            ':usuario' => $usuario,
            ':edificio' => $edificio,
            ':piso' => $piso,
            ':asignado' => $asignado,
            ':unidadFL' => $unidadFL,
            ':fechaAsignacion' => $fechaAsignacion,
            ':fechaBaja' => $fechaBaja,
        ]);

        echo "Producto guardado exitosamente.";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>