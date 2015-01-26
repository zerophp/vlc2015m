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


$filename = '../data/usuarios.txt';


if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'select';

switch($action)
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
            header('Location: /usuarios.php');
        }
        else
        {
            $usuario=array('','','','','','',array(),'','',array());
            include('../modules/application/src/application/views/usuarios/insert.phtml');
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
            header('Location: /usuarios.php');            
        }
        else 
        {
            $usuario = getUser($_GET['id'], $filename);
            include('../modules/application/src/application/views/usuarios/update.phtml');            
        }
    break;
    
    case 'delete':
        if(isset($_POST['id']))
        {
            deleteUser($_POST['id'], $filename);
            header('Location: /usuarios.php');
        }
        else
        {
            include('../modules/application/src/application/views/usuarios/delete.phtml');
        }
            
    break;
    
    default:
    case 'select':  
        $usuarios = getUsers($filename);
        include('../modules/application/src/application/views/usuarios/select.phtml');
    break;
}











