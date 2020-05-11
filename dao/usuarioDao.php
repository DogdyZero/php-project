<?php 
require_once 'connectionDB.php';
include "usuario.php";

class UsuarioDao{
    private $usuario;

    public function __construct($usuario){
        $this->usuario = $usuario;
    }

    public function efetuarLogin(){
        $login = $this->usuario->getLogin();
        $senha = $this->usuario->getSenha();

        $sql  = "SELECT * FROM usuario where login = :login and senha =:senha";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->bindParam(':login', $login, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);

        $stmt->execute();
        $res =$stmt->fetchColumn(0);

        if(!empty($res) ){
            return TRUE;
        } else {
            return FALSE;
        }

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
}
?>