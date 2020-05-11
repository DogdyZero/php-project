<?php
// error_reporting(-1); 
// ini_set('display_errors', 'On');
include '../modelo/livro.php';
include '../dao/livroDao.php';
include '../helper/livroBuilder.php';
include '../helper/validateLivroForm.php';
require_once '../configuracao/enviroment.php';

$controle = new CadastroControle();
$controle->executar();

class CadastroControle{
    public function executar(){
        session_start();
        $livroBuilder = new Livrobuilder();
        $livro = $livroBuilder->setTitulo($_POST['titulo'])
                    ->setDescricao($_POST['descricao'])
                    ->setEditora($_POST['editora'])
                    ->setAutor($_POST['autor'])
                    ->setPaginas($_POST['paginas'])
                    ->setEstilo($_POST['opcao'])
                    ->build();
        $validador = new ValidateLivroForm();
        $resultado = $validador->validarDados($livro);

        if(empty($resultado)){
            $livroDao = new LivroDao();
            $livroDao->inserirLivro($livro);
            $_SESSION['livros']  = $livroDao->buscarTodosLivros();
            $_SESSION['grafico'] = $livroDao->exibirGrafico();

            setcookie("modal",'sucesso',time()+5,"/");
            header('Location:'.URL.'/consulta.php');
        }else{
            setcookie("modal",'erro',time()+5,"/");
            header('Location:'.URL.'/novo.php');
        }
    }
}
?>