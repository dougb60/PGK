$(function(){
var maskBehavior = function (val) {
  return val.replace(/\D/g, '').length === 11 ? '(00) 00000-0000' : '(00) 0000-00009';
},
options = {onKeyPress: function(val, e, field, options) {
        field.mask(maskBehavior.apply({}, arguments), options);
    }
};

$('#phone').mask(maskBehavior, options);
});


$(function(){
	
	/*mascara telefone*/
	$("#fone").mask("(99) 9999-9999");
	/*mascara celular*/
	$("#cel").mask("(99) 99999-9999");

	
	/*warning*/
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
			descricao:{
				required:true,
				minlength: 10
			},
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
				required:'Insira uma descrição para o projeto.',
				minlength: 'A descrição deve conter ao menos 10 caracteres.'
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
			descricao: {
				minlength: 10,
				required: true
			}
			
			
		},
		messages: {
			nome: {
				required: 'Insira o nome do projeto.'
			},
			descricao:{
				required:'Insira uma descrição para o projeto.',
				minlength: 'A descrição deve conter ao menos 10 caracteres.'
			}
			
			
		}
		
	});
	
	$("#altera-usuario").validate({
		rules: {
			email:{
				required: true,
				email: true
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
			}
			
		}
		
	});
});