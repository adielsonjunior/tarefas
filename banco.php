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
  
  $resultado= mysqli_query($conexao,$sqlBusca);
  
  $tarefas = array();
  
  while($tarefa = mysqli_fetch_assoc($resultado)){
    $tarefas[] = $tarefa; 
    
  }
   return $tarefas;   
}


//Tem  uma aspa simples que contatena com o $id
function buscar_tarefa($conexao,$id){
  $sqlBusca =  'SELECT * FROM tarefas WHERE id= '.$id;
  $resultado = mysqli_query($conexao,$sqlBusca);
  return mysqli_fetch_assoc($resultado);
}



function gravar_tarefa($conexao,$tarefa){
	$sqlGravar = "INSERT into tarefas(nome, descricao,prioridade,prazo, concluida) 
	VALUES(
          '{$tarefa['nome']}',
          '{$tarefa['descricao']}',
           {$tarefa['prioridade']},
          '{$tarefa['prazo']}',
           {$tarefa['concluida']}
            
            )";

	mysqli_query($conexao,$sqlGravar);
	
}



function editar_tarefa($conexao,$tarefa){
  
  $sqlEditar = "UPDATE tarefas SET 
            nome='{$tarefa['nome']}',
            descricao={$tarefa['descricao']},
            prioridade={$tarefa['prioridade']},
            prazo={$tarefa['prazo']},
            concluida={$tarefa['concluida']} 
          WHERE id= {$tarefa['id']}
          ";
  mysqli_query($conexao,$sqlEditar);
}

function remover_tarefa($conexao,$id){
    $sqlRemover = "DELETE FROM tarefas WHERE id={$id}";
    mysqli_query($conexao, $sqlRemover);
    
}