<?php 
error_reporting(-1); 
ini_set('display_errors', 'On');
    include "../modelo/usuario.php";
    include "../dao/usuarioDao.php";

    $controle = new AlterarUsuarioControle();
    $controle->executar();

    class AlterarUsuarioControle{
        public function executar(){
            session_start();
            $reset = $_POST['opcao'];
            if($_SESSION['usuario']->reset==true){
                if($_POST['primeiraSenha']==$_POST['repetirSenha']){
                    $usuario = new Usuario($_SESSION['usuario']->login,md5($_POST['primeiraSenha']),$_SESSION['usuario']->nome);
                } else {
                    // cookie com a mensagem de senhas diferentes
                    setcookie("resultado","As senhas informadas estão diferentes!",time()+5,"/");
                    header('Location:'. URL .'/usuarioConsulta.php');
                }
            } else{
                $usuario = new Usuario($_POST['login'],$_POST['opcao'],$_POST['nome']);

            }
            $usuarioDao = new UsuarioDao($usuario);
            $usuarioDao->alterarUsuario($usuario,$_POST['id']);
            if(empty($reset)){
                setcookie("modal",'sucesso',time()+5,"/");
                $_SESSION['usuario'] = $usuarioDao->buscarUsuarioPorId($_POST['id']);
                header('Location:'. URL .'/usuarioConsulta.php');
            } else {
                header('Location:'. URL .'/index.php');
                session_unregister();
            }
        }
    }
?>