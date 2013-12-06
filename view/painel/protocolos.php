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
  	 <title>Protocolos - Poda de Árvores</title>
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
  	 <!--JS-->
  	 <script type="text/javascript" src='../../lib/js/jquery.js'></script>
  	 <script type="text/javascript" src='../../lib/js/verificarProtocolos.js'></script>
  	 <script type="text/javascript" src='../../lib/js/verificarSolicitacao.js'></script>

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
			<div class="br"><br/></div>
			<div id='other' align="center">
				<img src='../../lib/images/logo-prefeitura.png' title="logo_prefeitura" />
				<hr/>
				<h2>Pesquisar Protocolos</h2>
				<h3>Verifique o status de suas solicitações</h3>
				<br/>
					<table>
						<tr>
							<td><input type='text' maxlength="11" id='cpf' placeholder='Pesquisa por CPF' onkeypress="return numeros(event.keyCode, event.which);"/></td>
							<td><input type='text' id='regiao' placeholder='Pesquisa por Região' /></td>
						</tr>
					</table>
				   <br/>
				   <a onclick='retornarProtocolos(event)' class='btn-begin'>Buscar Solicitações</a>
	  			   	<br/><br/><br/><br/>
				   <div id='resultados'>
				   		<br/><br/><br/><br/>
				   </div>
	  			<br/><br/><br/><br/>
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
