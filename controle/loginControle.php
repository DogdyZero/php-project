<?php
error_reporting(-1); 
ini_set('display_errors', 'On');
    require "../dao/livroDao.php";
    require "../modelo/usuario.php";
    require "../dao/usuarioDao.php";
    require "../dao/estiloDao.php";
    require "../dao/perfilDao.php";
    // require "../modelo/livro.php";
    require '../helper/filtroHelper.php';

    require_once "../configuracao/enviroment.php";
    
    $controle = new LoginControle();
    if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        $controle->executar();
    } else {
        $controle->getUsuario();
    }

    class LoginControle{
        public function executar(){

            $usuario = new Usuario($_POST['login'],$_POST['senha'],null);
            $usuarioDao = new UsuarioDao($usuario);

            $resultado = $usuarioDao->efetuarLogin();
            if(!empty($resultado)){
                setcookie("login",$resultado->getNome(),null,"/");
                setcookie("modal",'false',null,"/");
                $livroDao = new LivroDao();
                $estiloDao = new EstiloDao();
                $perfilDao = new PerfilDao();

                session_start();
                // $_SESSION['livros'] = $livroDao->pesquisar(array(new FiltroHelper()));

                $_SESSION['usuario'] = $resultado;
                if($resultado->getPerfil() == 1){
                    $_SESSION['admin'] = true;
                    $_SESSION['listaUsuarios'] = $usuarioDao->buscarTodos();
                    $_SESSION['perfis'] = $perfilDao->buscarTodos();

                } else {
                    $_SESSION['admin'] = false;
                }

                $_SESSION['estilos'] = $estiloDao->buscarTodos();
                $_SESSION['grafico'] = $livroDao->exibirGrafico();
                $_SESSION['edicao'] = false;
                header('Location:'. URL .'/usuarioConsulta.php');
            } else {
                setcookie("resultado","Usuário ou senha estão errados!",time()+5,"/");
                header('Location:'. URL .'/index.php');
            }
        }
        public function getUsuario(){
            session_start();
            $usuario = new Usuario(null,null,null);
            $usuarioDao = new UsuarioDao($usuario);
            $_SESSION['edicao'] = true;
            $_SESSION['usuario'] = $usuarioDao->buscarUsuarioPorId($_GET['id']);
            $_SESSION['listaUsuarios'] = $usuarioDao->buscarTodos();
            header('Location:'. URL .'/usuarioConsulta.php');

        }
    }
?>
