<?php
// Autor: Alberto Fernandez
// Ejercicio 1: Patrón numérico descendente
// Muestra números en formato piramidal desde 10 hasta 1

for ($i = 10; $i >= 1; $i--) {
    for ($j = $i; $j >= 1; $j--) {
        echo $j . " ";
    }
    echo "<br>";
}
?>
