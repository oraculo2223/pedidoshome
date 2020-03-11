<?php
require_once "../modelo/Usuario.php";
session_start();
$opcion= @$_GET["op"];
$idusuarioeditar= @$_GET["idusuarioeditar"];
$idusuario=@$_POST['idusuario'];
$nick=@$_POST['nick'];
$email=@$_POST['email'];
$pass=@$_POST['pass'];
$nickeditar=@$_POST['nickeditar'];
$emaileditar=@$_POST['emaileditar'];
$passeditar=@$_POST['passeditar'];
$nivel=@$_POST['nivel'];
$iddirecion=@$_POST['iddirecion'];


$idcomi=@$_POST['idcomi'];
$nombre=@$_POST['nombre'];
$paterno=@$_POST['paterno'];
$materno=@$_POST['materno'];
$cp=@$_POST['cp'];
$telefono=@$_POST['telefono'];
$estado=@$_POST['estado'];
$municipio=@$_POST['municipio'];
$ciudad=@$_POST['ciudad'];
$colonia=@$_POST['colonia'];
$calle=@$_POST['calle'];
$noexterior=@$_POST['noexterior'];
$nointerior=@$_POST['nointerior'];
$entrecalle=@$_POST['entrecalle'];
$ycalle=@$_POST['ycalle'];
$referencias=@$_POST['referencias'];


$clavehash=hash("SHA256",$pass);
$clavehasheditar=hash("SHA256",$passeditar);

if ($opcion=='guardar') {
    $rspta=$usuario->validaremail($email);
    if ($nick==''||$email==''||$pass==''||$nivel==0) {
        echo 'favor de llenar el formulario';
    }
    else {
    if (mysqli_num_rows($rspta) > 0) {
        echo 'El email proporcionado ya existe';
    }
    else{
        $rspta=$usuario->insertar($nick,$email,$clavehash,$nivel);
        echo $rspta ? "Usuario registrado" : "No se pudieron registrar todos los datos del usuario";
    }
    }
}

if ($opcion=='actualizar') {
    $rspta=$usuario->validaremailactualizar($emaileditar, $idusuarioeditar);
    if (mysqli_num_rows($rspta) > 0) {
        echo 'El email proporcionado pertenece a otro usuario intente nuevamente';
    }
    else{
        $rspta=$usuario->actualizar($nickeditar,$emaileditar,$clavehasheditar,$idusuarioeditar);
        echo $rspta ? "Usuario actualizado" : "No se pudieron actualizar todos los datos del usuario";
    }
}

if ($opcion=='eliminar') {
        $rspta=$usuario->eliminar($idusuario);
 		echo $rspta ? "Usuario eliminado" : "Usuario no se puede eliminar";
}

if ($opcion=='verificar') {
    $logina=$_POST['logina'];
    $clavea=$_POST['clavea'];
    $clavehash=hash("SHA256",$clavea);
    $rspta=$usuario->verificar($logina, $clavehash);
    $fetch=$rspta->fetch_object();
    if (isset($fetch)) {
         //Declaramos las variables de sesión
         $_SESSION['id']=$fetch->id;
         $_SESSION['nick']=$fetch->nick;
         $_SESSION['email']=$fetch->email;
         $_SESSION['nivel']=$fetch->nivel;
        
    }
    echo json_encode($fetch);
}
if ($opcion=='editar') {
    $rspta=$usuario->obtener($idusuario);
 		//Codificar el resultado utilizando json
         echo json_encode($rspta);
}

if ($opcion=='obtenerdirecciones') {
    $rspta=$usuario->obtenerdirecciones($idcomi);
    $data=Array();
    while ($reg=$rspta->fetch_object()) {
        $data[]=array(
            "id"=>$reg->id,
            "nombre"=>$reg->nombre,
            "paterno"=>$reg->paterno,
            "materno"=>$reg->materno,
            "cp"=>$reg->cp,
            "telefono"=>$reg->telefono,
            "estado"=>$reg->estado,
            "municipio"=>$reg->municipio,
            "ciudad"=>$reg->ciudad,
            "colonia"=>$reg->colonia,
            "calle"=>$reg->calle,
            "noexterior"=>$reg->noexterior,
            "nointerior"=>$reg->nointerior,
            "entrecalle"=>$reg->entrecalle,
            "ycalle"=>$reg->ycalle,
            "referencias"=>$reg->referencias
        );
    }
    echo json_encode($data);
}

if ($opcion=='listarselectcom') {
    $rspta=$usuario->listarselectcom();
    $data=Array();
    while ($reg=$rspta->fetch_object()) {
        $data[]=array(
            "id"=>$reg->id,
            "nombre"=>$reg->nick
        );
    }
    echo json_encode($data);
}

if ($opcion=='guardardireccion') {
    $rspta=$usuario->guardardireccion($idcomi,$nombre,$paterno,$materno,$cp,$telefono,$estado,$municipio,$ciudad,$colonia,$calle,$noexterior,$nointerior,$entrecalle,$ycalle,$referencias);
        echo $rspta ? "direccion registrada" : "ERROR No se pudieron registrar todos los datos del usuario";
}

if ($opcion=='eliminardir') {
    $rspta=$usuario->eliminardir($iddirecion);
    echo $rspta ? "direccion eliminada" : "ERROR!! no se pudo eliminar la dirección";
}

if ($opcion=='salir') {
    //Limpiamos las variables de sesión   
    session_unset();
    //Destruìmos la sesión
    session_destroy();
    //Redireccionamos al login
    header("Location: ../login.php");
}




?>
