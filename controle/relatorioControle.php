<?php
	require '../helper/factoryRelatorio.php';
	include '../dao/usuarioDao.php';
// error_reporting(-1); 
// ini_set('display_errors', 'On');

$controle = new RelatorioControle();
if($_POST['tipo']=='usuario'){
	$controle->gerarRelatorioUsuario();
} else if($_POST['tipo']=='livro'){
	$controle->gerarRelatorioLivro();
	
}
class RelatorioControle{

	public function gerarRelatorioUsuario(){
		$factory = new FactoryRelatorio();
		$usuarioDao = new UsuarioDao(null);
		$resultado = $usuarioDao->buscarQuantidadePorPerfil();
		$listaUsuario = $usuarioDao->buscarUsuarioPorPerfil();
		$factory->setTituloRelatorio('Relatório de Usuários');

		$listaAdmin=array();
		$listaClient=array();
		foreach($listaUsuario as $usuario){
			if($usuario->reset==1){
				$reset = 'sim';
			} else {
				$reset = 'não';
			}
			if($usuario->perfil=='admin'){
				array_push($listaAdmin, 
					$usuario->nome .' _____________ Login: ' .
					$usuario->login.' _____________ reset de senha: ' .
					$reset);
			}
			if($usuario->perfil=='cliente'){
				array_push($listaClient, 
				$usuario->nome .' _____________ Login: ' .
					$usuario->login.' _____________ reset de senha: ' .
					$reset);
			}
		}
		foreach($resultado as $row){
			if($row->titulo == 'admin'){
				$factory->addConteudo('Perfil ' . $row->titulo,$listaAdmin,'Total: '. $row->contador);
			}
			if($row->titulo == 'cliente'){
				$factory->addConteudo('Perfil ' . $row->titulo,$listaClient,'Total: '. $row->contador);
			}
		}

		$factory->gerarRelatorio();
	}


	public function gerarRelatorioLivro(){
		$factory = new FactoryRelatorio();
		$factory->setTituloRelatorio('Relatório de Livros');
		$factory->gerarRelatorio();
		
	}
}
?>