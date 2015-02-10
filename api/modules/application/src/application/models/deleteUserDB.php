<?php

function deleteUserDB($config, $id)
{
    $link = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['password']);
    
    mysqli_select_db($link, $config['db']['database']);
    
    $query = "DELETE FROM users WHERE iduser='". $id ."';";
    $result = mysqli_query($link, $query);
    
    return $result;
    
}