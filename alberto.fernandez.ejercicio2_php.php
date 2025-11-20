<?php
// Autor: Alberto Fernandez
// Ejercicio 2: Números primos entre 3 y 999
// Muestra todos los números primos en el rango

echo "<h2>Números primos entre 3 y 999:</h2>";

for ($num = 3; $num <= 999; $num++) {
    $es_primo = true;
    
    // Verificar si el número es divisible por algún número desde 2 hasta su raíz cuadrada
    for ($i = 2; $i <= sqrt($num); $i++) {
        if ($num % $i == 0) {
            $es_primo = false;
            break;
        }
    }
    
    if ($es_primo) {
        echo $num . " ";
    }
}
?>
