<?php

require "../config/Conexion.php";
Class Usuario
{
	//Implementamos nuestro constructor
	public function __construct()
	{

	}

	//Implementamos un método para insertar registros
	public function insertar($nick,$email,$pass,$nivel)
	{
		$sql="INSERT INTO usuarios (nick,email,pass,nivel)
		VALUES ('$nick','$email','$pass','$nivel')";
		return ejecutarConsulta($sql);
	}
	public function guardardireccion($idcomi,$nombre,$paterno,$materno,$cp,$telefono,$estado,$municipio,$ciudad,$colonia,$calle,$noexterior,$nointerior,$entrecalle,$ycalle,$referencias)
	{
		$sql="INSERT INTO direcciones (paterno,materno,cp,telefono,estado,municipio,ciudad,colonia,calle,noexterior,nointerior,entrecalle,ycalle,referencias,nombre,idcomisionista)
		VALUES ('$paterno','$materno','$cp','$telefono','$estado','$municipio','$ciudad','$colonia','$calle','$noexterior','$nointerior','$entrecalle','$ycalle','$referencias','$nombre','$idcomi')";
		return ejecutarConsulta($sql);
	}
	public function actualizar($nick,$email,$pass,$idusuario)
	{
		$sql="UPDATE usuarios
		SET nick='$nick', email='$email', pass='$pass'
		WHERE id='$idusuario'";
		return ejecutarConsulta($sql);
	}
	public function eliminar($idusuario){
		$sql = "DELETE FROM usuarios
				WHERE id='$idusuario'";
		return ejecutarConsulta($sql);

	}
    public function validaremail($email)
	{
        $sql="SELECT id
        FROM usuarios
        WHERE email='$email'";
		return validarsiexiste($sql);
	}
	public function validaremailactualizar($email, $idusuario)
	{
        $sql="SELECT id
        FROM usuarios
        WHERE email='$email' AND id <> '$idusuario'";
		return validarsiexiste($sql);
	}
	//Función para verificar el acceso al sistema
	public function verificar($login,$clave)
    {
    	$sql="SELECT id,nick,email,nivel FROM usuarios WHERE email='$login' AND pass='$clave' AND suspendido=false"; 
    	return ejecutarConsulta($sql);  
	}
	public function obtener($idusuario)
    {
    	$sql="SELECT id, nick, email, nivel FROM usuarios WHERE id='$idusuario'"; 
    	return ejecutarConsultaSimpleFila($sql);  
	}
	public function obtenerdirecciones($idcomi)
    {
    	$sql="SELECT * FROM direcciones WHERE idcomisionista='$idcomi'"; 
    	return ejecutarConsulta($sql);
	}
	public function listarselectcom()
    {
    	$sql="SELECT * FROM usuarios WHERE nivel=2"; 
    	return ejecutarConsulta($sql);
	}
	public function eliminardir($iddirecion)
    {
    	$sql="DELETE FROM direcciones where id='$iddirecion'"; 
    	return ejecutarConsulta($sql);
    }

}


$usuario = new Usuario();
?>
