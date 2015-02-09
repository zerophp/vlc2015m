<?php
namespace application\options;

class Options
{
    public $filename = 'default filename';
        
    public $config1 = 'data1';
    public $config2 = 'data2';
    public $view_path = '/../modules/application/src/application/views';
    public $db = array('host'=>'localhost', 
                       'user'=>'root',
                       'password'=>'1234',
                       'database'=>'crud');
    public $adapter = 'Mysql';
}