<?php 
/**
* controlador de noticias
*/

require_once "modelo/noticia.php";

class Controlador_noticia{
	
	private $obj_noticia;

	public function __construct()
	{
		$this->obj_noticia = new Modelo_noticia();
	}
	
	public function registrar_noticia(){
			$this->obj_noticia->set_titulo($_POST['titulo']);
			$this->obj_noticia->set_contenido($_POST['contenido']);
			$this->obj_noticia->set_estado($_POST['estado']);
			$this->obj_noticia->set_usuario($_POST['usuario']);

			$resultados = $this->obj_noticia->insertar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo insertarse..";

			}else{

				header("location: ?controller=front&action=noticias&id_action=3");
			}
	}
	
	public function modificar_noticia(){
	        $this->obj_noticia->set_id_noticias($_POST['id_noticias']);
			$this->obj_noticia->set_titulo($_POST['titulo']);
			$this->obj_noticia->set_estado($_POST['estado']);
			$this->obj_noticia->set_contenido($_POST['contenido']);
			$this->obj_noticia->set_usuario($_POST['usuario']);

			$resultados = $this->obj_noticia->actualizar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo modificarse..";

			}else{

				header("location: ?controller=front&action=noticias&id_action=5");
			}
	}

	public function eliminar_noticia(){
            $this->obj_noticia->set_id_noticias($_POST['id_noticias']);
			$resultados = $this->obj_noticia->eliminar();

			if (!$resultados) {

				echo "Hubo un problema y no pudo eliminarse..";

			}else{

				header("location: ?controller=front&action=noticias&id_action=6");
			}
	}
	
	
	
}
?>