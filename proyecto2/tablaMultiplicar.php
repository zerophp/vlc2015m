<?php

function tablaMultiplicar($filas, $columnas)
{
    for ($a = 0; $a <= $filas; $a ++) 
    {
        for ($b = 0; $b <= $columnas; $b ++) 
        {
            if ($a == 0) {
                $tabla[$a][$b] = $b;
            } 
            else if ($b == 0) {
                $tabla[$a][$b] = $a;
            } 
            else {
                $tabla[$a][$b] = $b * $a;
            }
        }
    }
    return $tabla;
}