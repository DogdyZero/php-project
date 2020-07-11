<?php
require_once 'connectionDB.php';
include '../helper/livroBuilder.php';
// require '../modelo/livro.php';
include 'consulta/livroConsultaDao.php';

class LivroDao{
    public function __construct(){
    }
    public function inserirLivro($livro){
        $sql  = "INSERT INTO livro (titulo,descricao,idestilo,autor,editora,paginas) 
                        values (:titulo,:descricao,:idestilo,:autor,:editora,:paginas)";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->bindParam(':titulo', $livro->getTitulo(), PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $livro->getDescricao(), PDO::PARAM_STR);
        $stmt->bindParam(':idestilo', $livro->getEstilo(), PDO::PARAM_INT);
        $stmt->bindParam(':autor', $livro->getAutor(), PDO::PARAM_STR);
        $stmt->bindParam(':editora', $livro->getEditora(), PDO::PARAM_STR);
        $stmt->bindParam(':paginas', $livro->getPaginas(), PDO::PARAM_INT);
        $stmt->execute();
    }
    public function alterarLivro($livro, $idLivro){
        $sql  = "UPDATE livro SET 
                    titulo = :titulo, 
                    descricao = :descricao,
                    idestilo = :idEstilo,
                    autor = :autor,
                    editora = :editora,
                    paginas = :paginas
                    where id = :id";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->bindParam(':titulo', $livro->getTitulo(), PDO::PARAM_STR);
        $stmt->bindParam(':descricao', $livro->getDescricao(), PDO::PARAM_STR);
        $stmt->bindParam(':idEstilo', $livro->getEstilo(), PDO::PARAM_STR);
        $stmt->bindParam(':autor', $livro->getAutor(), PDO::PARAM_STR);
        $stmt->bindParam(':editora', $livro->getEditora(), PDO::PARAM_STR);
        $stmt->bindParam(':paginas', $livro->getPaginas(), PDO::PARAM_INT);
        $stmt->bindParam(':id', $idLivro, PDO::PARAM_INT);

        $stmt->execute();

    }
    public function buscarTodosLivros(){
        $sql  = "SELECT * FROM livro";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        return $this->preencherListaLivro($resultado);
    }

    public function buscarLivroPorId($idLivro){
        $sql  = "SELECT * FROM livro where id =:id";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->bindParam(':id', $idLivro, PDO::PARAM_INT);
        $stmt->execute();

        $resultado = $stmt->fetchObject();
        return $this->preencherLivro($resultado);
    }
    public function pesquisar($listaFiltros){

        $consulta = new LivroConsultaDao();
        foreach($listaFiltros as $filtro){
            $consulta->createQuery($filtro->getListaParametros(),
                                $filtro->getNomeAtributo(),
                                $filtro->getTabelaAuxiliar());
        }
        $stmt = ConnectionDB::prepare($consulta->getQuery());


        foreach($listaFiltros as $filtro){
            if(empty($filtro->getTabelaAuxiliar())){
                $consulta->setParameters($filtro->getListaParametros(),
                                $filtro->getNomeAtributo(),
                                $stmt);
            } else{
                $consulta->setParameters($filtro->getListaParametros(),
                            $filtro->getTabelaAuxiliar(),
                            $stmt);
            }
        }
        $stmt->execute();
        $resultado = $stmt->fetchAll();
        return $this->preencherListaLivro($resultado);

    }
    private function preencherListaLivro($resultado){
        $livros = array();
        foreach($resultado as $row){
            $livro = $this->preencherLivro($row);
            array_push($livros,$livro);
        }
        return $livros;
    }
    private function preencherLivro($row){
        $livroBuilder = new LivroBuilder();
        $livroBuilder->setTitulo($row->titulo);
        $livroBuilder->setDescricao($row->descricao);
        $livroBuilder->setEstilo($row->idestilo);
        $livroBuilder->setAutor($row->autor);
        $livroBuilder->setEditora($row->editora);
        $livroBuilder->setPaginas($row->paginas);
        $livro = $livroBuilder->build();
        $livro->setId($row->id);
        return $livro;
    }
    public function exibirGrafico(){
        $sql = "SELECT e.titulo as titulo, count(l.id) as contagem 
                    from livro as l 
                    join estilo as e 
                    on l.idestilo = e.id  
                    group by e.titulo 
                    order by e.titulo";
        $stmt = ConnectionDB::prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
?>