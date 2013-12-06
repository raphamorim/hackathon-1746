
<?php

require_once "../../controller/UsuariosController.class.php";
require_once "../../model/PDO/Usuario.class.php";
require_once "../../model/Conexao.class.php";

	$UsuariosController = new UsuariosController();
	$usuario = $UsuariosController->execute('Autenticar');
	


	if ($usuario){

		session_start();		
		session_regenerate_id(true); 
		
		$_SESSION['usu_id'] = $usuario->getId();
		$_SESSION['cpf'] = $usuario->getCpf();
		$_SESSION['usu_usuario'] = $usuario->getUsuario();
		$_SESSION['nome'] = $usuario->getNome();
		$_SESSION['email'] = $usuario->getEmail();
		$_SESSION['datanasc'] = $usuario->getDataNasc();
		$_SESSION['telefone'] = $usuario->getTelefone();
		$_SESSION['permissao'] = $usuario->getPermissao();
		$_SESSION['cadastrado_em'] = $usuario->getCadastradoem();
		$_SESSION['alterado_em'] = $usuario->getAlteradoem();
		$_SESSION['usu_status'] = $usuario->getStatus();
		
		$_SESSION['registro'] = time();//pega o tempo em que a sessão foi criada para no arquivo 'protecao.php' ser verificado o tempo de atividade do usuário
		$_SESSION['limite'] = 30000000000000;
		
		//echo "<font color='#0099FF'>Login efetuado com sucesso!</font>";
		
		$conexao = new Conexao();

	
		if(isset($_SESSION['permissao']) && ($_SESSION['permissao']) > 0) {
			header("location: painel.php");
		} 
	} else {//Não existir usuário
	 	$_SESSION["usu_status"] = 0;

	 	header('Content-Type: text/html; charset=utf-8');
		echo "<script type='text/javascript'> 
				alert('Usuário ou Senha Incorretos');
				history.back(); 
			</script>";
	}
	
?>