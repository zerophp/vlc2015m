<?php

function insertUser($data, $filename)
{
    foreach ($data as $key => $value)
    {
        if(is_array($value))
            $data[$key]=implode(",", $value);
    }
    
    move_uploaded_file($_FILES['photo']['tmp_name'],
    $_SERVER['DOCUMENT_ROOT']."/".$_FILES['photo']['name']);
    
    file_put_contents($filename,implode("|",$data)."\n",FILE_APPEND);
    
    return $data;
}