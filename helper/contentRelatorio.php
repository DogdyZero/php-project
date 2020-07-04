<?php

class ContentRelatorio{
    private $cabecalho;
    private $conteudo =array();
    private $rodape;

    public function __construct($cabecalho,$conteudo,$rodape){
        $this->cabecalho = $cabecalho;
        foreach($conteudo as $row){
            array_push($this->conteudo,$row);
        }
        $this->rodape = $rodape;
    }

    // public function setCabecalho($cabecalho){
    //     $this->cabecalho = $cabecalho;
    // }
    public function getCabecalho(){
        return $this->cabecalho;
    }
    // public function setConteudo($conteudo){
    //     $this->conteudo = $conteudo;
    // }
    public function getConteudo(){
        return $this->conteudo;
    }
    // public function setRodape($rodape){
    //     $this->rodape = $rodape;
    // }
    public function getRodape(){
        return $this->rodape;
    }
    

}

?>