<?php

require_once "../../model/Conexao.class.php";

class Usuarios {
	
	private $id;
	private $cpf;
	private $usu;
	private $nome;
	private $datanasc;
	private $senha;
	private $email;
	private $telefone;
	private $permissao;
	private $status;
	private $cadastradoem;
	private $alteradoem;
	
	//setters e getters
	
	public function setId ($id){
		$this->id = $id;			
	}
	public function getId () {
		return $this->id;		
	}
//--------------------Dados Pessoais----------------------//	
	public function setCpf ($cpf){
		$this->cpf = $cpf;			
	}
	public function getCpf () {
		return $this->cpf;		
	}

	public function setUsuario ($usu){
		$this->usu = $usu;			
	}
	public function getUsuario () {
		return $this->usu;		
	}

	public function setNome ($nome){
		$this->nome = $nome;			
	}
	public function getNome () {
		return $this->nome;		
	}
	
	public function setDataNasc ($datanasc){
		$this->datanasc = $datanasc;			
	}
	public function getDataNasc () {
		return $this->datanasc;		
	}

	public function setSenha ($senha){
		$this->senha = $senha;			
	}
	public function getSenha () {
		return $this->senha;		
	}

	public function setEmail ($email){
		$this->email = $email;			
	}
	public function getEmail () {
		return $this->email;		
	}
	
	public function setTelefone ($telefone){
		$this->telefone = $telefone;			
	}
	public function getTelefone () {
		return $this->telefone;		
	}
//--------------------Dados de Status e Permissão----------------------//	
	public function setPermissao ($permissao){
		$this->permissao = $permissao;			
	}
	public function getPermissao () {
		return $this->permissao;		
	}

	public function setStatus ($status){
		$this->status = $status;			
	}
	public function getStatus () {
		return $this->status;		
	}	
//--------------------Dados de Data----------------------//	
	public function setCadastradoem ($cadastradoem){
		$this->cadastradoem = $cadastradoem;			
	}
	public function getCadastradoem () {
		return $this->cadastradoem;		
	}
	
	public function setAlteradoem ($alteradoem){
		$this->alteradoem = $alteradoem;			
	}
	public function getAlteradoem () {
		return $this->alteradoem;		
	}

}

?>

