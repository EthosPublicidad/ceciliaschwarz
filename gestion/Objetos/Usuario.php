<?php  
require_once "Modelo.php"; 

class Usuario extends Modelo
{     
	private $id;
	private $apellidonombre;
	private $usuario;
	private $clave;
	private $mail;
	private $telefono;
	private $estado;
	
    public function __construct($apenom, $usuario, $clave, $mail, $telefono) 
    { 
		$this->apellidonombre = $apenom;
		$this->setUsuario($usuario);
		$this->setClave($clave);
		$this->mail = $mail;
		$this->telefono = $telefono;
        parent::__construct(); 
    }
	
    public function getId() 
    { 
		return $this->id;
    } 

    public function getApellidonombre() 
    { 
		return $this->apellidonombre;
    } 

    public function setApellidonombre($apenom) 
    { 
		$this->apellidonombre = $apenom;
    } 

    public function getUsuario() 
    { 
		return $this->usuario;
    } 

    public function setUsuario($usuario) 
    { 
		$this->usuario = $usuario;
    } 

    public function getClave() 
    { 
		return $this->clave;
    } 

    public function setClave($clave) 
    { 
		$this->clave = $clave;
    } 

    public function getEstado() 
    { 
		return $this->estado;
    }

    public function setEstado($estado) 
    { 
		$this->estado = $estado;
    }
	public function guardar() 
    {	
		$apellidonombre = $this->apellidonombre;
		$usuario = $this->usuario;
		$clave = $this->clave;
		$telefono = $this->telefono;
		$mail = $this->mail;
		
		$this->_db->query("INSERT INTO usuario (apellidonombre, usuario, clave, mail, telefono) 
						   VALUES('$apellidonombre', '$usuario', '$clave', '$mail', '$telefono')");

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