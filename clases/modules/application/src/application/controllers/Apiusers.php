<?php
namespace application\controllers;



class Apiusers
extends \core\models\Controller
implements \core\models\ControllerInterface
{

    public $layout ='jumbotron';
    
    public function index()
    {
        $data=array('a'=>1,'b'=>2);
        $data_string = json_encode($data);
        
        $ch = curl_init('http://clases.local/apiusers/view');
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Content-Type: application/json',
                    'Content-Length: ' . strlen($data_string))
                    );
        
        $result = curl_exec($ch);
        $result = json_decode($result);
        var_dump($result);
        die;
    }
    
    public function view()
    {
        echo " - KAK";
        return;
    }
    
    public function index2()
    {
        $method = $_SERVER['REQUEST_METHOD'];
        
        switch ($method)
        {
            
            case 'GET':     //apiusers     /users/select
                echo " - GET";
                break;
                
            case 'GET':     //apiusers/5454 /users/insert
                    echo " - GET";
                break;
            case 'POST':    //apiusers (array)
                    echo " - KAK";
                    echo "<pre>";
                    print_r($_POST);
                    echo "</pre>";
                    
                    $json = file_get_contents('php://input');
                    $obj = json_decode($json);
                    
                    echo "<pre>";
                    print_r($obj);
                    echo "</pre>";
                break;
            case 'PUT':     //apisusers/23874 <-(array)
                break;
            case 'DELETE':  //apiusers/9873126
                break;
            case 'OPTIONS': //apiusers ->(GET, POST, PUT, DELETE, OPTIONS)
                break;
        }
        
        
        
        
        
        die;
       
    }
    
}

