<?php 
/**
MODELO DE NOTICIA:

METODOS:


**/
require_once "database/conexion.php";
class Modelo_noticia{

	private $pdo;
	private $id_noticias;
	private $titulo;
	private $contenido;
	private $fecha;
	private $hora;
	private $estado;
	private $usuario;
    private $objetivo_especifico;
    private $resumen;
	
	
	public function __construct(){
		$this->pdo = new Conexion();
	}

	public function set_id_noticias($id_noticias){$this->id_noticias = $id_noticias;}
	public function get_id_noticias(){return $this->id_noticias;}

	public function set_titulo($titulo){$this->titulo = $titulo;}
	public function get_titulo(){return $this->titulo;}
	
	public function set_contenido($contenido){$this->contenido = $contenido;}
	public function get_contenido(){return $this->contenido;}

	public function set_fecha($fecha){$this->fecha = $fecha;}
	public function get_fecha(){return $this->fecha;}
	
	public function set_hora($hora){$this->hora = $hora;}
	public function get_hora(){return $this->hora;}
	
	public function set_estado($estado){$this->estado = $estado;}
	public function get_estado(){return $this->estado;}
	
	public function set_usuario($usuario){$this->usuario = $usuario;}
	public function get_usuario(){return $this->usuario;}
	
	
	public function insertar(){

		try
			{	
				$sql = $this->pdo->prepare("INSERT INTO noticias(titulo, contenido, 
            fecha, hora, estado, usuario) VALUES ('$this->titulo','$this->contenido',current_date, current_time,'$this->estado','$this->usuario')");
				$result = $sql->execute();
				return $result;
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function actualizar(){

		try
			{	
				$sql = $this->pdo->prepare("UPDATE noticias SET titulo = '$this->titulo', contenido = '$this->contenido', fecha = current_date, hora = current_time, estado = '$this->estado', usuario = '$this->usuario' WHERE id_noticias = '$this->id_noticias'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}
	

	public function eliminar(){

		try
			{	
				$sql = $this->pdo->prepare("DELETE FROM noticias WHERE id_noticias = '$this->id_noticias'");
				return $sql->execute();
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}		
	}

	public function todos(){
	
		try
			{	
				$query = $this->pdo->prepare("SELECT * FROM noticias");
				$query->execute();
				return $query->fetchAll(PDO::FETCH_OBJ);
				parent::setAttribute(PDO::ATTR_ERRMODE,-PDO::ERRMODE_EXCEPTION);
			
		}catch(Exception $e){	
				echo 'ERROR : '.$e->getMessage();
		}	
	}


}
?>