<?php
require '../modelo/estilo.php';
class EstiloDao{
    public function buscarTodos(){
        $estilos = array();
        $sql  = "SELECT * FROM estilo order by titulo";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->execute();
    
        $resultado = $stmt->fetchAll();
        foreach($resultado as $row){
            $estilo = new Estilo();
            $estilo->setId($row->id);
            $estilo->setTitulo($row->titulo);
            array_push($estilos,$estilo);
        }
        return $estilos;
    }
}
?>