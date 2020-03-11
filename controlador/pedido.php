<?php
require_once "../modelo/Pedido.php";
session_start();
$opcion= @$_GET["op"];
$idpedidoa=@$_GET['idpedidoa'];
$idusuarioeditar=@$_GET['idusuarioeditar'];
$idusuario=@$_POST['idusuario'];
$idpedido=@$_POST['idpedido'];
$monto=@$_POST['montoeditar'];

if (isset($_SESSION)) {
        
    if ($opcion=='ver') {
        $rspta=$pedido->mostrar($idpedido);
            //Codificar el resultado utilizando json
            echo json_encode($rspta);
    }
    if ($opcion=='verpedidoentregado') {
        $rspta=$pedido->mostrarpedidoentregado($idpedido);
            //Codificar el resultado utilizando json
            echo json_encode($rspta);
    }
    if ($opcion=='confirmar') {
        $idadmin = $_SESSION['id'];
        $rspta=$pedido->confirmar($idpedido,$idadmin);
    }
    if ($opcion=='facturar') {
        $rspta=$pedido->facturar($idpedido);
    }
    if ($opcion=='enviarpagar') {
        $idadmin = $_SESSION['id'];
        $rspta=$pedido->enviarpagar($idpedido,$idadmin);
        //enviar pedido a pagado
    }
    if ($opcion=='eliminar') {
        $rspta=$pedido->obtener($idpedido);
        $sumarmonto=$rspta['monto'];
        $idcomisionista=$rspta['idusuario'];
        $montousado=$pedido->obtenermonto($idcomisionista);
        $nuevomonto=$montousado['usado']-$sumarmonto;
        $rspta=$pedido->acumularmonto($nuevomonto,$idcomisionista);
        $rspta=$pedido->eliminar($idpedido);
    }
    if ($opcion=='entregado') {
        $idadmin = $_SESSION['id'];
        $rspta=$pedido->entregado($idpedido,$idadmin);
            //Codificar el resultado utilizando json
    }
    if ($opcion=='cancelarpedido') {
        $rspta=$pedido->cancelarpedido($idpedido);
            //Codificar el resultado utilizando json
    }
    if ($opcion=='borrarbase') {
        $rspta=$pedido->borrarbase();
            //Codificar el resultado utilizando json
    }
    if ($opcion=='borrarpedidosfacturados') {
        $rspta=$pedido->borrarpedidosfacturados();
            //Codificar el resultado utilizando json
    }
    if ($opcion=='editarmonto') {
        $rspta=$pedido->obtenermonto($idusuario);
             //Codificar el resultado utilizando json
             echo json_encode($rspta);
    }
    if ($opcion=='actualizar') {
        $estatuscredito=$pedido->statuscredito($idusuarioeditar);
        $fecha=date('Y-m-d');
        $idadmin=$_SESSION['nick'];
            if ($estatuscredito->num_rows) {
                $rspta=$pedido->actualizarmonto($monto,$idusuarioeditar,$idadmin,$fecha);
                echo $rspta ? "Monto actualizado" : "No se pudieron actualizar todos los datos del monto";
            } else {
                $rspta=$pedido->insertarmonto($monto,$idusuarioeditar,$idadmin,$fecha);
                echo $rspta ? "Monto asignado" : "No se pudieron actualizar todos los datos del monto";
            }
    }
    if ($opcion=='vercreditoscomisionista') {
        $idcomisionista=$_SESSION['id'];
        $rspta=$pedido->vercreditoscomisionista($idcomisionista);
             //Codificar el resultado utilizando json
             echo json_encode($rspta);
    }

    if ($opcion=='listarusuarios') {
        $nivel=$_SESSION['nivel'];

        if ($nivel==0) {
            
            $rspta=$pedido->listarusuarios();
                $data=Array();
                while ($reg=$rspta->fetch_object()) {
                    $data[]=array(
                        "0"=>$reg->nick,
                        "1"=>$reg->email,
                        "2"=>($reg->nivel==1)?'administrador':'comisionista',
                        "3"=>'<button title="EDITAR USUARIO" class="btn btn-info btn-sm" data-toggle="modal" onclick="editar('.$reg->id.')" data-target="#exampleModalCenter">Editar</button>'.
                                    '  <button title="ELIMINAR USUARIO" class="btn btn-danger btn-sm" onclick="eliminar('.$reg->id.')">Eliminar</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        if ($nivel==1) {
            $rspta=$pedido->listarusuariosadmin();
                $data=Array();
                while ($reg=$rspta->fetch_object()) {
                    $data[]=array(
                        "0"=>$reg->nick,
                        "1"=>$reg->email,
                        "2"=>($reg->nivel==2)?'comisionista':'',
                        "3"=>'<button title="EDITAR USUARIO" class="btn btn-info btn-sm" data-toggle="modal" onclick="editar('.$reg->id.')" data-target="#exampleModalCenter">Editar</button>'.
                        '  <button title="ELIMINAR USUARIO" class="btn btn-danger btn-sm" onclick="eliminar('.$reg->id.')">Eliminar</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
    }

    if ($opcion=='listarcreditos') {
        $nivel=$_SESSION['nivel'];
            $rspta=$pedido->listarcreditos();
                $data=Array();
                while ($reg=$rspta->fetch_object()) {
                    $data[]=array(
                        "0"=>$reg->nick,
                        "1"=>$reg->email,
                        "2"=>$reg->monto,
                        "3"=>$reg->usado,
                        "4"=>$reg->monto-$reg->usado,
                        "5"=>$reg->idadmin,
                        "6"=>$reg->modificadopor,
                        "7"=>$reg->fecha,
                        "8"=>'<button title="Administrar monto" class="btn btn-info btn-sm" data-toggle="modal" onclick="asignarmonto('.$reg->id.')" data-target="#exampleModalCenter">Asignar monto</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
    }

    if ($opcion=='listar') {
        $nivel=$_SESSION['nivel'];

        if ($nivel==0) {
            
            $rspta=$pedido->listar();
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }
                    if ($reg->tipodepedido==3) {
                        $tipodepedido='SHEIN';
                    }
                    if ($reg->tipodepedido==4) {
                        $tipodepedido='WALMART';
                    }

                    $data[]=array(
                        "0"=>$reg->id,
                        "1"=>$tipodepedido,
                        "2"=>$reg->comisionista,
                        "3"=>$reg->monto,
                        "4"=>$reg->estado,
                        "5"=>$reg->ciudad,
                        "6"=>$reg->telefono,
                        "7"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                        ' <button title="CONFIRMAR PEDIDO" class="btn btn-success btn-sm" onclick="confirmar('.$reg->id.')">CONFIRMAR</button>'.
                                    '  <button title="ELIMINAR PEDIDO" class="btn btn-danger btn-sm" onclick="eliminar('.$reg->id.')">ELIMINAR</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        if ($nivel==1) {
            $rspta=$pedido->listar();
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }
                    if ($reg->tipodepedido==3) {
                        $tipodepedido='SHEIN';
                    }
                    if ($reg->tipodepedido==4) {
                        $tipodepedido='WALMART';
                    }

                    $data[]=array(
                        "0"=>$reg->id,
                        "1"=>$tipodepedido,
                        "2"=>$reg->comisionista,
                        "3"=>$reg->monto,
                        "4"=>$reg->estado,
                        "5"=>$reg->ciudad,
                        "6"=>$reg->telefono,
                        "7"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                        ' <button title="CONFIRMAR PEDIDO" class="btn btn-success btn-sm" onclick="confirmar('.$reg->id.')">CONFIRMAR</button>'.
                                    '  <button title="ELIMINAR PEDIDO" class="btn btn-danger btn-sm" onclick="eliminar('.$reg->id.')">ELIMINAR</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        //ingresa comisionista imprimimos solo sus pedidos realizados 
        if ($nivel==2) {
            $idusuario=$_SESSION['id'];
            $rspta=$pedido->listarpedidoscom($idusuario);
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }
                    if ($reg->tipodepedido==3) {
                        $tipodepedido='SHEIN';
                    }
                    if ($reg->tipodepedido==4) {
                        $tipodepedido='WALMART';
                    }

                    $data[]=array(
                        "0"=>$reg->id,
                        "1"=>$tipodepedido,
                        "2"=>$reg->comisionista,
                        "3"=>$reg->monto,
                        "4"=>$reg->estado,
                        "5"=>$reg->ciudad,
                        "6"=>$reg->telefono,
                        "7"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
    }

    if ($opcion=='listarentregados') {
        $nivel=$_SESSION['nivel'];
        if ($nivel==0) {
            $rspta=$pedido->listarentregados();
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }
                    if ($reg->tipodepedido==3) {
                        $tipodepedido='SHEIN';
                    }
                    if ($reg->tipodepedido==4) {
                        $tipodepedido='WALMART';
                    }

                    $data[]=array(
                        "0"=>$reg->id,
                        "1"=>$tipodepedido,
                        "2"=>$reg->comisionista,
                        "3"=>$reg->monto,
                        "4"=>$reg->estado,
                        "5"=>$reg->ciudad,
                        "6"=>$reg->telefono,
                        "7"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                        ' <button title="PAGAR" class="btn btn-success btn-sm" data-toggle="modal" onclick="pagar('.$reg->id.')" data-target="#exampleModal">PAGAR</button>'.
                        ' <button title="PAGAR PEDIDO" class="btn btn-danger btn-sm" onclick="enviarpagar('.$reg->id.')">PAGADO</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        if ($nivel==1) {
            $idadmin=$_SESSION['id'];
            $rspta=$pedido->listarentregadosadmin($idadmin);
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }
                    if ($reg->tipodepedido==3) {
                        $tipodepedido='SHEIN';
                    }
                    if ($reg->tipodepedido==4) {
                        $tipodepedido='WALMART';
                    }

                    $data[]=array(
                        "0"=>$reg->id,
                        "1"=>$tipodepedido,
                        "2"=>$reg->comisionista,
                        "3"=>$reg->monto,
                        "4"=>$reg->estado,
                        "5"=>$reg->ciudad,
                        "6"=>$reg->telefono,
                        "7"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                        ' <button title="PAGAR" class="btn btn-success btn-sm" data-toggle="modal" onclick="pagar('.$reg->id.')" data-target="#exampleModal">PAGAR</button>'.
                        ' <button title="PAGAR PEDIDO" class="btn btn-danger btn-sm" onclick="enviarpagar('.$reg->id.')">PAGADO</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        if ($nivel==2) {
            $idcomisionista=$_SESSION['id'];
            $rspta=$pedido->listarentregadoscom($idcomisionista);
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }
                    if ($reg->tipodepedido==3) {
                        $tipodepedido='SHEIN';
                    }
                    if ($reg->tipodepedido==4) {
                        $tipodepedido='WALMART';
                    }

                    $data[]=array(
                        "0"=>$reg->id,
                        "1"=>$tipodepedido,
                        "2"=>$reg->comisionista,
                        "3"=>$reg->monto,
                        "4"=>$reg->estado,
                        "5"=>$reg->ciudad,
                        "6"=>$reg->telefono,
                        "7"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                        ' <button title="PAGAR" class="btn btn-success btn-sm" data-toggle="modal" onclick="pagar('.$reg->id.')" data-target="#exampleModal">PAGAR</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        
    }
    if ($opcion=='listarpagados') {
        $nivel=$_SESSION['nivel'];
        if ($nivel==0) {
            $rspta=$pedido->listarpagados();
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }
                    if ($reg->tipodepedido==3) {
                        $tipodepedido='SHEIN';
                    }
                    if ($reg->tipodepedido==4) {
                        $tipodepedido='WALMART';
                    }

                    $data[]=array(
                        "0"=>$reg->id,
                        "1"=>$tipodepedido,
                        "2"=>$reg->comisionista,
                        "3"=>$reg->monto,
                        "4"=>$reg->estado,
                        "5"=>$reg->ciudad,
                        "6"=>$reg->telefono,
                        "7"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                        ' <button title="COMPROBANTE" class="btn btn-success btn-sm" data-toggle="modal" onclick="pagar('.$reg->id.')" data-target="#exampleModal">COMPROBANTE</button>'.
                        ' <button title="FACTURAR PEDIDO" class="btn btn-danger btn-sm" onclick="facturar('.$reg->id.')">FACTURAR</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        if ($nivel==1) {
            $idadmin=$_SESSION['id'];
            $rspta=$pedido->listarpagadosadmin($idadmin);
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }
                    if ($reg->tipodepedido==3) {
                        $tipodepedido='SHEIN';
                    }
                    if ($reg->tipodepedido==4) {
                        $tipodepedido='WALMART';
                    }

                    $data[]=array(
                        "0"=>$reg->id,
                        "1"=>$tipodepedido,
                        "2"=>$reg->comisionista,
                        "3"=>$reg->monto,
                        "4"=>$reg->estado,
                        "5"=>$reg->ciudad,
                        "6"=>$reg->telefono,
                        "7"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                        ' <button title="COMPROBANTE" class="btn btn-success btn-sm" data-toggle="modal" onclick="pagar('.$reg->id.')" data-target="#exampleModal">COMPROBANTE</button>'.
                        ' <button title="FACTURAR PEDIDO" class="btn btn-danger btn-sm" onclick="facturar('.$reg->id.')">FACTURAR</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        if ($nivel==2) {
            $idcomisionista=$_SESSION['id'];
            $rspta=$pedido->listarpagadoscom($idcomisionista);
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }
                    if ($reg->tipodepedido==3) {
                        $tipodepedido='SHEIN';
                    }
                    if ($reg->tipodepedido==4) {
                        $tipodepedido='WALMART';
                    }

                    $data[]=array(
                        "0"=>$reg->id,
                        "1"=>$tipodepedido,
                        "2"=>$reg->comisionista,
                        "3"=>$reg->monto,
                        "4"=>$reg->estado,
                        "5"=>$reg->ciudad,
                        "6"=>$reg->telefono,
                        "7"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                        ' <button title="COMPROBANTE" class="btn btn-success btn-sm" data-toggle="modal" onclick="pagar('.$reg->id.')" data-target="#exampleModal">COMPROBANTE</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        
    }
    if ($opcion=='listarfacturados') {
        $nivel=$_SESSION['nivel'];
        if ($nivel==0) {
            $rspta=$pedido->listarfacturados();
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }
                    if ($reg->tipodepedido==3) {
                        $tipodepedido='SHEIN';
                    }
                    if ($reg->tipodepedido==4) {
                        $tipodepedido='WALMART';
                    }

                    $data[]=array(
                        "0"=>$reg->id,
                        "1"=>$tipodepedido,
                        "2"=>$reg->comisionista,
                        "3"=>$reg->monto,
                        "4"=>$reg->estado,
                        "5"=>$reg->ciudad,
                        "6"=>$reg->telefono,
                        "7"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                        ' <button title="COMPROBANTE" class="btn btn-success btn-sm" data-toggle="modal" onclick="pagar('.$reg->id.')" data-target="#exampleModal">COMPROBANTE</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        if ($nivel==1) {
            $idadmin=$_SESSION['id'];
            $rspta=$pedido->listarfacturadosadmin($idadmin);
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }
                    if ($reg->tipodepedido==3) {
                        $tipodepedido='SHEIN';
                    }
                    if ($reg->tipodepedido==4) {
                        $tipodepedido='WALMART';
                    }

                    $data[]=array(
                        "0"=>$reg->id,
                        "1"=>$tipodepedido,
                        "2"=>$reg->comisionista,
                        "3"=>$reg->monto,
                        "4"=>$reg->estado,
                        "5"=>$reg->ciudad,
                        "6"=>$reg->telefono,
                        "7"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                        ' <button title="COMPROBANTE" class="btn btn-success btn-sm" data-toggle="modal" onclick="pagar('.$reg->id.')" data-target="#exampleModal">COMPROBANTE</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        if ($nivel==2) {
            $idcomisionista=$_SESSION['id'];
            $rspta=$pedido->listarfacturadoscom($idcomisionista);
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }
                    if ($reg->tipodepedido==3) {
                        $tipodepedido='SHEIN';
                    }
                    if ($reg->tipodepedido==4) {
                        $tipodepedido='WALMART';
                    }

                    $data[]=array(
                        "0"=>$reg->id,
                        "1"=>$tipodepedido,
                        "2"=>$reg->comisionista,
                        "3"=>$reg->monto,
                        "4"=>$reg->estado,
                        "5"=>$reg->ciudad,
                        "6"=>$reg->telefono,
                        "7"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                        ' <button title="COMPROBANTE" class="btn btn-success btn-sm" data-toggle="modal" onclick="pagar('.$reg->id.')" data-target="#exampleModal">COMPROBANTE</button>'
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        
    }
    if ($opcion=='listarentregadosstats') {
        $nivel=$_SESSION['nivel'];
        if ($nivel==0) {
            $rspta=$pedido->listarentregadosstats();
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }

                    $data[]=array(
                        "0"=>$reg->numeropedido,
                        "1"=>$tipodepedido,
                        "2"=>$reg->monto,
                        "3"=>$reg->comisionista,
                        "4"=>$reg->porcentajecom*.15,
                        "5"=>$reg->administrador,
                        "6"=>$reg->porcentajeadmin*.0875,
                        "7"=>$reg->gatosoperativos*.2625,
                        "8"=>($reg->porcentajecom*.15)+($reg->porcentajeadmin*.0875)+($reg->gatosoperativos*.2625)
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        if ($nivel==1) {
            $idadmin=$_SESSION['id'];
            $rspta=$pedido->listarentregadosstatsadmin($idadmin);
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }

                    $data[]=array(
                        "0"=>$reg->numeropedido,
                        "1"=>$tipodepedido,
                        "2"=>$reg->monto,
                        "3"=>$reg->comisionista,
                        "4"=>$reg->porcentajecom*.15,
                        "5"=>$reg->administrador,
                        "6"=>$reg->porcentajeadmin*.0875,
                        "7"=>$reg->gatosoperativos*.2625,
                        "8"=>($reg->porcentajecom*.15)+($reg->porcentajeadmin*.0875)+($reg->gatosoperativos*.2625)
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
    }
    if ($opcion=='listarpagadosstats') {
        $nivel=$_SESSION['nivel'];
        if ($nivel==0) {
            $rspta=$pedido->listarpagadosstats();
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }

                    $data[]=array(
                        "0"=>$reg->numeropedido,
                        "1"=>$tipodepedido,
                        "2"=>$reg->monto,
                        "3"=>$reg->comisionista,
                        "4"=>$reg->porcentajecom*.15,
                        "5"=>$reg->administrador,
                        "6"=>$reg->porcentajeadmin*.0875,
                        "7"=>$reg->gatosoperativos*.2625,
                        "8"=>($reg->porcentajecom*.15)+($reg->porcentajeadmin*.0875)+($reg->gatosoperativos*.2625)
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
        if ($nivel==1) {
            $idadmin=$_SESSION['id'];
            $rspta=$pedido->listarpagadosstatsadmin($idadmin);
                $data=Array();
                while ($reg=$rspta->fetch_object()) {

                    if ($reg->tipodepedido==0) {
                        $tipodepedido='GENERAL';
                    }
                    if ($reg->tipodepedido==1) {
                        $tipodepedido='HOME';
                    }
                    if ($reg->tipodepedido==2) {
                        $tipodepedido='TELMEX';
                    }

                    $data[]=array(
                        "0"=>$reg->numeropedido,
                        "1"=>$tipodepedido,
                        "2"=>$reg->monto,
                        "3"=>$reg->comisionista,
                        "4"=>$reg->porcentajecom*.15,
                        "5"=>$reg->administrador,
                        "6"=>$reg->porcentajeadmin*.0875,
                        "7"=>$reg->gatosoperativos*.2625,
                        "8"=>($reg->porcentajecom*.15)+($reg->porcentajeadmin*.0875)+($reg->gatosoperativos*.2625)
                    );
                }
                $results = array(
                    "sEcho"=>1,  // informacion para el data table
                    "iTotalRecords"=>count($data),//total registros
                    "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                    "aaData"=>$data
                );
                echo json_encode($results);
        }
    }
    if ($opcion=='listarfacturadosstats') {
            $nivel=$_SESSION['nivel'];
            if ($nivel==0) {
                $rspta=$pedido->listarfacturadosstats();
                    $data=Array();
                    while ($reg=$rspta->fetch_object()) {

                        if ($reg->tipodepedido==0) {
                            $tipodepedido='GENERAL';
                        }
                        if ($reg->tipodepedido==1) {
                            $tipodepedido='HOME';
                        }
                        if ($reg->tipodepedido==2) {
                            $tipodepedido='TELMEX';
                        }
                        if ($reg->tipodepedido==3) {
                            $tipodepedido='SHEIN';
                        }
                        if ($reg->tipodepedido==4) {
                            $tipodepedido='WALMART';
                        }

                        $data[]=array(
                            "0"=>$reg->numeropedido,
                            "1"=>$tipodepedido,
                            "2"=>$reg->monto,
                            "3"=>$reg->comisionista,
                            "4"=>$reg->porcentajecom*.15,
                            "5"=>$reg->administrador,
                            "6"=>$reg->porcentajeadmin*.0875,
                            "7"=>$reg->gatosoperativos*.2625,
                            "8"=>($reg->porcentajecom*.15)+($reg->porcentajeadmin*.0875)+($reg->gatosoperativos*.2625)
                        );
                    }
                    $results = array(
                        "sEcho"=>1,  // informacion para el data table
                        "iTotalRecords"=>count($data),//total registros
                        "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                        "aaData"=>$data
                    );
                    echo json_encode($results);
            }
            if ($nivel==1) {
                $idadmin=$_SESSION['id'];
                $rspta=$pedido->listarfacturadosstatsadmin($idadmin);
                    $data=Array();
                    while ($reg=$rspta->fetch_object()) {

                        if ($reg->tipodepedido==0) {
                            $tipodepedido='GENERAL';
                        }
                        if ($reg->tipodepedido==1) {
                            $tipodepedido='HOME';
                        }
                        if ($reg->tipodepedido==2) {
                            $tipodepedido='TELMEX';
                        }
                        if ($reg->tipodepedido==3) {
                            $tipodepedido='SHEIN';
                        }
                        if ($reg->tipodepedido==4) {
                            $tipodepedido='WALMART';
                        }

                        $data[]=array(
                            "0"=>$reg->numeropedido,
                            "1"=>$tipodepedido,
                            "2"=>$reg->monto,
                            "3"=>$reg->comisionista,
                            "4"=>$reg->porcentajecom*.15,
                            "5"=>$reg->administrador,
                            "6"=>$reg->porcentajeadmin*.0875,
                            "7"=>$reg->gatosoperativos*.2625,
                            "8"=>($reg->porcentajecom*.15)+($reg->porcentajeadmin*.0875)+($reg->gatosoperativos*.2625)
                        );
                    }
                    $results = array(
                        "sEcho"=>1,  // informacion para el data table
                        "iTotalRecords"=>count($data),//total registros
                        "iTotalDisplayRecords"=>count($data),//total registos para visualizar
                        "aaData"=>$data
                    );
                    echo json_encode($results);
            }
        }
        if ($opcion=='pagar') {
            
            if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
                {
                    $imagen=$_POST["imagenactual"];
                }
            else {
                $ext = explode(".", $_FILES["imagen"]["name"]);
                    if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"|| $_FILES['imagen']['type'] == "image/pdf")
                    {
                        $imagen = round(microtime(true)) . '.' . end($ext);
                        move_uploaded_file($_FILES["imagen"]["tmp_name"], "files/img/" . $imagen);
                    }
            }
            $rspta=$pedido->pagar($idpedidoa,$imagen);
                //Actualizar el registro solicitado del pedido
        }
} else {
    header('Location: ../login.php');
    exit;
}


?>
