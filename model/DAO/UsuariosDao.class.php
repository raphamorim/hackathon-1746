<?php

class UsuariosDao {
	
	private $usuarios = array();

// ----------------------------- AUTENTICAR USUÁRIO ----------------------------- //
	public function autentica($usu) {
		$conexao = new Conexao();
		
		$login = $usu->getUsuario();
		$senha = $usu->getSenha();	
		
		$sql = "SELECT * FROM usuarios WHERE usu_usuario = '$login' AND usu_senha = '$senha'";
		$query = mysql_query($sql);
		
		$numRows = mysql_num_rows($query);
		if($numRows != 0 && $numRows == 1) {
			if($line= mysql_fetch_array($query)) {
				$usu = new Usuarios();
				$usu->setId($line['usu_id']);
				$usu->setCpf($line['usu_cpf']);
				$usu->setUsuario($line['usu_usuario']);	
				$usu->setSenha($line['usu_senha']);					
				$usu->setNome($line['usu_nome']);
				$usu->setDataNasc($line['usu_datanasc']);
				$usu->setEmail($line['usu_email']);
				$usu->setTelefone($line['usu_telefone']);
				$usu->setPermissao($line['usu_permissao']);
				$usu->setStatus($line['usu_status']);
				$usu->setCadastradoem($line['usu_cadastrado_em']);
				$usu->setAlteradoem($line['usu_alterado_em']);
			}
			mysql_free_result($query);	
			
			return $usu;

		} else {
			return false;	
		}
		$usu = null;
		$conexao = null;
	}
// ----------------------------- SALVAR USUÁRIO ----------------------------- //
	public function salvar($usu) {
		$conexao = new Conexao();
		
		$cpf = $usu->getCpf();
		$usuario = $usu->getUsuario();	
		$nome = $usu->getNome();
		$datanasc = $usu->getDataNasc();
		$senha = $usu->getSenha();
		$email = $usu->getEmail();
		$telefone = $usu->getTelefone();
		$permissao = "2";
		$dataCadastro = $usu->getCadastradoem();		
		
		$sqlDuplicado = "SELECT * FROM usuarios WHERE usu_cpf = '$cpf' OR usu_usuario = '$usuario'";	
		$queryDuplicado = mysql_query($sqlDuplicado);
		if (mysql_num_rows($queryDuplicado)!=0) {
			$line = mysql_fetch_array($queryDuplicado);
			if(($line['usu_cpf']) == $cpf) { echo 'CPF já cadastrado no sistema!<br>'; }
			if(($line['usu_usuario']) == $usuario) { echo 'Nome de Usuario já cadastrado no sistema!'; }
			return false;			
		} else {
			//Insert na Tabela Usuarios - Dados Pessoais		
			$sql_usu = "INSERT INTO usuarios (usu_cpf, usu_usuario, usu_senha, usu_nome, usu_datanasc, usu_email, usu_telefone, usu_permissao, usu_cadastrado_em) 
						VALUES ('$cpf', '$usuario', '$senha', '$nome', '$datanasc', '$email', '$telefone', '$permissao', '$dataCadastro')";	
			
			if(mysql_query($sql_usu) or die("Não foi possível cadastrar o usuário.")) {
				return true;
			} else {
				return false;
			}
		}
		$conexao = null;
		mysql_close();
	}

// ----------------------------- LER USUÁRIOS ----------------------------- //
	public function ler() {
		$conexao = new Conexao();
		
		$sql = "SELECT * FROM usuarios";
		$query = mysql_query($sql) or die ("Não é possível conexão para ler os usuários");	
		
		$numRows = mysql_num_rows($query);
		if ($numRows != 0){
			$i = 0;
			while ($line= mysql_fetch_array($query)) {
				$this->usuarios[$i] = new Usuarios();						
				$this->usuarios[$i]->setId($line['usu_id']);
				$this->usuarios[$i]->setCpf($line['usu_cpf']);
				$this->usuarios[$i]->setUsuario($line['usu_usuario']);	
				$this->usuarios[$i]->setSenha($line['usu_senha']);					
				$this->usuarios[$i]->setNome($line['usu_nome']);
				$this->usuarios[$i]->setDataNasc($line['usu_datanasc']);
				$this->usuarios[$i]->setEmail($line['usu_email']);
				$this->usuarios[$i]->setTelefone($line['usu_telefone']);
				$this->usuarios[$i]->setPermissao($line['usu_permissao']);
				$this->usuarios[$i]->setStatus($line['usu_status']);
				$this->usuarios[$i]->setCadastradoem($line['usu_cadastrado_em']);
				$this->usuarios[$i]->setAlteradoem($line['usu_alterado_em']);
				
				$sqlend = "SELECT * FROM enderecos WHERE end_usu_id = '". $line['usu_id']. "'";
				$queryend = mysql_query($sqlend) or die ("Não é possível conexão para ler os endereços");	
				$lineend= mysql_fetch_array($queryend);
					
					$this->usuarios[$i]->setCep($lineend['end_cep']);
					$this->usuarios[$i]->setLogradouro($lineend['end_logradouro']);
					$this->usuarios[$i]->setComplemento($lineend['end_complemento']);
					$this->usuarios[$i]->setNumero($lineend['end_numero']);
					$this->usuarios[$i]->setBairro($lineend['end_bairro']);
					$this->usuarios[$i]->setCidade($lineend['end_cidade']);
					$this->usuarios[$i]->setUf($lineend['end_uf']);
			$i++;
			}
			mysql_free_result($query);
			$conexao = null;
			return $this->usuarios;
		} else {
			return FALSE;
		}
		$this->usuarios = null;
	}
// ----------------------------- LER USUÁRIOS POR CRITÉRIO ----------------------------- //
	public function lerByCriterio($criterio) {
		$conexao = new Conexao();
		$campo = $criterio['campo'];
		$valor = $criterio['valor'];
		
		$sql = "SELECT * FROM usuarios WHERE $campo LIKE '%$valor%'";
		//$sql = "SELECT * FROM usuarios WHERE $campo LIKE '%$valor%' ORDER BY $campo ASC";
		$query = mysql_query($sql) or die ("Não é possível conexão para ler os usuários");	

		$numRows = mysql_num_rows($query);
		if ($numRows != 0){
			$i = 0;
			while ($line= mysql_fetch_array($query)) {

				$this->usuarios[$i] = new Usuarios();						
				$this->usuarios[$i]->setId($line['usu_id']);
				$this->usuarios[$i]->setCpf($line['usu_cpf']);
				$this->usuarios[$i]->setUsuario($line['usu_usuario']);	
				$this->usuarios[$i]->setSenha($line['usu_senha']);					
				$this->usuarios[$i]->setNome($line['usu_nome']);
				$this->usuarios[$i]->setDataNasc($line['usu_datanasc']);
				$this->usuarios[$i]->setEmail($line['usu_email']);
				$this->usuarios[$i]->setTelefone($line['usu_telefone']);
				$this->usuarios[$i]->setPermissao($line['usu_permissao']);
				$this->usuarios[$i]->setStatus($line['usu_status']);
				$this->usuarios[$i]->setCadastradoem($line['usu_cadastrado_em']);
				$this->usuarios[$i]->setAlteradoem($line['usu_alterado_em']);
		
			$i++;
			}
			
		mysql_free_result($query);
		$conexao = null;
		return $this->usuarios;

		} else {
			return FALSE;	
		}
	}
// ----------------------------- ATUALIZAR USUÁRIO ----------------------------- //
	public function update($usu) {
		$conexao = new Conexao();
		
		$id = $usu->getId();	
		$cpf = $usu->getCpf();
		$usuario = $usu->getUsuario();	
		$nome = $usu->getNome();
		$senha = $usu->getSenha();
		$datanasc= $usu->getDataNasc();
		$email = $usu->getEmail();
		$telefone = $usu->getTelefone();
		$dataAlteracao = $usu->getAlteradoem();
		
		$sql = "UPDATE usuarios SET usu_usuario='$usuario', usu_senha='$senha', usu_nome='$nome', usu_datanasc='$datanasc', usu_email='$email', usu_telefone='$telefone', usu_alterado_em='$dataAlteracao' WHERE usu_id = '$id'";	
		$query = mysql_query($sql) or die('Não foi possível atualizar o usuário');
		
	
		if ($query) {	
			return TRUE;		
		} else {
			return FALSE;
		}
		
		$id = null;
		$cpf = null;
		$usuario = null;
		$nome = null;
		$senha = null;
		$email = null;
		$telefone = null;
		$dataAlteracao = null;
		$conexao = null;
	}	
// ----------------------------- ATUALIZAR ADMIN ----------------------------- //
	public function updateadmin($usu) {
		$conexao = new Conexao();
		
		$id = $usu->getId();	
		$permissao = $usu->getPermissao();
		$status = $usu->getStatus();
		$dataAlteracao = $usu->getAlteradoem();
		
		$sql = "UPDATE usuarios SET usu_permissao='$permissao', usu_status='$status', usu_alterado_em='$dataAlteracao' WHERE usu_id = '$id'";	
		$query = mysql_query($sql) or die('Não foi possível atualizar o usuário');
		
		if ($query) {	
			return TRUE;		
		} else {
			return FALSE;
		}
		
		$id = null;
		$permissao = null;
		$status = null;
		$dataAlteracao = null;
		$conexao = null;
	}	

// ----------------------------- ATUALIZAR ADMIN ----------------------------- //
	public function updateSenhaAdmin($usu) {
		$conexao = new Conexao();
		
		$id = $usu->getId();	
		$senha = $usu->getSenha();
		$dataAlteracao = $usu->getAlteradoem();
		
		$sql = "UPDATE usuarios SET usu_senha='$senha', usu_alterado_em='$dataAlteracao' WHERE usu_id = '$id'";	
		$query = mysql_query($sql) or die('Não foi possível atualizar o usuário');
		
		if ($query) {	
			return TRUE;		
		} else {
			return FALSE;
		}
		
		$id = null;
		$senha = null;
		$dataAlteracao = null;
		$conexao = null;
	}	
	
// ----------------------------- ATUALIZAR USUÁRIO ----------------------------- //
	public function updEsqueceuSenha($usu) {
		$conexao = new Conexao();
		
		$senha = $usu->getSenha();
		$email = $usu->getEmail();
		
		$sql = "UPDATE usuarios SET usu_senha='$senha' WHERE usu_email = '$email'";	
		$query = mysql_query($sql) or die('Não foi possível atualizar o usuário');
		
		if ($query) {	
			return TRUE;		
		} else {
			return FALSE;
		}
	
		$senha = null;
		$email = null;
		$conexao = null;
	}	
// ----------------------------- DELETAR USUÁRIO ----------------------------- //
	public function del($id) {
		$conexao = new Conexao();		
		
		$sql = "DELETE FROM usuarios WHERE usu_id = '$id'";		
		$query = mysql_query($sql) or die ('Não foi possível conexão para excluir o usuário');
				
		if ($query) {	
			return true;		
		} else {
			return false;
		}
		$conexao = null;
	}
}

?>