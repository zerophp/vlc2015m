<?php
namespace application\controllers;

use \application\models\UsersMapper;
use \core\models\Views;

// include ('../modules/application/src/application/models/getUsers.php');

// include ('../modules/application/src/application/models/getUserDB.php');
// include ('../modules/application/src/application/models/getUser.php');
// include ('../modules/application/src/application/models/insertUser.php');
// include ('../modules/application/src/application/models/insertUserDB.php');
// include ('../modules/application/src/application/models/updateUser.php');
// include ('../modules/application/src/application/models/updateUserDB.php');
// include ('../modules/application/src/application/models/deleteUser.php');
// include ('../modules/application/src/application/models/deleteUserDB.php');

// include('../modules/application/src/application/forms/userForm.php');

// include('../modules/core/src/core/models/getColumns.php');
// include('../modules/core/src/core/models/validateForm.php');
// include('../modules/core/src/core/models/filterForm.php');
// include('../modules/core/src/core/models/renderForm.php');
// include('../modules/core/src/core/models/renderView.php');


class Users
extends \core\models\Controller
implements \core\models\ControllerInterface
{
    public $layout ='dashboard';
        
    public function index()
    {
        header("Location: /users/select");    
    }
    
    public function insert()
    {
        if($_POST)
        {
            $filterdata = filterForm($userForm, $_POST);
            $validatedata = validateForm($userForm, $filterdata);
            if($validatedata)
            {
        
                //insertUser($filterdata, $filename);
                insertUserDB($config, $filterdata);
            }
            header('Location: /users');
        }
        else
        {
            $usuario=array('','','','','','',array(),'','',array());
            $content = renderView($request, $config, array('usuario'=>$usuario));
        }
        return $content;
    }
    public function delete()
    {
        if(isset($_POST['id']))
        {
            //             deleteUser($_POST['id'], $filename);
            if($_POST['submit']=='Bórrame!')
            {
                deleteUserDB($config, $_POST['id']);
            }
            header('Location: /users');
        }
        else
        {
            $content = renderView($request, $config, array('usuario'=>$request['params']['id']));
        }
        return $content;
    }
    public function select($request, $config)
    {
        $users = new UsersMapper();
        $usuarios = $users->getUsers();
        $content = Views::renderView(__METHOD__,
                                                  $this->getConfig(), 
                                                  array('usuarios'=>$usuarios)
                                                 );        
        return $content;
    }
    public function update()
    {
        if($_POST)
        {
            $filterdata = filterForm($userForm, $_POST);
            $validatedata = validateForm($userForm, $filterdata);
        
            if($validatedata)
            {
                // $usuario = updateUser($filterdata['id'], $filterdata, $filename);
                $usuario = updateUserDB($config, $filterdata);
            }
            header('Location: /users');
        }
        else
        {
            $usuario = getUserDB($config, $request['params']['id']);
            $content = renderView($request, $config, array('usuario'=>$usuario));
        }
        return $content;
    }
    
}

