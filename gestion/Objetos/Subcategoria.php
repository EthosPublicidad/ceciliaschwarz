<?php  
require_once "Modelo.php"; 

class Subcategoria extends Modelo
{     
	private $id;
	private $descripcion;
	private $idcategoria;
	private $estado;
	
    public function __construct($descripcion, $idcategoria) 
    { 
		$this->descripcion = $descripcion;
		$this->idcategoria = $idcategoria;
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
		$this->_db->query("INSERT INTO subcategoria (descripcion, categoria) VALUES('$this->descripcion', $this->idcategoria)");

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