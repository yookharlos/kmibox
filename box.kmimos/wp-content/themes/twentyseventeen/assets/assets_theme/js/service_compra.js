$(function($){

	// *******************************
	// Next. - Fase 		
	// *******************************
	$('section').on('click', '[data-action="next"]', function(){

		// Config.
		var fase_section= $('[data-fase="' + $(this).data("target") + '"]');
		var fase = fase_section.attr("data-fase");
		var faseNext_id = parseFloat(fase)+1;
		var faseNext = $('[data-fase="'+faseNext_id+'"]');

		// Es la ultima fase
		if( $('[data-fase="'+faseNext_id+'"]').length > 0 ){

			kmibox_param['fase'+$(this).attr('data-target')] = $(this).attr('data-value');
			kmibox_param['code'] = $(this).data('object');
			loadFase( faseNext_id );

			// Mostrar Proxima fase
			faseNext
				.addClass('bounceInRight animated')
				.removeClass('hidden')
			;			
			// Ocultar Obj. Actual
			$(fase_section).addClass('hidden');
			// Cargar Titulo
			$("#title").text( faseNext.data("title") );
			// Boton Prev
			$('[data-action="prev"]')
				.attr('data-target', fase)
				.text("Prev. "+fase)
				;
		}});

	// *******************************
	// Prev. - Fase 		
	// *******************************
	$('[data-action="prev"]').on('click', function(){
		// Actual
		var fase_section= $('[data-fase="' + $(this).attr("data-target") + '"]');
		var fase = fase_section.attr("data-fase");

		// Siguiente
		var faseNext_id = parseFloat(fase)+1;
		var faseNext = $('[data-fase="'+faseNext_id+'"]');

		// Anterior
		var fasePrev_id = parseFloat(fase)-1;

		// Es la ultima fase
		if( $('[data-fase="' + $(this).attr("data-target") + '"]').length > 0 ){
			// Mostrar Proxima fase
			fase_section
				.removeClass('bounceInRight')
				.addClass('bounceInLeft')
				.removeClass('hidden')
			;			
			// Ocultar Obj. Actual
			$(faseNext)
				.addClass('hidden');
			// Cargar Titulo
			$("#title").text( fase_section.data("title") );
			// Boton Next
			$(this)
				.attr('data-target', fasePrev_id)
				.text('Prev. '+fasePrev_id);
		}});

	// *******************************
	// Cargar Fase por ID
	// *******************************
	function loadFase(fase_id){

		var col = 4;

		switch( fase_id ){
			// ***************************************
			// Fase #1 - Tamaño
			// ***************************************
			case 1:
				// Titulo
				$("#title").text( $('[data-fase="1"]').data("title") );
				
				// Cargar Items
				$('[data-fase="1"]').empty();

				col = cal_column(service);
				$.each(service, function(key, val){
					$('[data-fase="1"]')
					.append( 
						$('<article class="text-center col-sm-'+col+'"></article>')
						.append( 
						$('<h2>')
							.text(key)
						,$('<img />')
							.addClass('img-responsive')
							.attr({
								'src': icons[key],
								'width': '300px',
							})
						,$('<button>Seleccionar</button>')
							.addClass('btn')
							.addClass('btn-sm-kmibox')
							.attr({
								'data-value': key,
								'data-action':'next',
								'data-target': "1",
							})
						)
					);
				});
			break;
			// ***************************************
			// Fase #2 - Producto
			// ***************************************
			case 2:

				// Cargar Items
				var producto = service[kmibox_param['fase1']];
				$('[data-fase="2"]').empty();
				var col = cal_column(producto);
				var product_id=0;

				$.each(producto, function(key, val){

					var img='';
					$.each(val['gallery'], function(index, img){
						img = '<img src="'+img.guid+'" class="img-responsive">';
					});

					console.log(img);

					$('[data-fase="2"]')
					.append(
						$('<article class="text-center col-sm-'+col+'"></article>')
						.append( 
							$('<h2>')
								.text(key)
							,$(img)
							,$('<div>')
								.addClass('pag-image')
							,$('<div>').append(
								$('<label>')
									.addClass('label-precio')
									.text('$'+val['price-min'])
								,$('<button data-action="next">Seleccionar</button>')
									.addClass('btn')
									.addClass('btn-sm-kmibox')
									.attr({
										'data-value': key,
										'data-target': "2",
									})
							)
							,$('<p>')
								.text(val['content']['post_content'])
						)
					);
				});
			break;
			
			// ***************************************
			// Fase #3 - Plan
			// ***************************************
			case 3:
				// Cargar Items
				var plan = service[ kmibox_param['fase1'] ][ kmibox_param['fase2'] ]['plan'];
				$('[data-fase="3"]').empty();
				var col = cal_column(plan);
				$.each(plan, function(key, val){

					$('[data-fase="3"]')
					.append(
						$('<article class="text-center col-sm-'+col+'"></article>')
						.append( 
						$('<h2>')
							.text(key)
						,$('<img />')
							.addClass('img-responsive')
							.attr({
								'src': icons[key],
								'width': '300px',
							})
						,$('<div>')
							.addClass('pag-image')
						,$('<button data-action="next">Seleccionar</button>')
							.addClass('btn')
							.addClass('btn-sm-kmibox')
							.attr({
								'data-value': key,
								'data-target': "3",
								'data-object': val['ID'],
							})
						)
					);
				});
			break;
			// ***************************************
			// Fase #4 - Extras
			// ***************************************
			case 4:
				// Cargar Items
				var extras = service[ kmibox_param['fase1'] ][ kmibox_param['fase2'] ]['plan'];

		}
	}

	function cal_column(_service){
		var col = 4;
		var count_items = Object.keys(_service).length;
		if( count_items > 0 && count_items < 3 ){
			col = 12 / count_items;
		}
		return col;
	}

	loadFase(1);

});
