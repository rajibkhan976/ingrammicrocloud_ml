$(document).ready(function($){
		
	$("#form-inscricao").submit(function(){	
			
			
			if($("#Razao_Social").val()==''){
				alert('Informe a Raz�o Social.');
				$("#Razao_Social").focus();
				return false;
			}	


			if($("#Nome_Fantasia").val()==''){
				alert('Informe o Nome Fantasia.');
				$("#Nome_Fantasia").focus();
				return false;
			}	

			if($("#Cnpj").val()==''){
				alert('Informe o CNPJ.');
				$("#Cnpj").focus();
				return false;
			}	


			if($("#Numero_Serie").val()==''){
				alert('Preencha o n�mero de s�rie do produto.');
				$("#Numero_Serie").focus();
				return false;
			}	
			
			if($("#Numero_NF").val()==''){
				alert('Informe o n�mero da NF da Ingram Micro.');
				$("#Numero_NF").focus();
				return false;
			}	

			if($("#Modelo_servidor").val()==''){
				alert('Informe o modelo do servidor.');
				$("#Modelo_servidor").focus();
				return false;
			}	

			if($("#Revenda").val()==''){
				alert('Informe a revenda.');
				$("#Revenda").focus();
				return false;
			}		
			
		
			if($("#Estado").val()==''){
				alert('Informe o estado.');
				$("#Estado").focus();
				return false;
			}	
			
			if($("#Cidade").val()==''){
				alert('Informe a cidade.');
				$("#Cidade").focus();
				return false;
			}	
			
			
			if($("#Fundacao").val()==''){
				alert('Informe o ano de funda��o.');
				$("#Fundacao").focus();
				return false;
			}	

				if($("#Qtd_Funcionarios").val()==''){
				alert('Informe a quantidade de funcion�rios.');
				$("#Qtd_Funcionarios").focus();
				return false;
			}			

				if($("#Segmento").val()==''){
				alert('Informe o segmento da sua empresa.');
				$("#Segmento").focus();
				return false;
			}	



			if($("#Nome").val()==''){
				alert('Preencha o nome.');
				$("#Nome").focus();
				return false;
			}	

			if($("#Cargo").val()==''){
				alert('Informe o cargo.');
				$("#Cargo").focus();
				return false;
			}	
			
				
				if($("#Telefone").val()==''){
				alert('Informe o telefone.');
				$("#Telefone").focus();
				return false;
			}	
		
			
			$("#Email").val($("#Email").val().replace(/ /g, ""));
			
			if($("#Email").val()=='' || $("#Email").val().match(/(\w+)@(.+)\.(\w+)$/)==null){
				alert('Preencha o e-mail.');
				$("#Email").focus();
				return false;
			}	


			if($("#termos-uso:checked").length==0){
			alert('Para participar � necess�rio aceitar os Termos da promo��o.');
			return false;
		}													  
	});
 
   //Aceita at� 9 digitos
    $("#Cnpj").mask("99.999.999/9999-99");
	$('#Telefone').mask("(99) 9999-9999?9").ready(function(event) {
      var target, phone, element;
      target = (event.currentTarget) ? event.currentTarget : event.srcElement;
      phone = target.value.replace(/\D/g, '');
      element = $(target);
      element.unmask();
      if(phone.length > 10) {
          element.mask("(99) 99999-999?9");
      } else {
          element.mask("(99) 9999-9999?9");
      }
    });



	

});
	
	





	





