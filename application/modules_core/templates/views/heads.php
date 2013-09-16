<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8" />

	<title>Constrol Stock</title>

	<!-- FUENTE -->
	<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>

<!-- BOOTSTRAP -->
	<link href="<?php echo ASSETS . 'bootstrap/dist/css/bootstrap.css'; ?>" rel="stylesheet" media="screen">


	<!-- ESTILO PRINCIPAL -->
	<link href="<?php echo ASSETS . 'frontend/css/main.css'; ?>" type="text/css" rel="stylesheet" />

	<!-- ESTILO PRODUCTOS -->
	<?php if ( $section == 'productos.add' || $section == 'productos.listar'
				|| $section == 'productos.editar' || $section == 'productos.ver' || $section == 'productos.configuracion'
				|| $section == 'productos.confListarCategorias'
				|| $section == 'productos.add_categoria'
				|| $section == 'productos.editar_categoria'): ?>
		<link href="<?php echo ASSETS . 'frontend/css/productos.css'; ?>" type="text/css" rel="stylesheet" />
	<?php endif ?>

	<!-- ESTILO STOCK -->
	<?php if ( $section == 'entrada_stock.nueva_entrada'): ?>
		<link href="<?php echo ASSETS . 'frontend/css/productos.css'; ?>" type="text/css" rel="stylesheet" />
		<!-- TODO: hay que hacer el estilo propio del stock, por ahora uso de los productos -->
	<?php endif ?>


<?php if (isset($css_grocery) && isset($js_grocery)): ?>


<?php
foreach($css_grocery as $file): ?>
        <link type="text/css" rel="stylesheet" href="<?php echo $file; ?>" />
<?php endforeach; ?>
<?php foreach($js_grocery as $file): ?>
        <script src="<?php echo $file; ?>"></script>
<?php endforeach; ?>

<?php endif ?>

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
		<script src="../../assets/js/html5shiv.js"></script>
		<script src="../../assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- JQUERY -->
	<script src="<?php echo ASSETS . 'frontend/js/jquery-1.10.2.min.js'; ?>"></script>
	<!-- BOOTSTRAP -->
	<script src="<?php echo ASSETS . 'bootstrap/dist/js/bootstrap.min.js'; ?>"></script>

	<script type="text/javascript">
		// ahora se puede usar RUTA desde los .js, cambia si es LOCAL o DEMO
		var RUTA = "<?php echo RUTA; ?>";
	</script>

	<!-- JS ELIMINAR CATEGORIAS -->
	<?php if ( $section == 'productos.confListarCategorias'): ?>
		<script src="<?php echo ASSETS . 'frontend/js/del_category.js'; ?>"></script>
	<?php endif ?>

	<!-- ICO -->
	<link rel="icon" href="<?php echo ASSETS . 'frontend/images/favicon.ico'; ?>  " type="image/vnd.microsoft.icon" />



</head>