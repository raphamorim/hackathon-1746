<?php

session_start();
if(isset($_SESSION['usu_status'])){
	header("Location:../painel/painel.php");
}

?>

<!DOCTYPE html>
<html lang='pt-br'>
  <head>
  	 <meta charset='utf-8'>
  	 <title>Poda de Árvores</title>
  	 <meta http-equiv='content-language' content='pt-br'>
  	 <meta name='author' content=''>
  	 <meta name='description' content=''>
  	 <meta name='keywords' content=''>
  	 <meta name="viewport" content="width=device-width,initial-scale=1">
  	 <!--Favicon-->
  	 <link rel='shortcut icon' href='../../lib/images/favicon.ico'	 />
  	 <!--CSS-->
  	 <link rel='stylesheet' href='../../lib/css/style.css'>
  	 <link rel='stylesheet' href='../../lib/css/home.css'>
  	 <!--JS-->

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
			<div class='half' align="center">
				<br/><br/>
				<img src='../../lib/images/favicon.png' align='absmiddle' height="330" />
			</div>
			<div class="half" align="center">
				<img src='../../lib/images/logo-prefeitura.png' title="logo_prefeitura" />
				<hr/>
				<h2>Problemas com Árvores?</h2>
				<h3>Nós resolvemos isto para você, basta apenas seguir algumas instruções.</h3>
					<ol class="ordered-list">
				    	<li>Solicite o Reparo ou Manejo da Árvore</li>
				    	<li>Após isto, sua solicitação será processada</li>
				    	<li>Em pouco tempo, estaremos enviando um profissional para a resolução do problema</li>
				    	<li>Fim do Problema</li>
	  				</ol>
	  				<br/>
	  			<a href='../solicitacao' class='btn-begin'>Solicitar Manejo da Árvore</a>
	  			<br/><br/>
	  			<div class='br'>
	  			<br/>
	  				<a href='../painel' style="color:#66a547;">Entrar no Site</a>
	  			<br/><br/>
	  				<a href='../painel/protocolos.php' style="color:#66a547;">Acompanhar Protocolos</a>
	  			<br/><br/>
	  			</div>
	  		</div>
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
			<a href='../painel' style='color:gray;'>Entrar no site</a> &nbsp;|&nbsp; <a href='../painel/protocolos.php' style='color:gray;'>Acompanhar Protocolos</a>
			
		   </p>
		</div>
	</footer>
  </body>
</html>
