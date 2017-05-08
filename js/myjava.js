$(document).ready(function(){

	//Boton de Busqueda de Personal 
	$('#btn-prod').click(function(){
		var dato = $('#bs-prod').val();
		var url = '../php/busca-personal.php';
		$.ajax({
			type:'POST',
			url:url,
			data:{'dato':dato},
			success: function(datos){
				$('#agrega-registros').html(datos);
			}
		});	
	});

	/*Boton de busqueda de servicio
	$('#btn-serv').click(function(){
		alert("holas");
		var dato = $('#bs-serv').val();
		var url = '../php/modificar-servicio.php';
		$.ajax({
			type:'POST',
			url:url,
			data:{'dato':dato},
			success: function(datos){
				$('#agrega-registros').html(datos);
			}
		});	
	});*/

	$('#bd-desde').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_servicio_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});

	$('#bd-hasta').on('change', function(){
		var desde = $('#bd-desde').val();
		var hasta = $('#bd-hasta').val();
		var url = '../php/busca_servicio_fecha.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'desde='+desde+'&hasta='+hasta,
		success: function(datos){
			$('#agrega-registros').html(datos);
		}
	});
	return false;
	});

	$('#nuevo-producto').on('click',function(){
		$('#formulario')[0].reset();
		$('#pro').val('Registro');
		$('#edi').hide();
		$('#reg').show();
		$('#registra-producto').modal({
			show:true,
			backdrop:'static'
		});
	});

	$('#bs-prod').keyup(function(e){
		if(e.keyCode == 13) {
			var dato = $('#bs-prod').val();
			var url = '../php/busca-personal.php';
				$.ajax({
				type:'POST',
				url:url,
				data:'dato='+dato,
					success: function(datos){
						$('#agrega-registros').html(datos);
					}
			});
			return false;
		}
	});

	$('#bs-serv').keyup(function(e){
		if(e.keyCode == 13) {
			var dato_env = $('#bs-serv').val();
			var url = '../php/modificar-servicio.php';
				$.ajax({
				type:'POST',
				url:url,
				data:{dato:dato_env},
					success: function(datos){
						$('#agrega-registros').html(datos);
					}
			});
			return false;
		}
	});


	$('#bs-personal').on('keyup',function(){
			var dato = $('#bs-personal').val();
			var url = '../php/busca-personal-admin.php';
			$.ajax({
			type:'POST',
			url:url,
			data:'dato='+dato,
			success: function(datos){
				$('#agrega-registros').html(datos);
			}
		});
		return false;
	});

});



function agregaRegistro(){
	var url = '../php/agrega-personal.php';
	$.ajax({
		type:'POST',
		url:url,
		data:$('#formulario').serialize(),
		success: function(registro){
			if ($('#pro').val() == 'Registro'){
			$('#formulario')[0].reset();
			$('#mensaje').addClass('bien').html('Registro completado con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}else{
			$('#mensaje').addClass('bien').html('Edicion completada con exito').show(200).delay(2500).hide(200);
			$('#agrega-registros').html(registro);
			return false;
			}
		}
	});
	return false;
}

function eliminarProducto(id){
	var url = '../php/elimina-personal.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Usuario?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(registro){
			$('#agrega-registros').html(registro);
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}

function eliminarServicio(id_env){
	var url = '../php/elimina-servicio.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Servicio? ');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:{id:id_env},
		success: function(dato){
			$('#tr'+dato).html("registros");
			return false;
		}
	});
	return false;
	}else{
		return false;
	}
}


function eliminarUsuario(id){
	var url = '../php/elimina-usuario.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Usuario?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(dato){
			$('#tr'+dato).html("");
			alert("Usuario eliminado correctamente");
		}
	});
	return false;
	}else{
		return false;
	}
}

function eliminarPersonal(id){
	var url = '../php/elimina-personal-admin.php';
	var pregunta = confirm('¿Esta seguro de eliminar este Usuario?');
	if(pregunta==true){
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(dato){
			$('#tr'+dato).html("");
			alert("Usuario eliminado correctamente");
		}
	});
	return false;
	}else{
		return false;
	}
}



function editarProducto(id){
	$('#formulario')[0].reset();
	var url = '../php/edita-personal.php';
		$.ajax({
		type:'POST',
		url:url,
		data:'id='+id,
		success: function(valores){
				var datos = eval(valores);
				$('#reg').hide();
				$('#edi').show();
				$('#pro').val('Edicion');
				$('#id_personal').val(id);
				$('#nocontrol').val(datos[0]);
				$('#nombre').val(datos[1]);
				$('#Nom_Departamento').val(datos[2]);
				$('#email').val(datos[3]);
				$('#registra-producto').modal({
					show:true,
					backdrop:'static'
				});
			return false;
		}
	});
	return false;
}

function reportePDF(){
	var desde = $('#bd-desde').val();
	var hasta = $('#bd-hasta').val();
	window.open('../php/productos.php?desde='+desde+'&hasta='+hasta);
}

function pagination(partida){
	var url = '../php/paginarProductos.php';
	$.ajax({
		type:'POST',
		url:url,
		data:'partida='+partida,
		success:function(data){
			var array = eval(data);
			$('#agrega-registros').html(array[0]);
			$('#pagination').html(array[1]);
		}
	});
	return false;
}
