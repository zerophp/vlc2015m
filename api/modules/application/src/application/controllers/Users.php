<?php
namespace application\controllers;

use \application\mappers\UsersMapper;
use \core\models\Views;
use core\models\FrontController;
use application\services\UsersService;

// include ('../modules/application/src/application/models/getUsers.php');

// include ('../modules/application/src/application/models/getUserDB.php');
// include ('../modules/application/src/application/models/getUser.php');
// include ('../modules/application/src/application/models/insertUser.php');
// include ('../modules/application/src/application/models/insertUserDB.php');
// include ('../modules/application/src/application/models/updateUser.php');
// include ('../modules/application/src/application/models/updateUserDB.php');
// include ('../modules/application/src/application/models/deleteUser.php');
// include ('../modules/application/src/application/models/deleteUserDB.php');


// include('../modules/core/src/core/models/renderForm.php');
// include('../modules/core/src/core/models/renderView.php');


class Users
extends \core\models\Controller
implements \core\models\ControllerInterface
{
    public $layout ='dashboard';
        
    public function __construct()
    {
        if(!$_SESSION['application']['author'])
            header("Location: /author/index");
    }
    
    public function index()
    {
        header("Location: /users/select");    
    }
    
    public function insert()
    {
        if($_POST)
        {
            include_once('../modules/application/src/application/forms/userForm.php');
            include_once('../modules/core/src/core/models/validateForm.php');
            include_once('../modules/core/src/core/models/filterForm.php');
            
            
            $filterdata = filterForm($userForm, $_POST);
            $validatedata = validateForm($userForm, $filterdata);
            if($validatedata)
            {
                //insertUser($filterdata, $filename);
                //insertUserDB($config, $filterdata);
                $users = new UsersService();
//                 $users = new UsersMapper();
                //$users = new UsersMapper();
                $users->insertUser($filterdata);
            }
            header('Location: /users');
        }
        else
        {
            $usuario=array('','','','','','',array(),'','',array());
            $content = Views::renderView(
                                            __METHOD__,
                                            FrontController::getInstace()->getConfig(),
                                            array('usuario'=>$usuario)
                                        );
        }
        return $content;
    }
    public function delete()
    {
        $content = '';
        if(isset($_POST['id']))
        {
            // deleteUser($_POST['id'], $filename);
            if($_POST['submit']=='Bórrame!')
            {
                //deleteUserDB($config, $_POST['id']);
                $users = new UsersMapper();
                $users->deleteUser($_POST['id']);
            }
            header('Location: /users');
        }
        else
        {
            $content = Views::renderView(
                                            __METHOD__,
                                            FrontController::getInstace()->getConfig(),
                                            array('usuario'=>FrontController::getInstace()->request['params']['id'])
                                        );
        }
        return $content;
    }
    public function select($request, $config)
    {
        $users = new UsersService();
//         $users = new UsersMapper();
        
        $usuarios = $users->getUsers();
        $content = Views::renderView(
                                        __METHOD__,
                                        $this->getConfig(),
                                        array('usuarios'=>$usuarios)
                                    );
        return $content;
    }
    public function update()
    {
        if($_POST)
        {
            include_once('../modules/application/src/application/forms/userForm.php');
            include_once('../modules/core/src/core/models/validateForm.php');
            include_once('../modules/core/src/core/models/filterForm.php');
            include_once('../modules/core/src/core/models/getColumns.php');
            
            $filterdata = filterForm($userForm, $_POST);
            $validatedata = validateForm($userForm, $filterdata);
        
            if($validatedata)
            {
                // $usuario = updateUser($filterdata['id'], $filterdata, $filename);
                // $usuario = updateUserDB($config, $filterdata);
                $users = new UsersService();
                
                $users->updateUser($filterdata['iduser'], $filterdata);
            }
            header('Location: /users');
        }
        else
        {
            //$usuario = getUserDB($config, $request['params']['id']);
            //$content = renderView($request, $config, array('usuario'=>$usuario));
            //$user = new UsersMapper();
            $user = new UsersService();
            $user = $user->getUser(FrontController::getInstace()->request['params']['id']);
            $content = Views::renderView(
                                            __METHOD__,
                                            FrontController::getInstace()->getConfig(),
                                            array('usuario'=>$user)
                                        );
        }
        return $content;
    }
    
}

