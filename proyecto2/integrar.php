<?php
$a = 5;
$b = 8;
$max = 35;

include ('fibonacci.php');
include ('tablaMultiplicar.php');
include ('dibujaArray.php');

$serie = fibonacci($max);
$tabla = tablaMultiplicar($a,$b);

echo dibujaArray($serie);
echo dibujaArray($tabla);