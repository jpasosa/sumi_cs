

<a href="#">
	<img class="back" src="<?php echo ASSETS . 'frontend/images/productos/back.jpg'; ?>"alt="volver atras" title="Volver atrás" width="40" height="40" />
</a>

<?php if ($section == 'productos.listar' || $section == 'productos.ver' || $section == 'productos.editar'): ?>
	<a href="<?php echo site_url('productos/add');?>">
		<img class="list" src="<?php echo ASSETS . 'frontend/images/productos/add.png'; ?>" alt="listar" title="Agregar Productos" width="40" height="40" />
	</a>
<?php endif ?>

<?php if ($section == 'productos.add' || $section == 'productos.ver' || $section == 'productos.editar'
			|| $section == 'entrada_stock.nueva_entrada'): ?>
	<a href="<?php echo site_url('productos/listar');?>">
		<img class="list" src="<?php echo ASSETS . 'frontend/images/productos/list.png'; ?>" alt="listar" title="Listar Productos" width="40" height="40" />
	</a>
<?php endif ?>


<a href="#">
	<img class="back" src="<?php echo ASSETS . 'frontend/images/productos/configure.png'; ?>" alt="configurar" title="Configuración de Productos" width="40" height="40" />
</a>
