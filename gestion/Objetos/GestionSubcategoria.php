<?php  
require_once "Modelo.php"; 
require_once "Subcategoria.php"; 

class GestionSubcategoria extends Modelo
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function traerSubcategorias()
    {
		$result = $this->_db->query('SELECT s.*, c.descripcion categoria FROM subcategoria s, categoria c WHERE s.categoria = c.id ORDER BY s.descripcion ASC'); 
        $subcategorias = $result->fetch_all(MYSQLI_ASSOC); 
        return $subcategorias; 
    } 
    
    public function modificarsubcategoria($id, $descripcion, $idcategoria) 
    {
		$this->_db->query("UPDATE subcategoria 
						   SET  descripcion = '$descripcion' AND categoria = $idcategoria
						   WHERE id = $id");
		if($this->_db->error){
			$msg = $this->_db->error; 		
		}else{
			$msg = 'Edicion satisfactoria'; 		
		}
		$this->_db->close();
   		return $msg; 
    }

    public function eliminar($id) 
    {
		$msg = 'Baja satisfactoria';
		$this->_db->query("UPDATE subcategoria 
						   SET  estado = 'B' 
						   WHERE id = $id ") or die($this->_db->error);
		$this->_db->close();
   		return $msg;
    }

    public function activar($id) 
    {
		$msg = 'Activacion satisfactoria';
		$this->_db->query("UPDATE subcategoria 
						   SET  estado = 'A' 
						   WHERE id = $id ") or die($this->_db->error);
		$this->_db->close();
   		return $msg;
    }
}
?>