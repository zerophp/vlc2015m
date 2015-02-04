<?php
namespace core\models;

class Dispatch
{
    public $request;
    
    public function __construct($request)
    {
        $this->request = $request;    
    }
    
    public function run()
    {
        $controllername = $this->request['controller'];
        $actionname = $this->request['action'];
        
        $controller = new $controllername();
        $controller->$actionname();
    }
    
}