<?php
class EstiloDao{
    public function buscarTodos(){
        $sql  = "SELECT * FROM estilo order by titulo";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->execute();
    
        return $stmt->fetchAll();
    }
}
?>