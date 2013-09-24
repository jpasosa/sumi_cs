<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entrada_stock extends MX_Controller {


	public function __construct(){
		parent::__construct();

		$this->section = $this->router->fetch_class() . '.' . $this->router->fetch_method();

		$last_uri		= $this->uri->total_segments();
		$this->last_uri	= $this->uri->segment($last_uri);

		// DATOS DE VISTAS, EN TODO ENTRADA DE STOCK
		$this->data 					= array();
		$this->data['view_menu_izq']	= 'entrada_stock/menu_izq';

	}



	public function index() {
		try {

		} catch (Exception $e) {
			throw new Exception($e->getMessage());
		}
	}


	public function nueva_entrada($params = null) {
		try {

			$data 					= $this->data;
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
			$crud->set_subject('Entradas al Stock');
			$crud->set_theme('flexigrid');
			$crud->set_table('entradas');
			$fields = array('fecha_created', 'id_productos','id_tipodocumento','nro_tipodocumento','precio', 'cantidad', 'observaciones');
			$crud->columns($fields);
			// RELACIONES
			if ($this->last_uri == 'add') {
				$crud->set_relation('id_productos', 'productos', '{descripcion} :: {detalle} :: {codigo}');
			} else {
				$crud->set_relation('id_productos', 'productos', '{descripcion} - {detalle}');
			}
			$crud->set_relation('id_tipodocumento', 'tipodocumentos', 'nombre');
			// ADD
			$crud->add_fields($fields);
    			// EDIT
    			$crud->edit_fields($fields);
    			$crud->unset_edit();
    			$crud->unset_delete();
			$crud->display_as('fecha_created','Fecha')
					->display_as('id_productos','Producto')
	             		->display_as('id_tipodocumento','Tipo de Documento')
					->display_as('nro_tipodocumento','Número del documento')
					->display_as('precio','Precio')
					->display_as('cantidad','Cantidad')
					->display_as('observaciones','Observaciones');
			$crud->field_type( 'observaciones' , 'text' );
			$crud->required_fields('fecha_created', 'id_productos','id_tipodocumento','nro_tipodocumento','precio', 'cantidad');
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


			// DATOS DE VISTAS
			$data['show_add']		= true;
			$data['configure_link'] 	= true;
			$data['show_list'] 		= true;
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
