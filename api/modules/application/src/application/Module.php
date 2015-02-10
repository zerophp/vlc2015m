<?php
namespace application;

use application\options\Options;
class Module
{
    public function __construct()
    {
        $this->getBootstrap();    
    }
    
    public function getBootstrap()
    {
        session_start();
        if(!isset($_SESSION[__NAMESPACE__]))
            $_SESSION[__NAMESPACE__]=array();
    }
    
    public function getOptions()
    {       
            $configGlobal=array();
            $configLocal=array();
        
            if(file_exists('../configs/autoload/'.__NAMESPACE__.'.global.php'))
                $configGlobal = include_once('../configs/autoload/'.__NAMESPACE__.'.global.php');
            if(file_exists('../configs/autoload/'.__NAMESPACE__.'.local.php'))
                $configLocal = include_once('../configs/autoload/'.__NAMESPACE__.'.local.php');
        
            $config = array_merge(
                $configGlobal,
                $configLocal
            );
            
            $options = new Options();            
            
            foreach ($config as $key => $value)
            {
                $options->$key = $value;
            }
            
            
        return $options;
    }
}