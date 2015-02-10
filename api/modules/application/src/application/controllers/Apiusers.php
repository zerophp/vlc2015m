<?php
namespace application\controllers;

use application\services\UsersService;
use application\services\UsersServicesApi;


class Apiusers
extends \core\models\Controller
implements \core\models\ControllerInterface
{

    public $layout = NULL;
    
    public function index()
    {        
        $service = new UsersServicesApi();
        $val  = $service->{$_SERVER['REQUEST_METHOD']}();
        header("Content-type: application/json");
        echo $val;
    }
    
    
    
}

