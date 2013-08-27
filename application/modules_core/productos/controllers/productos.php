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
			$data 	= array();
			$data['section'] 		= $this->section; // en donde estamos
			$data['id_menu_left'] = 'menu_productos';

			// $data['admin'] = $admin;
			$data['title']		= 'Control Stock';
			$data['form_action'] = site_url('productos/add/');;


			if($this->input->server('REQUEST_METHOD') == 'GET') { // START
				$product = $this->getDataEmpty();
			}else{ // GUARDAR, por post.
				$product = $this->getData();
			}



			// PRODUCTO
			$data['product']		= $product;


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
		$product['id_categorias'] 	= $this->get_categorias->getAll();;

		return $product;
	}


	protected function getData()
	{
		$product = array();

		if($this->input->get_post('codigo')) {
			$work['codigo'] = trim($this->input->get_post('codigo'));
		}

		if($this->input->get_post('descripcion')) {
			$work['descripcion'] = trim($this->input->get_post('descripcion'));
		}

		if($this->input->get_post('detalle')) {
			$work['detalle'] = trim($this->input->get_post('detalle'));
		}

		if($this->input->get_post('observaciones')) {
			$work['observaciones'] = trim($this->input->get_post('observaciones'));
		}else {
			$work['cantidad_paginas'] = '';
		}

		if($this->input->post('fecha')) {
			$work['fecha']= $this->input->post('fecha');
		} else {
			$work['fecha'] = date('Y-m-d');
		}

		if($this->input->get_post('cantidadPalabras')) {
			$work['cantidadPalabras'] = trim($this->input->get_post('cantidadPalabras'));
		}else {
			$work['cantidadPalabras'] = '';
		}

		if($this->input->get_post('palabrasClave')) {
			$work['palabrasClave'] = trim($this->input->get_post('palabrasClave'));
		}else {
			$work['palabrasClave'] = '';
		}

		if($this->input->get_post('archivo_publico')) {
			$work['archivo_publico'] = $this->input->get_post('archivo_publico');
		}else {
			$work['archivo_publico'] = '';
		}

		if($this->input->get_post('archivo_privado')) {
			$work['archivo_privado'] = $this->input->get_post('archivo_privado');
		}else {
			$work['archivo_publico'] = '';
		}

		if($this->input->get_post('idUsuarios')) {
			$work['idUsuarios'] = (int)$this->input->get_post('idUsuarios');
		}else {
			$work['idUsuarios'] = 10; // si no está seteado lo pongo en 10, harckodeo a un user comun
		} // TODO: hay que volar esto cuando cargue bien el login.

		if($this->input->get_post('destacado')) {
			$work['destacado'] = (int)$this->input->get_post('destacado');
		}else {
			$work['destacado'] = 0;
		}

		if($this->input->get_post('foto')) {
			$work['foto'] = $this->input->get_post('foto');
		}else {
			$work['foto'] = $this->input->get_post('name_foto');
		}

		if($this->input->get_post('indice')) {
			$work['indice'] = $this->input->get_post('indice');
		}else {
			$work['indice'] = '';
		}

		if($this->input->post('idCategorias_parentId')) {
			$work['idCategorias_parentId']  = $this->input->post('idCategorias_parentId');
		}else {
			$work['idCategorias_parentId'] = '';
		}


		if($this->input->post('subCategorys')) {
			foreach($this->input->post('subCategorys') AS $k => $sub_cat) {
				$sub_cat_name =  $this->repo_categorias->getSubCategoryName($sub_cat);
				$work['sub_category'][$k]['id'] = $sub_cat;
				$work['sub_category'][$k]['name'] = $sub_cat_name;
			}
		}else {
			$work['sub_category'] = 0;
		}

		if($this->input->get_post('precio_sin_derecho')) {
			$work['precio_sin_derecho'] = (float)$this->input->get_post('precio_sin_derecho');
		}else {
			$work['precio_sin_derecho'] = 0.0;
		}

		if($this->input->get_post('precio_con_derecho')) {
			$work['precio_con_derecho'] = (float)$this->input->get_post('precio_con_derecho');
		}else {
			$work['precio_con_derecho'] = '';
		}

		if($this->input->get_post('monto_por_venta')) {
			$work['monto_por_venta'] = (float)$this->input->get_post('monto_por_venta');
		}else {
			$work['monto_por_venta'] = '';
		}

		if($this->input->get_post('idEstados')) {
			$work['idEstados'] = (int)$this->input->get_post('idEstados');
		}else {
			$work['idEstados'] = '';
		}

		if($this->input->post('idPrecios')){
			$work['idPrecios'] = (int)$this->input->post('idPrecios');
		}

		if($this->input->post('notificado')){
			$work['notificado'] = (int)$this->input->post('notificado');
		}else {
			$work['notificado'] = 0;
		}

		return $work;
	}





}
?>
