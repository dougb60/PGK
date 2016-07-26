$(function(){
	
	$.validator.setDefaults({
		errorClass: 'help-block',
		highlight: function(element){
			$(element)
			.closest('.form-group')
			.addClass('has-error');
		},
		unhighlight: function(element){
			$(element)
			.closest('.form-group')
			.removeClass('has-error');
		}
	});
	
	//Telefone fixo
	 $.validator.addMethod('telefone', function (value, element) {
	        value = value.replace("(", "");
	        value = value.replace(")", "");
	        value = value.replace("-", "");
	        value = value.replace(" ", "").trim();
	        if (value == '0000000000') {
	            return (this.optional(element) || false);
	        } else if (value == '00000000000') {
	            return (this.optional(element) || false);
	        }
	        if (["00", "01", "02", "03", , "04", , "05", , "06", , "07", , "08", "09", "10"].indexOf(value.substring(0, 2)) != -1) {
	            return (this.optional(element) || false);
	        }
	        if (value.length < 10 || value.length > 10) {
	            return (this.optional(element) || false);
	        }
	        if (["1", "2", "3", "4","5"].indexOf(value.substring(2, 3)) == -1) {
	            return (this.optional(element) || false);
	        }
	        return (this.optional(element) || true);
	    }, 'Informe um numero de telefone válido'); 


//Celular
jQuery.validator.addMethod('celular', function (value, element) {
    value = value.replace("(","");
    value = value.replace(")", "");
    value = value.replace("-", "");
    value = value.replace(" ", "").trim();
    if (value == '0000000000') {
        return (this.optional(element) || false);
    } else if (value == '00000000000') {
        return (this.optional(element) || false);
    } 
    if (["00", "01", "02", "03", , "04", , "05", , "06", , "07", , "08", "09", "10"].indexOf(value.substring(0, 2)) != -1) {
        return (this.optional(element) || false);
    }
    if (value.length < 10 || value.length > 11) {
        return (this.optional(element) || false);
    }
    if (["6", "7", "8", "9"].indexOf(value.substring(2, 3)) == -1) {
        return (this.optional(element) || false);
    }
    return (this.optional(element) || true);
}, 'Informe um numero de celular válido'); 
});

$(function(){
	
	$("#registra-pessoa").validate({
		rules: {
			email:{
				required: true,
				email: true
			},
			senha: "required",
			senha2: {
				required: true,
				equalTo: "#senha"
			},
			fone:{
				telefone: true
				
			},
			cel:{
				celular:true
			}
		},
		messages: {
			nome: {
				required: 'Insira seu nome.'
			},
			email:{
				required:'Insira seu email.',
				email: 'Inisira um email <em>válido<em>'
			},
			fone:{
			
				required: 'Insira o numero do seu Telefone.'
				
			},
			cel:{
				required: 'Insira o numero do seu Celular.'
			},
			login:{
				required: 'Insira o login.'
			},
			senha:{
				required: 'Insira uma senha.'
			},
			senha2:{
				required: 'Repita a senha.'
			}
		}
		
	});
	
	$("#registra-projeto").validate({
		rules: {
			nome:{
				required: true,
				
			},
			descricao: "required",
			dini: {
				required: true,
				
			},
			dfim:{
				required: true
				
			}
			
		},
		messages: {
			nome: {
				required: 'Insira o nome do projeto.'
			},
			descricao:{
				required:'Insira uma descrição para o projeto.'
				
			},
			dini:{
			
				required: 'Insira a data de inicio do projeto.'
				
			},
			dfim:{
				required: 'Insira a data de fim do projeto.'
			}
			
		}
		
	});
	$("#registra-tarefa").validate({
		rules: {
			nome:{
				required: true,
				
			},
			descricao: "required",
			
			
		},
		messages: {
			nome: {
				required: 'Insira o nome do projeto.'
			},
			descricao:{
				required:'Insira uma descrição para o projeto.'
				
			}
			
			
		}
		
	});
});