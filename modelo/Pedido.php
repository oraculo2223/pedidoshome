<?php

require "../config/Conexion.php";
Class Pedido
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($comisionista,$nombre,$materno,$paterno,$telefono,$tienda,$ciudad,$estado,$link1,$art1,$link2,$art2,$link3,$art3,$link4,$art4,$link5,$art5,$link6,$art6,$link7,$art7,$link8,$art8,$link9,$art9,$link10,$art10,$monto,$idusuario,$municipio,$entrecalle,$ycalle,$especificaciones,$calle,$noexterior,$nointerior,$colonia,$cp,$tipodepedido,$email,$contrasena,$nickk)
	{
		$sql="INSERT INTO Pedidos (comisionista,nombre,materno,paterno,telefono,tienda,ciudad,estado,link1,art1,link2,art2,link3,art3,link4,art4,link5,art5,link6,art6,link7,art7,link8,art8,link9,art9,link10,art10,monto,idusuario,confirmado,municipio,entrecalle,ycalle,especificaciones,calle,noexterior,nointerior,colonia,cp,tipodepedido,email,contrasena,nickk)
		VALUES ('$comisionista','$nombre','$materno','$paterno','$telefono','$tienda','$ciudad','$estado','$link1','$art1','$link2','$art2','$link3','$art3','$link4','$art4','$link5','$art5','$link6','$art6','$link7','$art7','$link8','$art8','$link9','$art9','$link10','$art10','$monto','$idusuario',false,'$municipio','$entrecalle','$ycalle','$especificaciones','$calle','$noexterior','$nointerior','$colonia','$cp','$tipodepedido','$email','$contrasena','$nickk')";
		return ejecutarConsulta($sql);
	}
	//método para ingresar pedidos generales
	public function insertarpedidogeneral($comisionista,$nombre,$materno,$paterno,$telefono,$calle,$noexterior,$nointerior,$colonia,$cp,$ciudad,$municipio,$estado,$entrecalle,$ycalle,$especificaciones,$monto)
	{
		$sql="INSERT INTO PedidosGenerales (comisionista,nombre,materno,paterno,telefono,calle,noexterior,nointerior,colonia,cp,ciudad,municipio,estado,entrecalle,ycalle,especificaciones,monto)
		VALUES ('$comisionista','$nombre','$materno','$paterno','$telefono','$calle','$noexterior','$nointerior','$colonia','$cp','$ciudad','$municipio','$estado','$entrecalle','$ycalle','$especificaciones','$monto')";
		return ejecutarConsulta_retornarID($sql);
	}

	//Implementamos un método para editar registros
	public function actualizar($idpedido,$nombre,$materno,$paterno,$telefono,$tienda,$ciudad,$estado,$calleg,$noexteriorg,$nointeriorg,$coloniag,$cpg,$municipiog,$entrecalleg,$ycalleg,$especificacionesg,$link1,$art1,$link2,$art2,$link3,$art3,$link4,$art4,$link5,$art5,$link6,$art6,$link7,$art7,$link8,$art8,$link9,$art9,$link10,$art10,$monto,$imagen,$imagen2,$imagen3,$imagen4,$imagen5,$email,$contrasena,$nickk)
	{
		$sql="UPDATE Pedidos SET nombre='$nombre',materno='$materno',paterno='$paterno',telefono='$telefono',tienda='$tienda',ciudad='$ciudad',estado='$estado',calle='$calleg',noexterior='$noexteriorg',nointerior='$nointeriorg',colonia='$coloniag',cp='$cpg',municipio='$municipiog',entrecalle='$entrecalleg',ycalle='$ycalleg',especificaciones='$especificacionesg',link1='$link1',art1='$art1',link2='$link2',art2='$art2',link3='$link3',art3='$art3',link4='$link4',art4='$art4',link5='$link5',art5='$art5',link6='$link6',art6='$art6',link7='$link7',art7='$art7',link8='$link8',art8='$art8',link9='$link9',art9='$art9',link10='$link10',art10='$art10',monto='$monto', imagen='$imagen', imagen2='$imagen2', imagen3='$imagen3', imagen4='$imagen4', imagen5='$imagen5',email='$email', contrasena='$contrasena', nickk= '$nickk' WHERE id='$idpedido'";
		return ejecutarConsulta($sql);
	}
	public function statuscredito($idusuario)
	{
		$sql="SELECT * FROM creditos WHERE idcomisionista='$idusuario'";
		return ejecutarConsulta($sql);
	}
	public function actualizarmonto($monto,$idusuario,$idadmin,$fecha)
	{
		$sql="UPDATE creditos 
		SET monto='$monto',modificadopor='$idadmin',fecha='$fecha'
		WHERE idcomisionista='$idusuario'";
		return ejecutarConsulta($sql);
	}
	public function insertarmonto($monto,$idusuario,$idadmin,$fecha)
	{
		$sql="INSERT INTO creditos(idcomisionista,idadmin,fecha,monto)
		VALUES ('$idusuario','$idadmin','$fecha','$monto')";
		return ejecutarConsulta($sql);
	}
	//Implementamos un método para poner el pedido a rechazado
	public function actualizarrechazado($idpedido,$comentarios)
	{
		$sql="UPDATE Pedidos SET  comentariosrechazado= '$comentarios', estatus=1 WHERE id='$idpedido'";
		return ejecutarConsulta($sql);
	}
	//Implementamos un método para poner el pedido a rechazado
	public function actualizarexitoso($idpedido,$imagen)
	{
		$sql="UPDATE Pedidos SET  imagenexitoso= '$imagen', estatus=2 WHERE id='$idpedido'";
		return ejecutarConsulta($sql);
	}
	//Implementamos un método para editar registros
	public function pagar($idpedido,$cpago)
	{
		$sql="UPDATE Pedidos SET cpago='$cpago' WHERE id='$idpedido'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para desactivar registros
	public function desactivar($idarticulo)
	{
		$sql="UPDATE articulo SET condicion='0' WHERE idarticulo='$idarticulo'";
		return ejecutarConsulta($sql);
	}

	//Implementamos un método para activar registros
	public function activar($idarticulo)
	{
		$sql="UPDATE articulo SET condicion='1' WHERE idarticulo='$idarticulo'";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para mostrar los datos de un registro a modificar
	public function mostrar($idpedido)
	{
		$sql="SELECT * FROM Pedidos WHERE id='$idpedido'";
		return ejecutarConsultaSimpleFila($sql);
	}
	//Implementar un método para mostrar los pedidos entregados
	public function mostrarpedidoentregado($idpedido)
	{
		$sql="SELECT * FROM Pedidos WHERE id='$idpedido'";
		return ejecutarConsultaSimpleFila($sql);
	}
	//implementamos un metodo para obtener los datos del pedido a editar
	public function obtener($idpedido)
	{

		$sql="SELECT * FROM Pedidos WHERE id='$idpedido'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//implementamos un metodo para obtener el monto del comisionista enviando su id
	public function obtenermonto($idusuario)
	{
		
		$sql="SELECT * FROM creditos WHERE idcomisionista='$idusuario'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function verificarpedido($idusuario)
	{
	  $sql="SELECT * FROM creditos WHERE idcomisionista='$idusuario'";
	  return ejecutarConsultaSimpleFila($sql);
	}	  
	//implementamos un metodo para obtener el monto del comisionista enviando su id
	public function vercreditoscomisionista($idcomisionista)
	{
		
		$sql="SELECT * FROM creditos WHERE idcomisionista='$idcomisionista'";
		return ejecutarConsultaSimpleFila($sql);
	}
	public function acumularmonto($nuevomonto,$idcomisionista)
	  {
		  $sql="UPDATE creditos
		  SET usado='$nuevomonto'
		  WHERE idcomisionista='$idcomisionista'";
		  return ejecutarConsulta_retornarID($sql);
	  }  
	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido 
					FROM Pedidos
					WHERE confirmado=false AND entregado=false";
		return ejecutarConsulta($sql);		
	}
	public function listarusuarios()
	{
		$sql="SELECT id,nick,email,nivel 
				FROM usuarios
				WHERE nivel=2 || nivel=1";
		return ejecutarConsulta($sql);		
	}
	public function listarcreditos()
	{
		$sql="SELECT u.id,u.nick,u.email,c.idadmin,c.fecha,c.monto,c.modificadopor,c.usado
				FROM usuarios as u
				LEFT JOIN creditos as c on c.idcomisionista=u.id
				WHERE u.nivel=2";
		return ejecutarConsulta($sql);		
	}
	public function listarusuariosadmin()
	{
		$sql="SELECT id,nick,email,nivel 
				FROM usuarios
				WHERE nivel=2";
		return ejecutarConsulta($sql);		
	}

	public function listaradmin($idadmin)
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono 
					FROM Pedidos
					WHERE confirmado=false AND entregado=false AND idadmin='$idadmin'";
		return ejecutarConsulta($sql);		
	}

	public function listarpedidoscom($idusuario)
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido
					FROM Pedidos
					WHERE idusuario='$idusuario' AND confirmado=false AND entregado=false";
		return ejecutarConsulta($sql);		
	}
	public function listarpedidoconfirmado()
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido,estatus 
					FROM Pedidos
					WHERE confirmado=true AND entregado=false";
		return ejecutarConsulta($sql);		
	}
	public function listarpedidoconfirmadoadmin($idadmin)
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido,estatus 
					FROM Pedidos
					WHERE confirmado=true AND entregado=false AND idadmin='$idadmin'";
		return ejecutarConsulta($sql);		
	}
	public function listarpedidoconfirmadocom($idcomisionista)
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido,estatus
					FROM Pedidos
					WHERE confirmado=true AND entregado=false AND idusuario='$idcomisionista'";
		return ejecutarConsulta($sql);		
	}
	public function listarentregados()
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido
					FROM Pedidos
					WHERE entregado=true AND pagado=false";
		return ejecutarConsulta($sql);		
	}
	public function listarpagados()
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido
					FROM Pedidos
					WHERE pagado=true AND facturado=false";
		return ejecutarConsulta($sql);		
	}
	public function listarfacturados()
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido
					FROM Pedidos
					WHERE facturado=true";
		return ejecutarConsulta($sql);		
	}
	public function listarpagadosstats()
	{
		$sql="SELECT id as numeropedido,tipodepedido,monto,(SELECT nick FROM usuarios WHERE id=idusuario) as comisionista, monto as porcentajecom, (SELECT nick FROM usuarios WHERE id=idadmin) as administrador,monto as porcentajeadmin, monto as gatosoperativos, monto as total
				FROM Pedidos
				WHERE pagado=true AND facturado=false";
		return ejecutarConsulta($sql);		
	}
	public function listarfacturadosstats()
	{
		$sql="SELECT id as numeropedido,tipodepedido,monto,(SELECT nick FROM usuarios WHERE id=idusuario) as comisionista, monto as porcentajecom, (SELECT nick FROM usuarios WHERE id=idadmin) as administrador,monto as porcentajeadmin, monto as gatosoperativos, monto as total
				FROM Pedidos
				WHERE facturado=true";
		return ejecutarConsulta($sql);		
	}
	public function listarentregadosstatsadmin($idadmin)
	{
		$sql="SELECT id as numeropedido,tipodepedido, monto,(SELECT nick FROM usuarios WHERE id=idusuario) as comisionista, monto as porcentajecom, (SELECT nick FROM usuarios WHERE id=idadmin) as administrador,monto as porcentajeadmin, monto as gatosoperativos, monto as total
				FROM Pedidos
				WHERE entregado=true AND idadmin='$idadmin'";
		return ejecutarConsulta($sql);		
	}
	public function listarpagadosstatsadmin($idadmin)
	{
		$sql="SELECT id as numeropedido,tipodepedido, monto,(SELECT nick FROM usuarios WHERE id=idusuario) as comisionista, monto as porcentajecom, (SELECT nick FROM usuarios WHERE id=idadmin) as administrador,monto as porcentajeadmin, monto as gatosoperativos, monto as total
				FROM Pedidos
				WHERE pagado=true AND facturado=false AND idadmin='$idadmin'";
		return ejecutarConsulta($sql);		
	}
	public function listarfacturadosstatsadmin($idadmin)
	{
		$sql="SELECT id as numeropedido,tipodepedido, monto,(SELECT nick FROM usuarios WHERE id=idusuario) as comisionista, monto as porcentajecom, (SELECT nick FROM usuarios WHERE id=idadmin) as administrador,monto as porcentajeadmin, monto as gatosoperativos, monto as total
				FROM Pedidos
				WHERE facturado=true AND idadmin='$idadmin'";
		return ejecutarConsulta($sql);		
	}
	public function listarentregadosadmin($idadmin)
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido
					FROM Pedidos
					WHERE entregado=true AND pagado=false AND idadmin='$idadmin'";
		return ejecutarConsulta($sql);		
	}
	public function listarpagadosadmin($idadmin)
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido
					FROM Pedidos
					WHERE pagado=true AND facturado=false AND idadmin='$idadmin'";
		return ejecutarConsulta($sql);		
	}
	public function listarfacturadosadmin($idadmin)
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido
					FROM Pedidos
					WHERE facturado=true AND idadmin='$idadmin'";
		return ejecutarConsulta($sql);		
	}
	public function listarentregadoscom($idcomisionista)
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido
					FROM Pedidos
					WHERE entregado=true AND idusuario='$idcomisionista'";
		return ejecutarConsulta($sql);		
	}
	public function listarpagadoscom($idcomisionista)
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido
					FROM Pedidos
					WHERE pagado=true AND facturado=false AND idusuario='$idcomisionista'";
		return ejecutarConsulta($sql);		
	}
	public function listarfacturadoscom($idcomisionista)
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono,tipodepedido
					FROM Pedidos
					WHERE facturado=true AND idusuario='$idcomisionista'";
		return ejecutarConsulta($sql);		
	}
	//implementamos un metodo para regresar el ultimo id de la base dedatos y se sume al nuevo pedido
	public function regresarid()
	{
		$sql="SELECT max(id) as idpedido from Pedidos";
		return ejecutarConsulta($sql);
	}
	public function regresarpedidogeneralid()
	{
		$sql="SELECT max(id) as idpedido from PedidosGenerales";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para eliminar pedidos
	public function eliminar($idpedido)
	{
		$sql="DELETE FROM Pedidos WHERE id='$idpedido'";
		return ejecutarConsulta($sql);
	}
	//implementamos un metodo para confirmar el pedido seleccionado
	public function confirmar($idpedido,$idadmin)
	{
	 $sql="UPDATE Pedidos SET confirmado = true, idadmin = '$idadmin'
					 WHERE id='$idpedido'";
					 return ejecutarConsulta($sql);	
	}
	public function facturar($idpedido)
	{
	 $sql="UPDATE Pedidos SET facturado = true
					 WHERE id='$idpedido'";
					 return ejecutarConsulta($sql);	
	}
	//implementamos un metodo para enviar a pagado el pedido seleccionado
	public function enviarpagar($idpedido,$idadmin)
	{
	 $sql="UPDATE Pedidos SET pagado = true
					 WHERE id='$idpedido'";
					 return ejecutarConsulta($sql);	
	}
	//implementamos un metodo para desconfirmar el pedido seleccionado
	public function cancelarpedido($idpedido)
	{
	 $sql="UPDATE Pedidos SET confirmado = false
					 WHERE id='$idpedido'";
					 return ejecutarConsulta($sql);	
	}
	//implementamos una funcion para pediudos entregados
	public function entregado($idpedido, $idadmin)
	{
	 $sql="UPDATE Pedidos SET entregado = true
					 WHERE id='$idpedido'";
					 return ejecutarConsulta($sql);	
	}
    //borra todos los pedidos
    public function borrarbase()
	{
		$sql="DELETE FROM Pedidos";
		return ejecutarConsulta($sql);
	}

	//borra todos los pedidos facturados
    public function borrarpedidosfacturados()
	{
		$sql="DELETE FROM Pedidos WHERE facturado=1";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros activos, su último precio y el stock (vamos a unir con el último registro de la tabla detalle_ingreso)
	public function listarActivosVenta()
	{
		$sql="SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,(SELECT precio_venta FROM detalle_ingreso WHERE idarticulo=a.idarticulo order by iddetalle_ingreso desc limit 0,1) as precio_venta,a.descripcion,a.imagen,a.condicion FROM articulo a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
		return ejecutarConsulta($sql);		
	}
}


$pedido = new Pedido();
?>
