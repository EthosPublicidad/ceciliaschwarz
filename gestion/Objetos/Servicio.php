<?php  
require_once "Modelo.php"; 

class Servicio extends Modelo
{     
	private $id;
	private $nombre;
	private $precio;
	private $descripcion;
	private $categoriaServicioId;
	
    public function __construct($nombre, $precio, $descripcion, $categoriaServicioId) 
    { 
		$this->setNombre($nombre);
		$this->setPrecio($precio);
		$this->setDescripcion($descripcion);
		$this->setCategoriaServicioId($categoriaServicioId);
        parent::__construct(); 
    }
	
    public function getId() 
    { 
		return $this->id;
    } 

    public function getNombre() 
    { 
		return $this->nombre;
    } 

    public function setNombre($nombre) 
    { 
		$this->nombre = $nombre;
    }

    public function getPrecio() 
    { 
		return $this->precio;
    } 

    public function setPrecio($precio) 
    { 
		$this->precio = $precio;
    }

    public function getDescripcion() 
    { 
		return $this->descripcion;
    } 

    public function setDescripcion($descripcion) 
    { 
		$this->descripcion = $descripcion;
    }  

    public function getCategoriaServicioId() 
    { 
		return $this->categoriaServicioId;
    } 

    public function setCategoriaServicioId($categoriaServicioId) 
    { 
		$this->categoriaServicioId = $categoriaServicioId;
    } 
}
?>