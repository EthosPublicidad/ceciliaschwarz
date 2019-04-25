<?php  
require_once "Modelo.php"; 
require_once "Producto.php"; 

class GestionProducto extends Modelo
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function traerProductos()
    {
		$result = $this->_db->query('SELECT p.*, p.categoria idcategoria, c.descripcion categoria FROM productos p, categoria c WHERE p.categoria = c.id'); 
		$productos = $result->fetch_all(MYSQLI_ASSOC); 
		return $productos; 
    } 

    public function traerProductosActivos()
    {
		$result = $this->_db->query('SELECT p.*, p.categoria idcategoria, c.descripcion categoria FROM productos p, categoria c WHERE p.categoria = c.id AND p.estado = "A" AND p.stock > 0'); 
		$productos = $result->fetch_all(MYSQLI_ASSOC); 
		return $productos; 
    } 

    public function traerDestacados()
    {
		$result = $this->_db->query('
		SELECT p.*, p.categoria idcategoria, c.descripcion categoria 
		FROM productos p, categoria c 
		WHERE p.destacado = 1 AND p.categoria = c.id AND p.estado = "A" AND p.stock > 0'); 
		$productos = $result->fetch_all(MYSQLI_ASSOC); 
		return $productos; 
    } 

    public function traerTendencias()
    {
		$result = $this->_db->query('
		SELECT p.*, p.categoria idcategoria, c.descripcion categoria 
		FROM productos p, categoria c
		WHERE p.tendencia = 1 AND p.categoria = c.id AND p.estado = "A" AND p.stock > 0'); 
		$productos = $result->fetch_all(MYSQLI_ASSOC); 
		return $productos; 
    } 

    public function traerPorCategoria($id)
    {
		if($id=="TODO"){
			$result = $this->_db->query("SELECT p.*, p.categoria idcategoria, c.descripcion categoria 
									 FROM productos p, categoria c 
									 WHERE p.categoria = c.id AND p.estado = 'A' AND p.stock > 0"); 
		}else{
			$result = $this->_db->query("SELECT p.*, p.categoria idcategoria, c.descripcion categoria 
										 FROM productos p, categoria c 
										 WHERE p.categoria = c.id AND c.id = $id AND p.estado = 'A' AND p.stock > 0"); 
		}
		$productos = $result->fetch_all(MYSQLI_ASSOC); 

		return $productos; 
    } 

    public function traerUltimoId()
    {
		$result = $this->_db->query('SELECT p.* FROM productos p ORDER BY p.id DESC LIMIT 1'); 
		$productos = $result->fetch_all(MYSQLI_ASSOC); 
		return $productos; 
    } 

    public function getProducto($id) 
    {
        $result = $this->_db->query("SELECT p.*, p.categoria idcategoria, c.descripcion categoria FROM productos p, categoria c WHERE p.categoria = c.id AND p.id = $id"); 
        $productos = $result->fetch_all(MYSQLI_ASSOC); 
        return $productos; 
    } 

    public function filtro($palabra) 
    {
        $result = $this->_db->query("
		SELECT p.*, p.categoria idcategoria, c.descripcion categoria 
		FROM productos p, categoria c 
		WHERE p.categoria = c.id AND p.descripcion LIKE '%$palabra%' AND p.stock > 0"); 
        $productos = $result->fetch_all(MYSQLI_ASSOC); 
        return $productos; 
    } 
    
    public function modificarProducto($id, $descripcion, $precio, $categoria, $foto1, $foto2, $foto3, $stock, $destacado, $tendencia, $oferta, $infodetallada) 
    {
		$sql ="	UPDATE 	productos 
				SET  	descripcion = '$descripcion', 
						precio = $precio,";
		if($foto1!=''){$sql.="foto1 = '$foto1',";}
		if($foto2!=''){$sql.="foto2 = '$foto2',";}
		if($foto3!=''){$sql.="foto3 = '$foto3',";}

		$sql.="	categoria = '$categoria',
				stock = $stock,
				destacado = $destacado,
				tendencia = 1,
				oferta = $oferta,
				infodetallada = '$infodetallada'
			    WHERE id = $id";
		$this->_db->query($sql);
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
		$this->_db->query("UPDATE productos 
						   SET  estado = 'B' 
						   WHERE id = $id ") or die($this->_db->error);
		$this->_db->close();
   		return $msg;
    }

    public function activar($id) 
    {
		$msg = 'Activacion satisfactoria';
		$this->_db->query("UPDATE productos 
						   SET  estado = 'A' 
						   WHERE id = $id ") or die($this->_db->error);
		$this->_db->close();
   		return $msg;
    }
}
?>