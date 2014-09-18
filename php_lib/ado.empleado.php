<?php

include_once('conexion.php'); //incluimos configuración

class adoEmpleado
{
//se declaran los atributos de la clase, que son los atributos de la clase empleado
private $id;
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

private $array_empleados=array();
private $array_perfiles=array();


//metodo que obtiene el id del empleado pasando como argumento el numero de dni
	
	function getIdByDni($dni=0) // 
	{
	if ($dni!=0)
		{
			$obj_cliente=new sQuery();
			$result=$obj_cliente->executeQuery("select id_empleado from empleados where dni = $dni"); // ejecuta la consulta para traer al empleado 
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
			$obj_sQuery=new sQuery();
			$result=$obj_sQuery->executeQuery("SELECT * FROM empleados WHERE dni = $nro"); // ejecuta la consulta para traer al cliente 
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
	
//metodo que modifica los datos del empleado en la BD
	public function updateEmpleado($obj_empleado)
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
		$query="UPDATE empleados SET nombre='$this->nombre', apellido='$this->apellido', email='$this->email', puesto='$this->puesto'
				WHERE dni=$this->dni ";
				
		$obj_sQuery->executeQuery($query); // ejecuta la consulta para modificar empleado
		
	//obtenemos en numero de id del empleado
	$this->id=$this->getIdByDni($this->dni);
		
		$query2="UPDATE usuarios SET pass='$this->pass', rol='$this->rol'
				 WHERE id_empleado=$this->id "; 
			
		$obj_sQuery->executeQuery($query2); // ejecuta la consulta para insertar usuario
	}
	
//Borra los registros de las tablas Empleados y Usuarios usando el id del 
		function eliminarEmpleado($id)	
	{
			$obj_cliente=new sQuery();
			$query1="DELETE FROM empleados WHERE id_empleado=$id";
			$query2="DELETE FROM usuarios WHERE id_empleado=$id";
			$obj_cliente->executeQuery($query1); // ejecuta la consulta para  borrar el registro del empleado
			$obj_cliente->executeQuery($query2); // ejecuta la consulta para  borrar el registro del usuario
	}

//Retorna un array con los nombres de todos los empleados y sus IDs como indices
		function getAllEmpleados()
		{
			$obj_sQuery=new sQuery();
			$result=$obj_sQuery->executeQuery("SELECT * FROM empleados"); // ejecuta la consulta para traer al cliente 
			//$row=mysql_fetch_row($result);

	//llenamos el array de empleados con los datos recividos
	;
		while($row=mysql_fetch_array($result))
		{
		$this->array_empleados[$row['id_empleado']]=$row['nombre'].' '.$row['apellido'];
		}
			
		//var_dump($this->array_empleados); //para ver el contenido del array
	
		return $this->array_empleados;
		}

/*------------------------------Funciones para Perfi-------------------------------------------*/
		
//metodo que obtiene el id del perfil pasando como argumento el nombre
	
	function getIdPerfil($nombre) 
	{
			$obj_sQuery=new sQuery();
			$result=$obj_sQuery->executeQuery("SELECT id_perfil FROM perfil WHERE nombre_perfil = '$nombre' "); // ejecuta la consulta para encontrar el id
			$row=mysql_fetch_array($result);
			$this->id=$row['id_perfil'];
			
			return $this->id;
	}
	
//metodo que regresa el objeto perfil pasando como parametro el nombre
	function getPerfil($nombre) 
	{
	if ($nombre)
		{
			$obj_cliente=new sQuery();
			$result=$obj_cliente->executeQuery("SELECT * FROM perfil WHERE nombre_perfil = $nombre"); // ejecuta la consulta para traer el objetivo
			$row=mysql_fetch_array($result);		
			$this->id=$row['id_perfil'];
			$this->nombre=$row['nombre_perfil'];
			$this->descripcion=$row['descripcion_perfil'];
			
	//creamos el objeto objetivo con los datos recividos
		$this->obj_perfil = new perfil($this->id,$this->nombre,$this->descripcion,$this->tipo);
		return $this->obj_perfil;
		}
	}

//metodo que almacena los datos del perfil en la BD
	public function guardarPerfil($obj_perfil)
	{
	$this->nombre=$obj_perfil->getNombre();
	$this->descripcion=$obj_perfil->getDescripcion();
	
		$obj_sQuery=new sQuery();
		$query="INSERT INTO perfil(nombre_perfil,descripcion_perfil)
				VALUES('$this->nombre','$this->descripcion')";
				
		$obj_sQuery->executeQuery($query); // ejecuta la consulta para insertar objetivo
		
	}

	
//Borra los registros de las tablas Perfil usando el id del perfil
		function eliminarPeril($id)	
	{
			$obj_cliente=new sQuery();
			$query1="DELETE FROM perfil WHERE id_perfil=$id";

			$obj_cliente->executeQuery($query1); // ejecuta la consulta para  borrar el registro 
		
	}	

//Retorna un array con los nombres de todos los Perfiles y sus IDs como indices
		function getAllPerfiles()
		{
			$obj_sQuery=new sQuery();
			$result=$obj_sQuery->executeQuery("SELECT * FROM perfil"); // ejecuta la consulta para traer los perfiles
			//$row=mysql_fetch_row($result);

	//llenamos el array de perfiles con los datos recividos
	;
		while($row=mysql_fetch_array($result))
		{
		$this->array_perfiles[$row['id_perfil']]=$row['nombre_perfil'];
		}
			
		//var_dump($this->array_perfiles); //para ver el contenido del array
	
		return $this->array_perfiles;
		}
	
}


?>