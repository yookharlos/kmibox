<?php

function query_products_extra(){
	global $wpdb;
	$result = $wpdb->get_results("
		SELECT 
			t.name as category,  
			p.ID,
			p.post_title as product_name,
			pr.meta_value as price
		FROM wp_posts as p 
			inner join wp_postmeta as pr ON pr.post_id = p.ID and pr.meta_key = '_price'
			inner join wp_term_relationships as tr ON tr.object_id = p.ID
			inner join wp_term_taxonomy as tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
			inner join wp_terms as t ON t.term_id = tt.term_id
		WHERE 
			t.name = 'extra' 
			and p.post_type = 'product' 
			and post_status = 'publish'
	", ARRAY_A);

	$extra = [];
	foreach ($result as $row) {
		$extra[] = [
			'ID' => $row['ID'],
			'price' => $row['price'],
			'name' => $row['product_name'],
			'thumnbnail' => get_the_post_thumbnail_url( $row['ID'] )
		];
	}

	return $extra;
}

function query_products(){
	global $wpdb;
	$result = $wpdb->get_results("
		SELECT 
			p.ID,
			mt.meta_value as size, 
			t.name as category,  
			pa.post_title as product_name, 
			mp.meta_value as plan, 
			pr.meta_value as price,
			p.post_parent as parent,
			ga.meta_value as gallery
		FROM wp_posts as p 
			left  join wp_postmeta as ga ON ga.post_id = p.post_parent and ga.meta_key = '_product_image_gallery'
			inner join wp_postmeta as mp ON mp.post_id = p.ID and mp.meta_key = 'attribute_plan'
			inner join wp_postmeta as mt ON mt.post_id = p.ID and mt.meta_key = 'attribute_tamano'
			inner join wp_postmeta as pr ON pr.post_id = p.ID and pr.meta_key = '_price'
			inner join wp_posts as pa ON pa.ID = p.post_parent
			inner join wp_term_relationships as tr ON tr.object_id = p.post_parent
			inner join wp_term_taxonomy as tt ON tt.term_taxonomy_id = tr.term_taxonomy_id
			inner join wp_terms as t ON t.term_id = tt.term_id
		WHERE p.post_type = 'product_variation' AND t.name <> 'variable'
		ORDER BY size, category, product_name, plan ASC
	", ARRAY_A);
	
	$posts = [];
	$service = [];

	foreach ($result as $row) {

		$row['product_name'] = ucfirst($row['product_name']);
		$row['category'] = strtolower($row['category']);
		$row['size'] =  ucfirst($row['size']);
		$row['plan'] = ucfirst($row['plan']);

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
		// **********************************
		$gallery['other'] = get_product_gallery( $row['gallery'] );
		$gallery['thumnbnail'] = get_the_post_thumbnail_url( $post->ID );

		$service[ $row['category'] ][ $row['size'] ][ $row['product_name'] ]['gallery'] = $gallery;
		$service[ $row['category'] ][ $row['size'] ][ $row['product_name'] ]['plan'][ $row['plan'] ] = $row;
		$service[ $row['category'] ][ $row['size'] ][ $row['product_name'] ]['content'] = $post;
		$service[ $row['category'] ][ $row['size'] ][ $row['product_name'] ]['price-min'] = $min_price;
	}

	return $service;
}

function get_products(){

	$service = query_products();
	
	$product = json_encode( $service, JSON_UNESCAPED_UNICODE );
	$extra = json_encode( query_products_extra(), JSON_UNESCAPED_UNICODE );

	$source = 'default';
	if(array_key_exists($_GET['source'], $service)){
		if(!empty($_GET['source'])){
			$source = strtolower($_GET['source']); 
		}
	}

	return [
		'product' => $product,
		'extra' => $extra,
		'source' => $source,
	];

}

function get_product_gallery( $ids = 0 ){
	global $wpdb;
	$result = $wpdb->get_results("
		SELECT
			guid as url
		FROM wp_posts
		WHERE post_type = 'attachment' and ID in ( {$ids} )
	");
	return $result;
}