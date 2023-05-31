<?php

// Generar un número aleatorio para el códido de venta
function genera_codigo ($longitud) {
    $caracteres = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "A", "B", "C", "D", "E", "F", "G", "H", "I", "J", "K", "L", "M", "N", "O", "P", "Q", "R", "S", "T", "U", "V", "W", "X", "Y", "Z");
    $codigo = '';

    for ($i = 1; $i <= $longitud; $i++) {
        $codigo .= $caracteres[numero_aleatorio(0, 35)];
    }

    return $codigo;
}

function numero_aleatorio ($ninicial, $nfinal) {
    $numero = rand($ninicial, $nfinal);

    return $numero;
}


// echo genera_codigo(5);
?>