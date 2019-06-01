<?php  
require_once "Modelo.php"; 

class getCategoriaServicioId extends Modelo
{     
	private $id;
	private $nombre;
	
    public function __construct($nombre, $precio, $categoriaServicioId) 
    { 
		$this->setNombre($nombre);

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

}
?>