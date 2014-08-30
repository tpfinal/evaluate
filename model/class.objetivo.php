<?php
class objetivo{

private $id;
private $nombre;
private $descripcion;
private $tipo;

public function __construct($nombre,$descripcion,$tipo,$id=0)
{
	$this->nombre=$nombre;
	$this->descripcion=$descripcion;
	$this->tipo=$tipo;
	$this->id=$id;
}

// metodos que devuelven valores

	function getNombre()
	 { return $this->nombre;}
	function getDescripcion()
	 { return $this->descripcion;}
	function getTipo()
	 { return $this->tipo;}
	function getId()
	 { return $this->id;}

	 
// metodos que setean los valores
	function setNombre($val)
	 { $this->nombre=$val;}
	function setDescripcion($val)
	 {  $this->descripcion=$val;}
	function setTipo($val)
	 {  $this->tipo=$val;}

}
?>