<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Homepage extends MX_Controller
{


	public function __construct()
	{
		parent::__construct();
		//$this->output->enable_profiler(TRUE);


	}

	public function index()
	{

		$data = '';
		$this->load->view('templates/heads', $data);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/content', $data);
		$this->load->view('templates/footer', $data);
	}





}

?>
