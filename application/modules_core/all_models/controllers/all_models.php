<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class All_models extends MX_Controller {


	public function __construct(){
		parent::__construct();
		$this->section = $this->router->fetch_class() . '.' . $this->router->fetch_method();
	}



	public function index() {
		try {

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}


	// AJAX :: ELIMINAR UNA CATEGORÍA
	public function del_category()
	{
		if ($this->input->post('id_categoria'))
		{
			$id_categoria = $this->input->post('id_categoria');
			$del_category = $this->action_categorias->erase($id_categoria);
			if($del_category) {
				$message = 'Categoría eliminada correctamente.';
				$this->session->set_flashdata('flash_notice', $message);
			} else {
				$message = 'No se pudo eliminar la categoría, esta relacionado con productos.';
				$this->session->set_flashdata('flash_error', $message);
			}

		} else { // ERROR, NO FUE TOMADO EL ID DE LA CATEGORÍÁ, NO SE PUEDE ELIMINAR
			$message = 'No se pudo eliminar la categoría.';
			$this->session->set_flashdata('flash_error', $message);
		}
		// redirect('productos/listar');
		// redirect('homepage');
		// $del_publicacion = $this->repo_trabajos->erase($id_publicacion);
	}

	// AJAX :: ELIMINAR UN PRODUCTO
	public function del_product()
	{
		if ($this->input->post('id_producto'))
		{
			$id_producto = $this->input->post('id_producto');
			$del_producto = $this->action_productos->erase($id_producto);


			if($del_producto) {
				$message = 'Producto eliminado correctamente.';
				$this->session->set_flashdata('flash_notice', $message);
			} else {
				$message = 'No se pudo eliminar el producto, ya fue ingresado dentro del Stock en algún momento.';
				$this->session->set_flashdata('flash_error', $message);
			}

		} else { // ERROR, NO FUE TOMADO EL ID DE LA CATEGORÍÁ, NO SE PUEDE ELIMINAR
			$message = 'No se pudo eliminar el producto, error inesperado.';
			$this->session->set_flashdata('flash_error', $message);
		}
		// redirect('productos/listar');
		// redirect('homepage');
		// $del_publicacion = $this->repo_trabajos->erase($id_publicacion);
	}

	// AJAX :: ELIMINAR UN TIPO DE DOCUMENTO
	public function del_tipo()
	{
		if ($this->input->post('id_tipodocumentos'))
		{
			$id_tipodocumentos 	= $this->input->post('id_tipodocumentos');
			$exist_tipo_in_entrada 	= $this->is_entradas->existTipoDocumento($id_tipodocumentos);

			if ($exist_tipo_in_entrada) {
				// NO SE PUEDE ELIMINAR YA ESTÁ INGRESADO AL STOCK ALGUN PRODUCTO CON ESTE TIPO DE DOCUMENTO
				$message = 'No se pudo eliminar el Tipo de Documento, ya se encuentra relacionado en el ingreso del Stock..';
				$this->session->set_flashdata('flash_error', $message);

			} else { // PROCEDE A ELIMINAR
				$del_tipo = $this->action_tipodocumentos->erase($id_tipodocumentos);
				if($del_tipo) {
					$message = 'Tipo de Documento eliminado correctamente.';
					$this->session->set_flashdata('flash_notice', $message);
				} else {
					$message = 'No se pudo eliminar el producto, error inesperado.';
					$this->session->set_flashdata('flash_error', $message);
				}
			}

		} else { // ERROR, NO FUE TOMADO EL ID DE LA CATEGORÍÁ, NO SE PUEDE ELIMINAR
			$message = 'No se pudo eliminar el producto, error inesperado.';
			$this->session->set_flashdata('flash_error', $message);
		}
		// redirect('productos/listar');
		// redirect('homepage');
		// $del_publicacion = $this->repo_trabajos->erase($id_publicacion);
	}


}
?>
