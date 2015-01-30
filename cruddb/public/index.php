<?php

require_once('../modules/core/src/core/models/parseURL.php');
require_once('../modules/core/src/core/models/getConfig.php');

$config = getConfig();
$request = parseURL();
// $request = routeURL($request);



switch($request['controller'])
{
    case 'users':
        include('../modules/application/src/application/controllers/users.php');
    break;
    
    case 'error':
        include('../modules/application/src/application/controllers/error.php');
    break; 

    case 'index':
        include('../modules/application/src/application/controllers/index.php');
    break;
    
        
    
}