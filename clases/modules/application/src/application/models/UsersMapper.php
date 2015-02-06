<?php
namespace application\models;

use \core\models\FrontController;

class UsersMapper 
{

    public $mapper = 'Users';
    public $config;

    public function __construct()
    {
        $fc = FrontController::getInstace();
        $this->setConfig($fc->getConfig());
    }
    /**
     * @return the $config
     */
    public function getConfig()
    {
        return $this->config;
    }

	/**
     * @param field_type $config
     */
    public function setConfig($config)
    {
        $this->config = $config;
    }

	public function getUsers()
    {
        $gatewayname = 'application\\models\\Gateways\\'.
                        $this->mapper.
                        $this->getConfig()['adapter'];
        
        
        $gateway = new $gatewayname($this->getConfig());   

        
        return $gateway->getUsers();
    }
    
    
    
}