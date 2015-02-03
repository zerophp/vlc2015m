<?php

/**
 * Objeto para plazmar graficos en un papel
 */

/*
class elementos_de_papeleria
{
    private $precio;
    
    public function getPrecio();
    public function setPrecio();
}
*/


class trazador
{    
    public $color;
    public $peso;  

    public function escribir();
    public function dibujar();    
}

class boli extends trazador
{    
    public $cantidad_tinta;  
    private $estado;      
    
    public function vaciar();
    public function llenar(); 
    public function getEstado();
    public function setEstado();
    
}

$boli1 = new boli();
$boli2 = new boli();

class papel
{
    public $dimension;
    public $material;
    public $color;
    public $grosor;
    public $forma;
    public $textura;

    public function doblar();
    public function destruir();
    public function guardar();
    public function dibujar();
    public function escribir();
    
}

class grafico
{
    public $tipo;
    public $color;
    public $lista_puntos;
    public $dimensiones;
    
    public function ampliar();
    public function reducir();
    public function rotar();
    public function pintar();
    public function colorear();
        
}

