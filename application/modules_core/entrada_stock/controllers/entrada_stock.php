<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entrada_stock extends MX_Controller {


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


	public function nueva_entrada() {
		try {

			$data 					= array();
			$data['section'] 			= $this->section; // en donde estamos
			$data['id_menu_left'] 	= 'menu_productos';

			$error_message		= array();
			$data['error_message'] 	= $error_message;
			$data['title']				= 'Control Stock';
			$data['form_action'] 	= site_url('entrada_stock/nueva_entrada/');;

			// $data['categorys'] 		= $this->get_categorias->getAll();

			if($this->input->server('REQUEST_METHOD') == 'GET') { // START
				$products 			= $this->get_productos->getAll();
				$tipo_documentos 	= $this->get_tipodocumentos->getAll();
			// }else{ // GUARDAR, por post.
			// 	$product = $this->getData();

			// 	$error_message = $this->action_productos->validateAdd($product);

			// 	if(!$error_message)
			// 	{  	// PASO LA VALIDACIÓN
			// 		$insert_product = $this->action_productos->insert($product);
			// 		if($insert_product) {
			// 			$data['message_notice'] = 'Producto insertado con éxito';
			// 		} else {
			// 			$data['message_error'] = 'No pudo ser insertado el producto en la Base de Datos';
			// 		}
			// 		$product = $this->getDataEmpty();
			// 	}
			}


			// PRODUCTO
			$data['products']			= $products;
			$data['tipo_documentos']	= $tipo_documentos;
			// MENSAJES DE VALIDACIONES
			// $data['error_message']		= $error_message;


			// VISTAS
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
