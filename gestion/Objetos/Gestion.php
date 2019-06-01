<?php  
require_once "Modelo.php"; 

class Gestion extends Modelo
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 
	public function agregar($id, $cantidad){
		if(!isset($_SESSION['pedido'])){
			$_SESSION['pedido'] = array();
		}
		$arraypedido = $_SESSION['pedido'];
		$msg = '';
		$producto = array('id'=>$id, 'cantidad'=>$cantidad);
		foreach($arraypedido as $pedido){
			if($pedido['id']==$id){
				$msg = "El producto ya se encuentra en la lista del pedido.";
				break;
			}
		}
		if($msg == ''){
			$arraypedido[] = $producto;
			$msg = "Producto agregado al pedido.";
			$_SESSION['pedido'] = $arraypedido;
		}

		return $msg;
	}
	public function sacar($id){
		$arraypedido = $_SESSION['pedido'];
		$arraypedidofinal = array();
		$msg = '';
		foreach($arraypedido as $pedido){
			if($pedido['id']==$id){
				$msg = 'Producto quitado del pedido!';
			}else{
				$arraypedidofinal[] = $pedido; 
			}
		}
		$_SESSION['pedido'] = $arraypedidofinal;

		return $msg;
	}
	public function vaciar(){
		$_SESSION['pedido'] = array();
	}

	public function traerProductos(){
		$arrayfinal = array();
		if(isset($_SESSION['pedido'])){
			$arraypedido = $_SESSION['pedido'];
			foreach($arraypedido as $pedido){
				$producto = $this->get('productos', $pedido['id']);
				$arrayfinal[] = array('id'=>$pedido['id'], 'descripcion'=>$producto[0]['descripcion'], 'precio'=>$producto[0]['precio'], 'cantidad'=>$pedido['cantidad'], 'foto'=>$producto[0]['foto1'], 'categoria'=>$producto[0]['categoria']);
			}
		}		
		return $arrayfinal;
	}
	
	public function traerClientes(){
		$result = $this->_db->query("SELECT * FROM cliente ORDER BY apellidonombre DESC"); 
		$respuesta = $result->fetch_all(MYSQLI_ASSOC);
		return $respuesta;
	}

	public function traerPedidos(){
		$result = $this->_db->query("SELECT p.*, c.apellidonombre as cliente, c.mail as clientemail, c.telefono as clientetelefono FROM pedido p, cliente c WHERE p.idcliente = c.id ORDER BY id DESC"); 
		$respuesta = $result->fetch_all(MYSQLI_ASSOC);
		return $respuesta;
	}

	public function traerServicios(){
		$result = $this->_db->query("SELECT * FROM servicio");
		$respuesta = $result->fetch_all(MYSQLI_ASSOC);
		return $respuesta;
	}

	public function crearPedido($idcliente, $total, $comentarios, $fecha) 
    {	
		$this->_db->query("INSERT INTO pedido (idcliente, total, comentarios, fecha, estadopago) 
						   VALUES('$idcliente', '$total', '$comentarios', '$fecha', 'PENDIENTE')");

		if($this->_db->error){
			echo $this->_db->error;
			$respuesta = null; 		
		}else{
			$result = $this->_db->query("SELECT * FROM pedido WHERE estado = 'A' ORDER BY id DESC LIMIT 1"); 
			$respuesta = $result->fetch_all(MYSQLI_ASSOC);
		}
   		return $respuesta; 
    } 
	
	public function buscarCliente($mail) 
    {	
		$result = $this->_db->query("SELECT * FROM cliente WHERE mail = '$mail' LIMIT 1"); 
		$respuesta = $result->fetch_all(MYSQLI_ASSOC);

   		return $respuesta; 
    } 
	
	public function traerCliente($id) 
    {	
		$result = $this->_db->query("SELECT * FROM cliente WHERE id = $id"); 
		$respuesta = $result->fetch_all(MYSQLI_ASSOC);

   		return $respuesta; 
    } 
	
	public function loginCliente($mail, $clave) 
    {
        $result = $this->_db->query("SELECT * FROM cliente WHERE mail = '$mail'"); 
        $clientes = $result->fetch_all(MYSQLI_ASSOC); 
        if (count($clientes) == 1) {
            if (password_verify($clave, $clientes[0]['clave'])) {
                return $clientes[0]; 
            } else {
                return false;
            }
        } else {
            return false;
        }
    } 
	
	public function crearCliente($apenom, $mail, $telefono, $clave) 
    {	
    	$clave = password_hash($clave);
		$this->_db->query("INSERT INTO cliente (apellidonombre, mail, telefono, clave) 
						   VALUES('$apenom', '$mail', '$telefono', '$clave')");
		if($this->_db->error){
			echo $this->_db->error;
			$respuesta = null; 		
		}else{
			$result = $this->_db->query("SELECT * FROM cliente ORDER BY id DESC LIMIT 1"); 
			$respuesta = $result->fetch_all(MYSQLI_ASSOC);
		}

   		return $respuesta; 
    } 

	public function traerDetallesPedido($idpedido) 
    {	
		$result = $this->_db->query("SELECT dt.*, p.descripcion nombreproducto FROM detallepedido dt, productos p WHERE dt.idpedido = $idpedido AND dt.idproducto = p.id"); 
		$detalles = $result->fetch_all(MYSQLI_ASSOC);

		return $detalles;
	}
	public function crearDetallePedido($idpedido, $idproducto, $precio, $cantidad) 
    {	
		$result = $this->_db->query("SELECT stock FROM productos WHERE id = $idproducto"); 
		$producto = $result->fetch_all(MYSQLI_ASSOC);
		$stock = $producto[0]["stock"] - $cantidad;

		$this->_db->query("UPDATE productos SET stock = $stock WHERE id = $idproducto");
		echo $this->_db->error;

		$this->_db->query("INSERT INTO detallepedido (idpedido, idproducto, precio, cantidad) 
						   VALUES('$idpedido', '$idproducto', '$precio', '$cantidad')");
		echo $this->_db->error;

		if($this->_db->error){
			echo $this->_db->error;
			$respuesta = $this->_db->error; 		
		}else{
			$respuesta = "OK";
		}
		
   		return $respuesta; 
    } 

	public function pagorealizado($idpedido) 
    {	
		$this->_db->query("UPDATE pedido SET estadopago = 'PAGADO' WHERE id = $idpedido");
    } 

}
?>