<?php


function parseURL()
{
    $controllers = array ('usuarios'=>array('insert', 'select', 'update', 'delete'),
                          'error'=>array('404'),
                          'index'=>array('index')
    );
    
    // dividir la url en un array
    
    // Tiene parametros?
    // Es longitud par?
        // OK rellenar request
        // KO deveolver error 412
    
    // No tiene parametros
        // Tiene controller
        // si
            //Existe?
        // no
            // return index
        
        // Tiene action
        // si
            // Existe?
        // no
            //Return index
    
    // No tiene controller
        // return index/index
        
    
    $request = array();
    return $request;
}





///usuarios/update/id/8
/*
$request = array ('controller'=>'usuarios',
                  'action'=>'update',
                  'params'=>array('id'=>8)
);
*/