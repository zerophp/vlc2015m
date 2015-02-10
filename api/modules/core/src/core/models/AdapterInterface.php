<?php
namespace core\models;

interface AdapterInterface
{
    public function fetch();
    public function save();
} 