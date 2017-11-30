<table>
<tr>
<th>id</th>
<th>Tarefa</th>
<th>Descricao</th>
<th>Prazo</th>
<th>Prioridade</th>
<th>Concluída</th>
 
<th>Editar</th>
<th>Remover</th>

</tr>
<?php foreach($lista_tarefas as $tarefa): ?>
<tr>
<td><?php echo $tarefa['id'] ?> </td>
<td><?php echo $tarefa['nome'] ?> </td>
<td><?php echo $tarefa['descricao'] ?> </td>
<td><?php echo traduz_data_para_exibir($tarefa['prazo'])?> </td>
<td><?php echo traduz_prioridade($tarefa['prioridade'])?></td>
<td><?php echo traduz_concluida($tarefa['concluida']);?> </td>

<td><a href="editar.php?id=<?php echo $tarefa['id'];?>">Editar</a>
<td><a href="remover.php?id=<?php echo $tarefa['id'];?>">Remover</a>
</tr>
<?php endforeach;?>
</table>

