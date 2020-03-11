<?php

require "../config/Conexion.php";
Class PedidoGeneral
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}
	//método para ingresar pedidos generales
	public function insertar($comisionista,$nombre,$materno,$paterno,$telefono,$calle,$noexterior,$nointerior,$colonia,$cp,$ciudad,$municipio,$estado,$entrecalle,$ycalle,$especificaciones,$monto)
	{
		$sql="INSERT INTO pedidosgenerales (comisionista,nombre,materno,paterno,telefono,calle,noexterior,nointerior,colonia,cp,ciudad,municipio,estado,entrecalle,ycalle,especificaciones,monto)
		VALUES ('$comisionista','$nombre','$materno','$paterno','$telefono','$calle','$noexterior','$nointerior','$colonia','$cp','$ciudad','$municipio','$estado','$entrecalle','$ycalle','$especificaciones','$monto')";
		return ejecutarConsulta_retornarID($sql);
	}

	//Implementamos un método para editar registros
	public function editar($idarticulo,$idcategoria,$codigo,$nombre,$stock,$descripcion,$imagen)
	{
		$sql="UPDATE articulo SET idcategoria='$idcategoria',codigo='$codigo',nombre='$nombre',stock='$stock',descripcion='$descripcion',imagen='$imagen' WHERE idarticulo='$idarticulo'";
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
		$sql="SELECT * FROM pedidosgenerales WHERE id='$idpedido'";
		return ejecutarConsultaSimpleFila($sql);
	}

	//Implementar un método para listar los registros
	public function listar()
	{
		$sql="SELECT id,comisionista,monto,estado,ciudad,telefono FROM pedidosgenerales";
		return ejecutarConsulta($sql);		
	}
	//implementamos un metodo para regresar el ultimo id de la base dedatos y se sume al nuevo pedido
	public function regresarid()
	{
		$sql="SELECT max(id) as idpedido from pedidosgenerales";
		return ejecutarConsulta($sql);
	}
	//Implementar un método para eliminar pedidos
	public function eliminar($idpedido)
	{
		$sql="DELETE FROM pedidosgenerales WHERE id='$idpedido'";
		return ejecutarConsulta($sql);
    }
    //borra todos los pedidos
    public function borrarbase()
	{
		$sql="DELETE FROM pedidosgenerales";
		return ejecutarConsulta($sql);
	}

	//Implementar un método para listar los registros activos, su último precio y el stock (vamos a unir con el último registro de la tabla detalle_ingreso)
	public function listarActivosVenta()
	{
		$sql="SELECT a.idarticulo,a.idcategoria,c.nombre as categoria,a.codigo,a.nombre,a.stock,(SELECT precio_venta FROM detalle_ingreso WHERE idarticulo=a.idarticulo order by iddetalle_ingreso desc limit 0,1) as precio_venta,a.descripcion,a.imagen,a.condicion FROM articulo a INNER JOIN categoria c ON a.idcategoria=c.idcategoria WHERE a.condicion='1'";
		return ejecutarConsulta($sql);		
	}
}


$PedidoGeneral = new PedidoGeneral();
?>