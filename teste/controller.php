<?php
    include "./mensagem.php";
    include "./calculadora.php";
    include "./resultado.php";

    $controle = new Controller();
    $controle->executar();

    class Controller{
        public function executar(){
            $var1 = $_POST['val1'];
                    $var2 = $_POST['val2'];
                    $op = $_POST['op'];
            $msg = new mensagem();
            $calc = new Calculadora();
            if($op=='+'){
                $msg->setMensagem("Resultado é ".$calc->soma($var1,$var2));
            }
            if($op=='-'){
                $msg->setMensagem("Resultado é ".$calc->subtracao($var1,$var2));
            }
            if($op=='*'){
                $msg->setMensagem("Resultado é ".$calc->multiplicacao($var1,$var2));
            }
            if($op=='/'){
                $msg->setMensagem("Resultado é ".$calc->divisao($var1,$var2));
            }
            setcookie("resultado",$msg->getMensagem());
            header('Location:http://localhost/teste/resultado.php');

            // header('Location:./resultado.php');
        }
    }
?>