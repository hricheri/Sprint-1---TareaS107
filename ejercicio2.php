<?php

session_start();

$errores = [];

// recoger datos
$nombre = $_POST['nombre'] ?? '';
$edad = $_POST['edad'] ?? '';
$email = $_POST['email'] ?? '';


// VALIDACION

// que nombre no esté vacío

if (empty($nombre)) {
    $errores[] = "El campo nombre es obligatorio";
}

// que edad sea un número válido
if (!is_numeric($edad)) {
    $errores[] = "La edad debe ser un número";
} else if ($edad < 1 || $edad > 105) {
    $errores[] = "Edad fuera de rango, debe ser entre 1 y 105 años";
}

// email válido
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores[] = "Email no válido";
}

// RESULTADO

if (!empty($errores)) {
    // mostrar errores
    foreach ($errores as $error) {
        echo $error . "<br>";
    }
} else {
    // todo correcto
    echo "Nombre: $nombre <br>";
    echo "Edad: $edad <br>";
    echo "Email: $email <br>";

    // guardar en sesión
    $_SESSION['nombre'] = $nombre;
    $_SESSION['edad'] = $edad;
}

?>