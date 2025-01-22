<?php
$method = $_SERVER['REQUEST_METHOD'];

if ($method === 'GET') {
    $result = $db->query("SELECT * FROM productos");
    $productos = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($productos);
} else {
    echo json_encode(['error' => 'Método no soportado']);
}
?>