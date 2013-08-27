

<div class="content">

		<div class="col-md-1">
			<div class="left" id="<?php echo $id_menu_left; ?>">
				<?php if ( $section == 'productos.add' ): ?>
					<?php $this->load->view('productos/menu_izq'); ?>
				<?php endif; ?>
			</div>
		</div>

		<div class="col-md-11">
			<div class="right">
				<?php if ( $section == 'homepage.index' ): ?>
					<?php $this->load->view('homepage/homepage'); ?>
				<?php endif; ?>
				<?php if ( $section == 'productos.add' ): ?>
					<?php $this->load->view('productos/add_edit'); ?>
				<?php endif; ?>
			</div>
		</div>





</div>