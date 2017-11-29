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
			<input type="checkbox" name="concluida"/>
		</fieldset>
		</label>
		<input type="submit" value="Cadastrar" />

 
	</form>