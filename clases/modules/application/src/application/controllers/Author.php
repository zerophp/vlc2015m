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
                    echo "Hola koko";
                    session_start();
                    echo session_id();
                    $_SESSION['application']['author']='value';
                    unset($_SESSION['application']);
                    //session_regenerate_id();
                    //session_destroy();
                    
                    
                    echo "<pre>";
                    print_r($_SESSION);
                    echo "</pre>";
                    
                    
                }                    
                else
                    echo "kaka";
               
                
            }
            
        }
        
        
        
    }
  
}