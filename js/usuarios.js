$("#btnGuardar").click(function(e) {
    e.preventDefault(); 
    var formData = new FormData($("#formulario")[0]);
    console.log(formData);
    $.ajax({
		url: "controlador/usuario.php?op=guardar",
	    type: "POST",
	    data: formData,
	    contentType: false,
	    processData: false,

	    success: function(datos)
	    {                    
	          bootbox.alert(datos);	          
	    }

	});
  
});
tabla=$('#listadousuarios').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url: 'controlador/pedido.php?op=listarusuarios',
					type : "get",
					dataType : "json",						
					error: function(e){
						console.log(e.responseText);	
					}
				},
		"bDestroy": true,
		"iDisplayLength": 100,//Paginación
	    "order": [[ 0, "desc" ]]//Ordenar (columna,orden)
	}).DataTable();

tabla2=$('#listadocreditos').dataTable(
		{
			"aProcessing": true,//Activamos el procesamiento del datatables
			"aServerSide": true,//Paginación y filtrado realizados por el servidor
			dom: 'Bfrtip',//Definimos los elementos del control de tabla
			buttons: [		          
						
					],
			"ajax":
					{
						url: 'controlador/pedido.php?op=listarcreditos',
						type : "get",
						dataType : "json",						
						error: function(e){
							console.log(e.responseText);	
						}
					},
			"bDestroy": true,
			"iDisplayLength": 100,//Paginación
			"order": [[ 0, "desc" ]]//Ordenar (columna,orden)
		}).DataTable();
	
	function editar(idusuario) {
        $.post("controlador/usuario.php?op=editar",{idusuario : idusuario}, function(data, status)
	{
        data = JSON.parse(data);
        console.log(data);
        $("#exampleModalLongTitle").html('Editar Usuario '+data.nick);
        $("#nickeditar").val(data.nick);
        $("#emaileditar").val(data.email);
		$(".actualizar").attr("id",data.id);
		$("#passeditar").val('');
 	});
	}
	function asignarmonto(idusuario) {
        $.post("controlador/pedido.php?op=editarmonto",{idusuario : idusuario}, function(data, status)
	{
        data = JSON.parse(data);
		console.log(data);
		if (data) {
			$("#montoeditar").val(data.monto);
			$("#exampleModalLongTitle").html('Editar Monto')
		} else {
			$("#montoeditar").val(0);
			$("#exampleModalLongTitle").html('Asignar Monto')
		}
		$(".actualizar").attr("id",idusuario);
 	});
	}
	function eliminar(idusuario){
	bootbox.confirm("¿Está Seguro de eliminar el usuario?", function(result){
		if(result)
        {
        	$.post("controlador/usuario.php?op=eliminar", {idusuario : idusuario}, function(e){
        		bootbox.alert(e);
				tabla.ajax.reload();
				tabla2.ajax.reload();
        	});	
        }
	})
}
	
	$('#formulario2').submit(function(e) {
		e.preventDefault();
		var formData = new FormData($("#formulario2")[0]);
		var idusuario = $('.actualizar').attr('id');
		console.log(formData);
		$.ajax({
			url: "controlador/usuario.php?op=actualizar&idusuarioeditar="+idusuario,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
	
			success: function(datos)
			{  
				$('#listadousuarios').DataTable().ajax.reload();       
				  bootbox.alert(datos);	

			}
	
		});
	});

	$('#formulariomonto').submit(function(e) {
		e.preventDefault();
		var formData = new FormData($("#formulariomonto")[0]);
		var idusuario = $('.actualizar').attr('id');
		console.log(formData);
		$.ajax({
			url: "controlador/pedido.php?op=actualizar&idusuarioeditar="+idusuario,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
	
			success: function(datos)
			{  
				  bootbox.alert(datos);	
				  tabla2.ajax.reload();

			}
	
		});
	});
