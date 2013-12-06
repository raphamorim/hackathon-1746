<?php

require_once "ConexaoConsultaCep.class.php";


class EnderecosDao {

	private $escolha;
	
	private $enderecos = array();

// ----------------------------- SETAR ESCOLHA ----------------------------- //

	public function setEscolha($escolha) {
		$this->escolha = $escolha;
	}
	public function getEscolha() {
		return $this->escolha;
	}

// ----------------------------- CONSULTAR CEP ----------------------------- //
	public function consultaCep($cep) {
	
	$conexaoCep = new ConexaoConsultaCep();
	$conexaoCep->conexao();

		$sql = "SELECT * FROM logradouros WHERE no_logradouro_cep='$cep'";
		$query = mysql_query($sql) or die ("Não é possível conexão para ler o logradouro do cep");
		
		if ($info_rua = mysql_fetch_array($query)) {
			$logradouro = $info_rua['cd_logradouro'];
			$bairro = $info_rua['cd_bairro'];
			$tipo_logradouro = $info_rua['cd_tipo_logradouros'];
			$logradouro_nome = $info_rua['ds_logradouro_nome'];
		
				$sql = "SELECT * FROM bairros WHERE cd_bairro='$bairro'";
				$query = mysql_query($sql) or die ("Não é possível conexão para ler o bairro do cep");
			
				if ($info_bairro = mysql_fetch_array($query)) {
					$cidade = $info_bairro['cd_cidade'];
					$bairro_nome = $info_bairro['ds_bairro_nome'];
					
						$sql = "SELECT * FROM cidades WHERE cd_cidade='$cidade'";
						$query = mysql_query($sql) or die ("Não é possível conexão para ler a cidade do cep");
						
						if($info_cidade = mysql_fetch_array($query)) {
							$uf = $info_cidade['cd_uf'];
							$cidade_nome = $info_cidade['ds_cidade_nome'];	
							
								$sql = "SELECT * FROM uf WHERE cd_uf='$uf'";
								$query = mysql_query($sql) or die ("Não é possível conexão para ler a uf do cep");
								
								if($info_uf = mysql_fetch_array($query)) {
									$uf_sigla = $info_uf['ds_uf_sigla'];
									$uf_nome = $info_uf['ds_uf_nome'];

									if($uf_sigla == $this->escolha) {
										$conexao = new Conexao();
									
										$this->enderecos = new Solicitacao();
										$this->enderecos->setUf($uf_nome);
										$this->enderecos->setCidade($cidade_nome);
										$this->enderecos->setBairro($bairro_nome);
										$this->enderecos->setLogradouro($logradouro_nome);
										$this->enderecos->setCep($cep);
										return $this->enderecos;	
									} else {
										return FALSE;
									}

									
								} else {
									return FALSE;
								}
						} else {
							return FALSE;
						}
				} else {
					return FALSE;
				}
		} else {
			return false;
		}
		mysql_free_result($query);
		$conexaoCep = null;
		$conexao = null;
	}

// ----------------------------- SALVAR ENDEREÇO ----------------------------- //
	public function salvar($end) {
		$conexao = new Conexao();
		
		$end_usu_id = $end->getId();
		$cep = $end->getCep();
		$logradouro = $end->getLogradouro();
		$complemento = $end->getComplemento();
		$numero = $end->getNumero();
		$bairro = $end->getBairro();
		$cidade = $end->getCidade();
		$uf = $end->getUf();
		$dataCadastro = $end->getCadastradoem();
		
		$sql_end = "INSERT INTO enderecos (end_usu_id, end_cep, end_logradouro, end_complemento, end_numero, end_bairro, end_cidade, end_uf, end_dataCadastro) 
					VALUES ('$end_usu_id', '$cep', '$logradouro', '$complemento', '$numero', '$bairro', '$cidade', '$uf', '$dataCadastro')";				
		
		if(mysql_query($sql_end) or die("Não foi possível cadastrar o endereço.")){
			return TRUE;
		} else {
			return FALSE;
		}
		
		$cep = null;
		$uf = null;
		$cidade = null;
		$bairro = null;
		$logradouro = null;
		$dataAlteracao = null;
		$conexao = null;
	}

// ----------------------------- LER ENDEREÇO ----------------------------- //
	public function ler() {
		$conexao = new Conexao();
		
		$sql = "SELECT * FROM endereços";
		$query = mysql_query($sql) or die ("Não é possível conexão para ler os endereços");	
		
		$numRows = mysql_num_rows($query);
		if ($numRows != 0){
			$i = 0;
			while ($line= mysql_fetch_array($query)) {
				$this->enderecos[$i] = new Usuarios();						
				$this->enderecos[$i]->setId($line['end_usu_id']);	
				$this->enderecos[$i]->setCep($line['end_cep']);					
				$this->enderecos[$i]->setLogradouro($line['end_logradouro']);
				$this->enderecos[$i]->setComplemento($line['end_complemento']);
				$this->enderecos[$i]->setNumero($line['end_numero']);
				$this->enderecos[$i]->setBairro($line['end_bairro']);
				$this->enderecos[$i]->setCidade($line['end_cidade']);
				$this->enderecos[$i]->setUf($line['end_uf']);
				$this->enderecos[$i]->setCadastradoem($line['end_dataCadastro']);
			$i++;
			}
			mysql_free_result($query);
			$conexao = null;
			return $this->enderecos;
		} else {
			return false;
		}
	}
// ----------------------------- LER ENDEREÇOS POR CRITÉRIO ----------------------------- //
	public function lerByCriterio($criterio) {
		$conexao = new Conexao();
		$campo = $criterio['campo'];
		$valor = $criterio['valor'];
		
		$sql = "SELECT * FROM enderecos WHERE $campo = '$valor'";
		$query = mysql_query($sql) or die ("Não é possível conexão para ler os endereços");	

		$numRows = mysql_num_rows($query);
		if ($numRows != 0){
			$i = 0;
			while ($line= mysql_fetch_array($query)) {
				$this->enderecos[$i] = new Usuarios();		
				$this->enderecos[$i]->setId($line['end_id']);	
				$this->enderecos[$i]->setCep($line['end_cep']);					
				$this->enderecos[$i]->setLogradouro($line['end_logradouro']);
				$this->enderecos[$i]->setComplemento($line['end_complemento']);
				$this->enderecos[$i]->setNumero($line['end_numero']);
				$this->enderecos[$i]->setBairro($line['end_bairro']);
				$this->enderecos[$i]->setCidade($line['end_cidade']);
				$this->enderecos[$i]->setUf($line['end_uf']);
				$this->enderecos[$i]->setCadastradoem($line['end_dataCadastro']);
			$i++;
			}
			
		mysql_free_result($query);
		$conexao = null;
		return $this->enderecos;

		} else {
			return FALSE;	
		}
	}

// ----------------------------- ATUALIZAR ENDEREÇO ----------------------------- //
	public function update($end) {
		$conexao = new Conexao();
		
		$idend = $end->getId();
		$numero = $end->getNumero();
		$complemento = $end->getComplemento();	
		
		
		$sql = "UPDATE enderecos SET end_numero='$numero', end_complemento='$complemento' WHERE end_id = '$idend'";	
		$query = mysql_query($sql) or die('Não foi possível atualizar o endereço');
		
		if ($query) {	
			return TRUE;		
		} else {
			return FALSE;
		}
		
		$idend = null;
		$numero = null;
		$complemento = null;
	
	}

// ----------------------------- DELETAR ENDEREÇO ----------------------------- //
	public function del($id, $usu_id) {
		$conexao = new Conexao();	
		//verifica se só tem um endereço, caso sim, o usuário não pode excluir.
		$sqlverifica = "SELECT * FROM enderecos WHERE end_usu_id = '$usu_id'";	
		$queryverifica = mysql_query($sqlverifica) or die ("Não é possível conexão para ler o endereço");	

		$numRows = mysql_num_rows($queryverifica);
		if ($numRows == 1){
			return FALSE;
		} else {
			$sql = "DELETE FROM enderecos WHERE end_id = '$id'";		
			$query = mysql_query($sql) or die ('Não foi possível conexão para excluir o endereço');
			if ($query) {	
				return TRUE;		
			} else {
				return FALSE;
			}
		}
		$conexao = null;
	}
}

?>