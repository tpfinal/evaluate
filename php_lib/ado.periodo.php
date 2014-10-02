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

	
//metodo que regresa el objeto perfil pasando como parametro el id
	function getPeriodo($id_periodo) 
	{
	if ($id_periodo)
		{
			$obj_sQuery=new sQuery();
			$result=$obj_sQuery->executeQuery("SELECT * FROM periodo WHERE nombre_periodo = $id_periodo"); // ejecuta la consulta para traer el objetivo
			$row=mysql_fetch_array($result);		
			$this->id=$row['id_periodo'];
			$this->nombre=$row['nombre_periodo'];
			$this->inicio=$row['inicio_periodo'];
			$this->fin=$row['fin_periodo'];
			$this->creador=$row['id_creador'];
			
	//creamos el objeto objetivo con los datos recividos
		$this->obj_periodo = new periodo($this->nombre,$this->inicio,$this->fin,$this->creador,$this->id);
		return $this->obj_perfil;
		}
	}

//metodo que almacena los datos del perfil en la BD
	public function guardarPeriodo($obj_periodo)
	{
	$this->nombre=$obj_periodo->getNombre();
	$this->inicio=$obj_periodo->getInicio();
	$this->fin=$obj_periodo->getFin();
	$this->creador=$obj_periodo->getIdCreador();
	
	//var_dump($obj_periodo); //para ver el contenido del objeto
	
		$obj_sQuery=new sQuery();
		$query="INSERT INTO periodo(nombre_periodo,inicio_periodo,fin_periodo,id_creador)
				VALUES('$this->nombre','$this->inicio','$this->fin','$this->creador')";
				
		$obj_sQuery->executeQuery($query); // ejecuta la consulta para insertar objetivo
		
	}

	
//Borra los registros de las tablas Perfil usando el id del perfil
		function eliminarPeriodo($id)	
	{
			$obj_sQuery=new sQuery();
			$query1="DELETE FROM periodo WHERE id_perfil=$id";

			$obj_sQuery->executeQuery($query1); // ejecuta la consulta para  borrar el registro 
		
	}	

//Retorna un array con los nombres de todos los Perfiles y sus IDs como indices
		function getAllPeriodos()
		{
			$obj_sQuery=new sQuery();
			$result=$obj_sQuery->executeQuery("SELECT * FROM periodo"); // ejecuta la consulta para traer una lista

	//llenamos el array  con los datos recividos
	;
		while($row=mysql_fetch_array($result))
		{
		$this->array_periodos[$row['id_periodo']]=$row['nombre_periodo'];
		}
			
		//var_dump($this->array_perfiles); //para ver el contenido del array
	
		return $this->array_periodos;
		}
		
//Guardar fechas de evaluacion del periodo

	function guardarFecha($fecha,$id_periodo)
	{
			$obj_sQuery=new sQuery();
			$query1="	INSERT INTO evaluacion (fecha_evaluacion,id_periodo) 
						VALUES ($fecha,$id_periodo)";

			$obj_sQuery->executeQuery($query1); // ejecuta la consulta para  guardar el registro 
	}
	
	
}


?>