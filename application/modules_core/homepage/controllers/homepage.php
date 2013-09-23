<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends MX_Controller
{


	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);
		$this->section = $this->router->fetch_class() . '.' . $this->router->fetch_method();
		$this->css_includes				= array('frontend/css/productos.css');
		$this->data 					= array();
		$this->data['view_menu_izq']	= 'productos/menu_izq';

	}

	public function index()
	{
		$data					= $this->data;
		$data['section'] 			= $this->section;
		$data['id_menu_left'] 	= '';
		$data['id_content']		= 'homepage';
		$data['view_template']	= 'homepage/homepage';

		// VISTAS
		$this->load->view('templates/heads', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/content', $data);
		$this->load->view('templates/footer', $data);
	}





}

?>
