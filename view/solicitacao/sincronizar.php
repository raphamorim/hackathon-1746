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
  	 <title>Sincronização - Poda de Árvore</title>
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
  	 <script type="text/javascript" src='../../lib/js/verificarSolicitacao.js'></script>
  	 <script type="text/javascript" src='../../lib/js/sincronizarLocal.js'></script>


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
			<div class="br">
				<br/><br/>
			</div>
			<div id='other' align="center">
				<img src='../../lib/images/logo-prefeitura.png' title="logo_prefeitura" />
				<hr/>
				<h2>Sua Localização</h2>
				<h3 id='done'>Carregando..</h3>
				<br/>
					<div id="localizacao">É necessário em alguns navegadores a permissão do acesso a localização.</div>
					<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
				 <section>
				    <article>
				        <p><span id="status">Por favor aguarde enquanto nós tentamos localizar você...</span></p>
				    </article>
				 </section>
				 <br/>
				 <div id='resto'>
				 	<form action='validarCoordenadas.php' method="post">
				 		<table>
						<tr><td><input type='hidden' val='-' name='longitude' id='longitude' /></td> <td><input type='hidden' name='latitude' val='-' id='latitude' /></td></tr>
						<tr><td>Nome:</td> <td><input type='text' autocomplete='off' maxlength="30" name='nome' id='nome' placeholder='Seu Nome' required/></td></tr>
						<tr><td>CPF:</td> <td><input type='text' autocomplete='off' maxlength="12" name='cpf'  id='cpf' placeholder='Digite aqui seu CPF' required onkeypress="return numeros(event.keyCode, event.which);"/></td></tr>					
				 		<tr><td>Descrição:</td> <td><textarea maxlength="200" name='descricao' id='descricao' 
						placeholder='Descreva aqui a descrição do problema' required></textarea></td></tr>
						<tr><td colspan="2" align="center"><input type='submit' style="cursor:pointer;" class='btn-begin' value='Enviar Solicitação' /><br/><br/></td></tr>
						</table>
					</form>
				 </div>
	  	
	  	</div>
	</div>
  </body>
</html>
