<?php
function getColumns($config, $tablename)
{
    $columns = array();
    
    // Conectar al DBMS
    $link = mysqli_connect($config['db']['host'],
        $config['db']['user'],
        $config['db']['password']);
    // Seleccionar la DB
    mysqli_select_db($link, $config['db']['database']);
    
    // Escribir la consulta a mano
    $query = "describe ".$tablename;
    // Probar la consulta en el WB
    
    // Enviar la consulta
    $result = mysqli_query($link, $query);
    
    // (SELECT) Recorrer el recordset
    while($row = mysqli_fetch_assoc($result))
    {
        // Mostrar fila a fila
    
        $columns[]=$row['Field'];
    }
    // Cerra la conexion
    mysqli_close($link);
    
    // Retornar valores
    return $columns;
}