<?php

session_start();

$errores = [];

// recoger datos
$nombre = $_POST['nombre'] ?? '';
$edad = $_POST['edad'] ?? '';
$email = $_POST['email'] ?? '';


// VALIDACION CON EXCEPCIONES

try {
    // 1. que nombre no esté vacío
    if (empty($nombre)) {
        $errores[] = "El campo nombre es obligatorio";
    }

    // 2. que edad sea un número válido
    if (!is_numeric($edad)) {
        $errores[] = "La edad debe ser un número";
    } else if ($edad < 1 || $edad > 105) {
        $errores[] = "Edad fuera de rango, debe ser entre 1 y 105 años";
    }

    // 3. email válido
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errores[] = "Email no válido";
    }

    // si hay errores los mostramos todos
    if (!empty($errores)) {
        
        $mensajeCompleto = implode("<br>", $errores);
        throw new InvalidArgumentException($mensajeCompleto);
    }

    // PROCESO CORRECTO
    echo "Nombre: $nombre <br>";
    echo "Edad: $edad <br>";
    echo "Email: $email <br>";

    // guardamos en sesión
    $_SESSION['nombre'] = $nombre;
    $_SESSION['edad'] = $edad;

} catch (InvalidArgumentException $e) {
    // CAPTURA DE ERRORES
    // Aquí caen todos los errores juntos si algo falló
    echo "<h3>Se encontraron los siguientes errores:</h3>";
    echo $e->getMessage() . "<br>";
}

?>