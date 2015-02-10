<?php
namespace application\services;

use application\mappers\UsersMapper;
use application\entity\UserEntity;
class UsersService
{
    
    public function getUsers()
    {
        $users = new UsersMapper();
        return $users->getUsers();

    }
    public function getUser($id)
    {
        $users = new UsersMapper();
        $user = $users->getUser($id);
        
        if($user instanceof UserEntity)
            return $user;
        else
            die ("kaka");
        
    }
    
    public function insertUser($data)
    {
        
        move_uploaded_file($_FILES['photo']['tmp_name'],
        $_SERVER['DOCUMENT_ROOT']."/".$_FILES['photo']['name']);
        
        $data['photo']=$_FILES['photo']['name'];
        $data['iduser'] = hash('sha256', $data['email']);
        
        $usermapper = new UsersMapper();
        $data = $usermapper->insertUser($data);
        
        return $data;
    }
    public function updateUser()
    {
        $gatewayname = $this->getGateway();
        $gateway = new $gatewayname($this->getConfig());
        
        move_uploaded_file($_FILES['photo']['tmp_name'],
        $_SERVER['DOCUMENT_ROOT']."/".$_FILES['photo']['name']);
        
        $data['photo']=$_FILES['photo']['name'];
        $data['iduser'] = hash('sha256', $data['email']);
        
        $usermapper = new UsersMapper();
        $data = $usermapper->updateUser($data);
        
        return $data;
    }
    public function deleteUser()
    {
    
    }
    
    public function login($data)
    {
        $usermapper = new UsersMapper();
        $user = $usermapper->login($data);
       
        if($user instanceof UserEntity)
            if(!empty($user->iduser))
                return TRUE;
                
        return FALSE;        
        
    }
    
//     public function loginTwitter()
//     {
    
//     }
    
    
}
