<?php 
/**
MODELO DE PROGRAMA:

METODOS:


**/
require_once "database/conexion.php";
class Modelo_programa{

	private $pdo;
	private $id;
	private $id_macroproyecto;
	private $nombre;
	private $descripcion;
	private $area;
	
	
	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_id_macroproyecto($id_macroproyecto){$this->id_macroproyecto = $id_macroproyecto;}
	public function get_id_macroproyecto(){return $this->id_macroproyecto;}

	public function set_nombre($nombre){$this->nombre = $nombre;}
	public function get_nombre(){return $this->nombre;}
	
	public function set_descripcion($descripcion){$this->descripcion = $descripcion;}
	public function get_descripcion(){return $this->descripcion;}
	
	public function set_area($area){$this->area = $area;}
	public function get_area(){return $this->area;}	
	
	public function insertar(){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO programa(id_macroproyecto, 
            nombre, descripcion, area) VALUES ('$this->id_macroproyecto','$this->nombre','$this->descripcion','$this->area')");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function actualizar(){

		try
			{	
				$sql = $this->pdo->prepare("UPDATE programa SET id = '$this->id', id_macroproyecto = '$this->id_macroproyecto', nombre = '$this->nombre', descripcion = '$this->descripcion', area = '$this->area' WHERE id = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
	

	public function eliminar(){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM programa WHERE id = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function todos(){
	
		try
			{	
				$query = $this->pdo->prepare("SELECT * FROM programa");
				$query->execute();
				return $query->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
	
}
?>