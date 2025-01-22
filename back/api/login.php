<?php
header('Content-Type: application/json');

require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../lib/db.php';

// Obtener los datos del cuerpo de la solicitud
$data = json_decode(file_get_contents('php://input'), true);
$email = isset($data['email']) ? $data['email'] : '';
$password = isset($data['password']) ? $data['password'] : '';

if (empty($email) || empty($password)) {
    echo json_encode([
        'success' => false,
        'message' => 'El correo electrónico y la contraseña son obligatorios.'
    ]);
    exit;
}

$db = new Database();

// Consultar el usuario por correo electrónico
$sql = "SELECT * FROM admins WHERE email = '" . $db->escape($email) . "'";
$result = $db->query($sql);

if ($result->num_rows === 1) {
    $admin = $result->fetch_assoc();

    // Verificar la contraseña
    if (password_verify($password, $admin['password'])) {
        echo json_encode([
            'success' => true,
            'message' => 'Inicio de sesión válido',
            'admin' => [
                'id' => $admin['id'],
                'nombre' => $admin['nombre'],
                'email' => $admin['email']
            ]
        ]);
    } else {
        echo json_encode([
            'success' => false,
            'message' => 'Contraseña incorrecta.'
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'message' => 'Usuario no encontrado.'
    ]);
}

$db->close();
?>
