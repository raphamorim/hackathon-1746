<?php

require_once "../../model/DAO/SolicitacaoDao.class.php";
require_once "../../model/PDO/Solicitacao.class.php";
require_once "../../controller/Protecao.php";


class SolicitacaoController {

	public function execute($acao) {
	
	switch ($acao) {

// ----------------------------- CADASTRAR PEDIDO ----------------------------- //		
		case "SalvarSolicitacao" :

			extract($_POST);				
			$dataCadastro = date("d-m-Y H:i:s");

			$solicitacao = new Solicitacao();

			$protocolo = uniqid(rand());

			if( !empty($cep) && !empty($logradouro) && !empty($numero) && !empty($complemento) && !empty($bairro) ) {
				$endereco = $cep."/".$logradouro."/".$numero."/".$complemento."/".$bairro;
			} else {
				$endereco = "";
			}

			$solicitacao->setProtocolo(strip_tags($protocolo));
			$solicitacao->setDescricao(strip_tags($descricao));
			$solicitacao->setEndereco($endereco);
			$solicitacao->setCriadapor(strip_tags($nome));
			$solicitacao->setCriadaem($dataCadastro);
			$solicitacao->setCPFCidadao(strip_tags($cpf));
			if(empty($latitude)){
				$latitude = "";
			}
			if(empty($longitude)){
				$longitude = "";
			}
			$solicitacao->setLatitude(strip_tags($latitude));
			$solicitacao->setLongitude(strip_tags($longitude));

			$dao = new SolicitacaoDao();

			$cadastrarSolicitacao = $dao->salvar($solicitacao);

	
			if($cadastrarSolicitacao) 
			{	
				return $protocolo;
			} else 
			{
				return FALSE;
			}
	
		break;

// ----------------------------- MOSTRAR PEDIDOS ----------------------------- //	
		case "ListarSolicitacao":
			$dao = new SolicitacaoDao();
			$listarSolicitacao = $dao->ler();
			return $listarSolicitacao;	
		
		break;

// ----------------------------- MOSTRAR PEDIDO POR CRITÉRIO ----------------------------- //	
		case "ListarSolicitacaoById":
			$valor = $_GET['id'];
			$dao = new SolicitacaoDao();
			$listarSolicitacao = $dao->lerById($valor);
			return $listarSolicitacao;						
		
		break;

// ----------------------------- MOSTRAR PEDIDO POR CRITÉRIO ----------------------------- //	
		case "ListarSolicitacaoByCriterio":
			$campo = $_POST['campo'];
			$valor = $_POST['valor'];
			$criterio = array('campo' => $campo, 'valor' => $valor);
			$dao = new SolicitacaoDao();
			$listarSolicitacao = $dao->lerByCriterio($criterio);
			return $listarSolicitacao;						
		
		break;

// ----------------------------- ATUALIZAR PEDIDO ----------------------------- //	
		case "UpdSolicitacao":
			$id = $_GET['id'];
			$nome = $_SESSION['nome'];
			$data = date("d-m-Y H:i:s");

			$solicitacao = new Solicitacao();
			
			$solicitacao->setId($id);
			$solicitacao->setStatus("Em Atividade.");
			$solicitacao->setAlteradapor($nome);
			$solicitacao->setAlteradaEm($data);

			$dao = new SolicitacaoDao();
			$updateSolicitacao = $dao->update($solicitacao);
			
			if($updateSolicitacao){
				return TRUE;
			} else {
				return FALSE;
			}
			
		break;

//------------------------------------------------//

		case "EndSolicitacao":
			$id = $_GET['id'];
			$nome = $_SESSION['nome'];
			$data = date("d-m-Y H:i:s");

			$solicitacao = new Solicitacao();
			
			$solicitacao->setId($id);
			$solicitacao->setStatus("Atividade Finalizada.");
			$solicitacao->setAlteradapor($nome);
			$solicitacao->setAlteradaEm($data);

			$dao = new SolicitacaoDao();
			$updateSolicitacao = $dao->update($solicitacao);
			
			if($updateSolicitacao){
				return TRUE;
			} else {
				return FALSE;
			}
			
		break;



		default:
			return NULL; //Não retorna nada	
	}
	}
}
?>

