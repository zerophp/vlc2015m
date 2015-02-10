<?php
namespace application\controllers;

use \core\models\Views;
use application\services\UsersService;

class Author
extends \core\models\Controller
implements \core\models\ControllerInterface
{
    public $layout = 'login';
    
    public function index()
    {
        $content = Views::renderView(
                                        __METHOD__,
                                        $this->getConfig()
                                    );
        return $content;
    }
    
    public function logout()
    {
        unset($_SESSION['application']['author']);
        session_regenerate_id();
        header ('Location: /');
    }
    
    public function login()
    {        
        include_once('../modules/application/src/application/forms/loginForm.php');
        include_once('../modules/core/src/core/models/validateForm.php');
        include_once('../modules/core/src/core/models/filterForm.php');
        
        if($_POST)
        {
            $filterdata = filterForm($loginForm, $_POST);
            $validatedata = validateForm($loginForm, $filterdata);
            if($validatedata)
            {
                $user = new UsersService();
                
                if($user->login($filterdata))
                {
                    $_SESSION['application']['author']=TRUE;
                    header ("Location: /users/select");
                }
                else
                    header ("Location: /author");
                
            }
            
        }
        
        
        
    }
  
}