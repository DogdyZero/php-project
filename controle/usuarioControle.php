<?php 
// error_reporting(-1); 
// ini_set('display_errors', 'On');
    include "../modelo/usuario.php";
    include "../dao/usuarioDao.php";

    $controle = new UsuarioControle();
    if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        if($_POST['form']=='alterar'){
            $controle->executar();
        } else if ($_POST['form']=='novo'){
            $controle->novoUsuario();
        }
    } else {
        $controle->redirecionarParaNovoUsuario();
    }

    class UsuarioControle{
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
            $usuario->setPerfil($_POST['perfil']);
            $usuarioDao = new UsuarioDao($usuario);

            $usuarioDao->alterarUsuario($usuario,$_POST['id']);
            if(empty($reset)){
                setcookie("modal",'sucesso',time()+5,"/");
                $_SESSION['usuario'] = $usuarioDao->buscarUsuarioPorId($_POST['id']);
                if($_SESSION['admin']==true){
                    $_SESSION['listaUsuarios'] = $usuarioDao->buscarTodos();
                    $_SESSION['edicao'] = false;
                }
                header('Location:'. URL .'/usuarioConsulta.php');
            } else {
                header('Location:'. URL .'/index.php');
                session_unregister();
            }
        }

        public function redirecionarParaNovoUsuario(){
            session_start();

            $_SESSION['edicao'] = true;
            $_SESSION['usuario'] = null;
            header('Location:'. URL .'/usuarioConsulta.php');

        }

        public function novoUsuario(){
            session_start();
            $usuario = new Usuario($_POST['login'],null,$_POST['nome']);
            $usuario->setPerfil($_POST['perfil']);
            $usuario->setSenha('reset');
            $usuarioDao = new UsuarioDao($usuario);
            $usuarioDao->inserir($usuario);
            $_SESSION['edicao'] = false;
            setcookie("modal",'sucesso',time()+5,"/");
            $_SESSION['listaUsuarios'] = $usuarioDao->buscarTodos();

            header('Location:'. URL .'/usuarioConsulta.php');

        }
    }
?>