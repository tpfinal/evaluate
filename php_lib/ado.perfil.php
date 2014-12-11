<?php

// requiere la inclusion externa del archibo 'conexion.php'

class adoPerfil
{
//se declaran los atributos de la clase, que son los atributos de la clase empleado
private $id;
private $nombre;
private $descripcion;

private $obj_perfil;
private $array_perfiles=array();

//metodo que devolvera el proximo id que se generara al insertar un perfil
	
	function NextIdPerfil() 
	{
			$obj_sQuery=new sQuery();
			$result=$obj_sQuery->executeQuery("SELECT MAX(id_perfil) AS id_perfil FROM perfil"); // ejecuta la consulta para encontrar el id
			$row=mysql_fetch_array($result);
			$this->id=$row['id_perfil'];
			return $this->id+1;;
			
	}

		
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
		$this->obj_perfil = new perfil($this->nombre,$this->descripcion,$this->id);
		
		return $this->obj_perfil;
		
		}
	}
	
//metodo que regresa el objeto perfil pasando como parametro el ID

	function getPerfilById($id) 
	{
	if ($id)
		{
			$obj_cliente=new sQuery();
			$result=$obj_cliente->executeQuery("SELECT * FROM perfil WHERE id_perfil = $id"); // ejecuta la consulta para traer el objetivo
			$row=mysql_fetch_array($result);		
			$this->id=$row['id_perfil'];
			$this->nombre=$row['nombre_perfil'];
			$this->descripcion=$row['descripcion_perfil'];
			
	//creamos el objeto objetivo con los datos recividos
		$this->obj_perfil = new perfil($this->nombre,$this->descripcion,$this->id);
		
		//var_dump($this->obj_perfil); //para ver el contenido del objeto
		
		return $this->obj_perfil;
		}
	}

//metodo que almacena los datos del perfil en la BD enviando un objeto como parametro
//retorna el id del nuevo registro

	public function guardarPerfil($obj_perfil)
	{
	$this->nombre=$obj_perfil->getNombre();
	$this->descripcion=$obj_perfil->getDescripcion();
	
		$obj_sQuery=new sQuery();
		$query="INSERT INTO perfil(nombre_perfil,descripcion_perfil)
				VALUES('$this->nombre','$this->descripcion')";
				
		$obj_sQuery->executeQuery($query); // ejecuta la consulta para insertar perfil
		
		$query2="	SELECT MAX(id_perfil) as max FROM perfil ";
			$result=$obj_sQuery->executeQuery($query2); // ejecuta la consulta para  obtener el id del registro nuevo
			$row=mysql_fetch_array($result);

			return $row['max'];
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
			$array_perfiles[$row['id_perfil']]=$row['nombre_perfil'];
		}
			
		//var_dump($this->array_perfiles); //para ver el contenido del array
	
		return $array_perfiles;
		}
	

//Regresa el objeto perfil del empleado perteneciente a el periodo

	function findPerfil($id_empleado,$id_periodo)	
	{
			$obj_cliente=new sQuery();
			$query1="	SELECT p.id_perfil,p.nombre_perfil,p.descripcion_perfil
						FROM perfil as p
						JOIN empleados_periodo as ep
						ON p.id_perfil=ep.id_perfil
						WHERE ep.id_empleado=$id_empleado
						AND ep.id_periodo=$id_periodo";

		$result=$obj_cliente->executeQuery($query1); // ejecuta la consulta para  borrar el registro del objetivo
			
			$row=mysql_fetch_array($result);		
			$this->id=$row['id_perfil'];
			$this->nombre=$row['nombre_perfil'];
			$this->descripcion=$row['descripcion_perfil'];
			
	//creamos el objeto objetivo con los datos recividos
		$this->obj_perfil = new perfil($this->nombre,$this->descripcion,$this->id);
		
		//var_dump($this->obj_perfil); //para ver el contenido del objeto
		
		return $this->obj_perfil;
				
	}		
		
//Metodo que almacena a cual perfil corresponden las competencias

	public function competencia_perfil($id_competencia,$id_perfil)
	{
		$obj_sQuery=new sQuery();
		$query="INSERT INTO competencias_perfil(id_competencia,id_perfil)
				VALUES('$id_competencia','$id_perfil')
			   ";
				
		$obj_sQuery->executeQuery($query); // ejecuta la consulta para insertar los datos
	}
	
//Metodo que checkea si el perfil esta siendo utilizado

	public function checkUsoPerfil($id_perfil)
	{
		$obj_sQuery=new sQuery();
		$query="	SELECT id_perfil
					FROM empleados_periodo
					WHERE id_perfil='$id_perfil'
			   ";
				
		$result = $obj_sQuery->executeQuery($query); // ejecuta la consulta 
		$row=mysql_fetch_array($result);		
		$id_perfil=$row['id_perfil'];
		
		return $id_perfil;
		
	}
	
//metodo que verifica si el perfil existe

	function checkPerfil($nombre_perfil)	
	{
			$obj_sQuery=new sQuery();
			$query1="SELECT nombre_perfil FROM perfil WHERE nombre_perfil='$nombre_perfil'";

			$result=$obj_sQuery->executeQuery($query1); // ejecuta la consulta 
			
			@$row=mysql_fetch_array($result);	
			
			$nombre=$row['nombre_perfil'];
			
			if($nombre){
				return true;
			}
			else
				return false;
	}	
	
//Borra el perfil , sus objetivos y las relaciones con las competencias (no borra competencias)

	function eliminarPerfil($id_perfil)	
	{
			$obj_sQuery=new sQuery();
			
			$query1="DELETE FROM objetivos WHERE id_perfil=$id_perfil";
			$obj_sQuery->executeQuery($query1); //  borra los objetivos
			
			$query2="DELETE FROM competencias_perfil WHERE id_perfil=$id_perfil";
			$obj_sQuery->executeQuery($query2); //  borra las relaciones entre competencias y perfiles
			
			$query3="DELETE FROM perfil WHERE id_perfil=$id_perfil";
			$obj_sQuery->executeQuery($query3); //  borra el perfil	
	}	
	
	
}


?>