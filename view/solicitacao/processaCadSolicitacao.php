<?php

require_once "../../controller/SolicitacaoController.class.php";

$SolicitacaoController = new SolicitacaoController();
$salvarSolicitacao = $SolicitacaoController->execute('SalvarSolicitacao'); 

if($salvarSolicitacao) {
	echo $salvarSolicitacao;
} else {
  echo 0;
}

?>