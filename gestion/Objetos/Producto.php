<?php  
require_once "Modelo.php"; 

class Producto extends Modelo
{     
	private $id;
	private $descripcion;
	private $precio;
	private $categoria;
	private $estado;
	private $foto1;
	private $foto2;
	private $foto3;
	private $stock;
	private $destacado;
	private $tendencia;
	private $oferta;
	private $infodetallada;

    public function __construct($descripcion, $precio, $categoria, $foto1, $foto2, $foto3, $stock, $destacado, $tendencia, $oferta, $infodetallada) 
    { 
		$this->descripcion = $descripcion;
		$this->precio = $precio;
		$this->categoria = $categoria;
		$this->foto1 = $foto1;
		$this->foto2 = $foto2;
		$this->foto3 = $foto3;
		$this->stock = $stock;
		$this->destacado = $destacado;
		$this->tendencia = 1;
		$this->oferta = $oferta;
		$this->infodetallada = $infodetallada;

        parent::__construct(); 
    }

	public function guardar() 
    {	
		$descripcion = $this->descripcion;
		$precio = $this->precio;
		$categoria = $this->categoria;
		$foto1 = $this->foto1;
		$foto2 = $this->foto2;
		$foto3 = $this->foto3;
		
		$this->_db->query("INSERT INTO productos (descripcion, precio, categoria, foto1, foto2, foto3, stock, destacado, tendencia, oferta, infodetallada) 
						   VALUES('$descripcion', $precio, '$categoria', '$foto1', '$foto2', '$foto3', $this->stock, $this->destacado, $this->tendencia, $this->oferta, '$this->infodetallada')");

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