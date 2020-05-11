<?php
error_reporting(-1); 
ini_set('display_errors', 'On');
include "../dao/livroDao.php";
include "../modelo/livro.php";
include "../dao/estiloDao.php";
require_once "../configuracao/enviroment.php";

$controle = new PrepararAlteracaoControle();
$controle->executarConsulta();

class PrepararAlteracaoControle{
    public function executarConsulta(){
        session_start();
        $livroDao = new LivroDao();
        $estiloDao = new EstiloDao();

        $_SESSION['estilos'] = $estiloDao->buscarTodos();
        $_SESSION['livro'] = $livroDao->buscarLivroPorId($_GET['id']);
        header('Location:'. URL .'/alterarTela.php');
    }
}
?>