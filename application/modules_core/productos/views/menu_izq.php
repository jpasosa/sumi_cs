

<a href="javascript:history.back()">
	<img class="back" src="<?php echo ASSETS . 'frontend/images/productos/back.jpg'; ?>"alt="volver atras" title="Volver atrás" width="40" height="40" />
</a>

<?php if ( isset($show_add) && $show_add): ?>
	<a href="<?php echo site_url('productos/add');?>">
		<img class="list" src="<?php echo ASSETS . 'frontend/images/productos/add.png'; ?>" alt="listar" title="Agregar Productos" width="40" height="40" />
	</a>
<?php endif; ?>

<?php if ( isset($show_list) && $show_list ): ?>
	<a href="<?php echo site_url('productos/listar');?>">
		<img class="list" src="<?php echo ASSETS . 'frontend/images/productos/list.png'; ?>" alt="listar" title="Listar Productos" width="40" height="40" />
	</a>
<?php endif;?>

<?php if (isset($configure_link)): ?>
	<a href="<?php echo site_url($configure_link);?>">
		<img class="back" src="<?php echo ASSETS . 'frontend/images/productos/configure.png'; ?>" alt="configurar" title="<?php echo $configure_link_title ?>" width="40" height="40" />
	</a>
<?php endif ?>

