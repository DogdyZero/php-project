<?php
// error_reporting(-1); 
// ini_set('display_errors', 'On');
    include "../dao/livroDao.php";
    include "../modelo/usuario.php";
    include "../dao/usuarioDao.php";
    include "../dao/estiloDao.php";
    include "../modelo/livro.php";
    include '../helper/filtroHelper.php';

    require_once "../configuracao/enviroment.php";


    $controle = new LoginControle();
    $controle->executar();

    class LoginControle{
        public function executar(){

            $usuario = new Usuario($_POST['login'],$_POST['senha']);
            $usuarioDao = new UsuarioDao($usuario);
            // $usuarioDao->efetuarLogin();
            if($usuarioDao->efetuarLogin()){
                setcookie("login",$usuario->getNomeUsuario(),null,"/");
                setcookie("modal",'false',null,"/");
                $livroDao = new LivroDao();
                $estiloDao = new EstiloDao();
                session_start();
                // $_SESSION['livros'] = $livroDao->pesquisar(array(new FiltroHelper()));
                $_SESSION['estilos'] = $estiloDao->buscarTodos();
                $_SESSION['grafico'] = $livroDao->exibirGrafico();
               
                header('Location:'. URL .'/consulta.php');
            } else {
                setcookie("resultado","Usuário ou senha estão errados!",time()+5,"/");
                header('Location:'. URL .'/index.php');
            }
        }
    }
?>
