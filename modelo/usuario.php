<?php

    class Usuario{
        private $nome;
        private $login;
        private $senha;
        private $perfil;

        public function __construct($login,$senha,$nome){
            $this->login = $login;
            $this->senha = $senha;
            $this->nome = $nome;
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
    }
?>