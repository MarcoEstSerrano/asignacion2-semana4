<?php
// --- CONFIGURACIÓN DE CONEXIÓN (Basada en tu ejemplo) ---
$host = 'localhost';
$db   = 'Universidad'; 
$user = 'root';
$pass = '';      
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;port=3306;dbname=$db;charset=$charset";

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// aqui se CAPTURA EL GET Y CONSULTA WHERE ---
// Capturamos el parámetro 'curso' de la URL [cite: 39, 41]
$curso_buscado = isset($_GET['curso']) ? $_GET['curso'] : '';
?>