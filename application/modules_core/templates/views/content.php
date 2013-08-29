

<div class="content">

		<div class="col-md-1">
			<div class="left" id="<?php echo $id_menu_left; ?>">
				<?php if ( $section == 'productos.add' || $section == 'productos.listar'
							|| $section == 'productos.ver' || $section == 'productos.editar' ): ?>
					<?php $this->load->view('productos/menu_izq'); ?>
				<?php endif; ?>
			</div>
		</div>

		<div class="col-md-11">
			<div class="right">
				<!-- HOMEPAGE -->
				<?php if ( $section == 'homepage.index' ): ?>
					<?php $this->load->view('homepage/homepage'); ?>
				<?php endif; ?>
				<!-- ALTA DE PRODUCTOS -->
				<?php if ( $section == 'productos.add' || $section == 'productos.editar' ): ?>
					<?php $this->load->view('productos/add_edit'); ?>
				<?php endif; ?>
				<!-- PRODUCTOS LISTAR -->
				<?php if ( $section == 'productos.listar' ): ?>
					<?php $this->load->view('productos/listar'); ?>
				<?php endif; ?>
				<!-- PRODUCTOS VER -->
				<?php if ( $section == 'productos.ver' ): ?>
					<?php $this->load->view('productos/ver'); ?>
				<?php endif; ?>
			</div>
		</div>





</div>