<?php

include ('../modules/application/src/application/models/getUsers.php');
include ('../modules/application/src/application/models/getUser.php');
include ('../modules/application/src/application/models/insertUser.php');
include ('../modules/application/src/application/models/updateUser.php');
include ('../modules/application/src/application/models/deleteUser.php');

include('../modules/application/src/application/forms/userForm.php');

include('../modules/core/src/core/models/validateForm.php');
include('../modules/core/src/core/models/filterForm.php');
include('../modules/core/src/core/models/renderForm.php');
include('../modules/core/src/core/models/renderView.php');


$filename = $config['filename'];



switch($request['action'])
{
    case 'insert':
        if($_POST)
        {                   
            $_POST[]=$_FILES['photo']['name'];
            $filterdata = filterForm($userForm, $_POST);
            $validatedata = validateForm($userForm, $filterdata);
            
            if($validatedata)
            {
                insertUser($filterdata, $filename);            
            }
            header('Location: /users');
        }
        else
        {
            $usuario=array('','','','','','',array(),'','',array());
            $content = renderView($request, $config, array('usuario'=>$usuario));
        }
            
    break;
    
    case 'update':
        if($_POST)
        {            
            $_POST[] = $_FILES['photo']['name'];
            $filterdata = filterForm($userForm, $_POST);
            $validatedata = validateForm($userForm, $filterdata);
            
            if($validatedata)
            {
                $usuario = updateUser($filterdata['id'], $filterdata, $filename);
            }
            header('Location: /users');            
        }
        else 
        {
            $usuario = getUser($request['params']['id'], $filename);
            ob_start();
                include('../modules/application/src/application/views/usuarios/update.phtml');
                $content = ob_get_contents();
            ob_end_clean();
        }
    break;
    
    case 'delete':
        if(isset($_POST['id']))
        {
            deleteUser($_POST['id'], $filename);
            header('Location: /users');
        }
        else
        {
            ob_start();
                include('../modules/application/src/application/views/usuarios/delete.phtml');
                $content = ob_get_contents();
            ob_end_clean();
        }
            
    break;
    
    default:
    case 'select':  
        $usuarios = getUsers($filename);        
        $content = renderView($request, $config, array('usuarios'=>$usuarios));
    break;
}


include('../modules/application/src/application/layouts/dashboard.phtml');










