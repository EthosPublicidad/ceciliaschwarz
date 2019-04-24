<?php  
require_once "Modelo.php"; 

class Categoria extends Modelo
{     
	private $id;
	private $descripcion;
	private $estado;
	
    public function __construct($descripcion) 
    { 
		$this->descripcion = $descripcion;
        parent::__construct(); 
    }
	
    public function getId() 
    { 
		return $this->id;
    } 

    public function getDescripcion() 
    { 
		return $this->descripcion;
    } 

    public function setDescripcion($descripcion) 
    { 
		$this->descripcion = $descripcion;
    } 

	public function guardar()
    {	
		$descripcion = $this->descripcion;
		
		$this->_db->query("INSERT INTO categoria (descripcion) VALUES('$descripcion')");

		if($this->_db->error){
			$msg = $this->_db->error; 		
		}else{
			$msg = 'Alta satisfactoria'; 		
		}
		$this->_db->close();
   		return $msg; 
    } 
}
?>