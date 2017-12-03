<?php error_reporting (E_ALL)?>
<?php 
  //LISTA AS TAREFAS E CADASTRA O ARQUIVO
  
	session_start();

	include("banco.php");
	include("ajudantes.php");
	   $exibir_tabela = true;
        $tem_erros = false;
        $erros_validacao =array();
        
        
	
if (tem_post()) {
	$tarefa = array();
  
                if(isset($_POST['nome']) && strlen($_POST['nome'])> 0){
                    $tarefa['nome'] = $_POST['nome'];
                 }else{
                     $tem_erros = true;
                     $erros_validacao['nome'] = 'O nome da Tarefa é obrigatório';
                     
                 }
                
		if (isset($_GET['descricao'])) {
			$tarefa['descricao'] = $_GET['descricao'];
			} else {
			$tarefa['descricao'] = '';
			}
    
		   if(isset($_POST['prazo']) && strlen($_POST['prazo']) > 0) {
				if (validar_data($_POST['prazo'])) {
				$tarefa['prazo'] = traduz_data_para_banco($_POST['prazo']);
				} else {
				$tem_erros = true;
				$erros_validacao['prazo'] = 'O prazo não é uma data válida!';
				}
				} else {
				$tarefa['prazo'] = '';
				}

				
    
		$tarefa['prioridade'] = $_POST['prioridade'];	
			if (isset($_POST['concluida'])) {
			$tarefa['concluida'] = 1;
			} else {
			$tarefa['concluida'] = 0;
			}
                        
		if(!$tem_erros){
		 gravar_tarefa($conexao, $tarefa);
                    header('Location: tarefas.php');
                    die();
                    
		}
    
}      
      $lista_tarefas = buscar_tarefas($conexao);		

// ESTA AQUI PQ A VARIAVEL $lista_tarefas é criada no php primeiro.

  $tarefa =  array(
    'id' => 0,
    'nome' =>'',
    'descricao'=>'',
    'prazo'=>'',
    'prioridade' =>1,
    'concluida'=> ''
    );
  include "template.php";
