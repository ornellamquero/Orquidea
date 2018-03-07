<?php 
/**
* controlador de reporte
*/

require_once "modelo/reporte.php";

class Controlador_reporte{
	
	private $obj_reporte;

	public function __construct()
	{
		$this->obj_reporte = new Modelo_reporte();
	}
	
	public function registrar_reporte(){
			$this->obj_reporte->set_id_usuario($_POST['id_usuario']);
			$this->obj_reporte->set_id_tipo($_POST['id_tipo']);
			$this->obj_reporte->set_firma1($_POST['firma1']);
			$this->obj_reporte->set_firma2($_POST['firma2']);

			$resultados = $this->obj_reporte->insertar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo insertarse..";
				echo $_POST['id_usuario'];
				echo $_POST['id_tipo'];
				echo $_POST['firma1'];
				echo $_POST['firma2'];
				
				

			}else{

				header("location: ?controller=front&action=reporte&id_action=3");
			}
	}
	

	public function eliminar_reporte(){
            $this->obj_reporte->set_id($_POST['id']);
			$resultados = $this->obj_reporte->eliminar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo eliminarse..";

			}else{

				header("location: ?controller=front&action=reporte&id_action=6");
			}
	}
	
	
}
?>