<?php

session_start();
if(isset($_SESSION['usu_status'])){
	header("Location:painel.php");
}

?>

<!DOCTYPE html>
<html lang='pt-br'>
  <head>
  	 <meta charset='utf-8'>
  	 <title>Entrar no site - Poda de Árvores</title>
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
				<form action='entrar.php' method='post'>
					<h2>Entrar</h2>
					<h3>Poda de Árvore</h3>
					<br/>
					<table>
					<tr><td>Login</td><td><input placeholder='Usuário' type='text' autocomplete='off' id='usuario' name='usuario' /></td></tr>
					<tr><td>Senha</td><td><input type='password' placeholder='Senha' autocomplete='off' id='senha' name='senha' /></td></tr>
					<tr><td colspan="2" align="center"><input type='submit' value='Entrar' class='btn-begin' /></td></tr>
					</table>
	  			</form>
	  			<br/><br/>
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
