tabla=$('#tbllistado').dataTable(
	{
		"aProcessing": true,//Activamos el procesamiento del datatables
	    "aServerSide": true,//Paginación y filtrado realizados por el servidor
	    dom: 'Bfrtip',//Definimos los elementos del control de tabla
	    buttons: [		          
		            
		        ],
		"ajax":
				{
					url: 'controlador/pedido.php?op=listarentregados',
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
        $.post("controlador/pedido.php?op=verpedidoentregado",{idpedido : idpedido}, function(data, status)
	{
		data = JSON.parse(data);		

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

            var imagen=data.imagen;
            var imagen2=data.imagen2;
            var imagen3=data.imagen3;
            var imagen4=data.imagen4;
            var imagen5=data.imagen5;

            if (data.imagen==null || data.imagen=='') {
                 imagen='null.png';
            }
            if (data.imagen2==null || data.imagen2=='') {
                 imagen2='null.png';
            }
            if (data.imagen3==null || data.imagen3=='') {
                 imagen3='null.png';
            }
            if (data.imagen4==null || data.imagen4=='') {
                 imagen4='null.png';
            }
            if (data.imagen5==null || data.imagen5=='') {
                 imagen5='null.png';
            }
            $("#imagen").attr("src","files/img/"+imagen);
            $("#imagen2").attr("src","files/img/"+imagen2);
            $("#imagen3").attr("src","files/img/"+imagen3);
            $("#imagen4").attr("src","files/img/"+imagen4);
            $("#imagen5").attr("src","files/img/"+imagen5);
            $("#imagena").attr("href","files/img/"+imagen);
            $("#imagena2").attr("href","files/img/"+imagen2);
            $("#imagena3").attr("href","files/img/"+imagen3);
            $("#imagena4").attr("href","files/img/"+imagen4);
            $("#imagena5").attr("href","files/img/"+imagen5);
        } 
        if(data.tipodepedido==0) {
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

            var imagen=data.imagen;
            var imagen2=data.imagen2;
            var imagen3=data.imagen3;
            var imagen4=data.imagen4;
            var imagen5=data.imagen5;

            if (data.imagen==null || data.imagen=='') {
                 imagen='null.png';
            }
            if (data.imagen2==null || data.imagen2=='') {
                 imagen2='null.png';
            }
            if (data.imagen3==null || data.imagen3=='') {
                 imagen3='null.png';
            }
            if (data.imagen4==null || data.imagen4=='') {
                 imagen4='null.png';
            }
            if (data.imagen5==null || data.imagen5=='') {
                 imagen5='null.png';
            }

            $("#imageng").attr("src","files/img/"+imagen);
            $("#imagen2g").attr("src","files/img/"+imagen2);
            $("#imagen3g").attr("src","files/img/"+imagen3);
            $("#imagen4g").attr("src","files/img/"+imagen4);
            $("#imagen5g").attr("src","files/img/"+imagen5);
            $("#imagenag").attr("href","files/img/"+imagen);
            $("#imagena2g").attr("href","files/img/"+imagen2);
            $("#imagena3g").attr("href","files/img/"+imagen3);
            $("#imagena4g").attr("href","files/img/"+imagen4);
            $("#imagena5g").attr("href","files/img/"+imagen5);
        }	
        if (data.tipodepedido==2) {
            
            $("#tablahome").hide();
            $("#tablageneral").hide();
            $("#tablatelmex").show();
            $("#tablashein").hide();
            

            $("#comisionistat").html(data.comisionista);
            $("#contrasenat").html(data.contrasena);
            $("#emailt").html(data.email);
            $("#telefonot").html(data.telefono);
            $("#montot").html("$ "+data.monto);

            var imagen=data.imagen;
            var imagen2=data.imagen2;
            var imagen3=data.imagen3;
            var imagen4=data.imagen4;
            var imagen5=data.imagen5;

            if (data.imagen==null || data.imagen=='') {
                 imagen='null.png';
            }
            if (data.imagen2==null || data.imagen2=='') {
                 imagen2='null.png';
            }
            if (data.imagen3==null || data.imagen3=='') {
                 imagen3='null.png';
            }
            if (data.imagen4==null || data.imagen4=='') {
                 imagen4='null.png';
            }
            if (data.imagen5==null || data.imagen5=='') {
                 imagen5='null.png';
            }

            $("#imagent").attr("src","files/img/"+imagen);
            $("#imagen2t").attr("src","files/img/"+imagen2);
            $("#imagen3t").attr("src","files/img/"+imagen3);
            $("#imagen4t").attr("src","files/img/"+imagen4);
            $("#imagen5t").attr("src","files/img/"+imagen5);
            $("#imagenat").attr("href","files/img/"+imagen);
            $("#imagena2t").attr("href","files/img/"+imagen2);
            $("#imagena3t").attr("href","files/img/"+imagen3);
            $("#imagena4t").attr("href","files/img/"+imagen4);
            $("#imagena5t").attr("href","files/img/"+imagen5);
        }
        if (data.tipodepedido==3||data.tipodepedido==4) {
            
          $("#tablahome").hide();
          $("#tablageneral").hide();
          $("#tablatelmex").hide();
          $("#tablashein").show();
          

          $("#comisionistas").html(data.comisionista);
          $("#contrasenas").html(data.contrasena);
          $("#emails").html(data.email);
          $("#nicks").html(data.nickk);
          $("#montos").html("$ "+data.monto);

          var imagen=data.imagen;
          var imagen2=data.imagen2;
          var imagen3=data.imagen3;
          var imagen4=data.imagen4;
          var imagen5=data.imagen5;

          if (data.imagen==null || data.imagen=='') {
               imagen='null.png';
          }
          if (data.imagen2==null || data.imagen2=='') {
               imagen2='null.png';
          }
          if (data.imagen3==null || data.imagen3=='') {
               imagen3='null.png';
          }
          if (data.imagen4==null || data.imagen4=='') {
               imagen4='null.png';
          }
          if (data.imagen5==null || data.imagen5=='') {
               imagen5='null.png';
          }

          $("#imagens").attr("src","files/img/"+imagen);
          $("#imagen2s").attr("src","files/img/"+imagen2);
          $("#imagen3s").attr("src","files/img/"+imagen3);
          $("#imagen4s").attr("src","files/img/"+imagen4);
          $("#imagen5s").attr("src","files/img/"+imagen5);
          $("#imagenas").attr("href","files/img/"+imagen);
          $("#imagena2s").attr("href","files/img/"+imagen2);
          $("#imagena3s").attr("href","files/img/"+imagen3);
          $("#imagena4s").attr("href","files/img/"+imagen4);
          $("#imagena5s").attr("href","files/img/"+imagen5);
      }

 	});
        
    }
    function enviarpagar(idpedido) {
        $.post("controlador/pedido.php?op=enviarpagar",{idpedido : idpedido}, function(data, status)
        {
            
            $('#tbllistado').DataTable().ajax.reload();
        });
    }
    function pagar(idpedido) {
               $.post("controlador/pedido.php?op=ver",{idpedido : idpedido}, function(data, status){
                    data = JSON.parse(data);	
                    var totalpagar=data.monto*.35;
                    $("#exampleModalLabel").html('Pedido '+data.id+' total a pagar $'+totalpagar.toFixed(2)); 
                    $("#imagenactual").val(data.cpago);
                    $(".pagar").attr("id",data.id); 
                    $("#imagenp").attr("href","files/img/"+data.cpago);

                    var cpago=data.cpago;
                    if (data.cpago==null || data.cpago=='') {
                        cpago='null.png';
                    }
                    $("#imagenmuestra").attr("src","files/img/"+cpago); 
               });
     }
    function borrarbase() {
        $.post("controlador/pedido.php?op=borrarbase", function(data, status)
	{
		
        $('#tbllistado').DataTable().ajax.reload();
        $('#tbllistado2').DataTable().ajax.reload();
 	});
        
    }
    $(".pagar").click(function() {
     var idpedidoa=$(this).attr("id");

     $('#contact-form').on('submit', function(e){
         e.preventDefault();
         $(".pagar").prop("disabled",true);
         var formData = new FormData($("#contact-form")[0]);
         $.ajax({
             url : "controlador/pedido.php?op=pagar&idpedidoa="+idpedidoa,
             method : "POST",
             data: formData,
             contentType:false,
             processData:false,
             success: function(data){
                 location.reload();
             }
         })
     });
 });
    
