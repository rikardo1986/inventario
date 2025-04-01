<?php
include("conexion.php"); 

header("Content-Type: application/json");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"] ?? null;
    $sn = $_POST["sn"] ?? null;
    $estado = $_POST["estado"];
    $asignado = $_POST["asignado"];
    $usuario = $_POST["usuario"];
    $edificio = $_POST["edificio"];
    $unidad_fl = $_POST["unidad_fl"];
    $piso = $_POST["piso"];
    $fecha_asignacion = $_POST["fecha_asignacion"];

    if (!$id && !$sn) {
        echo json_encode(["success" => false, "error" => "Debe proporcionar un ID o un Número de Serie"]);
        exit();
    }

    $query = "UPDATE equipos SET estado=?, asignado=?, usuario=?, edificio=?, unidad_fl=?, piso=?, fecha_asignacion=? WHERE ";
    
    if ($id) {
        $query .= "id=?";
        $param = $id;
    } else {
        $query .= "sn=?";
        $param = $sn;
    }

    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssi", $estado, $asignado, $usuario, $edificio, $unidad_fl, $piso, $fecha_asignacion, $param);

    if ($stmt->execute()) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => $stmt->error]);
    }

    $stmt->close();
    $conn->close();
} else {
    echo json_encode(["success" => false, "error" => "Método no permitido"]);
}
?>
