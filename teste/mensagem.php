<?php
class mensagem{
    private $mensagem;

    public function setMensagem($mensagem){
        $this->mensagem=$mensagem;
    }
    public function getMensagem(){
        return $this->mensagem;
    }
}
?>