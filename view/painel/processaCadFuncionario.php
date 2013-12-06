<?php

require_once "../../controller/UsuariosController.class.php";

$UsuariosController = new UsuariosController();
$salvarFuncionario = $UsuariosController->execute('SalvarFuncionario'); 

if($salvarFuncionario) {
	echo "<script type='text/javascript'> alert('Funcionário cadastrado com sucesso!');
		  location.href = 'cadFuncionario.php';</script>";
} else {
  	echo "<br/><br/><strong>Não foi possível cadastrar o funcionário!</strong>";
}

?>