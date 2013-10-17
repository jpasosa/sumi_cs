

<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends MY_Codeigniter {


	public function __construct(){
		parent::__construct();

		$this->section = $this->router->fetch_class() . '.' . $this->router->fetch_method();

		$last_uri		= $this->uri->total_segments();
		$this->last_uri	= $this->uri->segment($last_uri);
		$this->last_last_uri	= $this->uri->segment($last_uri - 1);
		// DATA DE VISTAS
		$this->data 					= array();
		// $this->data['configure_link']		= 'productos/configuracion';
		// $this->data['configure_link_title']	= 'Configuración de Productos';
		$this->data['css_includes']		= array();
		$this->data['js_includes']		= array();
		$this->css_includes				= array('frontend/css/login.css');
		$this->data['view_menu_izq']	= 'login/menu_izq';
		// $this->data['title_section']		= 'PRODUCTOS';
	}



	public function index() {
		try {

			$data 					= $this->data;
			$data['section'] 			= $this->section; // en donde estamos
			$error_message		= array();
			$data['error_message'] 	= $error_message;
			$data['form_action'] 	= site_url('login/validate/');

			if($this->input->server('REQUEST_METHOD') == 'GET')
			{ 		// START
				// $product = $this->getDataEmpty();

			}else{ // GUARDAR, por post.
				// $product = $this->getData();

				// $error_message = $this->action_productos->validateAdd($product);

				// if(!$error_message)
				// {  	// PASO LA VALIDACIÓN
				// 	$insert_product = $this->action_productos->insert($product);
				// 	if($insert_product) {
				// 		$data['message_notice'] = 'Producto insertado con éxito';
				// 	} else {
				// 		$data['message_error'] = 'No pudo ser insertado el producto en la Base de Datos';
				// 	}
				// 	$product = $this->getDataEmpty();
				// }
			}

			// MENSAJES DE VALIDACIONES
			$data['error_message']		= $error_message;

			// DATOS DE VISTAS
			$data['id_menu_left'] 	= 'menu_login';
			$data['title']				= 'Control Stock';
			$data['id_content']		= 'login';
			$data['view_template']	= 'login/login';
			$data['title_section']		= 'LOGUEARSE';
			$data['show_list']		= false;
			$data['css_includes']	= $this->css_includes;
			// LEVANTO VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			$this->load->view('templates/footer', $data);

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}








}
?>
