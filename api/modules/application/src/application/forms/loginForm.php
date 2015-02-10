<?php

$loginForm = array(
    
    'email'=>array(
        'label'=>'Email',
        'type'=>'text',
        //'value'=>null,
        'placeholder'=>'Escribe aqui tu email',
        'validation'=>array('required'=>true,
                            'minsize'=>3,
                            'maxsize'=>250,
                            'error_message'=>'Error aqui'
        ),
        'filters'=>array('striptags', 'striptrim'),                
    ),
    'password'=>array(
        'label'=>'Contraseña',
        'type'=>'password',
        'validation'=>array('required'=>true,
                            'minsize'=>3,
                            'maxsize'=>12,
                            'error_message'=>'Error aqui'
        ),
        'filters'=>array('striptags', 'striptrim'),                
    ),    
    'submit'=>array(
        'type'=>'submit',
        'value'=>'Enviar',                
    ),
);