function iniVerificacao(e) {

	var nome = $("#nome").val();
	var cpf = $("#cpf").val();
	var cep = $("#cep").val();
	var logradouro = $("#logradouro").val();
	var numero = $("#numero").val();
	var complemento = $("#complemento").val();
	var bairro = $("#bairro").val();
	var descricao = $("#descricao").val();

	if(nome.length <= 4){
		alert("O campo Nome obrigatóriamente deverá ter mais de 3 caracteres.");
	}else{
		if(cpf.length <= 10){
			alert("O campo CPF está inválido.");
		}else{
			if(cep.length <= 7){
				alert("O CEP digitado está inválido.");
			}else{
				if(logradouro.length == 1){
					alert("O logradouro deve ser preenchido!");
				}else{
					if(numero.length == 0){
						alert("O número obrigatóriamente precisa ser preenchido.");
					}else{
						if(bairro.length == 1){
							alert("O bairro obrigatóriamente precisa ser preenchido.");
						}else{
							if(descricao.length == 0){
								alert("A Descrição necessita ser preenchida!");
						}else{

							inserirBD(nome, cpf, cep, logradouro, numero, complemento, bairro, descricao); //Inserir dados no BD, passando por parâmetros.

						    }
					    }
				    }
			    }
		    }
	    }
    }

}


function inserirBD(nome,cpf,cep,logradouro,numero,complemento,bairro,descricao) {
	
	$.post("processaCadSolicitacao.php", {nome:nome, cpf:cpf, cep:cep, logradouro:logradouro, numero:numero, complemento:complemento, bairro:bairro, descricao:descricao},
		function (retorno){
			
			if(retorno != 0){
				alert("Solicitação enviada com sucesso!");
				$("#other").fadeOut(300);
				$("footer").fadeOut(400)
				$("#new").fadeIn(400);
				$("#protocolo").html(retorno);
				
			}else{
				alert("Houve um erro, verifique seus dados e a conexão com a internet");
			}
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