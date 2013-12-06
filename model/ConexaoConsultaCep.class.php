<?php

class ConexaoConsultaCep {
	
	private $host = "186.202.183.26:3306";
	private $user = "xgose_cep";
	private $pass = "6ea2b5";
	private $bd = "xgoservice_consultacep";

	//private $host = "localhost";
	//private $user = "root";
	//private $pass = "";
	//private $bd = "xgoservice_cep";

	public function conexao(){
		mysql_connect ($this->host, $this->user, $this->pass) or die ('Não foi possível conexão com o servidor');
		mysql_select_db ($this->bd) or die ('Não foi possível conexão com o banco');
		
		mysql_query("SET NAMES 'utf8'");
		mysql_query('SET character_set_connection=utf8');
		mysql_query('SET character_set_client=utf8');
		mysql_query('SET character_set_results=utf8');
	}
}




?>

