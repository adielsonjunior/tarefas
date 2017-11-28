<?php

$bdServidor = 'localhost';
$bdUsuario = 'sistema' ;
$bdSenha='sistema';
$bdBanco = 'tarefas';

$conexao =  mysqli_connect($bdServidor,$bdUsuario,$bdSenha,$bdBanco);

if(mysqli_connect_errno($conexao)){
	echo "Problemas com o Banco";
	die();
}



function buscar_tarefas($conexao){
		
	
	$sqlBusca = "SELECT * FROM tarefas";
	
	$resultado =  mysqli_query($conexao,$sqlBusca);
	
	$tarefas =  array();
	
	while($tarefa =  mysqli_fetch_assoc($resultado)){
		$tarefas[] =  $tarefa;
	}
	return $tarefas;
	
}


function gravar_tarefa($conexao,$tarefa){
	$sqlGravar = "INSERT into tarefas(nome, descricao,prioridade,prazo) 
	VALUES('{$tarefa['nome']}','{$tarefa['descricao']}',{$tarefa['prioridade']},{$tarefa['prazo']})";

	mysqli_query($conexao,$sqlGravar);
	
}