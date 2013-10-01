

<a href="javascript:history.back()">
	<img class="back" src="<?php echo ASSETS . 'frontend/images/atras.png'; ?>"alt="volver atras" title="Volver atrás" width="50" height="50" />
</a>

<?php if ( isset($show_in) && $show_in): ?>
	<a href="<?php echo site_url('entrada_stock/nueva_entrada/add');?>">
		<img class="list" src="<?php echo ASSETS . 'frontend/images/stock_actual/product_in.jpg'; ?>" alt="listar" title="Ingresar al  Stock" width="50" height="50" />
	</a>
<?php endif; ?>

<?php if ( isset($show_out) && $show_out ): ?>
	<a href="#">
		<img class="list" src="<?php echo ASSETS . 'frontend/images/stock_actual/product_out.jpg'; ?>" alt="listar" title="Dar una Salida del Stock" width="50" height="50" />
	</a>
<?php endif; ?>


