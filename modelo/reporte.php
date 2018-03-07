<?php 
/**
MODELO DE REPORTE:


**/
require_once "database/conexion.php";
class Modelo_reporte{

	private $pdo;
	private $id;
	private $id_tipo;
	private $id_usuario;
	private $firma1;
	private $firma2;
	private $fecha;
	private $hora;
	
	
	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id($id){$this->id = $id;}
	public function get_id(){return $this->id;}
	
	public function set_id_tipo($id_tipo){$this->id_tipo = $id_tipo;}
	public function get_id_tipo(){return $this->id_tipo;}
	
	public function set_id_usuario($id_usuario){$this->id_usuario = $id_usuario;}
	public function get_id_usuario(){return $this->id_usuario;}
	
	public function set_firma1($firma1){$this->firma1 = $firma1;}
	public function get_firma1(){return $this->firma1;}
	
	public function set_firma2($firma2){$this->firma2 = $firma2;}
	public function get_firma2(){return $this->firma2;}
		
	public function insertar(){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO reporte(id_usuario, id_tipo, firma1, firma2, fecha, hora) VALUES ('$this->id_usuario', '$this->id_tipo', '$this->firma1', '$this->firma2', current_date, current_time)");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	

	public function eliminar(){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM reporte WHERE id = '$this->id'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function todos(){
	
		try
			{	
				$query = $this->pdo->prepare("SELECT * FROM reporte");
				$query->execute();
				return $query->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}
	
}
?>