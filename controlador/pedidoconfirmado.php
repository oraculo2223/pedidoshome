<?php
require_once "../modelo/Pedido.php";
session_start();
if (isset($_SESSION)) {
        $opcion= @$_GET["op"];
        $idpedidoa= @$_GET["idpedidoa"];
        $nickk=@$_POST['nickk'];
        $idpedido=@$_POST['idpedido'];
                $nombre=@$_POST['nombre1'];
                $materno=@$_POST['materno1'];
                $paterno=@$_POST['paterno1'];
                $telefono=@$_POST['telefono1'];
                $tienda=@$_POST['tienda1'];
                $ciudad=@$_POST['ciudad1'];
                $estado=@$_POST['estado1'];

                $calleg=@$_POST['calleg'];
                $noexteriorg=@$_POST['noexteriorg'];
                $nointeriorg=@$_POST['nointeriorg'];
                $coloniag=@$_POST['coloniag'];
                $cpg=@$_POST['cpg'];
                $municipiog=@$_POST['municipiog'];
                $entrecalleg=@$_POST['entrecalleg'];
                $ycalleg=@$_POST['ycalleg'];
                $especificacionesg=@$_POST['especificacionesg'];

                $link1=@$_POST['link11'];
                $art1=@$_POST['art11'];
                $link2=@$_POST['link21'];
                $art2=@$_POST['art21'];
                $link3=@$_POST['link31'];
                $art3=@$_POST['art31'];
                $link4=@$_POST['link41'];
                $art4=@$_POST['art41'];
                $link5=@$_POST['link51'];
                $art5=@$_POST['art51'];
                $link6=@$_POST['link61'];
                $art6=@$_POST['art61'];
                $link7=@$_POST['link71'];
                $art7=@$_POST['art71'];
                $link8=@$_POST['link81'];
                $art8=@$_POST['art81'];
                $link9=@$_POST['link91'];
                $art9=@$_POST['art91'];
                $link10=@$_POST['link101'];
                $art10=@$_POST['art101'];
                $monto=@$_POST['monto1'];

                $email=@$_POST['email1'];
                $contrasena=@$_POST['contrasena'];

                $comentarios=@$_POST['comentarios'];

        if ($opcion=='ver') {
            $rspta=$pedido->mostrar($idpedido);
                //Codificar el resultado utilizando json
                echo json_encode($rspta);
        }

        if ($opcion=='editar') {
            $rspta=$pedido->obtener($idpedido);
                //Codificar el resultado utilizando json
                echo json_encode($rspta);
        }

        if ($opcion=='actualizar') {
            
            if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
                {
                    $imagen=$_POST["imagenactual"];
                }
            else {
                $ext = explode(".", $_FILES["imagen"]["name"]);
                    if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"|| $_FILES['imagen']['type'] == "image/pdf")
                    {
                        $imagen = round(microtime(true)) . '.' . end($ext);
                        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/img/" . $imagen);
                    }
            }

            if (!file_exists($_FILES['imagen2']['tmp_name']) || !is_uploaded_file($_FILES['imagen2']['tmp_name']))
                {
                    $imagen2=$_POST["imagenactual2"];
                }
            else {
                $ext = explode(".", $_FILES["imagen2"]["name"]);
                    if ($_FILES['imagen2']['type'] == "image/jpg" || $_FILES['imagen2']['type'] == "image/jpeg" || $_FILES['imagen2']['type'] == "image/png"|| $_FILES['imagen2']['type'] == "image/pdf")
                    {
                        $imagen2 = round(microtime(true)) . '.' . end($ext);
                        move_uploaded_file($_FILES["imagen2"]["tmp_name"], "../files/img/" . $imagen2);
                    }
            }

            if (!file_exists($_FILES['imagen3']['tmp_name']) || !is_uploaded_file($_FILES['imagen3']['tmp_name']))
                {
                    $imagen3=$_POST["imagenactual3"];
                }
            else {
                $ext = explode(".", $_FILES["imagen3"]["name"]);
                    if ($_FILES['imagen3']['type'] == "image/jpg" || $_FILES['imagen3']['type'] == "image/jpeg" || $_FILES['imagen3']['type'] == "image/png"|| $_FILES['imagen3']['type'] == "image/pdf")
                    {
                        $imagen3 = round(microtime(true)) . '.' . end($ext);
                        move_uploaded_file($_FILES["imagen3"]["tmp_name"], "../files/img/" . $imagen3);
                    }
            }

            if (!file_exists($_FILES['imagen4']['tmp_name']) || !is_uploaded_file($_FILES['imagen4']['tmp_name']))
                {
                    $imagen4=$_POST["imagenactual4"];
                }
            else {
                $ext = explode(".", $_FILES["imagen4"]["name"]);
                    if ($_FILES['imagen4']['type'] == "image/jpg" || $_FILES['imagen4']['type'] == "image/jpeg" || $_FILES['imagen4']['type'] == "image/png"|| $_FILES['imagen4']['type'] == "image/pdf")
                    {
                        $imagen4 = round(microtime(true)) . '.' . end($ext);
                        move_uploaded_file($_FILES["imagen4"]["tmp_name"], "../files/img/" . $imagen4);
                    }
            }

            if (!file_exists($_FILES['imagen5']['tmp_name']) || !is_uploaded_file($_FILES['imagen5']['tmp_name']))
                {
                    $imagen5=$_POST["imagenactual5"];
                }
            else {
                $ext = explode(".", $_FILES["imagen5"]["name"]);
                    if ($_FILES['imagen5']['type'] == "image/jpg" || $_FILES['imagen5']['type'] == "image/jpeg" || $_FILES['imagen5']['type'] == "image/png"|| $_FILES['imagen5']['type'] == "image/pdf")
                    {
                        $imagen5 = round(microtime(true)) . '.' . end($ext);
                        move_uploaded_file($_FILES["imagen5"]["tmp_name"], "../files/img/" . $imagen5);
                    }
            }
            $rspta=$pedido->actualizar($idpedidoa,$nombre,$materno,$paterno,$telefono,$tienda,$ciudad,$estado,$calleg,$noexteriorg,$nointeriorg,$coloniag,$cpg,$municipiog,$entrecalleg,$ycalleg,$especificacionesg,$link1,$art1,$link2,$art2,$link3,$art3,$link4,$art4,$link5,$art5,$link6,$art6,$link7,$art7,$link8,$art8,$link9,$art9,$link10,$art10,$monto,$imagen,$imagen2,$imagen3,$imagen4,$imagen5,$email,$contrasena,$nickk);
                //Actualizar el registro solicitado del pedido
        }

        if ($opcion=='actualizarrechazado') {
            
            $rspta=$pedido->actualizarrechazado($idpedidoa,$comentarios);
                //Actualizar el registro solicitado del pedido rechazado
        }

        if ($opcion=='actualizarexitoso') {
            
            if (!file_exists($_FILES['imagen']['tmp_name']) || !is_uploaded_file($_FILES['imagen']['tmp_name']))
                {
                    $imagen=$_POST["imagenactual"];
                }
            else {
                $ext = explode(".", $_FILES["imagen"]["name"]);
                    if ($_FILES['imagen']['type'] == "image/jpg" || $_FILES['imagen']['type'] == "image/jpeg" || $_FILES['imagen']['type'] == "image/png"|| $_FILES['imagen']['type'] == "image/pdf")
                    {
                        $imagen = round(microtime(true)) . '.' . end($ext);
                        move_uploaded_file($_FILES["imagen"]["tmp_name"], "../files/img/" . $imagen);
                    }
            }
            
            $rspta=$pedido->actualizarexitoso($idpedidoa,$imagen);
                //Actualizar el registro solicitado del pedido exitoso
        }

        if ($opcion=='listar') {
            $nivel=$_SESSION['nivel'];
            if ($nivel==0) {
                $rspta=$pedido->listarpedidoconfirmado();
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
                        if ($reg->estatus==0) {
                            $estatus='  <button title="CANCELAR PEDIDO" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter0" onclick="establecer('.$reg->id.')">SIN ESTATUS</button>';
                        }
                        if ($reg->estatus==1) {
                            $estatus='  <button title="CANCELAR PEDIDO" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter1" onclick="verrechazado('.$reg->id.')">RECHAZADO</button>'.'  <button title="ELIMINAR PEDIDO" class="btn btn-danger btn-sm" onclick="eliminar('.$reg->id.')">ELIMINAR</button>';
                        }
                        if ($reg->estatus==2) {
                            $estatus='  <button title="CANCELAR PEDIDO" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter2" onclick="verexitoso('.$reg->id.')">EXITOSO</button>';
                        }

                        $data[]=array(
                            "0"=>$reg->id,
                            "1"=>$tipodepedido,
                            "2"=>$reg->comisionista,
                            "3"=>$reg->monto,
                            "4"=>$reg->estado,
                            "5"=>$reg->ciudad,
                            "6"=>$reg->telefono,
                            "7"=>$estatus,
                            "8"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                                        '  <button type="button" title="EDITAR PEDIDO" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter" onclick="editar('.$reg->id.')">EDITAR</button>'.
                                        '  <button title="ENTREGAR PEDIDO" class="btn btn-success btn-sm" onclick="entregado('.$reg->id.')">ENTREGADO</button>'.
                                        '  <button title="CANCELAR PEDIDO" class="btn btn-danger btn-sm" onclick="cancelarpedido('.$reg->id.')">Cancelar</button>'
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
                $rspta=$pedido->listarpedidoconfirmadoadmin($idadmin);
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
                        if ($reg->estatus==0) {
                            $estatus='  <button title="CANCELAR PEDIDO" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter0" onclick="establecer('.$reg->id.')">SIN ESTATUS</button>';
                        }
                        if ($reg->estatus==1) {
                            $estatus='  <button title="CANCELAR PEDIDO" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenter1" onclick="verrechazado('.$reg->id.')">RECHAZADO</button>'.'  <button title="ELIMINAR PEDIDO" class="btn btn-danger btn-sm" onclick="eliminar('.$reg->id.')">ELIMINAR</button>';
                        }
                        if ($reg->estatus==2) {
                            $estatus='  <button title="CANCELAR PEDIDO" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenter2" onclick="verexitoso('.$reg->id.')">EXITOSO</button>';
                        }

                        $data[]=array(
                            "0"=>$reg->id,
                            "1"=>$tipodepedido,
                            "2"=>$reg->comisionista,
                            "3"=>$reg->monto,
                            "4"=>$reg->estado,
                            "5"=>$reg->ciudad,
                            "6"=>$reg->telefono,
                            "7"=>$estatus,
                            "8"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'.
                                        '  <button type="button" title="EDITAR PEDIDO" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenter" onclick="editar('.$reg->id.')">EDITAR</button>'.
                                        '  <button title="ENTREGAR PEDIDO" class="btn btn-success btn-sm" onclick="entregado('.$reg->id.')">ENTREGADO</button>'.
                                        '  <button title="CANCELAR PEDIDO" class="btn btn-danger btn-sm" onclick="cancelarpedido('.$reg->id.')">Cancelar</button>'
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
                $rspta=$pedido->listarpedidoconfirmadocom($idcomisionista);
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
                        if ($reg->estatus==0) {
                            $estatus='  <button title="CANCELAR PEDIDO" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModalCenterc0" onclick="establecer('.$reg->id.')">SIN ESTATUS</button>';
                        }
                        if ($reg->estatus==1) {
                            $estatus='  <button title="CANCELAR PEDIDO" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#exampleModalCenterc1" onclick="verrechazado('.$reg->id.')">RECHAZADO</button>'.'  <button title="ELIMINAR PEDIDO" class="btn btn-danger btn-sm" onclick="eliminar('.$reg->id.')">ELIMINAR</button>';
                        }
                        if ($reg->estatus==2) {
                            $estatus='  <button title="CANCELAR PEDIDO" class="btn btn-success btn-sm" data-toggle="modal" data-target="#exampleModalCenterc2" onclick="verexitoso('.$reg->id.')">EXITOSO</button>';
                        }
                        $data[]=array(
                            "0"=>$reg->id,
                            "1"=>$tipodepedido,
                            "2"=>$reg->comisionista,
                            "3"=>$reg->monto,
                            "4"=>$reg->estado,
                            "5"=>$reg->ciudad,
                            "6"=>$reg->telefono,
                            "7"=>$estatus,
                            "8"=>'<button title="VER PEDIDO COMPLETO" class="btn btn-info btn-sm" data-toggle="modal" onclick="ver('.$reg->id.')" data-target=".bd-example-modal-lg">VER</button>'
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
} else {
    header('Location: ../login.php');
    exit;
}


?>
