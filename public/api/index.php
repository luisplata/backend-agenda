<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../../back/config/config.php';
require_once __DIR__ . '/../../back/lib/db.php';

$db = new Database();

$endpoint = isset($_GET['endpoint']) ? $_GET['endpoint'] : '';

switch ($endpoint) {
    case 'users':
        //include '../../back/api/users.php';
        break;
    case 'productos':
        include __DIR__ . '/../../back/api/productos.php';
        break;
    case 'login':
        include __DIR__ . '/../../back/api/login.php';
        break;
    default:
        echo json_encode(['error' => 'Endpoint no encontrado']);
}
?>