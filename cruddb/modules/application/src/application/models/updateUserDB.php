<?php

function updateUserDB($config, $data)
{
//     echo "<pre>";
//     echo ("->>>>>>>>>>>DENTROOOOOOOOO!!\n");
//     print_r($data);
//     echo "</pre>";
    
    
    if (array_key_exists('privacy', $data))
        $data['privacy'] = implode(",", $data['privacy']);
    
    if (array_key_exists('hobbies', $data))
        $data['hobbies'] = implode(",", $data['hobbies']);
    
    move_uploaded_file($_FILES['photo']['tmp_name'],
                        $_SERVER['DOCUMENT_ROOT']."/".$_FILES['photo']['name']);
    
    $data['photo']=$_FILES['photo']['name'];
      
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
    

    
    $query = "UPDATE users SET ".$query." WHERE iduser='".$data['iduser']."'";
    
//     echo "<pre>";
//     echo("->>>>>>>>>>>\n");
//     print_r($query);
//     echo "</pre>";
//     die();
    
    $result = mysqli_query($link, $query);
    
   
    return $result;
}