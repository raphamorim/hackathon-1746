<?php
require_once "../../controller/Protecao.php";
require_once "../../controller/SolicitacaoController.class.php";

if(empty($_SESSION['usu_status'])){
	header("Location:index.php");
}else{
	if(isset($_SESSION['permissao'])){
		if($_SESSION['permissao'] == 1){
			$admin = true;
		}else{
			$admin = false;
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
  	 <title>Painel de Controle - Poda de Árvores</title>
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
			<br/><h3 align="left">Bem vindo, <?php echo $_SESSION['nome']; ?>. <a href="logout.php">Sair</a></h3>
			<br/>

			<?php
				if($admin){
					echo "<div align='left'><a href='painel.php' class='btn-painel-active'>Solicitações</a> &nbsp;&nbsp; <a href='cadFuncionario.php' class='btn-painel'>Adicionar Funcinonário</a> &nbsp;&nbsp;<div class='br'><br/></div>  <a href='listaFuncionarios.php' class='btn-painel'>Lista de Funcinonários</a></div>";
				}
			?>
			<br/>
				<div class='box' style="font-size:90%;">
					<p> 
					<?php 
						if($admin){
							echo "Solicitações";
						}else{
							echo "Atividades";
						}
					?>
					</p>
					<ul class='solicitacoes'>
					<?php 
						$SolicitacaoController = new SolicitacaoController();
						$solicitacoes = $SolicitacaoController->execute('ListarSolicitacao');

						if($solicitacoes) {
							$total = 0;
							for($i=0;$i<count($solicitacoes);$i++) {
								
								if(($solicitacoes[$i]->getStatus() == "Atividade Finalizada.") && ($admin == false)){

								$total--;

								}else{

								echo "<a href='detalhes.php?id=".$solicitacoes[$i]->getId()."'><li>";
								echo "<h2>".($i+1)."</h2>";
								echo "<strong>Número do protocolo</strong>: ".$protocolo = $solicitacoes[$i]->getProtocolo();
								echo "<br/><strong>Descrição</strong>: ".$descricao = $solicitacoes[$i]->getDescricao();
								
								echo "<br/><strong>Status</strong>: ".$status = $solicitacoes[$i]->getStatus();
								
								
								echo "<br/><strong>Criada em</strong>: ".$criadaem = $solicitacoes[$i]->getCriadaEm();
								echo "<br/><strong>Alterada em</strong>: ".$alteradaem = $solicitacoes[$i]->getAlteradaEm();									
								echo "<br/><strong>Alterada por</strong>: ".$alteradapor = $solicitacoes[$i]->getAlteradaPor();
								echo "<br/><strong>Feedback</strong>: ".$feedback = $solicitacoes[$i]->getFeedback();
								echo "<br/><strong>CPF</strong>: ".$cpfcidadao = $solicitacoes[$i]->getCPFCidadao()."<br/>";
								echo "</li></a><br/>";

								}
								$total++;
							}
						} else {
							echo "Não existe nenhuma solicitação no momento.<br/><br/>";
						}
					?>
					</ul>
				</div>
	  		</div>
	  	</div>
	</div>
	<br/><br/>
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
