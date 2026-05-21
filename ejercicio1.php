<?php

// ingreso de datos
$numero = readline("Introduce el número a dividir: ");
$divisor = readline("Introduce el divisor: ");

try {
    $resultado = calculator($numero, $divisor);
    echo "Resultado: $resultado\n";

} catch (Exception $excepcionGeneral) {
    echo "Error: " . $excepcionGeneral->getMessage() . "\n";
}

function calculator($numero, $divisor) {
    checkInputs($numero, $divisor);

    // operación
    return $numero / $divisor;
}

function checkInputs($numero, $divisor) {
    // validacion de números
    if (!is_numeric($numero) || !is_numeric($divisor)) {
        throw new Exception("Los números no son válidos, intenta de nuevo");
    }

    // caso división por 0
    if ($divisor == 0) {
        throw new Exception("No se puede dividir por cero");
    }
}

?>