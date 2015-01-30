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
    'description'=>array(
        'label'=>'Descripcion',
        'type'=>'text',
        'filters'=>array('striptags', 'striptrim'),                
    ),
    'photo'=>array(
        'label'=>'Foto',
        'type'=>'file',                
    ),
    'bdate'=>array(
        'label'=>'Fecha de nacimiento',
        'type'=>'text',
        'validation'=>array('date',
                            'error_message'=>'Error aqui'),                
    ),
    'city'=>array(
        'label'=>'Ciudad',
        'type'=>'select',
        //'value'=>null,
        'options'=>array('BCN'=>'Barcelona', 'VLC'=>'Valencia'),
        'placeholder'=>'Selecciona tu ciudad',
        'help'=>'en la que vives!!!!',
        'validation'=>array('required'=>true, 
                            'inarray',
                            'error_message'=>'Error aqui'
        ),       
    ),
    'gender'=>array(
        'label'=>'Sexo',
        'type'=>'radio',
        'options'=>array('m'=>'Mujer', 'h'=>'Hombre', 'o'=>'Otros'),                
    ),
    'privacy'=>array(
        'label'=>'Politica de provacidad',
        'type'=>'checkbox',
        'options'=>array('si'=>'Si', 'spam'=>'Spam'),
                
    ),
    'hobbies'=>array(
        'label'=>'Aficiones',
        'type'=>'selectmultiple',
        'options'=>array('cine'=>'Cine', 'viajes'=>'Viajes', 'deporte'=>'Deporte'),
    ),
    'submit'=>array(
        'type'=>'submit',
        'value'=>'Enviar',                
    ),
);