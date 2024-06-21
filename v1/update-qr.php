<?php
require '../config/cors.php';
require '../config/database.php';

$input = json_decode(file_get_contents('php://input'), true);

$id = $input['id'];
$data = $input['data'];
$description = $input['description'];
$nombre_ref = $input['nombre_ref'];

$sql = "UPDATE qr_codes SET data = ?, description = ?, nombre_ref = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);

if ($stmt->execute([$data, $description, $nombre_ref, $id])) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
      'message' => 'Código QR actualizado exitosamente',
      'id' => $id,
    ]);
} else {
    echo json_encode(['message' => 'Error al actualizar código QR']);
}
?>