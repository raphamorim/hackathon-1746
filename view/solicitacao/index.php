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
  	 <title>Enviar Solicitação - Poda de Árvore</title>
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
				<h2>Solicitação de Manejo</h2>
				<h3>Sincronize sua Localização ou preencha o formulário abaixo</h3>
				<br/><br/>

				<a style='color:#fff;' class="btn-begin" href='sincronizar.php' >Sincronizar Localização</a><br/><br/><br/>
				<h3>Ou...</h3><br/>
					<table>
						<tr><td>Nome:</td> <td><input type='text' autocomplete='off' maxlength="30" name='nome' id='nome' placeholder='Seu Nome' required/></td></tr>
						<tr><td>CPF:</td> <td><input type='text' autocomplete='off' maxlength="12" name='cpf'  id='cpf' placeholder='Digite aqui seu CPF' required onkeypress="return numeros(event.keyCode, event.which);"/></td></tr>					
						<tr><td>CEP:</td> <td><input type='text' autocomplete='off' name='cep' id='cep' maxlength="10"  onblur='javascript:formatCurrency(this);' onkeypress="return numeros(event.keyCode, event.which);" placeholder='Digite o CEP referente a solicitação' required/></td></tr>
						<tr><td>Logradouro:</td> <td><input autocomplete='off' name='logradouro' id='logradouro' type='text' placeholder='Digite o Logradouro' required/></td></tr>
						<tr><td>Número:</td> <td><input autocomplete='off' type='text'  onblur='javascript:formatCurrency(this);' onkeypress="return numeros(event.keyCode, event.which);"  maxlength="10" name='numero' id='numero' placeholder='Número' required/></td></tr>
						<tr><td>Complemento:</td> <td><input autocomplete='off' type='text' name='complemento' id='complemento' maxlength="30" placeholder='Complemento' /></td></tr>
						<tr><td>Bairro:</td> <td><input autocomplete='off' type='text' name='bairro' id='bairro' placeholder='Digite o Bairro' required></td></tr>
						<tr><td>Descrição:</td> <td><textarea maxlength="200" name='descricao' id='descricao' 
						placeholder='Descreva aqui a descrição do problema' required></textarea></td></tr>
					</table>
				   <br/>
				   <a onclick='iniVerificacao(event)' class='btn-begin'>Enviar Solicitação</a>
	  			   <br/><br/>
	  			
	  			<br/><br/>
	  		</div>
	  		<div id='new' style='display:none;' align="center">
				<img src='../../lib/images/logo-prefeitura.png' title="logo_prefeitura" />
				<hr/>
				<h2>Solicitação de Manejo</h2>
				<h3>Enviado com sucesso, sua solicitação será processada</em></h3>
				<br/>
					Enviado com Sucesso!
				   <br/><br/><br/>
				   <strong>Nº do Protocolo:</strong>
				   <div id='protocolo'></div>
				   <br/><br/><a href='../home' class='btn-begin'>Voltar a home</a>
	  			   <br/><br/>
	  			
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
