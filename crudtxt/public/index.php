<?php


echo "<pre>";
print_r($_SERVER['REQUEST_URI']);
echo "</pre>";



$request = parseURL();


switch($request['controller'])
{
    case 'usuarios':
        include('../modules/application/src/application/controllers/usuarios.php');
    break;
    
    case 'error':
        include('../modules/application/src/application/controllers/error.php');
    break;    
        
    
}