<?php error_reporting (E_ALL ^ E_NOTICE)?>
<?php 
	session_start();

	include("banco.php");
	include("ajudantes.php");

if (isset($_GET['nome']) && $_GET['nome'] != '') {
	$tarefa = array();
		$tarefa['nome'] = $_GET['nome'];
		if (isset($_GET['descricao'])) {
			$tarefa['descricao'] = $_GET['descricao'];
			} else {
			$tarefa['descricao'] = '';
			}
		if (isset($_GET['prazo'])) {
			$tarefa['prazo'] = traduz_data_para_banco($_GET['prazo']);
			} else {
			$tarefa['prazo'] = '';
			}
		$tarefa['prioridade'] = $_GET['prioridade'];	
			if (isset($_GET['concluida'])) {
			$tarefa['concluida'] = $_GET['concluida'];
			} else {
			$tarefa['concluida'] = '';
			}
		//$_SESSION['lista_tarefas'][] = $tarefa;

		gravar_tarefa($conexao, $tarefa);
		}


$lista_tarefas = buscar_tarefas($conexao);		
		
// ESTA AQUI PQ A VARIAVEL $lista_tarefas é criada no php primeiro.
include "template.php";
