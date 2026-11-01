<?php
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store');
session_start();

require_once __DIR__ . '/../conexion.php';

if (!isset($_SESSION['visita_contada'])) {
    mysqli_query($conexion, "INSERT INTO contador_visitas (id, total) VALUES (1, 1) ON DUPLICATE KEY UPDATE total = total + 1");
    $_SESSION['visita_contada'] = 1;
}

$res = mysqli_query($conexion, "SELECT total FROM contador_visitas WHERE id = 1");
$row = $res ? mysqli_fetch_assoc($res) : null;

echo json_encode(['ok' => true, 'total' => (int)($row['total'] ?? 0)]);
