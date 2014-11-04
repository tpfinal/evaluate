<?php

class adoObjetivo
{
//se declaran los atributos de la clase, que son los atributos de la clase empleado
private $nombre;
private $descripcion;
private $tipo;
private $id_perfil;

private $obj_objetivo;

//metodo que obtiene el id del empleado pasando como argumento el numero de dni
	
	function getIdByName($name) 
	{
			$obj_cliente=new sQuery();
			$result=$obj_cliente->executeQuery("select id_objetivo from objetivos where nombre_objetivo = $name"); // ejecuta la consulta para encontrar el id
			$row=mysql_fetch_array($result);
			$this->id=$row['id_objetivo'];
			
			return $this->id;
	}
	
//metodo que trae un objeto OBJETIVO mediante el nombre
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
	
//metodo que trae un objeto OBJETIVO mediante el Id
	function getObjetivoById($id) 
	{
	if ($id)
		{
			$obj_query=new sQuery();
			$result=$obj_query->executeQuery("SELECT * FROM objetivos WHERE id_objetivo = $id"); // ejecuta la consulta para traer el objetivo
			$row=mysql_fetch_array($result);		
			$this->id=$row['id_objetivo'];
			$this->nombre=$row['nombre_objetivo'];
			$this->descripcion=$row['descripcion_objetivo'];
			$this->tipo=$row['tipo_objetivo'];
			$this->id_perfil=$row['id_perfil'];
			
	//creamos el objeto objetivo con los datos recividos
		$this->obj_objetivo = new objetivo($this->nombre,$this->descripcion,$this->tipo,$this->id_perfil,$this->id);
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
	
//Borra los registros de las tablas Empleados y Usuarios usando el id del objetivo
		function eliminarObjetivo($id)	
	{
			$obj_cliente=new sQuery();
			$query1="DELETE FROM objetivo WHERE id_objetivo=$id";

			$obj_cliente->executeQuery($query1); // ejecuta la consulta para  borrar el registro del objetivo
		
	}	
	
//Regresa un array con los nombres de los objetivos y los id como indices de un empleado
	function getObjetivos($id_empleado,$id_periodo)	
	{
			$obj_cliente=new sQuery();
			$query1="	SELECT id_objetivo,nombre_objetivo
						FROM objetivos as o 
						JOIN empleados_periodo as ep
						WHERE o.id_perfil=ep.id_perfil
						AND ep.id_perfil=( 	SELECT id_perfil
											FROM empleados_periodo
											WHERE id_empleado=$id_empleado
											AND id_periodo=$id_periodo )
						AND ep.id_empleado=$id_empleado
						AND ep.id_periodo=$id_periodo";

		$result=$obj_cliente->executeQuery($query1); // ejecuta la consulta para  borrar el registro del objetivo
			
//llenamos el array de objetivos con los datos recividos
		while($row=mysql_fetch_array($result))
		{
			$this->array_objetivos[$row['id_objetivo']]=$row['nombre_objetivo'];
		}
			
		//var_dump($result);
		//var_dump($this->array_objetivos); //para ver el contenido del array
	
		return @$this->array_objetivos;
		
		
	}	
	
	//Retorna un array con las fechas de evaluacion de un ojetivo

		function getFechasEvaluacion($id_objetivo,$id_empleado,$id_periodo)
		{
			$obj_sQuery=new sQuery();
			$result=$obj_sQuery->executeQuery(" SELECT ev.id_evaluacion,o.nombre_objetivo,ev.fecha_evaluacion
												FROM objetivos as o 
												JOIN empleados_periodo as ep ON o.id_perfil=ep.id_perfil
												JOIN evaluacion as ev ON ev.id_periodo=ep.id_periodo
												WHERE ep.id_periodo=$id_periodo
												AND ep.id_empleado=$id_empleado
												AND o.id_objetivo=$id_objetivo	"); 

	//llenamos el array de empleados con los datos recividos
		while($row=mysql_fetch_array($result))
		{
			$this->array_fechas[$row['id_evaluacion']]=$row['fecha_evaluacion'];
		}
			
		//var_dump($this->array_fechas); //para ver el contenido del array
	
		return $this->array_fechas;
		}
		
/////----------------------------METODOS PARA NOTAS------------------------------//////		
		
		
//metodo que almacena los datos en la tabla nota
	public function guardarNota($id_objetivo,$id_empleado,$id_evaluacion,$nota)
	{
	
		$obj_sQuery=new sQuery();
		$query="INSERT INTO notas(id_objetivo,id_empleado,id_evaluacion,nota)
				VALUES('$id_objetivo','$id_empleado','$id_evaluacion','$nota')";
				
		$obj_sQuery->executeQuery($query); // ejecuta la consulta para insertar objetivo
		
	}

//metodo que recupera una nota ya guardada
	public function getNota($id_objetivo,$id_empleado,$id_evaluacion)
	{
	
		$obj_sQuery=new sQuery();
		$query="SELECT  nota
				FROM notas
				WHERE id_objetivo='$id_objetivo'
				AND id_empleado='$id_empleado'
				AND id_evaluacion='$id_evaluacion'";
				
		$result=$obj_sQuery->executeQuery($query); // ejecuta la consulta para insertar objetivo
			
			$row=mysql_fetch_array($result);
			$nota=$row['nota'];
		
		//var_dump($nota);
		
		return $nota;
		
	}	
	
//metodo que dado un array de fechas regresa el id de la fecha correspondiente al periodo actual
// en caso de no haber ninguna fecha que coinsida regresa "0"
	public function evaluacionActual($arrayDeFechas)
	{
	$hoy=date("Y-m-d");
	$id=0;

	foreach($arrayDeFechas as $key=>$fecha)
	{
		if($fecha<=$hoy)
		{
			$id=$key;
		}		
	}
	return $id;
	}
		
	
}


?>