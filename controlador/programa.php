<?php 
/**
* controlador de programa
*/

require_once "modelo/programa.php";

class Controlador_programa{
	
	private $obj_programa;

	public function __construct()
	{
		$this->obj_programa = new Modelo_programa();
	}
	
	public function registrar_programa(){
			$this->obj_programa->set_id_macroproyecto($_POST['id_macroproyecto']);
			$this->obj_programa->set_nombre($_POST['nombre']);
			$this->obj_programa->set_descripcion($_POST['descripcion']);
			$this->obj_programa->set_area($_POST['area']);

			$resultados = $this->obj_programa->insertar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo insertarse..";

			}else{

				header("location: ?controller=front&action=programa&id_action=3");
			}
	}
	
	public function modificar_programa(){
	        $this->obj_programa->set_id($_POST['id']);
			$this->obj_programa->set_id_macroproyecto($_POST['id_macroproyecto']);
			$this->obj_programa->set_nombre($_POST['nombre']);
			$this->obj_programa->set_descripcion($_POST['descripcion']);
			$this->obj_programa->set_area($_POST['area']);

			$resultados = $this->obj_programa->actualizar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo modificarse..";

			}else{

				header("location: ?controller=front&action=programa&id_action=5");
			}
	}

	public function eliminar_programa(){
            $this->obj_programa->set_id($_POST['id']);
			$resultados = $this->obj_programa->eliminar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo eliminarse..";

			}else{

				header("location: ?controller=front&action=programa&id_action=6");
			}
	}
	
	
	
}
?>