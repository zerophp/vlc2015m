<?php
function getUsers($filename)
{
    // Leer el fichero usuarios.txt
    $usuarios = file_get_contents($filename);
    // separar el string de usuarios por saltos de linea en usuarios
    $usuarios = explode("\n", $usuarios);
    
    return $usuarios;
}