//on (escucha el evento) -> submit del id "formulario" y realiza lo siguiente:
jQuery(document).on('submit','#formulario', function(event){
			//preveen el evento por default al dar submit:
			event.preventDefault();
			//realiza la operación ajax siguiente:
			jQuery.ajax({
				//url donde se validan los datos
				url:'validar.php',
				//el tipo de datos que se manejan (POST - enviar)
				type: 'POST',
				//el tipo de dato que se envía
				dataType:'json',
				//El método .serialize() de jQuery analiza los formularios en busca de inputs, textareas, 
				data: $(this).serialize(),
				//Antes de enviar, realiza: cambia el valor de la clase del botón a  
				beforeSend: function(){
					$('button').val('Validando...');

				}


			})
			.done(function(respuesta){
				console.log(respuesta);
				if(!respuesta.error){
					location.href = 'bienvenido.html';
				}else{
					$('.error').slideDown('slow');
					setTimeout(function(){
						$('.error').slideUp('slow');
					},3000);
				}
			})
			.fail(function(resp){
				console.log(resp.responseText);
			})
			.always(function(){
				console.log("complete");
			});


		});
		
