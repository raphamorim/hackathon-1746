<?php

require_once "Conexao.class.php";

class Usuarios {
	
	private $id;
	private $usu;
	private $nome;
	private $datanasc;
	private $senha;
	private $email;

	private $cep;
	private $logradouro;
	private $numero;
	private $complemento;
	private $bairro;
	private $cidade;
	private $uf;
		
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
//--------------------Dados de Localidade----------------------//	
	public function setCep ($cep){
		$this->cep = $cep;			
	}
	public function getCep () {
		return $this->cep;		
	}

	public function setLogradouro ($logradouro){
		$this->logradouro = $logradouro;			
	}
	public function getLogradouro () {
		return $this->logradouro;		
	}

	public function setNumero ($numero){
		$this->numero = $numero;			
	}
	public function getNumero () {
		return $this->numero;		
	}
	
	public function setComplemento ($complemento){
		$this->complemento = $complemento;			
	}
	public function getComplemento () {
		return $this->complemento;		
	}
	
	public function setBairro ($bairro){
		$this->bairro = $bairro;			
	}
	public function getBairro () {
		return $this->bairro;		
	}
	
	public function setCidade ($cidade){
		$this->cidade = $cidade;			
	}
	public function getCidade () {
		return $this->cidade;		
	}

	public function setUf ($uf){
		$this->uf = $uf;			
	}
	public function getUf () {
		return $this->uf;		
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

