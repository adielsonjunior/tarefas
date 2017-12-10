<?php


function traduz_concluida($concluida){
    if ($concluida == 1) {
        return 'Sim';
    }
    return 'Não';
}


function traduz_prioridade($codigo){

		$prioridade = '';
		switch ($codigo) {
		case 1:
			$prioridade = 'Baixa';
		break;
			case 2:
		$prioridade = 'Média';
		break;
			case 3:
		$prioridade = 'Alta';
		break;
		}
		return $prioridade;
}

function traduz_data_para_banco($data)
	{
    if ($data == "") {
        return "";
    }
    $dados = explode("/",$data);

	if(count($dados) != 3){
		return $data;
	}


    $data_mysql = "{$dados[2]}-{$dados[1]}-{$dados[0]}";
    return $data_mysql;
}


function traduz_data_para_exibir($data){
	if($data == "" OR $data == "0000-00-00"){
		return "";
	}
	$dados = explode("-",$data);

	if(count($dados) !=3){
		return $data;
	}

	$data_exibir = "{$dados[2]}/{$dados[1]}/{$dados[0]}";

	return $data_exibir;
}

function tem_post(){
    if(count($_POST)>0){
    return true;
}
return false;
}

function validar_data($data){
    $padrao = '/^[0-9]{1,2}\/[0-9]{1,2}\/[0-9]{4}$/';
    $resultado = preg_match($padrao, $data);

    return $resultado;
}


function tratar_anexo($anexo){
  $padrao = '/^.+(\.pdf$|\.txt$)$/';
  $resultado = preg_match($padrao, $anexo['name']);

  if(!$resultado){
    return false;
  }

  move_uploaded_file($anexo['tmp_name'],"anexos/{$anexo['name']}");

  return true;

}

function enviar_email($tarefa,$anexos = array()){
  //Acessar o sistema de e-mail
 include "bibliotecas/PHPMailer/PHPMailerAutoload.php";

  $email = new PHPMailer();

  $email-> isSMTP();
  $email->Host = "smtp.gmail.com";
  $email->Port = 587;
  $email->SMTPSecure = 'tls';
  $email->Username = "@gmail.com";
  $email->Password = "senha";
  $email->setFrom("adielsondossantosjunior@gmail.com","Avisador de Tarefas");

  $email->addAddress(EMAIL_NOTIFICACAO);
  $email->Subject = "Aviso de Tarefa: {$tarefas['nome']}";
  $corpo = preparar_corpo_email($tarefas,$anexos);

  $email->msgHTML($corpo);
  foreach($anexos as $anexo){
    $email->addAttachment("anexos/{$anexo['arquivo']}");
  }

  if($email->send()){
  echo "enviado com Sucesso";
}

}

function preparar_corpo_email($tarefa,$anexos){
  //PHP nao pegar o processamento do navegador
  ob_start();

 include "template_email.php";

 //Guardar o conteudo do arquivo numa VARIAVEL
 $corpo = ob_get_contents();

 //voltar processamento para o navegador
 ob_end_clean();

  return $corpo;



}
