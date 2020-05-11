<?php
require_once "../modelo/livro.php";
    class ValidateLivroForm{
        public function validarDados($livro){
            $mensagem = array();
            if(empty($livro->getTitulo())){
                array_push($mensagem,"O Título deve ser preechido");
            }
            if(empty($livro->getDescricao())){
                array_push($mensagem,"A descrição deve ser preechido");
            }
            if(empty($livro->getAutor())){
                array_push($mensagem,"O autor deve ser preechido");
            }
            if(empty($livro->getEditora())){
                array_push($mensagem,"O nome da Editora deve ser preechido");
            }
            if(empty($livro->getPaginas())){
                array_push($mensagem,"A quantidade de páginas deve ser preechido");
            }
            if(empty($livro->getEstilo())){
                array_push($mensagem,"O Estilo deve ser preechido");
            }
            return $mensagem;
        }
    }
?>