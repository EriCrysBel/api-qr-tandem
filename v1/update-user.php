<?php
require '../config/cors.php';
require '../config/database.php';

$input = json_decode(file_get_contents('php://input'), true);

$id = $input['id'];
$email = $input['email'];
$role = $input['role'];

$sql = "UPDATE users SET email = ?, role = ? WHERE id = ?";
$stmt = $pdo->prepare($sql);

if ($stmt->execute([$email, $role, $id])) {
    header('Content-Type: application/json; charset=utf-8');
    echo json_encode([
      'message' => 'Usuario actualizado exitosamente',
      'id' => $id,
    ]);
} else {
    echo json_encode(['message' => 'Error al actualizar usuario']);
}
?>