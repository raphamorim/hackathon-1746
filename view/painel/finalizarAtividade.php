<?php 

require_once "../../controller/SolicitacaoController.class.php";

header('Content-Type: text/html; charset=utf-8');

$SolicitacaoController = new SolicitacaoController();
$solicitacaoAlterada = $SolicitacaoController->execute("EndSolicitacao");

if($solicitacaoAlterada) {
	$id = $_GET['id'];
	echo "<script type='text/javascript'> alert('Atividade Finalizada!');</script>";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='0;URL=detalhes.php?id={$id}'>";
} else {
	return false;
}

?>