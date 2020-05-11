<?php

class ParametroPesquisa{
    private $atributo;
    private $parametro;
    private $comLike;
    private $contador;

    public function __construct($atributo,$parametro,$contador,$comLike){
        $this->atributo =$atributo;
        $this->parametro = $parametro;
        if($contador!=null){
            $this->contador = $contador;
        }
        if($comLike){
            $this->comLike = $comLike;
        }
       
    }
    public function getAtributo(){
        if($this->contador !=null){
            return ":" . $this->atributo.$this->contador;
        } 
        return ":" . $this->atributo;
        
    }
    public function getParametro(){
        if($this->comLike){
            return "%".$this->parametro . "%";
        } 
        return $this->parametro;
    }
}

?>