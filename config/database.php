<?php
// Configuración de la base de datos
$host = 'localhost';
$db = 'tandem_qr_db';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Configuración del DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// Opciones de PDO
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, // Manejo de errores con excepciones
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,       // Modo de obtención de resultados por defecto
    PDO::ATTR_EMULATE_PREPARES   => false,                  // Desactivar la emulación de declaraciones preparadas
];

// Intentar conectar a la base de datos
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    // En caso de error, lanzar una excepción con el mensaje de error y el código de error
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
?>
