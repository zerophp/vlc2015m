<?php
namespace application\models\Gateways;

use core\models\FrontController;
class UsersTxt extends \Phpzero\adapters\TxtAdapter
{

    public function getUsers()
    {
        return $this->fetch();
    }

    public function getUser($id)
    {
        return $this->fetch($id);
    }

    public function deleteUser($id)
    {
        return $this->delete($id);
    }

    public function insertUser($data)
    {
        $this->save($data);
    }

    public function updateUser($id, $data)
    {
        $this->save($data, $id);
    }
}