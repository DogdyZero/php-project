<?php

    class Usuario{
        private $id;
        private $nome;
        private $login;
        private $senha;
        private $perfil;
        private $reset;

        public function __construct($login,$senha,$nome){
            $this->login = $login;
            $this->senha = $senha;
            $this->nome = $nome;
        }

        public function setId($id){
            $this->id = $id;
        }
        public function getId(){
            return $this->id;
        }

        public function setNome($nomeUsuario){
            $this->nome = $nomeUsuario;
        }
        public function getNome(){
            return $this->nome;
        }
        public function setLogin($login){
            $this->login = $login;
        }
        public function getLogin(){
            return $this->login;
        }
        public function setSenha($senha){
            $this->senha = $senha;
        }
        public function getSenha(){
            return $this->senha;
        }
        public function setPerfil($perfil){
            $this->perfil = $perfil;
        }
        public function getPerfil(){
            return $this->perfil;
        }

        public function setReset($reset){
            $this->reset = $reset;
        }
        public function getReset(){
            return $this->reset;
        }
    }
?>