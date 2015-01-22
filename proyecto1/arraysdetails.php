<?php
$persona = array();










$persona = array('nombre'=>'Agustin',
                 'apellido'=>'Calderon',
//                  'direccion'=>array('ciudad'=>'Valencia',
//                                     'hotel'=>'Tactica'
//                  ),
                 12=>9,
                 13=>14,
                 'a'=>15,
                 16,17=>18,
                 1.2=>20,
//                  TRUE=>'aaaaa',
                 FALSE=>'kaka',
//                  1=>'esto'
                 '12'=>'jajajaja',
                 '13.5'=>'jejeje',
//                  _=>'ñañañañ'   
);


$string = implode("",$persona);

$array = explode(',',$string);


foreach ($persona as  $value)
{
    echo $value;
    echo "<br/>";
}


levenshtein($str1, $str2)

// $a='casa';
// echo $a*8;

// var_dump($a*8);







// echo "<pre>";
// print_r($persona);
// echo "</pre>";






