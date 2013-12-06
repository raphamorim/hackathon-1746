function cadastrar(e) {
	
	var cpf = $("#cpf").val();
	var nome = $("#nome").val();
	var usuario = $("#usuario").val();
	var senha = $("#senha").val();
	var repitasenha = $("#repitasenha").val();
	var email = $("#email").val();
	var datanasc = $("#datanasc").val();
	var telefone = $("#telefone").val();

	$.post("processaCadFuncionario.php", {cpf:cpf, nome:nome, usuario:usuario, senha:senha, repitasenha:repitasenha, email:email, datanasc:datanasc, telefone:telefone},
		function (retorno){
			$("#resposta").html(retorno);	
			$("html, body").animate({ scrollTop: $(document).height() }, "slow");		
		});
	
}

function numeros(ie, ff) {
    if (ie) {
        tecla = ie;
    } else {
        tecla = ff;
    }
 
    if ((tecla >= 48 && tecla <= 57) || (tecla == 8) || (tecla == 13) || (tecla == 9)) {
        return true;
    }
    else {
        return false;
    }
}