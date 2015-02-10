<?php
namespace application\controllers;

class Error 
extends \core\models\Controller
implements \core\models\ControllerInterface
{
    
    public $layout = 'jumbotron';
     
    public function error404()
    {
        die ("error 404");
    }
    
    public function error412()
    {
        die ("error 412");
    } 
    
    //     public function setConfig($config)
    //     {
    //         echo "config";
    //         $this->config = $config;
    //     }
    
}












