<?php

function getUser($id, $filename)
{
    // Leer el archivo de usuarios.txt
    $usuarios = file_get_contents($filename);
    // Separar por saltos de linea en usuarios
    $usuarios = explode("\n", $usuarios);
    // Tomar el usuario ID
    
    
    // Separar por usuario por pipes
    $usuario = explode("|", $usuarios[$id]);
    // Separar campos multiples por comas
    $usuario[6]=explode(",", $usuario[6]);
    $usuario[9]=explode(",", $usuario[9]);
    $usuario[0]=$id;
    
    return $usuario;
}