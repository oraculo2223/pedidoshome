$( "#nueva" ).on("click",function() {
    $('#selecver').hide();
    $('#form').show();
    $('#dir').hide();
    $.post("controlador/usuario.php?op=listarselectcom", function(data) {
      var data = JSON.parse(data);
      $("#idcomnueva").empty();
      $("#idcomnueva").append("<option value='0'>Elije...<option/>").selectpicker('refresh')
        $.each(data,function(index,element) {
          $("#idcomnueva").append("<option value="+ element.id +">" + element.nombre + "<option/>").selectpicker('refresh')
        });
      $('#idcomnueva').selectpicker('setStyle', 'btn-success');
    });
  });

$( "#verdir" ).on("click",function() {
    $('#form').hide();
    $('#selecver').show();
    $('#dir').hide();
      $.post("controlador/usuario.php?op=listarselectcom", function(data) {
        var data = JSON.parse(data);
        $("#idcomver").empty();
        $("#idcomver").append("<option>Elije...<option/>").selectpicker('refresh')
          $.each(data,function(index,element) {
            $("#idcomver").append("<option value="+ element.id +">" + element.nombre + "<option/>").selectpicker('refresh')
          });
        $('#idcomver').selectpicker('setStyle', 'btn-primary');
      });
});

$( "#idcomver" ).change(function() {
    var idcomisionista = $( this ).val();
    $('#dir').show();
    $.post("controlador/usuario.php?op=obtenerdirecciones",{idcomi : idcomisionista}, function(data){
      var data = JSON.parse(data);
      if (data=='') {
        $("#dir").empty();
        $("#dir").append("<div class='col-lg-4'>Sin direcciones<div/>")
      }
      else{
        $("#dir").empty();
        $.each(data, function(index, element) {
              $("#dir").append("<div class='col-lg-4'> <b>Nombre:</b> " + element.nombre + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>Apellido Paterno:</b> " + element.paterno + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>Apellido Materno:</b> " + element.materno + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>Código postal:</b> " + element.cp + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>Teléfono:</b> " + element.telefono + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>Estado:</b> " + element.estado + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>Municipio o Delegación:</b> " + element.municipio + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>Ciudad:</b> " + element.ciudad + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>Colonia:</b> " + element.colonia + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>Calle:</b> " + element.calle + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>No. exterio:</b> " + element.noexterior + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>No. interior:</b> " + element.nointerior + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>Entre Calle:</b> " + element.entrecalle + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>Y Calle:</b> " + element.ycalle + "<div/>")
              $("#dir").append("<div class='col-lg-4'> <b>Referencias del domicilio:</b> " + element.referencias + "<div/>")
              $("#dir").append("<button type='button' class='btn btn-danger' onclick='eliminar("+element.id+")'>ELIMINAR</button>")
              $("#dir").append("<hr style='width: 100%; color: black; height: 1px; background-color:#afa7a7;'>")
        });
      }
    });
  });

  $('#formulario').submit(function(e) {
		e.preventDefault();
		var formData = new FormData($("#formulario")[0]);
    var idcomisionista = $('#idcomnueva').selectpicker('val');
    if (idcomisionista==0) {
      bootbox.alert('Porfavor seleccione un comisionista para asociar la dirección');	
    }
    else{
      $.ajax({
        url: "controlador/usuario.php?op=guardardireccion&idcomisionista="+idcomisionista,
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
    
        success: function(datos)
        {  
             
            bootbox.alert(datos);	
            $('#formulario').trigger("reset");
        }
    
      });
    }

  });
  
  function eliminar(idpedido) {
    bootbox.confirm("Eliminar dirección?", function(result){
      if (result==true) {
          $.post("controlador/usuario.php?op=eliminardir",{iddirecion : idpedido}, function(data)
          {
            bootbox.alert(data);
            var idcom = $( "#idcomver" ).val()
            $.post("controlador/usuario.php?op=obtenerdirecciones",{idcomi : idcom}, function(data){
              var data = JSON.parse(data);
              if (data=='') {
                $("#dir").empty();
                $("#dir").append("<div class='col-lg-4'>Sin direcciones<div/>")
              }
              else{
                $("#dir").empty();
                $.each(data, function(index, element) {
                      $("#dir").append("<div class='col-lg-4'> <b>Nombre:</b> " + element.nombre + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>Apellido Paterno:</b> " + element.paterno + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>Apellido Materno:</b> " + element.materno + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>Código postal:</b> " + element.cp + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>Teléfono:</b> " + element.telefono + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>Estado:</b> " + element.estado + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>Municipio o Delegación:</b> " + element.municipio + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>Ciudad:</b> " + element.ciudad + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>Colonia:</b> " + element.colonia + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>Calle:</b> " + element.calle + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>No. exterio:</b> " + element.noexterior + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>No. interior:</b> " + element.nointerior + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>Entre Calle:</b> " + element.entrecalle + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>Y Calle:</b> " + element.ycalle + "<div/>")
                      $("#dir").append("<div class='col-lg-4'> <b>Referencias del domicilio:</b> " + element.referencias + "<div/>")
                      $("#dir").append("<button type='button' class='btn btn-danger' onclick='eliminar("+element.id+")'>ELIMINAR</button>")
                      $("#dir").append("<hr style='width: 100%; color: black; height: 1px; background-color:#afa7a7;'>")
                });
              }
            });
          });
      }
  })
}
