<?php
include "parametroPesquisa.php";

class LivroConsultaDao{

    private $sqlInicial = 'select * from livro ';
    private $tabela = 'livro';
    private $queryParam = '';

    public function createQuery($array, $param, $tabelaAux){

        if(!empty($array)){
            if(empty($this->queryParam)){
                $query =' where ';
            }
            else{
                $query =' and ' ;
            }
            if(!empty($tabelaAux)){
                $query = $query . $param.$tabelaAux . " in (select " . $param . " from " . $tabelaAux . " where ";
            } else{
                $query = $query . $param . " in (select ". $param. " from " . $this->tabela ." where ";
            }
            $count = 1;
            foreach($array as $row){
                if(!empty($tabelaAux)){
                    $query .= "titulo  like :" . $tabelaAux.$count ." or ";
                } else {
                    $query .= $param." like :" .$param.$count ." or ";
                }

                $count++;
            }
            $query = substr($query,0,(strlen($query)-4));
            $this->queryParam .=  $query . ')';
        }

    }
    public function getQuery(){
        return $this->sqlInicial . $this->queryParam;
    }
    public function setParameters($array,$atributo,$stmt){
        if(!empty($array)){
            $count = 1;
            foreach($array as $row){
                $pesquisa = new ParametroPesquisa(
                    $atributo,
                    $row,$count,TRUE
                );
                $stmt->bindParam($pesquisa->getAtributo(), 
                                $pesquisa->getParametro() , PDO::PARAM_STR);
                $count++;
            }
            return $stmt;
        }
    }

}
?>