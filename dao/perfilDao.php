<?php
class PerfilDao{
    public function buscarTodos(){
        $sql  = "SELECT * FROM perfil order by titulo";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->execute();
    
        return $stmt->fetchAll();
    }
}
?>