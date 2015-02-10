<?php
namespace core\models;

interface ControllerInterface
{
    public function setRequest($request);
    public function setConfig($config);
    
}