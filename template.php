
<html>
	<head>
	 <meta charset="utf-8" />
	 <link rel="stylesheet" href="tarefas.css" type="text/css"/>
	<title>Gerenciador de Tarefas</title>
	</head>
	<body>
		<h1>Gerenciador de Tarefas</h1>
		<form>
			<fieldset>
			<legend>Nova tarefa</legend>
			<label>
			
			Tarefa:
			<input type="text" name="nome" />
			</label>
			<input type="submit" value="Cadastrar" />
			</fieldset>
		
		<fieldset>
			<label>
			Descrição (Opcional):
			<textarea name="descricao"></textarea>
			</label>
		</fieldset>	
		<fieldset>
			<label>
			Prazo (Opcional):
			<input type="text" name="prazo" />
			</label>
		</fieldset>	
			
		<fieldset>
			<legend>Prioridade:</legend>
			<label>
			<input type="radio" name="prioridade" value="1" checked />

			Baixa
			<input type="radio" name="prioridade" value="2" />
			Média
			<input type="radio" name="prioridade" value="3" />
			Alta
			</label>
		</fieldset>
		<fieldset>
		<label>
			Tarefa concluída:
			<input type="checkbox" name="concluida" value="sim" />
		</fieldset>
		</label>
		<input type="submit" value="Cadastrar" />

 
	</form>

<table>
<tr>
<th>Tarefa</th>
<th>Descricao</th>
<th>Prazo</th>
<th>Prioridade</th>
<th>Concluída</th>
</tr>
<?php 

foreach($lista_tarefas as $tarefa): ?>
<tr>
<td><?php echo $tarefa['nome'] ?> </td>
<td><?php echo $tarefa['descricao'] ?> </td>
<td><?php echo $tarefa['prazo'] ?> </td>
<td><?php echo traduz_prioridade($tarefa['prioridade'])?></td>
<td><?php echo $tarefa['concluida']?> </td>
</tr>
<?php endforeach ?>
</table>




</body>
</html>



