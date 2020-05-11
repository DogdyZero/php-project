<?php
error_reporting(-1); 
ini_set('display_errors', 'On');
include "../dao/livroDao.php";
require_once '../dao/connectionDB.php';
// require_once 'parametroPesquisa.php';
require_once '../dao/consulta/livroConsultaDao.php';
include '../helper/filtroHelper.php';

$controle = new PesquisarController();
$controle->executar();

class PesquisarController{

    public function executar(){

        $livroDao = new LivroDao();
        
        $listaFiltros = array();
        
        array_push($listaFiltros,new FiltroHelper($_POST['titulo'],'titulo',null));
        array_push($listaFiltros,new FiltroHelper($_POST['estilo'],'id','estilo'));
        array_push($listaFiltros,new FiltroHelper($_POST['autor'],'autor',null));
        array_push($listaFiltros,new FiltroHelper($_POST['editora'],'editora',null));
        
        session_start();
        $_SESSION['livros'] = $livroDao->pesquisar($listaFiltros);
        header('Location:'. URL .'/consulta.php');

    }
}

?>