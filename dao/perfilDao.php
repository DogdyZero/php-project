<?php
require '../modelo/perfil.php';

class PerfilDao{
    public function buscarTodos(){
        $perfis = array();
        $sql  = "SELECT * FROM perfil order by titulo";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->execute();
    
        $resultado = $stmt->fetchAll();
        foreach($resultado as $row){
            $perfil = new Perfil();
            $perfil->setId($row->id);
            $perfil->setTitulo($row->titulo);
            array_push($perfis,$perfil);
        }
        return $perfis;
    }
}
?>