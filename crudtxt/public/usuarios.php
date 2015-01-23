<?php

if(isset($_GET['action']))
    $action = $_GET['action'];
else
    $action = 'select';

switch($action)
{
    case 'insert':
        echo "esto es insert";
        if($_POST)
        {
            include('userForm.php');
            include('filterForm.php');
            include('validateForm.php');
            include('renderForm.php');
            
            $filterdata = filterForm($userForm, $_POST);
            $validatedata = validateForm($userForm, $filterdata);
            
            if($validatedata)
            {
                foreach ($filterdata as $key => $value)
                {
                    if(is_array($value))
                        $filterdata[$key]=implode(",", $value);
                }
                $filterdata[]=$_FILES['photo']['name'];
                move_uploaded_file($_FILES['photo']['tmp_name'],
                                    $_SERVER['DOCUMENT_ROOT']."/".$_FILES['photo']['name']);
                file_put_contents('usuarios.txt',implode("|",$filterdata)."\n",FILE_APPEND);            
            }
            header('Location: /usuarios.php');
        }
        else
        {
            $usuario=array('','','','','','',array(),'','',array());
            include('insert.php');
        }
            
    break;
    
    case 'update':
        echo "esto es update";
        if($_POST)
        {
            // Leer los datos del post
            // Filtrar los datos del post
            // Validar los datos del post
            // Juntar por comas los campos multiples
            // Juntar por pipes los campos
            
            // Leer los datos de usuarios.txt en un string
            // Separar el string por saltos de linea
            
            // Sustituir la fila id por el usuario
            $usuarios[$id]=$usuario;
            // Juntar por saltos de linea los usuarios
            // Sobreescribir el fichero usuarios.txt
        }
        else 
        {
            // Leer el archivo de usuarios.txt
            $usuarios = file_get_contents('usuarios.txt');
            // Separar por saltos de linea en usuarios
            $usuarios = explode("\n", $usuarios);
            // Tomar el usuario ID
            $id = $_GET['id'];
          
            // Separar por usuario por pipes
            $usuario = explode("|", $usuarios[$id]); 
            // Separar campos multiples por comas
            $usuario[6]=explode(",", $usuario[6]);
            $usuario[9]=explode(",", $usuario[9]);
            $usuario[0]=$id;
            // Mostar en el formulario
            include('insert.php');
            
        }
    break;
    
    case 'delete':
        echo "esto es delete";
        if($_POST)
        {
            
        }
        else 
            
    break;
    
    default:
    case 'select':
        echo "esto es select";
        // Leer el fichero usuarios.txt
        $usuarios = file_get_contents('usuarios.txt');
        // separar el string de usuarios por saltos de linea en usuarios
        $usuarios = explode("\n", $usuarios);
        // dibujar la tabla
        $html="<a href=\"usuarios.php?action=insert\">Insert</a>";
        $html.="<table border=1>";        
        foreach ($usuarios as $key => $usuario)
        {
            // para cada fila/usuario separar por pipes
            $usuario = explode("|", $usuario);
            // dibujo la fila
            $html.="<tr>";
            // recorrer el array de usuario
                foreach ($usuario as $key2 => $data)
                {
                    // dibujar la columna
                    $html.="<td>";
                        // poner el dato
                        $html.=$data;
                    $html.="</td>";
                }
                // poner opciones
                $html.="<td>";
                $html.="<a href=\"usuarios.php?action=update&id=".$key."\">Update</a> | ";
                $html.="<a href=\"usuarios.php?action=delete&id=".$key."\">Delete</a>";
                $html.="</td>";
            $html.="</tr>";
        }
        $html.="</table>";
        echo $html;
    break;
}











