<?php
require_once "../../controller/Protecao.php";
require_once "../../controller/UsuariosController.class.php";

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
  	 <meta charget='utf-8'>
  	 <title>Lista de Funcionários - Poda de Árvors</title>
  	 <meta http-equiv='content-language' content='pt-br'>
  	 <meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
  	 <meta name='author' content=''>
  	 <meta name='description' content=''>
  	 <meta name='keywords' content=''>
  	 <meta name="viewport" content="width=device-width,initial-scale=1">
  	 <!--Favicon-->
  	 <link rel='shortcut icon' href='../../lib/images/favicon.ico'	 />
  	 <!--CSS-->
  	 <link rel='stylesheet' href='../../lib/css/style.css'>
  	 <link rel='stylesheet' href='../../lib/css/painel.css'>
  	 <!--JS-->

  </head>
  <body>
  	<div id='mainBar' align="center">
  		<p align="right">
  		   <a href='../home'><img id='logo' src='../../lib/images/menu.png' align='absmiddle' height="26" /></a>
  		</p>
  	</div>
  	<div class='br'><br/></div>
 	  <div class='body'> 
		<div id='mainBody'>
			<div class='br'><br/></div>
				<h3 align="left">Bem vindo, <?php echo $_SESSION['nome']; ?>. <a href="logout.php">Sair</a></h3>
				<br/>
				<div align="left"><a href='painel.php' class="btn-painel">Solicitações</a> &nbsp;&nbsp; <a href='cadFuncionario.php' class="btn-painel">Adicionar Funcinonário</a> &nbsp;&nbsp;
				<div class='br'><br/></div> <a href='listaFuncionarios.php'  class="btn-painel-active">Lista de Funcinonários</a></div>

			<br/>
				<div class='box' style="font-size:90%;">
					<p>Lista de Funcionários</p>
					<ul class='solicitacoes'>
					<?php 
						$UsuariosController = new UsuariosController();
						$_GET['campo'] = "usu_permissao";
						$_GET['valor'] = "2";
						$funcionarios = $UsuariosController->execute('ListarUsuariosByCriterio');


						if($funcionarios) {
							$total = 0;
							for($i=0;$i<count($funcionarios);$i++) {
								
								echo "<li>";
								echo "<h2>".($i + 1)."</h2>";
								echo "<br/><strong>CPF</strong>: ".$funcionarios[$i]->getCpf();
								echo "<br/><strong>Nome</strong>: ".$funcionarios[$i]->getNome();
								echo "<br/><strong>Data Nascimento</strong>: ".$funcionarios[$i]->getDataNasc();
								echo "<br/><strong>Email</strong>: ".$funcionarios[$i]->getEmail();
								echo "<br/><strong>Telefone</strong>: ".$funcionarios[$i]->getTelefone();
								if($funcionarios[$i]->getStatus() == "1"){
									$status = "Ativo";
								} else {
									$status = "Inativo";
								}
								echo "<br/><strong>Status</strong>: ".$status;
								echo "<br/><strong>Cadastrado Em</strong>: ".$funcionarios[$i]->getCadastradoem();
								echo "<br/><strong>Alterado Em</strong>: ".$funcionarios[$i]->getAlteradoem();
								echo "</li><br/>";
								$total++;
							}
						} else {
							echo "Não existe nenhum funcionário registrado até o momento.<br/><br/>";
						}
					?>
					</ul>
				</div>
	  		</div>
	  	</div>
	</div>
	<br/><br/>
  </body>
</html>
