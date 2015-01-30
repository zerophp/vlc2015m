<?php


function getConfig()
{   
    return (array_merge(require_once('../configs/global.php'),
                        require_once('../configs/local.php')
                        )
            );
   
}