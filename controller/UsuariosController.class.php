<?php

require_once "../../model/PDO/Usuario.class.php";
require_once "../../model/DAO/UsuariosDao.class.php";
require_once "EnviarEmail.class.php";
require_once "ValidarDados.class.php";


class UsuariosController {
	
	public function execute($acao) {
	
	switch ($acao) {

// ----------------------------- AUTENTICAR USUÁRIO ----------------------------- //
		case "Autenticar" :
			
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
			
				extract($_POST);
				$usu = new Usuarios();
				$usu->setUsuario($usuario);
				$usu->setSenha($senha);
				$autenticar = new UsuariosDao();
				$autenticado = $autenticar->autentica($usu);
				
				if($autenticado) {
					return $autenticado;
				} else {
					return FALSE;
				}

			}
		
		break;
// ----------------------------- CADASTRAR USUÁRIO ----------------------------- //		
		case "SalvarFuncionario" :
			extract($_POST);
			$erro = 0;
			$msg = '';
			
			$validarDados = new ValidarDados();
			
			$valido = $validarDados->validaCPF($cpf);
			if(!$valido) {
				$msg.= "CPF Inválido*<br>";
				$erro++;	
			}
			$valido = $validarDados->verificaNome($usuario);
			if(!$valido) {
				$msg.= "Usuário com pelo menos 4 dígitos* <br>";
				$erro++;	
			}
			$valido = $validarDados->verificaNome($senha);
			if(!$valido) {
				$msg.= "Senha com pelo menos 4 caracteres* <br>";
				$erro++;	
			}
			$valido = $validarDados->verificaMaximo($senha);
			if(!$valido) {
				$msg.= "Senha com no máximo 10 caracteres* <br>";
				$erro++;	
			}
			$valido = $validarDados->verificaSenhasIguais($senha, $repitasenha);
			if(!$valido) {
				$msg.= "Senhas Diferentes* <br>";
				$erro++;
			}
			$valido = $validarDados->verificaNome($nome);
			if(!$valido) {
				$msg.= "Nome não pode ficar em branco!*<br>";
				$erro++;	
			}
			$valido = $validarDados->validaEmail($email);
			if(!$valido) {
				$msg.= "Email Inválido* <br>";
				$erro++;
			}
			$valido = $validarDados->campoVazio($telefone);
			if(!$valido) {
				$msg.= "Telefone não pode ficar em branco!*<br>";
				$erro++;	
			}
			
			
			if($erro > 0) {
				echo $msg;
			} else {
				$dataCadastro = date("d-m-Y H:i:s");
				$usu = new Usuarios();
				$usu->setCpf($cpf);
				$usu->setUsuario($usuario);
				$usu->setNome($nome);
				$usu->setDataNasc($datanasc);
				$usu->setSenha($senha);
				$usu->setEmail($email);
				$usu->setTelefone($telefone);
				$usu->setCadastradoem($dataCadastro);
				$salvar = new UsuariosDao();
				$cadastrarFuncionario = $salvar->salvar($usu);
				
				if($cadastrarFuncionario) {
					return TRUE;
				} 
			}
		
		break;
// ----------------------------- MOSTRAR USUÁRIOS ----------------------------- //	
		case "ListarUsuarios":
			$ler = new UsuariosDao();
			$usuario = $ler->ler();
			if($usuario){
				return $usuario;
			}else {
				return FALSE;
			}
		
		break;
// ----------------------------- MOSTRAR USUÁRIOS POR CRITÉRIO ----------------------------- //	
		case "ListarUsuariosByCriterio":
			$campo = $_GET['campo'];
			$valor = $_GET['valor'];
			$criterio = array('campo' => $campo, 'valor' => $valor);		
			$ler = new UsuariosDao();
			$usuario = $ler->lerByCriterio($criterio);
			if($usuario){
				return $usuario;
			}else {
				return FALSE;
			}						
		
		break;
// ----------------------------- ATUALIZAR USUÁRIO ----------------------------- //	
		case "UpdUsuario":
			extract($_POST);
			$erro = 0;
			$msg = '';
						
			$validarDados = new ValidarDados();
			$valido = $validarDados->verificaNome($nome);
			if(!$valido) {
				$msg.= "Nome não pode ficar em branco!*<br>";
				$erro++;	
			}
			$valido = $validarDados->verificaNome($email);
			if(!$valido) {
				$msg.= "Email não pode ficar em branco!*<br>";
				$erro++;	
			}
			$valido = $validarDados->verificaNome($telefone);
			if(!$valido) {
				$msg.= "Telefone não pode ficar em branco!*<br>";
				$erro++;	
			}
			$valido = $validarDados->verificaNome($usuario);
			if(!$valido) {
				$msg.= "Usuário com pelo menos 4 dígitos* <br>";
				$erro++;	
			}
			if(!empty($novasenha) || !empty($repitasenha)) {
				$valido = $validarDados->verificaNome($senha);
				if(!$valido) {
					$msg.= "Senha com pelo menos 4 caracteres* <br>";
					$erro++;	
				}
				$valido = $validarDados->verificaMaximo($senha);
				if(!$valido) {
					$msg.= "Senha com no máximo 10 caracteres* <br>";
					$erro++;	
				} 
				$valido = $validarDados->verificaSenhasIguais($novasenha, $repitasenha);
				if(!$valido) {
					$msg.= "Senhas Diferentes* <br>";
					$erro++;
				} else {
					$senha = $novasenha;	
				}
			}
			$valido = $validarDados->validaEmail($email);
			if(!$valido) {
				$msg.= "Email Inválido* <br>";
				$erro++;
			}
			
			if($erro > 0) {
				$this->resultado = new UsuariosController();
				$this->resultado->setResultado($msg);
				return $this->resultado;
			} else {
				$dataAlteracao = date("d-m-Y H:i:s");
		
				$usu = new Usuarios();
				$usu->setId($id);
				$usu->setUsuario($usuario);
				$usu->setNome($nome);
				$usu->setSenha($senha);
				$usu->setDataNasc($datanasc);
				$usu->setEmail($email);
				$usu->setTelefone($telefone);
				$usu->setAlteradoem($dataAlteracao);
	
				$update = new UsuariosDao();
				$updateUsuario = $update->update($usu);
				if($updateUsuario){
					return  FALSE;
				}
			}
		
		break;

// ----------------------------- ESQUECEU A SENHA ----------------------------- //	
		case "UpdEsqueceuSenha":
			extract($_POST);

			$usu = new Usuarios();
			$usu->setSenha($senha);
			$usu->setEmail($email);
	
			$update = new UsuariosDao();
			$updateUsuario = $update->updEsqueceuSenha($usu);
			
			if($updateUsuario){
				return  TRUE;
			} else {
				return FALSE;
			}
	
		$usu = null;
		break;

// ----------------------------- ATUALIZAR USUÁRIO-ADMIN ----------------------------- //	
		case "UpdAdmin":
			extract($_POST);
			
			$dataAlteracao = date("d-m-Y H:i:s");
		
			$usu = new Usuarios();
			$usu->setId($id);
			$usu->setPermissao($permissao);
			$usu->setStatus($status);
			$usu->setAlteradoem($dataAlteracao);
	
			$update = new UsuariosDao();
			$updateUsuario = $update->updateadmin($usu);
			if($updateUsuario){
				return  TRUE;
			}
			
		
			break;

// ----------------------------- ATUALIZAR SENHA-ADMIN ----------------------------- //	
		case "UpdSenhaAdmin":
			extract($_POST);
			$erro = 0;
			$msg = '';

			$campo = "usu_id";
			$valor = $id;
			$criterio = array('campo' => $campo, 'valor' => $valor);		
			$ler = new UsuariosDao();
			$usuario = $ler->lerByCriterio($criterio);

			$senhasalva = $usuario[0]->getSenha();

			$validarDados = new ValidarDados();

			$valido = $validarDados->verificaSenhasIguais($senhadigitada, $senhasalva);
			if(!$valido) {
				$msg.= "Senha incorreta* ";
				$erro++;
			}
			$valido = $validarDados->verificaSenhasIguais($novasenha, $repitasenha);
			if(!$valido) {
				$msg.= " Senhas novas diferentes*";
				$erro++;
			}

			if($erro > 0) {
				$this->resultado = new UsuariosController();
				$this->resultado->setResultado($msg);
				return $this->resultado;
			} else {
				
				$dataAlteracao = date("d-m-Y H:i:s");
			
				$usu = new Usuarios();
				$usu->setId($id);
				$usu->setSenha($novasenha);
				$usu->setAlteradoem($dataAlteracao);
		
				$update = new UsuariosDao();
				$updateUsuario = $update->updateSenhaAdmin($usu);
				if($updateUsuario){
					return  FALSE;
				} else {
					return TRUE;
				}

			}	
			break;
		
		}
	}
}
?>
