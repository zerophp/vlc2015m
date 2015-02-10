<?php
namespace application\mappers;

use \core\models\FrontController;
use application\entity\UserEntity;
use application\entity\UsersCollection;

class UsersMapper 
{

    public $mapper = 'Users';
    public $config;
    public $entity;
    public $collection;

    public function __construct()
    {
        $this->entity = new UserEntity();
        $this->collection = new UsersCollection();
        
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

    public function getGateway()
    {   
        return 'application\\models\\Gateways\\'.
                $this->mapper.
                $this->getConfig()->application->adapter;
    }
    
    public function getUsers()
    {
        $gatewayname = $this->getGateway();
        $gateway = new $gatewayname($this->getConfig());
        $users = $gateway->getUsers();
        
        foreach ($users as $user)
        {
            $entity = new UserEntity();
            $entity->hydrate($user);
            $this->collection->{$entity->iduser}=$entity;
        }   
        
        //return $this->collection;
        return $users;
    }
    
    public function getUser($id)
    {
        $gatewayname = $this->getGateway();
        $gateway = new $gatewayname($this->getConfig());
        
        $user = $gateway->getUser($id);
        
        $entity = new UserEntity();
        $entity->hydrate($user);
        
        
        return $entity;
//         return $user;
    }
    
    public function deleteUser($id)
    {
        $gatewayname = $this->getGateway();
        $gateway = new $gatewayname($this->getConfig());
        return $gateway->deleteUser($id);
    }
    
    public function insertUser($data)
    {
        $gatewayname = $this->getGateway();
        $gateway = new $gatewayname($this->getConfig());
        $gateway->insertUser($data);
        //$gatewayhobbies -> inserHobby();
        //$gatewayagree -> insertAgree();
        
        return $data;
    }
    
    public function updateUser($id, $data)
    {
        $gatewayname = $this->getGateway();
        $gateway = new $gatewayname($this->getConfig());
        
        move_uploaded_file($_FILES['photo']['tmp_name'],
        $_SERVER['DOCUMENT_ROOT']."/".$_FILES['photo']['name']);
        
        $data['photo']=$_FILES['photo']['name'];
        $data['iduser'] = hash('sha256', $data['email']);
        
        return $gateway->updateUser($id, $data);
    }
    
    public function login($data)
    {
        $gatewayname = $this->getGateway();
        $gateway = new $gatewayname($this->getConfig());
        
        $user = $gateway->getUserLogin($data);
        $entity = new UserEntity();
        
        if(!empty($user))
            $entity->hydrate($user);
        
        return $entity;
    }
    
    
    
}