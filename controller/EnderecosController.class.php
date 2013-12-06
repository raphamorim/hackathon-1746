<?php

require_once "../../model/Usuarios.class.php";
require_once "../../model/EnderecosDao.class.php";


class EnderecosController {


	public function execute($acao) {
	
	switch ($acao) {

// ----------------------------- CONSULTA CEP ----------------------------- //		
		case "ConsultaCEP" :{
			if(!empty($_GET['CEP'])){
				$cep = $_GET['CEP'];
				if((strlen($cep)) > 8) {//com traço '-'
					if(strstr($cep,"-")){
						$cep = explode('-', $cep);
						$cep = $cep[0] . $cep[1];
					}
				} else if ($cep == 8) { // sem traço
					$cep = $cep;
				}
				$consultaCep = new EnderecosDao();
				$consultar = $consultaCep->consultaCep($cep);
				
				if($consultar) {
					return $consultar;
				} else {
					return FALSE;
				}
			} else {
				return FALSE;
			}
		}
// ----------------------------- CADASTRAR ENDEREÇO ----------------------------- //		
		case "CadEndereco" :{
			extract($_POST);
			
			$dataCadastro = date("d-m-Y H:i:s");
			$end = new Usuarios();
			$end->setId($_SESSION['usu_id']);
			$end->setCep($cep);
			$end->setLogradouro($logradouro);
			$end->setNumero($numero);
			$end->setComplemento($complemento);
			$end->setBairro($bairro);
			$end->setCidade($cidade);
			$end->setUf($uf);
			$end->setCadastradoem($dataCadastro);

			$salvar = new EnderecosDao();
			$cadastrarEndereco = $salvar->salvar($end);
			
			return $cadastrarEndereco;
		}
		break;
// ----------------------------- MOSTRAR ENDEREÇOS ----------------------------- //	
		case "ShowEndereços":{
			$ler = new EnderecosDao();
			$enderecos = $ler->ler();
			return $enderecos;	
		}
		break;
// ----------------------------- MOSTRAR ENDEREÇOS POR CRITÉRIO ----------------------------- //	
		case "ShowEnderecosByCriterio":{
			$campo = $_GET['campo'];
			$valor = $_GET['valor'];
			$criterio = array('campo' => $campo, 'valor' => $valor);		
			$ler = new EnderecosDao();
			$enderecos = $ler->lerByCriterio($criterio);
			return $enderecos;						
		}
		break;

// ----------------------------- ALTERAR ENDEREÇO ----------------------------- //	
		case "AlterarEndereco":{
			extract($_POST);
			
			$end = new Usuarios();
			$end->setId($idend);
			$end->setNumero($numero);
			$end->setComplemento($complemento);

			$alterar = new EnderecosDao();
			$alterarEndereco = $alterar->update($end);
			
			return $alterarEndereco;
		}
		break;

// ----------------------------- DELETAR ENDEREÇO ----------------------------- //	
		case "DelEndereco":{
			$id = $_GET['id'];
			$usu_id = $_GET['usu_id'];
			$del = new EnderecosDao();
			$excluir = $del->del($id, $usu_id);
			if($excluir) {
				return TRUE;
			}else {
				return FALSE;
			}
			//return $usuario;
		}
		break;
		default:
			return null; //Não retorna nada	
	}
	}
}
?>

