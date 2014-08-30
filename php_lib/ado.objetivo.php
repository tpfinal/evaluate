<?php
include_once('config.ini.php'); //incluimos configuración
class Conexion  // se declara una clase para hacer la conexion con la base de datos
{
	var $con;
	function Conexion()
		   	 
	{
		// se definen los datos del servidor de base de datos 
		$conection['server']=SERVIDOR_MYSQL;   //host
		$conection['user']=USUARIO_MYSQL;      //usuario
		$conection['pass']=PASSWORD_MYSQL;	   //password
		$conection['base']=BASE_DATOS;		   //base de datos
		
		
		// crea la conexion pasandole el servidor , usuario y clave
		$conect= mysql_pconnect($conection['server'],$conection['user'],$conection['pass']);


			
		if ($conect) // si la conexion fue exitosa , selecciona la base
		{
			mysql_select_db($conection['base']);			
			$this->con=$conect;
		}
	}
	function getConexion() // devuelve la conexion
	{
		return $this->con;
	}
	function Close()  // cierra la conexion
	{
		mysql_close($this->con);
	}	

}




class sQuery   // se declara una clase para poder ejecutar las consultas, esta clase llama a la clase anterior
{

	var $pconeccion;
	var $pconsulta;
	var $resultados;
	function sQuery()  // constructor, solo crea una conexion usando la clase "Conexion"
	{
		$this->pconeccion= new Conexion();
	}
	function executeQuery($cons)  // metodo que ejecuta una consulta y la guarda en el atributo $pconsulta
	{
		$this->pconsulta= mysql_query($cons,$this->pconeccion->getConexion());
		return $this->pconsulta;
	}	
	function getResults()   // retorna la consulta en forma de result.
	{return $this->pconsulta;}	
	
	function Close()		// cierra la conexion
	{$this->pconeccion->Close();}	
	
	function Clean() // libera la consulta
	{mysql_free_result($this->pconsulta);}
	
	function getResultados() // devuelve la cantidad de registros encontrados
	{return mysql_affected_rows($this->pconeccion->getConexion()) ;}
	
	function getAffect() // devuelve las cantidad de filas afectadas
	{return mysql_affected_rows($this->pconeccion->getConexion()) ;}
}




class adoObjetivo
{
//se declaran los atributos de la clase, que son los atributos de la clase empleado
private $nombre;
private $descripcion;
private $tipo;

//metodo que obtiene el id del empleado pasando como argumento el numero de dni
	
	function getIdByName($name) 
	{
			$obj_cliente=new sQuery();
			$result=$obj_cliente->executeQuery("select id_objetivo from objetivos where name = $name"); // ejecuta la consulta para encontrar el id
			$row=mysql_fetch_array($result);
			$this->id=$row['id_objetivo'];
			
			return $this->id;
	}
	
//metodo que trae los datos del empleado y regresa un objeto empleado(sin los datos de usuario)
	function getObjetivo($nombre) 
	{
	if ($nombre)
		{
			$obj_cliente=new sQuery();
			$result=$obj_cliente->executeQuery("SELECT * FROM objetivos WHERE nombre = $nombre"); // ejecuta la consulta para traer el objetivo
			$row=mysql_fetch_array($result);		
			$this->id=$row['id_objetivo'];
			$this->nombre=$row['nombre'];
			$this->descripcion=$row['descripcion'];
			$this->tipo=$row['tipo'];
			
	//creamos el objeto objetivo con los datos recividos
		$this->obj_objetivo = new objetivo($this->id,$this->nombre,$this->descripcion,$this->tipo);
		return $this->obj_objetivo;
		}
	}

//metodo que almacena los datos del empleado en la BD
	public function guardarObjetivo($obj_objetivo)
	{
	$this->nombre=$obj_objetivo->getNombre();
	$this->descripcion=$obj_objetivo->getDescripcion();
	$this->tipo=$obj_objetivo->getTipo();
	
		$obj_sQuery=new sQuery();
		$query="INSERT INTO objetivos(nombre_objetivo,descripcion_objetivo,tipo_objetivo)
				VALUES('$this->nombre','$this->descripcion','$this->tipo')";
				
		$obj_sQuery->executeQuery($query); // ejecuta la consulta para insertar objetivo
		
	}
	
//metodo que modifica los datos del empleado en la BD
	public function updateObjetivo($obj_objetivo)
	{

	}
	
//Borra los registros de las tablas Empleados y Usuarios usando el id del 
		function eliminarObjetivo($id)	
	{
			$obj_cliente=new sQuery();
			$query1="DELETE FROM objetivo WHERE id_objetivo=$id";

			$obj_cliente->executeQuery($query1); // ejecuta la consulta para  borrar el registro del objetivo
		
	}	

	
}


?>