<?php 

class ValidarDados {

	public function campoVazio($cv) {// verifica se o campo está vazio
		if(empty($cv)) {
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	public function validaCPF( $cpf ) { // Verifiva se o número digitado contém todos os digitos
		//campoVazio($cpf); 			
		
		$cpf = str_pad(preg_replace('/[^0-9]/', '', $cpf), 11, '0', STR_PAD_LEFT);
		// Verifica se nenhuma das sequências abaixo foi digitada, caso seja, retorna falso
		if ( strlen($cpf) != 11 || $cpf == '00000000000' || $cpf == '11111111111' || $cpf == '22222222222' || $cpf == '33333333333' || $cpf == '44444444444' || $cpf == '55555555555' || $cpf == '66666666666' || $cpf == '77777777777' || $cpf == '88888888888' || $cpf == '99999999999') {
			return FALSE;
		} else { // Calcula os números para verificar se o CPF é verdadeiro
			for ($t = 9; $t < 11; $t++) {
				for ($d = 0, $c = 0; $c < $t; $c++) {
					$d += $cpf{$c} * (($t + 1) - $c);
				}
				$d = ((10 * $d) % 11) % 10;
				if ($cpf{$c} != $d) {
					return FALSE;
				}
			}
			return TRUE;
		}
	}
	
	public function verificaSenhasIguais($novasenha, $repitasenha) {
		if(($novasenha) != ($repitasenha)) {
			return FALSE;	
		} else {
			return TRUE;
		}
		
	}

	public function verificaNome($nome) {
		if (strlen(trim($nome))< 4) {
			//para nome menor que 2
			return FALSE;
		} else {
			return TRUE;
		}
	}

	public function verificaMaximo($vm) {
		if (strlen(trim($vm)) > 10) {
			//para palavra maior que 10
			return FALSE;
		} else {
			return TRUE;
		}

	}
	
	public function validaEmail($email) {
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	//validando telefone (000)0000-0000
	public function validaTelefone($telefone) {
		//preg_replace('/[^0-9]/', '', $cpf)
		if (!eregi("^\([0-9]{2}\) [0-9]{4}-[0-9]{4}$", $variavel)) {
			//testando se o telefone esta correto
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	//Validando data = dd/mm/aaaa
	public function validaData($data) {
		if (!@eregi("^[0-9]{2}/[0-9]{2}/[0-9]{4}$", $data)) {
			//testando se data esta correta
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	//CEP = 00000-000
	public function validaCep($cep) {
		if (!@eregi("^[0-9]{5}-[0-9]{3}$", $cep)) {
			//testando se cep esta correto
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
	// validar URL = http://paulosaeta.wordpress.com
	public function validaURL($url) {
		if (!preg_match("|^http(s)?://[a-z0-9-]+(\.[a-z0-9-]+)*(:[0-9]+)?(/.*)?$|i", $url)) {
			//testando se url esta correta
			return FALSE;
		} else {
			return TRUE;
		}
	}
	
}

?>