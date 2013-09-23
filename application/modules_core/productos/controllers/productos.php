<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends MX_Controller {


	public function __construct(){
		parent::__construct();

		$this->section = $this->router->fetch_class() . '.' . $this->router->fetch_method();

		// DATA DE VISTAS
		$this->data 					= array();
		$this->data['configure_link']		= 'productos/configuracion';
		$this->data['configure_link_title']	= 'Configuración de Productos';



	}



	public function index() {
		try {

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}

	// AGREGAR UN PRODUCTO
	public function add()
	{
		try {
			$data 					= $this->data;
			$data['section'] 			= $this->section; // en donde estamos
			$error_message		= array();
			$data['error_message'] 	= $error_message;
			$data['form_action'] 	= site_url('productos/add/');;
			$data['categorys'] 		= $this->get_categorias->getAll();



			if($this->input->server('REQUEST_METHOD') == 'GET')
			{ 		// START
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

			// DATOS DE VISTAS
			$data['id_menu_left'] 	= 'menu_productos';
			$data['title']				= 'Control Stock';
			$data['id_content']		= 'productos';
			$data['view_template']	= 'productos/add_edit';
			$data['show_list']		= true;


			// LEVANTO VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			$this->load->view('templates/footer', $data);

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}





	// LISTAR LOSPRODUCTOS
	public function listar()
	{
		try {
			$data 					= $this->data;
			$data['section'] 			= $this->section; // en donde estamos

			$error_message		= array();
			$data['error_message'] 	= $error_message;

			$data['form_action'] 	= site_url('productos/add/');;


			// PRODUCTOS
			$products 			= $this->get_productos->getAll();
			$data['products']	= $products;

			// DATOS DE VISTAS
			$data['id_menu_left'] 	= 'menu_productos';
			$data['title']				= 'Control Stock';
			$data['id_content']		= 'listar_productos';
			$data['view_template']	= 'productos/listar';
			$data['show_add']		= true;
			// LEVANTO VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			$this->load->view('templates/footer', $data);

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

	}

	// VER EL PRODUCTO
	public function ver($id_product)
	{
		try {
			$data 					= $this->data;
			$data['section'] 			= $this->section; // en donde estamos


			$error_message		= array();
			$data['error_message'] 	= $error_message;


			$product 				= $this->get_productos->getById($id_product);
			$data['product']			= $product;

			// DATOS DE VISTAS
			$data['id_menu_left'] 	= 'menu_productos';
			$data['title']				= 'Control Stock :: Ver Producto';
			$data['id_content']		= 'productos';
			$data['view_template']	= 'productos/ver';
			$data['show_add']		= true;
			$data['show_list']		= true;
			// LEVANTO VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			$this->load->view('templates/footer', $data);

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

	}

	// EDITAR EL PRODUCTO
	public function editar($id_product)
	{
		try {
			$data 					= $this->data;
			$data['section'] 			= $this->section; // en donde estamos
			$error_message		= array();
			$data['form_action'] 	= site_url('productos/editar/' . $id_product);;
			$data['categorys'] 		= $this->get_categorias->getAll();


			if($this->input->server('REQUEST_METHOD') == 'GET')
			{ // START
				$product = $this->get_productos->getById($id_product);
				if ($product == false) {
					// ERROR NO PUDO AGARRAR EL PRODUCTO
				}

			}else { // GUARDAR, por post.
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

			// DATOS DE VISTAS
			$data['id_menu_left'] 	= 'menu_productos';
			$data['title']				= 'Control Stock';
			$data['id_content']		= 'productos';
			$data['view_template']	= 'productos/add_edit';
			$data['show_add']		= true;
			$data['show_list']		= true;
			// LEVANTO VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			$this->load->view('templates/footer', $data);

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

	}

	// CONFIGURACION :: MENU PRINCIPAL
	public function configuracion()
	{
		try {
			$data 					= $this->data;
			$data['section'] 			= $this->section; // en donde estamos

			$error_message		= array();
			$data['error_message'] 	= $error_message;

			// DATOS DE VISTAS
			$data['id_menu_left'] 	= 'menu_productos';
			$data['title']				= 'Control Stock';
			$data['id_content']		= 'productos_configuracion';
			$data['view_template']	= 'productos/config';
			$data['show_add']		= true;
			$data['show_list']		= true;
			// LEVANTO VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			$this->load->view('templates/footer', $data);

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

	}

	// CONFIGURACION :: LISTAR CATEGORIAS
	public function confListarCategorias()
	{
		try {
			$data 					= $this->data;
			$data['section'] 			= $this->section; // en donde estamos

			$error_message		= array();
			$data['error_message'] 	= $error_message;


			$data['categorias']		= $this->get_categorias->getAll();


			// DATOS DE VISTAS
			$data['id_menu_left'] 	= 'menu_productos';
			$data['title']				= 'Control Stock';
			$data['id_content']		= 'productos_configuracion';
			$data['view_template']	= 'productos/config_listado_categorias';
			$data['show_add']		= true;
			$data['show_list']		= true;
			// VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			$this->load->view('templates/footer', $data);

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}

	}


	// AGREGAR UNA CATEGORIA
	public function add_categoria()
	{
		try {
			$data 					= $this->data;
			$data['section'] 			= $this->section; // en donde estamos
			$error_message		= array();
			$data['error_message'] 	= $error_message;

			$data['form_action'] 	= site_url('productos/add_categoria/');;




			if($this->input->server('REQUEST_METHOD') == 'GET')
			{ // START
				$categoria = $this->getDataEmptyForCategory();

			}else{ // GUARDAR, por post.
				$categoria = $this->getDataForCategory();
				$error_message = $this->action_categorias->validateAdd($categoria);
				if(!$error_message)
				{  	// PASO LA VALIDACIÓN
					$insert_categoria = $this->action_categorias->insert($categoria);
					if($insert_categoria) {
						$data['message_notice'] = 'Categoria insertada con éxito';
					} else {
						$data['message_error'] = 'No pudo ser insertada la categoría en la Base de Datos';
					}
					$categoria = $this->getDataEmptyForCategory();
				}
			}

			// MENSAJES DE VALIDACIONES
			$data['error_message']		= $error_message;
			$data['categoria']			= $categoria;

			// DATOS DE VISTAS
			$data['title']				= 'Control Stock';
			$data['id_content']		= 'productos_configuracion';
			$data['id_menu_left'] 	= 'menu_productos';
			$data['box_title']		= 'ALTA DE LA CATEGORÍA';
			$data['view_template']	= 'productos/config_add_edit_categorias';
			$data['show_add']		= true;
			$data['show_list']		= true;
			// LEVANTO VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			$this->load->view('templates/footer', $data);

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}


	public function editar_categoria($id_category)
	{
		try {
			$data 					= $this->data;
			$data['section'] 			= $this->section; // en donde estamos

			$error_message		= array();

			$data['form_action'] 	= site_url('productos/editar_categoria/' . $id_category);;



			if($this->input->server('REQUEST_METHOD') == 'GET')
			{ // START
				$category = $this->get_categorias->getById($id_category);
				if ($category == false) {
					// ERROR NO PUDO AGARRAR EL PRODUCTO
				}

			}else{ // POST
				// CATEGORIAS
				$category 					= $this->getDataForCategory();
				$category['id_categorias']	= $id_category;
				$error_message 			= $this->action_categorias->validateAddUpdated($category);

				if(!$error_message)
				{  	// PASO LA VALIDACIÓN
					$update_category = $this->action_categorias->update($category);

					if($update_category) {
						$message = 'Categoria editada con éxito';
						$this->session->set_flashdata('flash_notice', $message);
						redirect('productos/confListarCategorias');
					} else {
						$message = 'La categoría no fue editada.';
						$this->session->set_flashdata('flash_error', $message);
						redirect('productos/confListarCategorias');
					}
					$category = $this->getDataEmpty();
				}
			}


			// CATEGORIA
			$data['categoria']				= $category;
			// MENSAJES DE VALIDACIONES
			$data['error_message']		= $error_message;
			// DATOS DE VISTAS
			$data['id_menu_left'] 	= 'menu_productos';
			$data['title']				= 'Control Stock';
			$data['id_content']		= 'productos_configuracion';
			$data['box_title']		= 'EDICIÓN DE LA CATEGORÍA';
			$data['view_template']	= 'productos/config_add_edit_categorias';
			$data['show_add']		= true;
			$data['show_list']		= true;
			// LEVANTO VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
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

	protected function getDataEmptyForCategory()
	{
		$category = array();

		$category['id_categorias'] 	= 0;
		$category['nombre']			= '';
		$category['codigo_abrev'] 	= '';
		$category['activo'] 			= 1;

		return $category;
	}



	protected function getData()
	{
		$product = array();
		// CODIGO
		if($this->input->get_post('codigo')) {
			$product['codigo'] = trim($this->input->get_post('codigo'));
		} else {
			$product['codigo'] = '';
		}
		// DESCRIPCION
		if($this->input->get_post('descripcion')) {
			$product['descripcion'] = trim($this->input->get_post('descripcion'));
		} else {
			$product['descripcion'] = '';
		}
		// DETALLE
		if($this->input->get_post('detalle')) {
			$product['detalle'] = trim($this->input->get_post('detalle'));
		} else {
			$product['detalle'] = '';
		}
		// OBSERVACIONES
		if($this->input->get_post('observaciones')) {
			$product['observaciones'] = trim($this->input->get_post('observaciones'));
		}else {
			$product['observaciones'] = '';
		}
		// ID_CATEGORIAS
		if($this->input->post('id_categorias')) {
			$product['id_categorias']= $this->input->post('id_categorias');
		} else {
			$product['id_categorias'] = NULL;
		}

		return $product;
	}

	protected function getDataForCategory()
	{
		$category = array();

		if($this->input->get_post('nombre')) {
			$category['nombre'] = trim($this->input->get_post('nombre'));
		} else {
			$category['nombre'] = '';
		}

		if($this->input->get_post('codigo_abrev')) {
			$category['codigo_abrev'] = trim($this->input->get_post('codigo_abrev'));
		} else {
			$category['codigo_abrev'] = '';
		}

		$category['activo'] = 1;

		return $category;
	}




}
?>
