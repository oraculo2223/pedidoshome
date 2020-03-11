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
					url: 'controlador/pedido.php?op=listar',
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
        $('.modal-title').html("ORDEN "+data.id);
        if (data.tipodepedido==true) {
            
            $("#tablahome").show();
            $("#tablageneral").hide();
            $("#tablatelmex").hide();
            $("#tablashein").hide();
            

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
        }
        if (data.tipodepedido==2) {
            
            $("#tablahome").hide();
            $("#tablageneral").hide();
            $("#tablashein").hide();
            $("#tablatelmex").show();
            

            $("#comisionistat").html(data.comisionista);
            $("#contrasenat").html(data.contrasena);
            $("#emailt").html(data.email);
            $("#telefonot").html(data.telefono);
            $("#montot").html("$ "+data.monto);
        }
        if (data.tipodepedido==3||data.tipodepedido==4) {
            
            $("#tablahome").hide();
            $("#tablageneral").hide();
            $("#tablashein").show();
            $("#tablatelmex").hide();
            

            $("#comisionistas").html(data.comisionista);
            $("#contrasenas").html(data.contrasena);
            $("#emails").html(data.email);
            $("#nicks").html(data.nickk);
            $("#montos").html("$ "+data.monto);
        }
        if (data.tipodepedido==0){
            $("#tablageneral").show();
            $("#tablahome").hide();
            $("#tablatelmex").hide();
            $("#tablashein").hide();
            

            $("#comisionistag").html(data.comisionista);
            $("#nombreg").html(data.nombre);
            $("#maternog").html(data.materno);
            $("#paternog").html(data.paterno);
            $("#telefonog").html(data.telefono);
            $("#calle").html(data.calle);
            $("#ciudadg").html(data.ciudad);
            $("#estadog").html(data.estado);
            $("#noexterior").html(data.noexterior);
            $("#nointerior").html(data.nointerior);
            $("#colonia").html(data.colonia);
            $("#cp").html(data.cp);
            $("#municipio").html(data.municipio);
            $("#entrecalle").html(data.entrecalle);
            $("#ycalle").html(data.ycalle);
            $("#especificaciones").html(data.especificaciones);
            $("#montog").html("$ "+data.monto);

        }
 	});
        
    }

    function confirmar(idpedido) {
        $.post("controlador/pedido.php?op=confirmar",{idpedido : idpedido}, function(data, status)
	{
		
        $('#tbllistado').DataTable().ajax.reload();
 	});
    }

    function eliminar(idpedido) {
        $.post("controlador/pedido.php?op=eliminar",{idpedido : idpedido}, function(data, status)
	{
		
        $('#tbllistado').DataTable().ajax.reload();
 	});
        
    }
    $("#contact-form").hide();
    $("#contact-form1").hide();
    $("#contact-form2").hide();
    $("#contact-form3").hide();
    $("#contact-form4").hide();
            /*tipo de pedido*/
    $("#tipodepedido").change(function(){
        var tipodepedido = $("#tipodepedido option:selected").val();
             if (tipodepedido==1) {
                $("#nombrepedido").html('Registrar pedido home');
                $("#contact-form1").hide();
                $("#contact-form2").hide();
                $("#contact-form3").hide();
                $("#contact-form4").hide();
                $("#contact-form").show();
             }
             if (tipodepedido==2) {
                $("#nombrepedido").html('Registrar pedido general');
                $("#contact-form").hide();
                $("#contact-form2").hide();
                $("#contact-form3").hide();
                $("#contact-form4").hide();
                $("#contact-form1").show();
            }
            if (tipodepedido==3) {
                $("#nombrepedido").html('Registrar pedido telmex');
                $("#contact-form").hide();
                $("#contact-form1").hide();
                $("#contact-form3").hide();
                $("#contact-form4").hide();
                $("#contact-form2").show();
            }
            if (tipodepedido==4) {
                $("#nombrepedido").html('Registrar pedido shein');
                $("#contact-form").hide();
                $("#contact-form1").hide();
                $("#contact-form2").hide();
                $("#contact-form4").hide();
                $("#contact-form3").show();
            }
            if (tipodepedido==5) {
                $("#nombrepedido").html('Registrar pedido walmart');
                $("#contact-form").hide();
                $("#contact-form1").hide();
                $("#contact-form2").hide();
                $("#contact-form3").hide();
                $("#contact-form4").show();
            }
    });/* end tipo de pedido*/
    $("#frmAcceso").on('submit',function(e){
        e.preventDefault();
        logina=$("#logina").val();
        clavea=$("#clavea").val();

        $.post("controlador/usuario.php?op=verificar",
            {"logina":logina,"clavea":clavea},
            function(data)
        {
            var result = $.parseJSON(data);
            
            if (data=="null")
            {
                bootbox.alert("Usuario y/o Password incorrectos");
            }
            else{
                if (result.nivel==2)
                {
                    $(location).attr("href","login.php");            
                }
                if (result.nivel==1)
                {
                    $(location).attr("href","mostrarpedidos.php");            
                }
                if (result.nivel==0)
                {
                    $(location).attr("href","mostrarpedidos.php");            
                }
            }
        });
    })
        // A $( document ).ready() block.
    $( document ).ready(function() {

        $.post("controlador/pedido.php?op=vercreditoscomisionista", function(data, status)
	    {
            data = JSON.parse(data);
            if (data) {
                var disponible =data.monto-data.usado;
                $("#montoasignado").html("$"+data.monto);
                $("#montodisponible").html("$"+data.usado);
                $("#montod").html("$"+disponible);
                $("#levantarpedidos").show();
            } else {
                $("#montonoasignado").html("No cuenta con montos asignados no es posible realizar pedidos");
                $("#montototal").hide();
                $("#montogastado").hide();
                $("#montodisp").hide();
            }
 	    });
    });



