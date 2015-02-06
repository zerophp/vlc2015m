<?php
namespace core\models;

use Zend\Http\Header\From;
class FrontController
{
    private $config;
    public $request;
    private $response;
    private $layout;
    public static $instance;
    
    public static function getInstace(array $appConfig=null)
    {
        if(!self::$instance)
            self::$instance = new FrontController($appConfig);
        
        return self::$instance; 
        
    }
    
    
    private function __construct(array $appConfig)
    {
        $this->config = $this->setConfig($appConfig);
        $this->request = $this->parseURL();
    }
    
    public function getConfig()
    {
        return $this->config;
    }
    
    public function setConfig($appConfig)
    {
        $config=array();
        
        foreach($appConfig['modules'] as $module)
        {
            $configGlobal=array();
            $configLocal=array();
            
            if(file_exists('../configs/autoload/'.$module.'.global.php'))
                $configGlobal = include_once('../configs/autoload/'.$module.'.global.php');
            if(file_exists('../configs/autoload/'.$module.'.local.php'))
                $configLocal = include_once('../configs/autoload/'.$module.'.local.php');
            
            $config = array_merge($config,
                                  $configGlobal,
                                  $configLocal
                                 );         
        }
     
        return $config;
                 
    }
    
    public function parseURL()
    {
        // dividir la url en un array
        $request = explode("/", $_SERVER['REQUEST_URI']);
        $request[1]=ucfirst($request[1]);            
    
        if($request[1]=='')
            return array('controller'=>'application\\controllers\\Index',
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
                return array('controller'=>'application\\controllers\\Error',
                    'action'=>'error412'
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
                    if(method_exists('application\\controllers\\'.$request[1], $request[2]))
                    {
                        return array('controller'=>'application\\controllers\\'.$request[1],
                            'action'=>$request[2],
                            'params'=>$params
                        );
                    }
                else
                {
                    return array('controller'=>'application\\controllers\\Error',
                        'action'=>'error404'
                    );
                }
                else
                {
                    $array = array('controller'=>'application\\controllers\\'.$request[1],
                        'action'=>'index'
                    );
                    
                    return $array;
                }
            }
            else
            {
                return array('controller'=>'application\\controllers\\Error',
                    'action'=>'error404'
                );
            }
    }
       
    public function dispatch()
    {
        $controllername = $this->request['controller'];
        $actionname = $this->request['action'];
    
        $controller = new $controllername();
        $this->layout = $controller->layout;
        $controller->setRequest($this->request);
        $controller->setConfig($this->config);
        
        $this->response = $controller->$actionname($this->request, $this->config);
        $this->renderLayout();
    }
    
    public function renderLayout()
    {
        $content = $this->response;
        require_once('../modules/application/src/application/layouts/'.$this->layout.'.phtml');        
    }
}

