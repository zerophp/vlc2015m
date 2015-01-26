<?php


if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = '200';

switch($action)
{
    
    case '200':
        echo "TODO OK";
        return;
    break;
        
    case '404':  
        $usuarios = getUsers($filename);
        include('../modules/application/src/application/views/.phtml');
    break;
}











