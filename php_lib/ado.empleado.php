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




class adoEmpleado
{
//se declaran los atributos de la clase, que son los atributos de la clase empleado
private $nombre;
private $apellido;
private $dni;
private $email;
private $puesto;
//se declaron los atributos de la clase usuario
private $usuario;
private $pass;
private $rol;
private $obj_empleado;

//metodo que obtiene el id del empleado pasando como argumento el numero de dni
	
	function getIdByDni($nro=0) // declara el constructor, si trae el numero de cliente lo busca , si no, no hace nada.
	{
	if ($nro!=0)
		{
			$obj_cliente=new sQuery();
			$result=$obj_cliente->executeQuery("select id_empleado from empleados where dni = $nro"); // ejecuta la consulta para traer al cliente 
			$row=mysql_fetch_array($result);
			$this->id=$row['id_empleado'];
			
			return $this->id;
		}
	}
	
//metodo que trae los datos del empleado y regresa un objeto empleado(sin los datos de usuario)
	function getEmpleado($nro=0) // declara el constructor, si trae el numero de cliente lo busca , si no, no hace nada.
	{
	if ($nro!=0)
		{
			$obj_cliente=new sQuery();
			$result=$obj_cliente->executeQuery("SELECT * FROM empleados WHERE dni = $nro"); // ejecuta la consulta para traer al cliente 
			$row=mysql_fetch_array($result);		
			$this->id=$row['id_empleado'];
			$this->nombre=$row['nombre'];
			$this->apellido=$row['apellido'];
			$this->dni=$row['dni'];
			$this->email=$row['email'];
			$this->puesto=$row['puesto'];
			
	//creamos el objeto empleado con los datos recividos
		$this->obj_empleado = new empleado($this->nombre,$this->apellido,$this->dni,$this->email,$this->puesto);
		return $this->obj_empleado;
		}
	}

//metodo que almacena los datos del empleado en la BD
	public function guardarEmpleado($obj_empleado)
	{
	$this->nombre=$obj_empleado->getNombre();
	$this->apellido=$obj_empleado->getApellido();
	$this->dni=$obj_empleado->getDni();
	$this->email=$obj_empleado->getEmail();
	$this->puesto=$obj_empleado->getPuesto();
	$this->usuario=$obj_empleado->getUsuario();
	$this->pass=$obj_empleado->getPass();
	$this->rol=$obj_empleado->getRol();
	
		$obj_sQuery=new sQuery();
		$query="INSERT INTO empleados(nombre,apellido,dni,email,puesto)
				VALUES('$this->nombre','$this->apellido','$this->dni','$this->email','$this->puesto')";
				
		$obj_sQuery->executeQuery($query); // ejecuta la consulta para insertar empleado
		
	//obtenemos en numero de id que se genero para el empleado
	$this->id=$this->getIdByDni($this->dni);
		
		$query2="INSERT INTO usuarios(usuario,pass,rol,id_empleado)
				VALUES('$this->usuario','$this->pass','$this->rol',$this->id)"; 
			
		
		$obj_sQuery->executeQuery($query2); // ejecuta la consulta para insertar usuario
	}
	
	
	
	
	
	
//---------------------------------------------------------------------------------------------------------------//

//Metodos modelos: no cumplen funcion en el sitio

	
	function getClientes() // este metodo podria no estar en esta clase, se incluye para simplificar el codigo, lo que hace es traer todos los clientes 
		{
			$obj_cliente=new sQuery();
			$result=$obj_cliente->executeQuery("select * from clientes"); // ejecuta la consulta para traer al cliente 
			return $result; // retorna todos los clientes
		}
		

	function updateCliente()	// actualiza el cliente cargado en los atributos
	{
			$obj_cliente=new sQuery();
			$query="update clientes set nombre='$this->nombre', apellido='$this->apellido',fecha_nac='$this->fecha',peso='$this->peso' where id = $this->id";
			$obj_cliente->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return $query .'<br/>Registros afectados: '.$obj_cliente->getAffect(); // retorna todos los registros afectados
	
	}
	function insertCliente()	// inserta el cliente cargado en los atributos
	{
			$obj_cliente=new sQuery();
			$query="insert into clientes( nombre, apellido, fecha_nac,peso)values('$this->nombre', '$this->apellido','$this->fecha','$this->peso')";
			
			$obj_cliente->executeQuery($query); // ejecuta la consulta para traer al cliente 
			return $query .'<br/>Registros afectados: '.$obj_cliente->getAffect(); // retorna todos los registros afectados
	
	}	
	function deleteCliente($val)	// elimina el cliente
	{
			$obj_cliente=new sQuery();
			$query="delete from clientes where id=$val";
			$obj_cliente->executeQuery($query); // ejecuta la consulta para  borrar el cliente
			return $query .'<br/>Registros afectados: '.$obj_cliente->getAffect(); // retorna todos los registros afectados
	
	}	
	
}


?>