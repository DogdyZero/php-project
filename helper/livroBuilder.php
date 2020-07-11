<?php
require '../modelo/livro.php';

    class LivroBuilder{
        private $titulo;
        private $descricao;
        private $autor;
        private $estilo;
        private $editora;
        private $paginas;

        public function setTitulo($titulo){
            $this->titulo = $titulo;
            return $this;
        }
        public function setDescricao($descricao){
            $this->descricao = $descricao;
            return $this;
        }
        public function setEstilo($estilo){
            $this->estilo = $estilo;
            return $this;
        }
        public function setAutor($autor){
            $this->autor = $autor;
            return $this;
        }
        public function setEditora($editora){
            $this->editora = $editora;
            return $this;
        }
        public function setPaginas($paginas){
            $this->paginas = $paginas;
            return $this;
        }
        public function build(){
            return new Livro(
                $this->titulo,$this->descricao,$this->estilo,
                $this->autor,$this->editora,$this->paginas); 
        }
    }

?>