
function retornarProtocolos(e){ 

	var cpf = $("#cpf").val(); 
	
	if(cpf != "") {
		$.post("retornarProtocolos.php", {valor: cpf}, 
		function (retornar){ 
			alert(retornar);
			$("#resultados").html(retornar); 
		});
	}

}