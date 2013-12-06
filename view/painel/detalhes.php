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
  	 <title><?php echo $_GET['id']; ?>  Poda de Árvores</title>
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
  	 <script type="text/javascript" src='../../lib/js/jquery.js'></script>
  	 <script type="text/javascript" src='../../lib/js/exibirMapa.js'></script>

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
			<div class='br'><br/></div><h3 align="left">Esta é a solicitação de ID número: <?php echo $_GET['id']; ?></h3>
			<br/>
			<div align="left"><a href='../painel' class="btn-painel-active">Voltar ao Menu</a></div>
			<br/><br/>
				<div class='box' style="font-size:90%;">
					<p><strong> <?php echo $_GET['id']; ?></strong>
					</p>
					<ul class='solicitacoes'>
					<?php 
						$SolicitacaoController = new SolicitacaoController();
						$solicitacoes = $SolicitacaoController->execute('ListarSolicitacaoById');

						if($solicitacoes) {
							for($i=0;$i<count($solicitacoes);$i++) {
								$endereco = $solicitacoes[$i]->getEndereco();
								$end = str_replace("/", ". ", $endereco);

								echo "<li>";
								
								echo "<strong>Número do protocolo</strong>: ".$protocolo = $solicitacoes[$i]->getProtocolo();
								echo "<br/><strong>Descrição</strong>: ".$descricao = $solicitacoes[$i]->getDescricao();
								echo "<br/><strong>Endereço</strong>: ".$end;
								echo "<br/><strong>Status</strong>: ".$status = $solicitacoes[$i]->getStatus();
								
								
								echo "<br/><strong>Criada em</strong>: ".$criadaem = $solicitacoes[$i]->getCriadaEm();
								echo "<br/><strong>Responsável</strong>: ".$responsavel = $solicitacoes[$i]->getResponsavel();
								echo "<br/><strong>Alterado em</strong>: ".$alteradaem = $solicitacoes[$i]->getAlteradaEm();									
								echo  "<br/><strong>Alterado por</strong>: ".$alteradapor = $solicitacoes[$i]->getAlteradaPor();
								echo $feedback = $solicitacoes[$i]->getFeedback();
								echo "<br/><strong>CPF</strong>: ".$cpfcidadao = $solicitacoes[$i]->getCPFCidadao()."<br/>";
								echo "<input type='hidden' id='longitude' name='longitude' value='".$solicitacoes[$i]->getLongitude()."'/>
									  <input type='hidden' id='latitude' name='latitude' value='".$solicitacoes[$i]->getLatitude()."' />";

								if($solicitacoes[$i]->getCPFCidadao() != null){
								echo "<br/><script type='text/javascript' src='http://maps.google.com/maps/api/js?sensor=true'></script>
				 					<section>
				    					<article>
				        					<span id='status'>Por favor aguarde...</span>
				    					</article>
				 					</section>";
				 				}

				 				if($solicitacoes[$i]->getStatus() == "Em Andamento..."){
					 				if($admin){
					 					echo "<br/><strong><a href='criarAtividade.php?id=".$_GET['id']."'><p align='center'>Criar Atividade</p></a></strong>";
					 				}
					 			}
					 			if($solicitacoes[$i]->getStatus() == "Em Atividade"){
						 			if(empty($admin)){
						 				echo "<br/><strong><a href='finalizarAtividade.php?id=".$_GET['id']."'><p align='center'>Finalizar Atividade</p></a></strong>";
						 			}
								}

								echo "</li><br/>";
							}
						} else {
							echo "Não existe nenhuma solicitação no momento";
						}
					?>
					</ul>
				</div>
				<br/>
	  		</div>
	  	</div>
	</div>


  </body>
</html>
