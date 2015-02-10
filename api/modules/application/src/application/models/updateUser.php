<?php

function updateUser($id, $data, $filename)
{   
    $data['privacy']=implode(",", $data['privacy']);
    $data['hobbies']=implode(",", $data['hobbies']);
    
    // Juntar por pipes los campos
    $usuario = implode("|", $data);
    $usuarios = getUsers($filename);
    // Sustituir la fila id por el usuario
    $usuarios[$id]=$usuario;
    // Juntar por saltos de linea los usuarios
    $usuarios = implode("\n", $usuarios);
    // Sobreescribir el fichero usuarios.txt
    file_put_contents($filename,$usuarios);
    
    return $usuario;
}