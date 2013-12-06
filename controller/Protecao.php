<?php

session_start();

if ((isset($_SESSION['registro'])) && (isset($_SESSION['limite']))) {

	$registro = $_SESSION['registro'];
	$limite = $_SESSION['limite'];
	
	if($registro) { // verifica se a session registro esta ativa
	
		$segundos = time() - $registro; //pega o tempo da hora atual e compara com o da autenticação
	
		/* verifica o tempo de inatividade. Se ele tiver ficado mais de 5 sminutos sem atividade ele destrói a session
		se não ele renova o tempo e ai é contado mais 300 segundos (5m)*/
		if($segundos>$limite)
		{
				session_unset();     
				session_destroy();	
				header('Location: ../../view/inicio/Sessao_expirada.php');
 		
		}
		else{
			$_SESSION['registro'] = time();
		}
	} 

} else {
	session_unset();     
	session_destroy();	
	header('Location: ../../view/inicio/Index.php');
}

// fim da verificação de inatividade
?>