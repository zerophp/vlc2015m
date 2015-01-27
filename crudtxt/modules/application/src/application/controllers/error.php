<?php

switch($request['action'])
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











