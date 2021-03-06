<?php  
require_once "Modelo.php"; 
require_once "Cliente.php"; 

class GestionCliente extends Modelo
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

    public function login($mail, $clave) 
    {
        $result = $this->_db->query("SELECT * FROM cliente WHERE mail = '$mail'"); 
        $clientes = $result->fetch_all(MYSQLI_ASSOC); 
        if (count($clientes) == 1) {
            if (password_verify($clave, $clientes[0]['clave'])) {
                $_SESSION['login'] = true;
                return $clientes[0]; 
            } else {
                return false;
            }
        } else {
            return false;
        }
    } 

    public function modificarCliente($id, $apellidonombre, $mail, $telefono) 
    {
        $this->_db->query("UPDATE cliente 
                           SET  apellidonombre = '$apellidonombre', mail = '$mail', telefono = '$telefono' 
                           WHERE id = $id");
        if($this->_db->error){
            $msg = $this->_db->error;       
        }else{
            $msg = 'Edición satisfactoria';         
        }
        $this->_db->close();
        return $msg; 
    }
    
}
?>