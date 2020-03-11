<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=gb18030">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MOSTRAR PEDIDOS GENERALES</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Lato:300,400,500' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.css"/>
</head>
<body>
                    <!-- Large modal -->
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
            <table class="table">
                <tbody>
                    <tr>
                        <td>COMISIONISTA: </td>
                        <td id="comisionista"></td>
                    </tr>
                    <tr>
                        <td>NOMBRE: </td>
                        <td id="nombre"></td>
                    </tr>
                    <tr>
                        <td> APELLIDO MATERNO: </td>
                        <td id="materno"></td>
                    </tr>
                    <tr>
                        <td>APELLIDO PATERNO: </td>
                        <td id="paterno"></td>
                    </tr>
                    <tr>
                        <td> NUMERO DE TELEFONO: </td>
                        <td id="telefono"></td>
                    </tr>
                    <tr>
                        <td> CALLE: </td>
                        <td id="calle"></td>
                    </tr>
                    <tr>
                        <td> NO EXTERIOR: </td>
                        <td id="noexterior"></td>
                    </tr>
                    <tr>
                        <td> NO INTERIOR: </td>
                        <td id="nointerior"></td>
                    </tr>
                    <tr>
                        <td> COLONIA: </td>
                        <td id="colonia"></td>
                    </tr>
                    <tr>
                        <td> CÓDIGO POSTAL: </td>
                        <td id="cp"></td>
                    </tr>
                    <tr>
                        <td> CIUDAD: </td>
                        <td id="ciudad"></td>
                    </tr>
                    <tr>
                        <td> MUNICIPIO O DELEGACIÓN: </td>
                        <td id="municipio"></td>
                    </tr>
                    <tr>
                        <td> ESTADO: </td>
                        <td id="estado"></td>
                    </tr>
                    <tr>
                        <td> ENTRE LA CALLE: </td>
                        <td id="entrecalle"></td>
                    </tr>
                    <tr>
                        <td> Y LA CALLE: </td>
                        <td id="ycalle"></td>
                    </tr>
                    <tr>
                        <td> DESCRIPCIÓN ESPECIFICACIONES: </td>
                        <td id="especificaciones"></td>
                    </tr>
                    <tr>
                        <td> MONTO A PAGAR: </td>
                        <td id="monto"></td>
                    </tr>
                </tbody>
            </table>
                        </div>
                    </div>
                </div>
                    <div class="panel-body table-responsive" id="listadoregistros">
                        <table id="tbllistado" class="table table-striped table-bordered table-condensed table-hover">
                          <thead>
                            <th>ID</th>
                            <th>COMISIONISTA</th>
                            <th>MONTO</th>
                            <th>ESTADO</th>
                            <th>CUIDAD</th>
                            <th>TELEFONO</th>
                            <th>ACCIONES</th>
                          </thead>
                          <tbody>                            
                          </tbody>
                        </table>
                    </div>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                    Eliminar todos los pedidos
                    </button>

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLongTitle">¿ESTA SEGURO DE ELIMINAR TODOS LOS PEDIDOS?</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                            <button type="button" class="btn btn-primary" onclick="borrarbase()">Confirmar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/datatables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script type="text/javascript" src="../js/pedidosgeneral.js"></script>
</body>
</html>