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


	public function nueva_entrada($params = null) {
		try {

			$data 					= array();
			$data['section'] 			= $this->section; // en donde estamos
			$data['id_menu_left'] 	= 'menu_entradas';

			$error_message		= array();
			$data['error_message'] 	= $error_message;
			$data['title']				= 'Control Stock';
			$data['id_content']		= 'entrada_stock';
			$data['view_template']	= 'entrada_stock/agregar_productos';


			// GROCERY CRUD
			$this->load->library('grocery_CRUD');
			$crud = new grocery_CRUD();
			// TABLAS
			// $crud->set_subject('Entradas al Stock');
			$crud->set_theme('flexigrid');
			$crud->set_table('entradas');
			$crud->set_relation('id_productos', 'productos', '{descripcion} :: {detalle} :: {codigo}');
			$crud->set_relation('id_tipodocumento', 'tipodocumentos', 'nombre');
			$fields = array('id_productos','id_tipodocumento','nro_tipodocumento','precio', 'cantidad', 'observaciones');
			$crud->columns($fields);
			$crud->add_fields($fields);
    			$crud->edit_fields($fields);
			$crud->display_as('id_productos','Producto')
	             		->display_as('id_tipodocumento','Tipo de Documento')
					->display_as('nro_tipodocumento','Número del documento')
					->display_as('precio','Precio')
					->display_as('cantidad','Cantidad')
					->display_as('observaciones','Observaciones');
			$crud->field_type( 'observaciones' , 'text' );
			$crud->required_fields('id_productos','id_tipodocumento','nro_tipodocumento','precio', 'cantidad');
			$crud->unset_texteditor('observaciones');
			$crud->unset_export();
			$crud->unset_print();
			// CONFIGURACIONES
			$crud->unset_jquery();
        		$data['output'] 		= $crud->render()->output;
        		$data['css_grocery'] = $crud->render()->css_files;
			$data['js_grocery']	= $crud->render()->js_files;




				// $this->_example_output($output);

        		// $this->data = array(
          //                               'h1' => 'Items',
          //                               'h2' => 'Administrar',
          //                               'contenido' => 'crud/index',
          //                               'active' => 'items',
          //                               'output' => $crud->render()->output,
          //                               'css_files' => $crud->render()->css_files,
          //                               'js_files' => $crud->render()->js_files,
          //                               'tabs' => $tabs,
          //                                );


			// VISTAS
			$this->load->view('templates/heads', $data);
			$this->load->view('templates/header', $data);
			$this->load->view('templates/content', $data);
			//$this->_example_output($output);
			$this->load->view('templates/footer', $data);





		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}


	// function _example_output($output = null)
 //    	{
	// 	$this->load->view('agregar_productos.php',$output);
 //    	}










}
?>
