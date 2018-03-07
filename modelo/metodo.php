<?php 
/**
MODELO DE METODO:


**/
require_once "database/conexion.php";
class Modelo_metodo{

	private $pdo;
	private $id;
	private $descripcion;
	
	
	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_descripcion($descripcion){$this->descripcion = $descripcion;}
	public function get_descripcion(){return $this->descripcion;}
	
	public function insertar(){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO metodo(descripcion) VALUES ('$this->descripcion')");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function actualizar(){

		try
			{	
				$sql = $this->pdo->prepare("UPDATE metodo SET id = '$this->id', descripcion = '$this->descripcion' WHERE id = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
	

	public function eliminar(){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM metodo WHERE id = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function todos(){
	
		try
			{	
				$query = $this->pdo->prepare("SELECT * FROM metodo");
				$query->execute();
				return $query->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
	
}
?>