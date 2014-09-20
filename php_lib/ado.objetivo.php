<?php

class adoObjetivo
{
//se declaran los atributos de la clase, que son los atributos de la clase empleado
private $nombre;
private $descripcion;
private $tipo;
private $id_perfil;

//metodo que obtiene el id del empleado pasando como argumento el numero de dni
	
	function getIdByName($name) 
	{
			$obj_cliente=new sQuery();
			$result=$obj_cliente->executeQuery("select id_objetivo from objetivos where nombre_objetivo = $name"); // ejecuta la consulta para encontrar el id
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
			$result=$obj_cliente->executeQuery("SELECT * FROM objetivos WHERE nombre_objetivo = $nombre"); // ejecuta la consulta para traer el objetivo
			$row=mysql_fetch_array($result);		
			$this->id=$row['id_objetivo'];
			$this->nombre=$row['nombre_objetivo'];
			$this->descripcion=$row['descripcion_objetivo'];
			$this->tipo=$row['tipo_objetivo'];
			$this->id_perfil=$row['id_perfil'];
			
	//creamos el objeto objetivo con los datos recividos
		$this->obj_objetivo = new objetivo($this->id,$this->nombre,$this->descripcion,$this->tipo,$this->id_perfil);
		return $this->obj_objetivo;
		}
	}

//metodo que almacena los datos del objetivo en la BD
	public function guardarObjetivo($obj_objetivo)
	{
	$this->nombre=$obj_objetivo->getNombre();
	$this->descripcion=$obj_objetivo->getDescripcion();
	$this->tipo=$obj_objetivo->getTipo();
	$this->id_perfil=$obj_objetivo->getId_perfil();
	
		$obj_sQuery=new sQuery();
		$query="INSERT INTO objetivos(nombre_objetivo,descripcion_objetivo,tipo_objetivo,id_perfil)
				VALUES('$this->nombre','$this->descripcion','$this->tipo','$this->id_perfil')";
				
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