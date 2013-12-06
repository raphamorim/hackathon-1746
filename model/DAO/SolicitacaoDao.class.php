<?php

class SolicitacaoDao  {

	private $solicitacoes = array();
	
// ----------------------------- SALVAR SOLICITAÇÃO ----------------------------- //
	public function salvar($solicitacao) {
		$conexao = new Conexao();

		$protocolo = $solicitacao->getProtocolo();
		$descricao = $solicitacao->getDescricao();
		$endereco = $solicitacao->getEndereco();
		$criadaopor = $solicitacao->getCriadapor();
		$criadaem = $solicitacao->getCriadaem();
		$cpf = $solicitacao->getCPFcidadao();
		$latitude = $solicitacao->getLatitude();
		$longitude = $solicitacao->getLongitude();
		$status = "Em andamento...";
	
		$sql = "INSERT INTO solicitacao (sol_protocolo, sol_descricao, sol_endereco, sol_status, sol_criada_por, sol_criada_em, sol_cpfcidadao, sol_latitude, sol_longitude) 
					VALUES ('$protocolo', '$descricao', '$endereco', '$status', '$criadaopor', '$criadaem', '$cpf', '$latitude', '$longitude')";	
			
		if(mysql_query($sql) or die("Não foi possível cadastrar a Solicitacao."))
		{
			return TRUE;
		} else 
		{
			return FALSE;
		}

		$conexao = null;
		mysql_close();

	}

// ----------------------------- LER SOLICITAÇÕES ----------------------------- //
	public function ler() {
		$conexao = new Conexao();
		
		$sql = "SELECT * FROM solicitacao ORDER BY sol_id ASC";
		$query = mysql_query($sql) or die ("Não é possível conexão para ler as solicitacoes");	
		
		$numRows = mysql_num_rows($query);
		if ($numRows != 0){
			$i = 0;
			while ($line= mysql_fetch_array($query)) {
				$this->solicitacoes[$i] = new Solicitacao();						
				$this->solicitacoes[$i]->setId($line['sol_id']);
				$this->solicitacoes[$i]->setProtocolo($line['sol_protocolo']);
				$this->solicitacoes[$i]->setDescricao($line['sol_descricao']);
				$this->solicitacoes[$i]->setEndereco($line['sol_endereco']);
				$this->solicitacoes[$i]->setStatus($line['sol_status']);
				$this->solicitacoes[$i]->setCriadaPor($line['sol_criada_por']);
				$this->solicitacoes[$i]->setResponsavel($line['sol_responsavel']);
				$this->solicitacoes[$i]->setCriadaEm($line['sol_criada_em']);
				$this->solicitacoes[$i]->setAlteradaEm($line['sol_alterada_em']);									
				$this->solicitacoes[$i]->setAlteradaPor($line['sol_alterada_por']);
				$this->solicitacoes[$i]->setFeedback($line['sol_feedback']);
				$this->solicitacoes[$i]->setCPFCidadao($line['sol_cpfcidadao']);
				$this->solicitacoes[$i]->setLatitude($line['sol_latitude']);
				$this->solicitacoes[$i]->setLongitude($line['sol_longitude']);
			$i++;
			}
			mysql_free_result($query);
			$conexao = NULL;
			return $this->solicitacoes;
		} else {
			return FALSE;
		}
	}

// ----------------------------- LER SOLICITAÇÕES POR ID ----------------------------- //
	public function lerById($valor) {
		$conexao = new Conexao();
		
		$sql = "SELECT * FROM solicitacao WHERE sol_id = '$valor'";
		$query = mysql_query($sql) or die ("Não é possível conexão para ler os pedidos");	

		$numRows = mysql_num_rows($query);
		if ($numRows != 0){
			$i = 0;
			while ($line= mysql_fetch_array($query)) {
				$this->solicitacoes[$i] = new Solicitacao();						
				$this->solicitacoes[$i]->setId($line['sol_id']);
				$this->solicitacoes[$i]->setProtocolo($line['sol_protocolo']);
				$this->solicitacoes[$i]->setDescricao($line['sol_descricao']);
				$this->solicitacoes[$i]->setEndereco($line['sol_endereco']);
				$this->solicitacoes[$i]->setStatus($line['sol_status']);
				$this->solicitacoes[$i]->setCriadaPor($line['sol_criada_por']);
				$this->solicitacoes[$i]->setResponsavel($line['sol_responsavel']);
				$this->solicitacoes[$i]->setCriadaEm($line['sol_criada_em']);
				$this->solicitacoes[$i]->setAlteradaEm($line['sol_alterada_em']);									
				$this->solicitacoes[$i]->setAlteradaPor($line['sol_alterada_por']);
				$this->solicitacoes[$i]->setFeedback($line['sol_feedback']);
				$this->solicitacoes[$i]->setCPFCidadao($line['sol_cpfcidadao']);
				$this->solicitacoes[$i]->setLatitude($line['sol_latitude']);
				$this->solicitacoes[$i]->setLongitude($line['sol_longitude']);
			$i++;
			}
		mysql_free_result($query);
		$conexao = NULL;
		return $this->solicitacoes;

		} else {
			return FALSE;	
		}
	}	
// ----------------------------- LER SOLICITAÇÕES POR VALOR ----------------------------- //
	public function lerByCriterio($criterio) {
		$conexao = new Conexao();

		$campo = $criterio['campo'];
		$valor = $criterio['valor'];
		
		$sql = "SELECT * FROM solicitacao WHERE $campo = '$valor' ORDER BY sol_id DESC";
		$query = mysql_query($sql) or die ("Não é possível conexão para ler os pedidos");	

		$numRows = mysql_num_rows($query);
		if ($numRows != 0){
			$i = 0;
			while ($line= mysql_fetch_array($query)) {
				$this->solicitacoes[$i] = new Solicitacao();						
				$this->solicitacoes[$i]->setId($line['sol_id']);
				$this->solicitacoes[$i]->setProtocolo($line['sol_protocolo']);
				$this->solicitacoes[$i]->setDescricao($line['sol_descricao']);
				$this->solicitacoes[$i]->setEndereco($line['sol_endereco']);
				$this->solicitacoes[$i]->setStatus($line['sol_status']);
				$this->solicitacoes[$i]->setCriadaPor($line['sol_criada_por']);
				$this->solicitacoes[$i]->setResponsavel($line['sol_responsavel']);
				$this->solicitacoes[$i]->setCriadaEm($line['sol_criada_em']);
				$this->solicitacoes[$i]->setAlteradaEm($line['sol_alterada_em']);									
				$this->solicitacoes[$i]->setAlteradaPor($line['sol_alterada_por']);
				$this->solicitacoes[$i]->setFeedback($line['sol_feedback']);
				$this->solicitacoes[$i]->setCPFCidadao($line['sol_cpfcidadao']);
				$this->solicitacoes[$i]->setLatitude($line['sol_latitude']);
				$this->solicitacoes[$i]->setLongitude($line['sol_longitude']);
			$i++;
			}
		mysql_free_result($query);
		$conexao = NULL;
		return $this->solicitacoes;

		} else {
			return FALSE;	
		}
	}	

// ----------------------------- ATUALIZAR SOLICITAÇÕES ----------------------------- //
	public function update($solicitacao) {
		$conexao = new Conexao();
		
		$id = $solicitacao->getId();
		$status = $solicitacao->getStatus();
		$alteradapor = $solicitacao->getAlteradapor();
		$dataAlteracao = $solicitacao->getAlteradaem();
		
		$sql = "UPDATE solicitacao SET sol_status='$status', sol_alterada_em='$dataAlteracao', sol_alterada_por='$alteradapor' WHERE sol_id = '$id'";	
		$query = mysql_query($sql) or die('Não foi possível atualizar o pedido');
		
		if ($query) {	
			return TRUE;		
		} else {
			return FALSE;
		}
		
	}	

}

?>