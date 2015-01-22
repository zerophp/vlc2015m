<?php

$userForm = array(
    'id'=>array(
        'label'=>null,
        'type'=>'hidden',
        'value'=>1                
    ),
    'name'=>array(
        'label'=>'Nombre',
        'type'=>'text',
        //'value'=>null,
        'placeholder'=>'Escribe aqui tu nombre',
        'help'=>'El nombre!!!!',
        'validation'=>array('required'=>true,
                            'minsize'=>3,
                            'maxsize'=>250,
                            'error_message'=>'Error aqui'
        ),
        'filters'=>array('striptags', 'striptrim'),
        'decorators'=>array('readonly', 'class'=>'nameform')        
    ),
    'email'=>array(),
    'password'=>array(),
    'description'=>array(),
    'photo'=>array(),
    'bdate'=>array(),
    'city'=>array(),
    'gender'=>array(),
    'privacy'=>array(),
    'hobbies'=>array(),
    'submit'=>array(),
    
);