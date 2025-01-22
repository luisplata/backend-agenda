<?php
// Script para generar un hash seguro para una contraseña inicial

$password = 'admin_password'; // Cambia esto por tu contraseña deseada

// Generar el hash utilizando password_hash
$hashedPassword = '$2y$12$W0FGDq54nPn8zgDPYPVT0.SAC/PQEXLuxN5N3Czpg19qPSTxq5YSC'; //password_hash($password, PASSWORD_DEFAULT);

// Mostrar el hash generado
echo "Contraseña original: " . $password . "<br>";
echo "Hash generado: " . $hashedPassword . "<br>";
if(password_verify($password, $hashedPassword)){
    echo "validamos si es la misma contraseña: " . "Si" . "<br>";
}else{
    echo "validamos si es la misma contraseña: " . "No" . "<br>";
}


?>