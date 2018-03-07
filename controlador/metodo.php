<?php 
/**
* controlador de metodo
*/

require_once "modelo/metodo.php";

class Controlador_metodo{
	
	private $obj_metodo;

	public function __construct()
	{
		$this->obj_metodo = new Modelo_metodo();
	}
	
	public function registrar_metodo(){
			$this->obj_metodo->set_descripcion($_POST['descripcion']);

			$resultados = $this->obj_metodo->insertar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo insertarse..";

			}else{

				header("location: ?controller=front&action=metodo&id_action=3");
			}
	}
	
	public function modificar_metodo(){
	        $this->obj_metodo->set_id($_POST['id']);
			$this->obj_metodo->set_descripcion($_POST['descripcion']);

			$resultados = $this->obj_metodo->actualizar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo modificarse..";

			}else{

				header("location: ?controller=front&action=metodo&id_action=5");
			}
	}

	public function eliminar_metodo(){
            $this->obj_metodo->set_id($_POST['id']);
			$resultados = $this->obj_metodo->eliminar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo eliminarse..";

			}else{

				header("location: ?controller=front&action=metodo&id_action=6");
			}
	}
	
	
	
}
?>