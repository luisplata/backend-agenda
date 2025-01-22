<?php
// Script para generar un hash seguro para una contraseña inicial

$password = ''; // Cambia esto por tu contraseña deseada

// Generar el hash utilizando password_hash
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Mostrar el hash generado
echo "Contraseña original: " . $password . "<br>";
echo "Hash generado: " . $hashedPassword . "<br>";
if(password_verify($password, $hashedPassword)){
    echo "validamos si es la misma contraseña: " . "Si" . "<br>";
}else{
    echo "validamos si es la misma contraseña: " . "No" . "<br>";
}


?>