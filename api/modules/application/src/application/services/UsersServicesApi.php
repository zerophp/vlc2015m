<?php
namespace application\services;

use core\models\FrontController;

class UsersServicesApi
{
    public function GET()
    {
        $val = "User not found";
        
        $users = new UsersService();
        
        $fc = FrontController::getInstace();
        if(isset($fc->request['params']))
            $param = $fc->request['params'];
        
        if(!empty($param))
        {
            $user = new UsersService();
            $user = $user->getUser(FrontController::getInstace()->request['params']);
        
            if(isset($user->iduser))
                $val = json_encode($user->extract());
        
        }
        else
            $val = json_encode($users->getUsers());
        
        return $val;
    }
    
    public function POST()
    {
        die("Method not implemented");
    }
    
    public function DELETE()
    {
        die("Method not implemented");
    }
    
    public function PUT()
    {
        die("Method not implemented");
    }
    
    public function OPTIONS()
    {
        die("Method not implemented");
    }
}