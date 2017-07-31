<?php

	global $wpdb;
	$result = $wpdb->get_results("
		SELECT 
			p.ID,
			mt.meta_value as size, 
			t.name as category,  
			pa.post_title as product_name, 
			mp.meta_value as plan, 
			pr.meta_value as price,
			p.post_parent as parent
		FROM wp_posts as p 
			inner join wp_postmeta as mp ON mp.post_id = p.ID and mp.meta_key = 'attribute_plan'
			inner join wp_postmeta as mt ON mt.post_id = p.ID and mt.meta_key = 'attribute_tamano'
			inner join wp_postmeta as pr ON pr.post_id = p.ID and pr.meta_key = '_price'
			inner join wp_posts as pa ON pa.ID = p.post_parent
			inner join wp_term_relationships as tr ON tr.object_id = p.post_parent
			inner join wp_term_taxonomy as tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
			inner join wp_terms as t ON t.term_id = tt.term_id
		WHERE 
			p.post_type = 'product_variation'
			AND t.name <> 'variable'
		ORDER BY size, category, plan, price, product_name ASC
	", ARRAY_A);


	$service = [];
	$posts = [];
	foreach ($result as $row) {

		$row['size'] =  ucfirst($row['size']);
		$row['category'] = strtolower($row['category']);
		$row['product_name'] = ucfirst($row['product_name']);
		$row['plan'] = strtolower($row['plan']);

		$min_price = '';
		if( isset($service[ $row['category'] ][ $row['size'] ][ $row['product_name'] ]['price-min']) ){
			$min_price = $service[ $row['category'] ][ $row['size'] ][ $row['product_name'] ]['price-min'];
		}
		if( $min_price > $row['price'] || $min_price == '' ){
			$min_price = $row['price'] ;
		}
	
		$post;
		if(array_key_exists($row['parent'], $posts)){
			$post = $posts[$row['parent']];
		}else{
			$post = get_post($row['parent']);
			$posts[$row['parent']] = $post;
		}

		// Buscar imagenes del producto
		// ***************************************
		// $sql = "
		// SELECT
		// 	 post_name,
		// 	 guid
		// FROM wp_posts
		// WHERE
		// 	 post_type = 'attachment'
		// 	 AND post_parent = ".$post->ID;
		// $gallery = $wpdb->get_results($sql);
		// ***************************************

		// Galeria del producto
		$gallery['thumnbnail'] = get_the_post_thumbnail_url( $post->ID );

		$service[ $row['category'] ][ $row['size'] ][ $row['product_name'] ]['gallery'] = $gallery;
		$service[ $row['category'] ][ $row['size'] ][ $row['product_name'] ]['plan'][ $row['plan'] ] = $row;
		$service[ $row['category'] ][ $row['size'] ][ $row['product_name'] ]['content'] = $post;
		$service[ $row['category'] ][ $row['size'] ][ $row['product_name'] ]['price-min'] = $min_price;

	}

	$s = json_encode( $service, JSON_UNESCAPED_UNICODE );
	$e = '';

	$source = 'default';
	if(array_key_exists($_GET['source'], $service)){
		if(!empty($_GET['source'])){
			$source = strtolower($_GET['source']); 
		}
	}
?>
<script type='text/javascript'>
	var extras = {}; // Extras
	<?php if(!empty($e)){ ?>
		extras = $.parseJSON(JSON.stringify(eval( <?php echo $e; ?>)));
	<?php } ?>
	var services = $.parseJSON(JSON.stringify(eval( <?php echo $s; ?>))); // Servicios
	var source = "<?php echo $source; ?>";
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
