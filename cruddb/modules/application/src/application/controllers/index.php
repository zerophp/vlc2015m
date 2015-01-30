<?php





include('../modules/core/src/core/models/renderView.php');







switch($request['action'])
{        
    default:
    case 'index':  
        
        $content = renderView($request, $config);
    break;
}

include('../modules/application/src/application/layouts/jumbotron.phtml');











