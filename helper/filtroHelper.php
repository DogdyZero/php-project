<?php

class FiltroHelper{
    private $listaParametros;
    private $nomeAtributo;
    private $tabelaAuxiliar;
    
    public function __construct($listaParametros=null,$nomeAtributo=null,$tabelaAuxiliar=null){
        if($listaParametros == null){
            $this->listaParametros = array();
        } else {
            $this->listaParametros = $listaParametros;
        }
        if($nomeAtributo == null ){
            $this->nomeAtributo = "id";
        } else {
            $this->nomeAtributo = $nomeAtributo;
        }
        if($tabelaAuxiliar!=null){
            $this->tabelaAuxiliar = $tabelaAuxiliar;
        } else{
            $this->tabelaAuxiliar = "";
        }
    }

    public function getListaParametros(){   
        return $this->listaParametros;
    }
    public function getNomeAtributo(){
        return $this->nomeAtributo;
    }
    public function getTabelaAuxiliar(){
        return $this->tabelaAuxiliar;
    }
}
?>