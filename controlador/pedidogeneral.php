<?php
require_once "../modelo/PedidoGeneral.php";

$opcion= @$_GET["op"];
$idpedido=@$_POST['idpedido'];

if ($opcion=='ver') {
    $rspta=$PedidoGeneral->mostrar($idpedido);
 		//Codificar el resultado utilizando json
 		echo json_encode($rspta);
}
if ($opcion=='eliminar') {
    $rspta=$PedidoGeneral->eliminar($idpedido);
 		//Codificar el resultado utilizando json
}
if ($opcion=='borrarbase') {
    $rspta=$PedidoGeneral->borrarbase($idpedido);
 		//Codificar el resultado utilizando json
}

if ($opcion=='listar') {
    $rspta=$PedidoGeneral->listar();
            $data=Array();
            while ($reg=$rspta->fetch_object()) {
                $data[]=array(
                    "0"=>$reg->id,
                    "1"=>$reg->comisionista,
                    "2"=>$reg->monto,
                    "3"=>$reg->estado,
                    "4"=>$reg->ciudad,
                    "5"=>$reg->telefono,
                    "6"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-success" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                                '  <button title="ELIMINAR PEDIDO" class="btn btn-danger" onclick="eliminar('.$reg->id.')">ELIMINAR</button>'
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

?>