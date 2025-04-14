<?php
require_once 'conexion.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
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
            $fechaAsignacion = !empty($_POST['fechaAsignacion']) ? $_POST['fechaAsignacion'] : null;
            $fechaBaja = !empty($_POST['fechaBaja']) ? $_POST['fechaBaja'] : null;
            $descripcion = $_POST['descripcion'];

            $sql = "INSERT INTO productos (
                tipo, marca, modelo, sn, estado, asignado, usuario, edificio, 
                unidad_fl, piso, fecha_asignacion, fecha_baja, descripcion
            ) VALUES (
                :tipo, :marca, :modelo, :sn, :estado, :asignado, :usuario, :edificio,
                :unidadFL, :piso, :fechaAsignacion, :fechaBaja, :descripcion
            )";

            $stmt = $pdo_inv->prepare($sql);

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

            echo "       
            <div style='font-family: sans-serif; text-align: center; margin-top: 50px;'>
            <h2 style='color: green;'>Producto guardado exitosamente.</h2>
            <a href='../pages/agregar.html' 
            style='display: inline-block; margin-top: 20px; padding: 10px 20px; background-color:rgb(248, 117, 22) color: white; text-decoration: none; border-radius: 5px;'>
            Volver al formulario
            </a>
            </div>
            ";
        } catch (PDOException $e) {
            echo "❌ Error al guardar el producto: " . $e->getMessage();
        }
}
?>

