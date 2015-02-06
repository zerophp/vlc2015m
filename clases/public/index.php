<?php
require_once('../autoload.php');

if(getenv('APPLICATION_ENV')=='development')    
    $config = require_once ('../configs/development.config.php');
else 
    $config =  require_once ('../configs/config.php');

// $fc = new core\models\FrontController($config);
// $fc->dispatch();


$fc = core\models\FrontController::getInstace($config);
$fc->dispatch();



// $request = array('controller'=>'application\controllers\index',
//                  'action'=>'index'
// );
// $config = array('view_path'=>$_SERVER['DOCUMENT_ROOT'].'/../modules/application/src/application/views',
//     );

// $controller = new application\controllers\Index();
// $controller->setRequest($request);
// $controller->setConfig($config);
// echo $controller->index();