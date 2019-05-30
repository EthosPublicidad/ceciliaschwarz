<?php  
require_once "Modelo.php"; 
require_once "Usuario.php"; 

class GestionUsuario extends Modelo
{     
    public function __construct() 
    { 
        parent::__construct(); 
    } 

	public function login($usuario, $clave) 
    {
        $result = $this->_db->query("SELECT * FROM usuario WHERE usuario = '$usuario'"); 
        $users = $result->fetch_all(MYSQLI_ASSOC); 
        if (count($users) == 1) {
            return password_verify($clave, $users[0]['clave']);
            if (password_verify($clave, $users['clave'])) {
                return $users; 
            }
        } else {
            return $users;
        }
    } 

    public function traerUsuarios()
    {
		$result = $this->_db->query('SELECT * FROM usuario'); 
        $users = $result->fetch_all(MYSQLI_ASSOC); 
        return $users; 
    } 

    public function traerpormail($mail) 
    {
        $result = $this->_db->query("SELECT * FROM usuario WHERE mail = '$mail' LIMIT 1"); 
        $users = $result->fetch_all(MYSQLI_ASSOC); 
        return $users; 
    } 
    
    public function modificarUsuario($id, $apellidonombre, $usuario, $clave, $mail, $telefono) 
    {
		$this->_db->query("UPDATE usuario 
						   SET  apellidonombre = '$apellidonombre', usuario = '$usuario', clave = '$clave', mail = '$mail', telefono = '$telefono' 
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
		$this->_db->query("UPDATE usuario 
						   SET  estado = 'B' 
						   WHERE id = $id ") or die($this->_db->error);
		$this->_db->close();
   		return $msg;
    }

    public function activar($id) 
    {
		$msg = 'Activacion satisfactoria';
		$this->_db->query("UPDATE usuario 
						   SET  estado = 'A' 
						   WHERE id = $id ") or die($this->_db->error);
		$this->_db->close();
   		return $msg;
    }
}
?>