<?php  
class Modelo 
{ 

	private $host = "localhost";
	private $user = "root";
	private $pass = "root";
	private $bd = "bd_cecilia";

	/* private $host = "localhost";
	private $user = "c0020542_tecone";
	private $pass = "Tecone2017";
	private $bd = "c0020542_tecone";
 */
    protected $_db;

    public function __construct() 
    { 
        $this->_db = new mysqli($this->host, $this->user, $this->pass, $this->bd); 
        if ( $this->_db->connect_errno ) 
        { 
            echo "Fallo al conectar a MySQL: ". $this->_db->connect_error; 
            return;     
        } 
        $this->_db->set_charset("utf-8"); 
    } 

    public function get($table, $id) 
    {
		if($table=="productos"){
			$result = $this->_db->query("SELECT p.*, c.descripcion as categoria FROM productos p, categoria c WHERE p.id = $id AND p.categoria = c.id"); 
			$entity = $result->fetch_all(MYSQLI_ASSOC); 
			return $entity; 
		}else{
			$result = $this->_db->query("SELECT * FROM $table WHERE id = $id"); 
			$entity = $result->fetch_all(MYSQLI_ASSOC); 
			return $entity; 
		}
    } 
} 
?>
