<?php 

require_once "../../controller/SolicitacaoController.class.php";

header('Content-Type: text/html; charset=utf-8');

$SolicitacaoController = new SolicitacaoController();
$solicitacaoAlterada = $SolicitacaoController->execute("UpdSolicitacao");

if($solicitacaoAlterada) {
	$id = $_GET['id'];
	echo "<script type='text/javascript'> alert('Solicitação Alterada com Sucesso!');</script>";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=detalhes.php?id={$id}'>";
} else {
	return false;
}

?>