<?php













switch($request['action'])
{        
    default:
    case 'index':  
        include('../modules/application/src/application/views/index/index.phtml');
    break;
}

include('../modules/application/src/application/layouts/jumbotron.phtml');











