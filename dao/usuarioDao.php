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

        // if(!empty($res) ){
        //     return TRUE;
        // } else {
        //     return FALSE;
        // }

        // foreach($stmt->fetchObject() as $row) {
        //     print_r($row);
        // }
        
        // $res = $stmt->fetchAll();
        // foreach($res as $row) {
        //     echo $row;
        // }
        // print_r( $res);
        // foreach($res as $row) {
        //     print_r($row);
        // }
        // if($this->login=='douglas' && $this->senha =='douglas'){
        //     return TRUE;
        // } else {
        //     return FALSE;
        // }
    }

    public function alterarUsuario($usuario, $idUsuario){
        $usuario = $this->validarSenha($usuario,$idUsuario);
        $sql  = "UPDATE usuario SET 
                    nome = :nome, 
                    login = :login,
                    senha = :senha,
                    reset =:reset
                    where id = :id";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->bindParam(':nome', $usuario->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':login', $usuario->getLogin(), PDO::PARAM_STR);
        $stmt->bindParam(':senha', $usuario->getSenha(), PDO::PARAM_STR);
        $stmt->bindParam(':reset', $this->reset, PDO::PARAM_BOOL);
        $stmt->bindParam(':id', $idUsuario, PDO::PARAM_INT);

        $stmt->execute();
    }

    private function validarSenha($usuario,$idUsuario){
        if(empty($usuario->getSenha())){
            $usuarioSenha = $this->buscarUsuarioPorId($idUsuario);
            $usuario->setSenha($usuarioSenha->senha);
        } else if ($usuario->getSenha()=='reset'){
            $usuario->setSenha(md5('123456'));
            $this->reset=true;
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
}
?>