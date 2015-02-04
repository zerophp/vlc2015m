<?php
require_once('../autoload.php');

$config = core\models\FrontController::getConfig();
$request = core\models\FrontController::parseURL();
// $request = core\models\FrontController::routeURL($request);

// $mysql = new acl\adapters\MysqlAdapter($config['db']);

// $query = "SELECT * FROM users";

// $usuario = $mysql->querySelect($query);

// echo "<pre>";
// print_r($usuario);
// echo "</pre>";





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












