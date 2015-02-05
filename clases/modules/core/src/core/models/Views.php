<?php
namespace core\models;

class Views
{
    public static function renderView($method, $config, $data=null)
    {
        $pos =  explode("::", $method);
    
    
        $controller = lcfirst(
            substr($pos[0],
                strrpos($pos[0],"\\")+1
            )
        );
        ob_start();
        include($config['view_path'].'/'.
            $controller.'/'.
            $pos[1].'.phtml'
        );
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
