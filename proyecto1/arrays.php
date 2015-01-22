<?php
$persona = array();

$persona = array('nombre'=>'Agustin',
                 'apellido'=>'Calderon',
                 'direccion'=>array('ciudad'=>'Valencia',
                                    'hotel'=>'Tactica'
                 )
);




echo "<pre>";
print_r($persona);
echo "</pre>";

echo $persona['direccion']['ciudad'];


$colores = array('rojo','verde','blanco');

echo "<pre>";
print_r($colores);
echo "</pre>";




echo 5/3+2*4+8-3;
echo "<br/>";

echo 5/(3+2)*4+8-3;












