<?php

function insertUserDB($config, $data)
{
    //$usuarios=[];
    $usuarios=array();
    
    move_uploaded_file($_FILES['photo']['tmp_name'],
                        $_SERVER['DOCUMENT_ROOT']."/".$_FILES['photo']['name']);
    
    $data['photo']=$_FILES['photo']['name'];
    $data['iduser'] = hash('sha256', $data['email']);
    
    // Conectar al DBMS
    $link = mysqli_connect($config['db']['host'],
        $config['db']['user'],
        $config['db']['password']);
    // Seleccionar la DB
    mysqli_select_db($link, $config['db']['database']);
    
    
    $columns =getColumns($config, 'users');
    
    $query = array();
    foreach ($data as $key => $value)
    {
        if(!in_array($key, $columns))
            unset ($data[$key]);
        else 
            $query[] = $key."='".$value."'";
    }
    $query = implode(",", $query);
    $query = 'INSERT INTO users SET '.$query;
   
    
//     echo "<pre>";
//     print_r($query);
//     echo "</pre>";
    
//     die;
    $result = mysqli_query($link, $query);
    
   
    return $result;
}