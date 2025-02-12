<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
require '../config/database.php';


$input = json_decode(file_get_contents('php://input'), true);

$data = $input['data'];
$nombre_ref = $input['nombre_ref'];
$description = $input['description'];
$created_by = $input['created_by'];
$sql = "INSERT INTO qr_codes (data,nombre_ref, description, created_by) VALUES (?, ?, ?,?)";
$stmt = $pdo->prepare($sql);

if ($stmt->execute([$data, $nombre_ref, $description, $created_by])) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['message' => 'Código QR creado exitosamente']);
} else {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode(['message' => 'Error al crear código QR']);
}
?>
