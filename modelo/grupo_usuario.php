<?php 
/**
MODELO DE GRUPO_USUARIO:

METODOS:


**/
require_once "database/conexion.php";
class Modelo_grupo_usuario{

	private $pdo;
	private $id_gu;
	private $id_usuario;
	private $id_grupo;
	private $descripcion;


	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id_gu($id_gu){$this->id_gu = $id_gu;}
	public function get_id_gu(){return $this->id_gu;}

	public function set_id_usuario($id_usuario){$this->id_usuario = $id_usuario;}
	public function get_id_usuario(){return $this->id_usuario;}
	
	public function set_id_grupo($id_grupo){$this->id_grupo = $id_grupo;}
	public function get_id_grupo(){return $this->id_grupo;}

	public function set_descripcion($descripcion){$this->descripcion = $descripcion;}
	public function get_descripcion(){return $this->descripcion;}
	
	
	public function insertar(){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO grupo_usuario(id_usuario, id_grupo, descripcion) VALUES ('$this->id_usuario','$this->id_grupo','$this->descripcion')");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
	

	public function eliminar(){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM grupo_usuario WHERE id_gu = '$this->id_gu'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function listar(){
	
		try
			{	
				$query = $this->pdo->prepare("SELECT * FROM grupo_usuario");
				$query->execute();
				return $query->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
}

?>