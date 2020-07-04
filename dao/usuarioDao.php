<?php 
require_once 'connectionDB.php';
include "usuario.php";

class UsuarioDao{
    private $usuario;
    private $reset=false;

    public function __construct($usuario){
        $this->usuario = $usuario;
    }

    public function efetuarLogin(){
        $login = $this->usuario->getLogin();
        $senha = md5($this->usuario->getSenha());

        $sql  = "SELECT * FROM usuario where login = :login and senha =:senha";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

        $stmt->execute();
        return $stmt->fetchObject();
    }

    public function inserir($usuario){
        $usuario = $this->validarSenha($usuario,null);

        $sql  = "INSERT INTO usuario (login,senha,nome,idperfil,reset) 
                        values (:login,:senha,:nome,:idperfil,:reset)";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->bindParam(':login', $usuario->getLogin(), PDO::PARAM_STR);
        $stmt->bindParam(':senha', $usuario->getSenha(), PDO::PARAM_STR);
        $stmt->bindParam(':nome', $usuario->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':idperfil', $usuario->getPerfil(), PDO::PARAM_INT);
        $stmt->bindParam(':reset', $this->reset, PDO::PARAM_BOOL);
        $stmt->execute();
    }
    public function alterarUsuario($usuario, $idUsuario){
        $usuario = $this->validarSenha($usuario,$idUsuario);
        $sql  = "UPDATE usuario SET 
                    nome = :nome, 
                    login = :login,
                    senha = :senha,
                    reset =:reset,
                    idperfil =:idperfil
                    where id = :id";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->bindParam(':nome', $usuario->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':login', $usuario->getLogin(), PDO::PARAM_STR);
        $stmt->bindParam(':senha', $usuario->getSenha(), PDO::PARAM_STR);
        $stmt->bindParam(':reset', $this->reset, PDO::PARAM_BOOL);
        $stmt->bindParam(':idperfil', $usuario->getPerfil(), PDO::PARAM_INT);
        $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);

        $stmt->execute();
    }

    private function validarSenha($usuario,$idUsuario){
        $usuarioSenha = $this->buscarUsuarioPorId($idUsuario);
        if(empty($usuario->getSenha())){
            $usuario->setSenha($usuarioSenha->senha);
        } else if ($usuario->getSenha()=='reset'){
            $usuario->setSenha(md5('123456'));
            $this->reset=true;
        } 
        if (empty($usuario->getPerfil())){
            $usuario->setPerfil($usuarioSenha->idperfil);
        }
        return $usuario;
    }

    public function buscarUsuarioPorId($idUsuario){
        $sql  = "SELECT * FROM usuario where id =:id";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchObject();
    }

    public function buscarTodos(){
        $sql  = "SELECT * FROM usuario ";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function buscarUsuarioPorPerfil(){
        $sql  = "SELECT u.nome as nome, u.login as login, p.titulo as perfil, u.reset as reset
                FROM usuario as u join perfil as p on u.idperfil = p.id order by p.titulo";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function buscarQuantidadePorPerfil(){
        $sql  = "select p.titulo as titulo, count(u.id) as contador from usuario as u 
                    join perfil as p on p.id = u.idperfil group by p.titulo";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }
}
?>