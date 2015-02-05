<?php
namespace application\controllers;

class Index
extends \core\models\Controller 
implements \core\models\ControllerInterface
{
    public $layout ='jumbotron';
    
	public function index()
    {
        $content = \core\models\Views::renderView(__METHOD__,$this->getConfig());
        return $content;
    }
}


















