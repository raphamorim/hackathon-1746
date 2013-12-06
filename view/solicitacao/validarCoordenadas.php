<?php
include("../../model/Conexao.class.php");
require_once "../../controller/SolicitacaoController.class.php";

$conectar = new Conexao();

extract($_POST);
header('Content-Type: text/html; charset=utf-8');

if((isset($longitude)) && (isset($latitude)) && (isset($nome)) && (isset($cpf)) && (isset($descricao))){
	if(strlen($nome) > 3){
		if(strlen($descricao) > 10){

		$SolicitacaoController = new SolicitacaoController();
		$salvarSolicitacao = $SolicitacaoController->execute('SalvarSolicitacao'); 

			if($salvarSolicitacao){
				echo "<script type='text/javascript'>
				alert('Sua solicitação foi enviada com sucesso! Número de Protocolo:".$salvarSolicitacao."');
				location.href = '../home'; 
				</script>";	
			}else{
				echo "<script type='text/javascript'>
				alert('Ocorreu um erro, por favor tente novamente.');
				location.href = 'sincronizar.php'; 
				</script>";	
			}

		}else{
			echo "<script type='text/javascript'>
			alert('Digite uma descrição válida');
			location.href = 'sincronizar.php'; 
			</script>";	

		}
	}else{
		echo "<script type='text/javascript'>
			alert('É obrigatório ter mais de 3 caracteres no campo Nome');
			location.href = 'sincronizar.php'; 
			</script>";	
	}

}else{
	echo "<script type='text/javascript'>
			alert('É obrigatório a sincronização, preencha todos os campos');
			location.href = 'sincronizar.php'; 
			</script>";
}




?>