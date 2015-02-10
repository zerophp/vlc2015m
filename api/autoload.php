<?php


function __autoload($className)
{
//     echo "<pre>className: ";
//     print_r($className);
//     echo "</pre>";
    
    $file = explode("\\", $className);
    $filename = implode("/", $file);
    
//     echo $filename;
    
//     echo "<pre>file: ";
//     print_r($file);
//     echo "</pre>";
    
    $filename = lcfirst($file[0])."/src/".$filename.'.php';
    
    if(file_exists(__DIR__.'/modules/'.$filename))
        require_once(__DIR__.'/modules/'.$filename);
    else 
        require_once(__DIR__.'/vendor/'.$filename);
    

}