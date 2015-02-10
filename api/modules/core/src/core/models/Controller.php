<?php
namespace core\models;

abstract class Controller
{
    private $request;
    private $config;
    
    
    /**
     * @return the $request
     */
    final public function getRequest()
    {
        return $this->request;
    }
    
    /**
     * @return the $config
     */
    final public function getConfig()
    {
        return $this->config;
    }
    
    /**
     * @param field_type $request
     */
    final public function setRequest($request)
    {
        $this->request = $request;
    }
    
    /**
     * @param field_type $config
     */
//     abstract public function setConfig($config);
    
    final public function setConfig($config)
    {
        $this->config = $config;
    }
    
}
