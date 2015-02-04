<?php
namespace core\models;

class FrontController
{

    public static function getConfig()
    {
        return (array_merge(require_once('../configs/global.php'),
                    require_once('../configs/local.php')
                )
        );         
    }
    
    public static function parseURL()
    {

//         get_class_methods($class_name)
        
//         $controllers = array ('users'=>array('index','insert', 'select', 'update', 'delete'),
//             'error'=>array('404'),
//             'index'=>array('index')
//         );
    
        // dividir la url en un array
        $request = explode("/", $_SERVER['REQUEST_URI']);

        $request[1]=ucfirst($request[1]);
        
        
       
    
        if($request[1]=='')
            return array('controller'=>'index',
                'action'=>'index'
            );
    
            // Mientras que el ultimo elemento es vacio, eliminarlo
            while($request[count($request)-1]=='')
                unset($request[count($request)-1]);
            
            // Tiene parametros?
            $params = array();
            // Es longitud par?
            if(count($request)>3 && (count($request)%2)==0)
            {
                // KO deveolver error 412
                return array('controller'=>'error',
                    'action'=>'412'
                );
            }
            else
            {
                for($a=3;$a<count($request);$a+=2)
                {
                    $params[$request[$a]]=$request[$a+1];
                }
            }
    
            
            if(file_exists($_SERVER['DOCUMENT_ROOT'].
                "/../modules/application/src/application/controllers/".
                $request[1].".php")
            )
            {
                if(isset($request[2]))
                    if(in_array($request[2], $controllers[$request[1]]))
                    {
                        return array('controller'=>$request[1],
                            'action'=>$request[2],
                            'params'=>$params
                        );
                    }
                else
                {
                    return array('controller'=>'error',
                        'action'=>'404'
                    );
                }
                else
                {
                    $array = array('controller'=>'application\controllers\\'.$request[1],
                        'action'=>'indexAction'
                    );
                    
                    return $array;
                }
            }
            else
            {
                return array('controller'=>'error',
                    'action'=>'404'
                );
            }
    }
}

