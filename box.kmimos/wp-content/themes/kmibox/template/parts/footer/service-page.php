<?php $result = get_products(); ?>
<script type='text/javascript'>

	var extras = {}; // Extras
	<?php if(!empty($result['extra'])){ ?>
		extras = $.parseJSON(JSON.stringify(eval( <?php echo $result['extra']; ?>)));
	<?php } ?>
	var services = $.parseJSON(JSON.stringify(eval( <?php echo $result['product']; ?>))); // Servicios
	var source = "<?php echo $result['source']; ?>";
	var service = services[source];
	var icons = {
		'Grande' : '<?php echo get_home_url(); ?>/img/grande.png',
		'Pequeño' : '<?php echo get_home_url(); ?>/img/pequeno.png',
	};

	var kmibox_param = {
		"fase1":"",
		"fase2":"",
		"fase3":"",
	};

</script>
<script type='text/javascript' src="<?php echo get_home_url(); ?>/js/service_compra.js"></script>
