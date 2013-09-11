

<div class="content" id="<?php echo $id_content; ?>">

		<div class="col-md-1">
			<div class="left" id="<?php echo $id_menu_left; ?>">
				<?php if ( $section == 'productos.add' || $section == 'productos.listar'
							|| $section == 'productos.ver' || $section == 'productos.editar'
							|| $section == 'entrada_stock.nueva_entrada'
							|| $section == 'productos.configuracion'
							|| $section == 'productos.confListarCategorias'
							|| $section == 'productos.add_categoria'
							|| $section == 'productos.editar_categoria'): ?>
					<?php $this->load->view('productos/menu_izq'); ?>
				<?php endif; ?>
			</div>
		</div>

		<div class="col-md-11">
			<div id="right">
				<!-- HOMEPAGE -->
				<?php if ( $section == 'homepage.index' ): ?>
					<?php $this->load->view('homepage/homepage'); ?>
				<?php endif; ?>

				<!-- PRODUCTOS :: ALTA -->
				<?php if ( $section == 'productos.add' || $section == 'productos.editar' ): ?>
					<?php $this->load->view('productos/add_edit'); ?>
				<?php endif; ?>
				<!-- PRODUCTOS :: LISTAR -->
				<?php if ( $section == 'productos.listar' ): ?>
					<?php $this->load->view('productos/listar'); ?>
				<?php endif; ?>
				<!-- PRODUCTOS :: VER -->
				<?php if ( $section == 'productos.ver' ): ?>
					<?php $this->load->view('productos/ver'); ?>
				<?php endif; ?>
				<!-- PRODUCTOS :: CONFIGURACION -->
				<?php if ( $section == 'productos.configuracion'): ?>
					<?php $this->load->view('productos/config'); ?>
				<?php endif; ?>
				<!-- PRODUCTOS :: CONFIGURACION :: LISTAR CATEGORIAS -->
				<?php if ( $section == 'productos.confListarCategorias'): ?>
					<?php $this->load->view('productos/config_listado_categorias'); ?>
				<?php endif; ?>
				<!-- PRODUCTOS :: CONFIGURACION :: AGREGAR CATEGORIA -->
				<?php if ( $section == 'productos.add_categoria'): ?>
					<?php $this->load->view('productos/config_add_edit_categorias'); ?>
				<?php endif; ?>
				<!-- PRODUCTOS :: CONFIGURACION :: EDITAR CATEGORIA -->
				<?php if ( $section == 'productos.editar_categoria'): ?>
					<?php $this->load->view('productos/config_add_edit_categorias'); ?>
				<?php endif; ?>

				<!-- ENTRADA DE STOCK :: NUEVA ENTRADA -->
				<?php if ( $section == 'entrada_stock.nueva_entrada' ): ?>
					<?php $this->load->view('entrada_stock/agregar'); ?>
				<?php endif; ?>

			</div>
		</div>





</div>