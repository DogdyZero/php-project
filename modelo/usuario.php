<?php

    class Usuario{
        private $nomeUsuario = 'Usuario';
        private $login;
        private $senha;

        public function __construct($login,$senha){
            $this->login = $login;
            $this->senha = $senha;
        }

        public function setNomeUsuario($nomeUsuario){
            $this->nomeUsuario = $nomeUsuario;
        }
        public function getNomeUsuario(){
            return $this->nomeUsuario;
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
    }
?>