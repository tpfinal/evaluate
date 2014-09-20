<?php

// requiere la inclusion externa del archibo 'conexion.php'

class adoPeriodo
{
//se declaran los atributos de la clase, que son los atributos de la clase empleado
private $id;
private $nombre;
private $inicio;
private $fin;
private $creador;

private $obj_periodo;
private $array_periodos=array();


//metodo que obtiene el id del periodo pasando como argumento el nombre
//si no se pasa argumento devolvera el proximo id que se generara al insertar un periodo
	
	function getIdPeriodo($nombre=null) 
	{
			if($nombre==null)
			{
			$obj_sQuery=new sQuery();
			$result=$obj_sQuery->executeQuery("SELECT MAX(id_periodo) AS id_periodo FROM periodo"); // ejecuta la consulta para encontrar el id
			$row=mysql_fetch_array($result);
			$this->id=$row['id_periodo'];
			return $this->id+1;;
			}
			else
			{
			$obj_sQuery=new sQuery();
			$result=$obj_sQuery->executeQuery("SELECT id_periodo FROM periodo WHERE nombre_periodo = '$nombre' "); // ejecuta la consulta para encontrar el id
			$row=mysql_fetch_array($result);
			$this->id=$row['id_periodo'];
			return $this->id;
			}
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