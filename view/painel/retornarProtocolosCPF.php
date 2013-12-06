<?php

require_once "../../controller/SolicitacaoController.class.php";
require_once "../../controller/ValidarDados.class.php";

extract($_POST);

$ValidarDados = new ValidarDados();
$valido = $ValidarDados->campoVazio($valor);

if(!$valido) {
	echo "CPF vazio";
} else {
	$valido = $ValidarDados->validaCPF($valor);

	if(!$valido) {
		echo "CPF Inválido<br/><br/><br/>";
	} else {
		$_POST['campo'] = "sol_cpfcidadao";
		$_POST['valor'] = $valor;
		$SolicitacaoController = new SolicitacaoController();
		$listarSolicitacao = $SolicitacaoController->execute('ListarSolicitacaoByCriterio'); 

		if($listarSolicitacao) 
		{
			for($i=0;$i<count($listarSolicitacao); $i++) {
				$end = $listarSolicitacao[$i]->getEndereco();
				$endereco = str_replace("/", ",&nbsp;<br/>", $end);

				echo "
					<div style='width:100%; border:1px solid gray; background:#f1f1f1;'>
					<br/><table>
					<tr><td><h2>0".($i+1)."</h2></td></tr>".
					"<tr><td><strong>DATA:</strong> " .$listarSolicitacao[$i]->getCriadaEm()."</td></tr>".
					"<tr><td><strong>PROTOCOLO:</strong> ". $listarSolicitacao[$i]->getProtocolo()."</td></tr>".
					"<tr><td> <strong>DESCRIÇÃO:</strong> " . $listarSolicitacao[$i]->getDescricao()."</td></tr>".
					"<tr><td> <strong>ENDEREÇO:</strong> " .$endereco."</td></tr>".
					"<tr><td> <strong>STATUS:</strong> " . $listarSolicitacao[$i]->getStatus()."</td></tr>".
					"<tr><td> <strong>RESPONSÁVEL:</strong> " . $listarSolicitacao[$i]->getResponsavel()."</td></tr>
					</table><br/></div><br/><br/>";
			}
		} else 
		{
			echo "CPF não contém protocolos<br/><br/><br/>";
		}
	}
}
?>