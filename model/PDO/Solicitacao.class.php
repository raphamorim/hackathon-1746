<?php 

require_once "../../model/Conexao.class.php";


class Solicitacao {

	private $id;
	private $protocolo;
	private $descricao;
	private $endereco;
	private $status;
	private $criada_por;
	private $responsavel;
	private $criada_em;
	private $alterada_em;
	private $alterada_por;

	private $cpfcidadao;
	private $feedback;
	private $latitude;
	private $longitude;

	/**
	* @param int protocolo
	*/
	public function setId($id)
	{
		$this->id = $id;
	}
	/**
	* @param int protocolo
	*/
	public function setProtocolo($protocolo)
	{
		$this->protocolo = $protocolo;
	}
	/**
	* @param string descricao
	*/
	public function setDescricao($descricao)
	{
		$this->descricao = $descricao;
	}
	/**
	* @param int endereco
	*/
	public function setEndereco($endereco)
	{
		$this->endereco = $endereco;
	}
	/**
	* @param int status
	*/
	public function setStatus($status)
	{
		$this->status = $status;
	}
	/**
	* @param string criada_por
	*/
	public function setCriadapor($criada_por)
	{
		$this->criada_por = $criada_por;
	}
	/**
	* @param string responsavel
	*/
	public function setResponsavel($responsavel)
	{
		$this->responsavel = $responsavel;
	}
	/**
	* @param string criada_em
	*/
	public function setCriadaem($criada_em)
	{
		$this->criada_em = $criada_em;
	}
	/**
	* @param string alterada_em
	*/
	public function setAlteradaem($alterada_em)
	{
		$this->alterada_em = $alterada_em;
	}
	/**
	* @param string alterada_por
	*/
	public function setAlteradapor($alterada_por)
	{
		$this->alterada_por = $alterada_por;
	}
	/**
	* @param string cpfcidadao
	*/
	public function setCPFCidadao($cpfcidadao)
	{
		$this->cpfcidadao = $cpfcidadao;
	}
	/**
	* @param string feedback
	*/
	public function setFeedback($feedback)
	{
		$this->feedback = $feedback;
	}
	/**
	* @param int latitude
	*/
	public function setLatitude($latitude)
	{
		$this->latitude = $latitude;
	}
	/**
	* @param int longitude
	*/
	public function setLongitude($longitude)
	{
		$this->longitude = $longitude;
	}


	/**
	* @param return id
	*/
	public function getId()
	{
		return $this->id;
	}
	/**
	* @param return protocolo
	*/
	public function getProtocolo()
	{
		return $this->protocolo;
	}
	/**
	* @param return descricao
	*/
	public function getDescricao()
	{
		return $this->descricao;
	}
	/**
	* @param return endereco
	*/
	public function getEndereco()
	{
		return $this->endereco;
	}
	/**
	* @param return status
	*/
	public function getStatus()
	{
		return $this->status;
	}
	/**
	* @param return criada_por
	*/
	public function getCriadapor()
	{
		return $this->criada_por;
	}
	/**
	* @param return responsavel
	*/
	public function getResponsavel()
	{
		return $this->responsavel;
	}
	/**
	* @param return criada_em
	*/
	public function getCriadaem()
	{
		return $this->criada_em;
	}
	/**
	* @param return alterada_em
	*/
	public function getAlteradaem()
	{
		return $this->alterada_em;
	}
	/**
	* @param return alterada_por
	*/
	public function getAlteradapor()
	{
		return $this->alterada_por;
	}
	/**
	* @param return cpfcidadao
	*/
	public function getCPFCidadao()
	{
		return $this->cpfcidadao;
	}
	/**
	* @param return feedback
	*/
	public function getFeedback()
	{
		return $this->feedback;
	}
	/**
	* @param return latitude
	*/
	public function getLatitude()
	{
		return $this->latitude;
	}
	/**
	* @param return longitude
	*/
	public function getLongitude()
	{
		return $this->longitude;
	}


}

?>