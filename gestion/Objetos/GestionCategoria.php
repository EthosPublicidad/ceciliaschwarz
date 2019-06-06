<?php  
require_once "Modelo.php"; 
require_once "Categoria.php"; 

class GestionCategoria extends Modelo
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function traerCategorias()
    {
		$result = $this->_db->query('SELECT * FROM categoria ORDER BY descripcion ASC'); 
        $categorias = $result->fetch_all(MYSQLI_ASSOC); 
        return $categorias; 
    } 
    
    public function modificarCategoria($id, $descripcion) 
    {
		$this->_db->query("UPDATE categoria 
						   SET  descripcion = '$descripcion' 
						   WHERE id = $id");
		if($this->_db->error){
			$msg = $this->_db->error; 		
		}else{
			$msg = 'Edición satisfactoria'; 		
		}
		$this->_db->close();
   		return $msg; 
    }

    public function eliminar($id) 
    {
		$msg = 'Baja satisfactoria';
		$this->_db->query("UPDATE categoria 
						   SET  estado = 'B' 
						   WHERE id = $id ") or die($this->_db->error);
		$this->_db->close();
   		return $msg;
    }

    public function activar($id) 
    {
		$msg = 'Activacion satisfactoria';
		$this->_db->query("UPDATE categoria 
						   SET  estado = 'A' 
						   WHERE id = $id ") or die($this->_db->error);
		$this->_db->close();
   		return $msg;
    }
}
?>