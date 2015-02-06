<?php
namespace application\controllers;



class Apiusers
extends \core\models\Controller
implements \core\models\ControllerInterface
{

    public $layout ='jumbotron';
    
    public function index()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        
        switch ($method)
        {
            
            case 'GET':     //apiusers     /users/select
                echo " - GET";
                break;
                
            case 'GET':     //apiusers/5454 /users/insert
                    echo " - GET";
                break;
            case 'POST':    //apiusers (array)
                    echo " - KAK";
                break;
            case 'PUT':     //apisusers/23874 <-(array)
                break;
            case 'DELETE':  //apiusers/9873126
                break;
            case 'OPTIONS': //apiusers ->(GET, POST, PUT, DELETE, OPTIONS)
                break;
        }
        
        
        
        
        
        die;
       
    }
    
}

