<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends MX_Controller {


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


	public function add() {
		try {

			$data 					= array();
			$data['section'] 			= $this->section; // en donde estamos
			$data['id_menu_left'] 	= 'menu_productos';

			$error_message		= array();
			$data['error_message'] 	= $error_message;
			$data['title']				= 'Control Stock';
			$data['form_action'] 	= site_url('productos/add/');;
			$data['id_content']		= 'productos';
			$data['categorys'] 		= $this->get_categorias->getAll();

			if($this->input->server('REQUEST_METHOD') == 'GET') { // START
				$product = $this->getDataEmpty();

			}else{ // GUARDAR, por post.
				$product = $this->getData();

				$error_message = $this->action_productos->validateAdd($product);

				if(!$error_message)
				{  	// PASO LA VALIDACIÓN
					$insert_product = $this->action_productos->insert($product);
					if($insert_product) {
						$data['message_notice'] = 'Producto insertado con éxito';
					} else {
						$data['message_error'] = 'No pudo ser insertado el producto en la Base de Datos';
					}
					$product = $this->getDataEmpty();
				}
			}


			// PRODUCTO
			$data['product']				= $product;
			// MENSAJES DE VALIDACIONES
			$data['error_message']		= $error_message;


			// VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			// INCLUYO VISTA DE PRODUCTOS EN EL CONTENT
			$this->load->view('templates/footer', $data);





		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}






	public function listar()
	{
		try {

			$data 					= array();
			$data['section'] 			= $this->section; // en donde estamos
			$data['id_menu_left'] 	= 'menu_productos';

			$error_message		= array();
			$data['error_message'] 	= $error_message;
			$data['title']				= 'Control Stock';
			$data['form_action'] 	= site_url('productos/add/');;
			$data['id_content']		= 'listar_productos';
			// $data['categorys'] 		= $this->get_categorias->getAll();


			// PRODUCTO
			// $data['product']				= $product;
			// MENSAJES DE VALIDACIONES
			// $data['error_message']		= $error_message;

			// PRODUCTOS
			$products 			= $this->get_productos->getAll();
			$data['products']	= $products;

			// VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			// INCLUYO VISTA DE PRODUCTOS EN EL CONTENT
			$this->load->view('templates/footer', $data);

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

	}

	public function ver($id_product)
	{
		try {
			$data 					= array();
			$data['section'] 			= $this->section; // en donde estamos
			$data['id_menu_left'] 	= 'menu_productos';

			$error_message		= array();
			$data['error_message'] 	= $error_message;
			$data['title']				= 'Control Stock :: Ver Producto';
			$data['id_content']		= 'productos';
			$product 				= $this->get_productos->getById($id_product);
			$data['product']			= $product;


			// VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			// INCLUYO VISTA DE PRODUCTOS EN EL CONTENT
			$this->load->view('templates/footer', $data);

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

	}

	public function editar($id_product)
	{
		try {

			$data 					= array();
			$data['section'] 			= $this->section; // en donde estamos
			$data['id_menu_left'] 	= 'menu_productos';

			$error_message		= array();
			$data['title']				= 'Control Stock';
			$data['form_action'] 	= site_url('productos/editar/' . $id_product);;
			$data['id_content']		= 'productos';
			$data['categorys'] 		= $this->get_categorias->getAll();

			if($this->input->server('REQUEST_METHOD') == 'GET')
			{ // START
				$product = $this->get_productos->getById($id_product);
				if ($product == false) {
					// ERROR NO PUDO AGARRAR EL PRODUCTO
				}

			}
			else
			{ // GUARDAR, por post.
				// PRODUCTOS
				$product 				= $this->getData();
				$product['id_productos']	= $id_product;

				$error_message = $this->action_productos->validateAdd($product);

				if(!$error_message)
				{  	// PASO LA VALIDACIÓN
					$update_product = $this->action_productos->update($product);
					if($update_product) {
						$message = 'Producto editado con éxito';
						$this->session->set_flashdata('flash_notice', $message);
						redirect('productos/listar');
					} else {
						$data['message_error'] = 'No pudo ser editado el producto en la Base de Datos';
					}
					$product = $this->getDataEmpty();
				}
			}


			// PRODUCTO
			$data['product']				= $product;
			// MENSAJES DE VALIDACIONES
			$data['error_message']		= $error_message;

			// VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			// INCLUYO VISTA DE PRODUCTOS EN EL CONTENT
			$this->load->view('templates/footer', $data);

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

	}

	public function configuracion()
	{
		try {
			$data 					= array();
			$data['section'] 			= $this->section; // en donde estamos
			$data['id_menu_left'] 	= 'menu_productos';

			$error_message		= array();
			$data['error_message'] 	= $error_message;
			$data['title']				= 'Control Stock';
			$data['id_content']		= 'productos_configuracion';

			// VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			// INCLUYO VISTA DE PRODUCTOS EN EL CONTENT
			$this->load->view('templates/footer', $data);

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

	}


















	protected function getDataEmpty()
	{
		$product = array();

		$product['codigo'] 			= '';
		$product['descripcion']		= '';
		$product['detalle'] 			= '';
		$product['observaciones'] 	= '';
		$product['id_categorias'] 	= $this->get_categorias->getAll();

		return $product;
	}



	protected function getData()
	{
		$product = array();


		if($this->input->get_post('codigo')) {
			$product['codigo'] = trim($this->input->get_post('codigo'));
		} else {
			$product['codigo'] = '';
		}

		if($this->input->get_post('descripcion')) {
			$product['descripcion'] = trim($this->input->get_post('descripcion'));
		} else {
			$product['descripcion'] = '';
		}

		if($this->input->get_post('detalle')) {
			$product['detalle'] = trim($this->input->get_post('detalle'));
		} else {
			$product['detalle'] = '';
		}

		if($this->input->get_post('observaciones')) {
			$product['observaciones'] = trim($this->input->get_post('observaciones'));
		}else {
			$product['observaciones'] = '';
		}

		if($this->input->post('id_categorias')) {
			$product['id_categorias']= $this->input->post('id_categorias');
		} else {
			$product['id_categorias'] = NULL;
		}

		return $product;
	}

	// protected function getDataEditing()
	// {
	// 	$product = array();

	// 	if($this->input->get_post('codigo')) {
	// 		$product['codigo'] = trim($this->input->get_post('codigo'));
	// 	}

	// 	if($this->input->get_post('descripcion')) {
	// 		$product['descripcion'] = trim($this->input->get_post('descripcion'));
	// 	}

	// 	if($this->input->get_post('detalle')) {
	// 		$product['detalle'] = trim($this->input->get_post('detalle'));
	// 	}

	// 	if($this->input->get_post('observaciones')) {
	// 		$product['observaciones'] = trim($this->input->get_post('observaciones'));
	// 	}

	// 	if($this->input->post('id_categorias')) {
	// 		$product['id_categorias']= $this->input->post('id_categorias');
	// 	}

	// 	return $product;
	// }



}
?>
