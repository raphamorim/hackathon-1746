<?php

class Conexao {
	
	private $host = "localhost";
	private $user = "root";
	private $pass = "";
	private $bd = "hackathon";

	public function conexao(){
		mysql_connect ($this->host, $this->user, $this->pass);
		mysql_select_db ($this->bd);
		
		mysql_query("SET NAMES 'utf8'");
		mysql_query('SET character_set_connection=utf8');
		mysql_query('SET character_set_client=utf8');
		mysql_query('SET character_set_results=utf8');
	}
}




?>

