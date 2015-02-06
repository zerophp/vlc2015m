<?php
namespace application\models\Gateways;

class UsersMysql extends \Phpzero\adapters\MysqlAdapter
{
    
    public function getUsers()
    {
        $sql = "SELECT * FROM users";
        return $this->fetch($sql);        
    }   
}