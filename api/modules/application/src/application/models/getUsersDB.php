<?php

function getUsersDB($config)
{
    //$usuarios=[];
    $usuarios=array();
    
    // Conectar al DBMS
    $link = mysqli_connect($config['db']['host'],
                            $config['db']['user'],
                            $config['db']['password']);
    // Seleccionar la DB
    mysqli_select_db($link, $config['db']['database']);
    
    // Escribir la consulta a mano
    $query = "SELECT iduser, name, email, group_concat(hobbies.hobby)
                FROM users 
                LEFT JOIN users_has_hobbies 
                ON users_iduser = users.iduser 
                LEFT JOIN hobbies 
                ON hobbies_idhobby = hobbies.idhobby
                GROUP BY iduser";
    // Probar la consulta en el WB    

    // Enviar la consulta
    $result = mysqli_query($link, $query);
    
    // (SELECT) Recorrer el recordset
    while($row = mysqli_fetch_assoc($result))
    {
        // Mostrar fila a fila        
        $usuarios[]=implode("|", $row);
    }    
    // Cerra la conexion
    mysqli_close($link);
    
    // Retornar valores
    return $usuarios;

}