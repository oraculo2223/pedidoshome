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
					url: 'controlador/pedido.php?op=listarpedidoscom',
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
        $.post("controlador/pedido.php?op=ver",{idpedido : idpedido}, function(data, status)
	{
		data = JSON.parse(data);		

        $("#comisionista").html(data.comisionista);
        $("#nombre").html(data.nombre);
        $("#materno").html(data.materno);
        $("#paterno").html(data.paterno);
        $("#telefono").html(data.telefono);
        $("#tienda").html(data.tienda);
        $("#ciudad").html(data.ciudad);
        $("#estado").html(data.estado);
        $("#link1").html(data.link1);
        $("#art1").html(data.art1);
        $("#link2").html(data.link2);
        $("#art2").html(data.art2);
        $("#link3").html(data.link3);
        $("#art3").html(data.art3);
        $("#link4").html(data.link4);
        $("#art4").html(data.art4);
        $("#link5").html(data.link5);
        $("#art5").html(data.art5);
        $("#link6").html(data.link6);
        $("#art6").html(data.art6);
        $("#link7").html(data.link7);
        $("#art7").html(data.art7);
        $("#link8").html(data.link8);
        $("#art8").html(data.art8);
        $("#link9").html(data.link9);
        $("#art9").html(data.art9);
        $("#link10").html(data.link10);
        $("#art10").html(data.art10);
        $("#monto").html("$ "+data.monto);

 	});
        
    }


