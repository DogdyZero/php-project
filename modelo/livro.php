<?php

class Livro{
    private $id;
    private $titulo;
    private $descricao;
    private $autor;
    private $estilo;
    private $editora;
    private $paginas;

    public function __construct($titulo,$descricao,$estilo,$autor,$editora,$paginas){
        $this->titulo = $titulo;
        $this->descricao = $descricao;
        $this->estilo = $estilo;
        $this->autor = $autor;
        $this->editora = $editora;
        $this->paginas = $paginas;
    }
    public function setId($id){
        $this->id = $id;
    }
    public function getId(){
        return $this->id;
    }
    public function getTitulo(){
        return $this->titulo;
    }
    public function getDescricao(){
        return $this->descricao;
    }
    public function getEstilo(){
        return $this->estilo;
    }
    public function getAutor(){
        return $this->autor;
    }
    public function getEditora(){
        return $this->editora;
    }
    public function getPaginas(){
        return $this->paginas;
    }
}
?>