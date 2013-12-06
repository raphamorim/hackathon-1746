<?php
require_once "../../controller/Protecao.php";
require_once "../../controller/SolicitacaoController.class.php";

if(empty($_SESSION['usu_status'])){
	header("Location:index.php");
}else{
	if(isset($_SESSION['permissao'])){
		if($_SESSION['permissao'] != 1){
			header("Location:painel.php");
		}
	}else{
		session_start();
		session_unset();
		session_destroy();
		$_SESSION['usu_status'] = 0;
		header('Location: index.php');
	}
}

?>

<!DOCTYPE html>
<html lang='pt-br'>
  <head>
  	 <meta charset='utf-8'>
  	 <title>Cadastrar Funcionário - Poda de Árvores</title>
  	 <meta http-equiv='content-language' content='pt-br'>
  	 <meta name='author' content=''>
  	 <meta name='description' content=''>
  	 <meta name='keywords' content=''>
  	 <meta name="viewport" content="width=device-width,initial-scale=1">
  	 <!--Favicon-->
  	 <link rel='shortcut icon' href='../../lib/images/favicon.ico'	 />
  	 <!--CSS-->
  	 <link rel='stylesheet' href='../../lib/css/style.css'>
  	 <link rel='stylesheet' href='../../lib/css/solicitacao.css'>
  	 <link rel='stylesheet' href='../../lib/css/painel.css'>
  	 <!--JS-->
  	 <script type="text/javascript" src='../../lib/js/jquery.js'></script>
  	 <script type="text/javascript" src='../../lib/js/painel.js'></script>



  </head>
  <body>
  	<div id='mainBar' align="center">
  		<p align="right">
  		   <a href='../home'><img id='logo' src='../../lib/images/menu.png' align='absmiddle' height="26" /></a>
  		</p>
  	</div>
  	<br/>
 	  <div class='body'> 
		<div id='mainBody'>
			<div class='br'><br/></div>
				<h3 align="left">Bem vindo, <?php echo $_SESSION['nome']; ?>. <a href="logout.php">Sair</a></h3><br/>
			
				<div align="left"><a href='painel.php' class="btn-painel">Solicitações</a> &nbsp;&nbsp; <a href='cadFuncionario.php' class="btn-painel-active">Adicionar Funcinonário</a> &nbsp;&nbsp;
			<div class='br'><br/></div>
				<a href='listaFuncionarios.php' class="btn-painel">Lista de Funcinonários</a></div>
			<br/><br/>
			<div id='other' align="center">
				
				<h2>Cadastro de Funcionário</h2>
				<br/>
					<table>
						<tr><td>CPF:</td> <td><input type='text' autocomplete='off' maxlength="12" name='cpf'  id='cpf' placeholder='CPF' required onkeypress="return numeros(event.keyCode, event.which);"/></td></tr>					
						<tr><td>Nome:</td> <td><input type='text' autocomplete='off' maxlength="30" name='nome' id='nome' placeholder='Nome' required/></td></tr>
						<tr><td>Usuário:</td> <td><input type='text' autocomplete='off' maxlength="10" name='usuario' id='usuario' placeholder='Usuário' required/></td></tr>
						<tr><td>Senha:</td> <td><input type='password' autocomplete='off' maxlength="10" name='senha' id='senha' placeholder='Senha' required/></td></tr>
						<tr><td>Repita Senha:</td> <td><input type='password' autocomplete='off' maxlength="10" name='repitasenha' id='repitasenha' placeholder='Senha' required/></td></tr>
						<tr><td>Email:</td> <td><input type='text' autocomplete='off' name='email' id='email' placeholder='Email' required/></td></tr>
						<tr><td>Data Nasc:</td> <td><input type='text' autocomplete='off' name='datanasc' id='datanasc' placeholder='Data Nascimento' required/></td></tr>
						<tr><td>Telefone:</td> <td><input type='text' autocomplete='off' name='telefone' id='telefone' placeholder='Telefone' required/></td></tr>
					</table>
				   <br/>
				   <a onclick='cadastrar(event)' style='color:#fff;' class='btn-begin'>Cadastrar Funcionário</a>
	  			   <br/><br/>
	  			
	  			<br/><br/>
	  		</div>
	  		<div id='resposta' align="center">
	  		</div>
	  		<br/><br/>
	  	</div>
	</div>

	<footer>
		<div align="center">
		   <p align="left">
			<a href='http://www.rio.rj.gov.br/' target="_blank">
				<img src='../../lib/images/prefeitura-footer.png' height="35" align="absmiddle" />
			</a>
			<a href='http://www.1746.rio.gov.br/' target="_blank">
				<img src='../../lib/images/1746-footer.png' height="35" align="absmiddle" />
			</a>
			<br/><br/>
			<a href='../painel/logout.php' style='color:gray;'>Sair do site</a>
			
		   </p>
		</div>
	</footer>
  </body>
</html>
