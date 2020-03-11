tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            'copyHtml5',
		            'excelHtml5',
		            'csvHtml5',
		            'pdf'
		        ],
		"ajax":
				{
					url: 'controlador/pedidogeneral.php?op=listar',
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
    function ver(idpedido) {
        $.post("controlador/pedidogeneral.php?op=ver",{idpedido : idpedido}, function(data, status)
	{
		data = JSON.parse(data);		

        $("#comisionista").html(data.comisionista);
        $("#nombre").html(data.nombre);
        $("#materno").html(data.materno);
        $("#paterno").html(data.paterno);
        $("#telefono").html(data.telefono);
        $("#calle").html(data.calle);
        $("#noexterior").html(data.noexterior);
        $("#nointerior").html(data.nointerior);
        $("#colonia").html(data.colonia);
        $("#cp").html(data.cp);
        $("#ciudad").html(data.ciudad);
        $("#municipio").html(data.municipio);
        $("#estado").html(data.estado);
        $("#entrecalle").html(data.entrecalle);
        $("#ycalle").html(data.ycalle);
        $("#especificaciones").html(data.especificaciones);
        $("#monto").html("$ "+data.monto);

 	});
        
    }

    function eliminar(idpedido) {
        $.post("controlador/pedidogeneral.php?op=eliminar",{idpedido : idpedido}, function(data, status)
	{
		
        $('#tbllistado').DataTable().ajax.reload();
 	});
        
    }
    function borrarbase() {
        $.post("controlador/pedidogeneral.php?op=borrarbase", function(data, status)
	{
		
        $('#tbllistado').DataTable().ajax.reload();
 	});
        
    }