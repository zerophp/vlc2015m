<?php

function getUserDB($config, $id)
{
    $usuarios=[];
    
    // Connect to DBMS
    $link = mysqli_connect($config['db']['host'], $config['db']['user'], $config['db']['password']);
    
    // Select database
    mysqli_select_db($link, $config['db']['database']);
    
    // Write the query
    $query = "SELECT * FROM users WHERE iduser='" . mysqli_real_escape_string($link, $id) . "'";
    
    // Send query against DB
    $usuario = mysqli_query($link, $query);
    
    // Catch our result
    $usuarios[] = mysqli_fetch_array($usuario, MYSQLI_BOTH);
    
    mysqli_close($link);
    
    // Retornar valores
    return $usuarios[0];
}