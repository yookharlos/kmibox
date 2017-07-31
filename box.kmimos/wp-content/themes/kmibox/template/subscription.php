<?php
/* 
 *
 * Template Name: purchase 
 *
 */
?>
<?php  get_header(); ?>

<header id="header-purchase" class="row">
	<button class="btn btn-md btn-default " 
		data-target="1" 
		data-action="prev">Prev.</button>
	<aside id="top-compra" class="text-center"> 
		<span id='title' class="compra-titulo">Selecciona el tamaño de tu perrhijo</span>
	</aside>
</header>

<div id="group-section" class="row padre">
	<!-- Fase #1 Tamaño -->
	<section 
		data-fase="1" 
		data-title="Selecciona el tamaño de tu perrhijo" 
		data-msg ="Todos los articulos de la kmibox son suministrados por:"
		class="container animated" ></section>
	<!-- Fase #2 Producto -->
	<section 
		data-fase="2" 
		data-title="Elige el tipo de kmiBOX" 
		data-msg ="Todos los articulos de la kmibox son suministrados por:"
		class="container hidden animated">
	</section>

	<!-- Fase #3 Plan -->
	<section 
		data-fase="3"
		class="container hidden animated"
		data-msg ="*Descuento en comparación con el precio unitario o mensual">
 	</section>

	<!-- Fase #4 Extras -->
	<section data-fase="4" class="container hidden animated ">
		<div class="row">		
			<article class="col-sm-2 col-sm-offset-2 text-center vertical-center">
				<img src="<?php echo get_home_url(); ?>/img/pequeno.png"  class="img-responsive" width="300px">
				<h2>4</h2>
			</article>
			<article class="col-sm-4 text-center">
				<img src="<?php echo get_home_url(); ?>/img/pequeno.png"  class="img-responsive" width="300px">
				<h2>4</h2>
			</article>
			<article class="col-sm-2 text-center vertical-center">
				<img src="<?php echo get_home_url(); ?>/img/pequeno.png"  class="img-responsive" width="300px">
				<h2>4</h2>
			</article>
		</div>
		<div class="row text-center">		
			<button data-action="next"  data-target="4" class="btn btn-sm-kmibox">Pagar</button>
		</div>
	</section>
</div>

<footer id="footer-purchase">
	<aside id="section-msg" class="container text-center">
		<h2>Todos los articulos de la kmibox son suministrados por:</h2>
	</aside>
	<aside id="marcas" class="text-center row">
		<div class="container">	
			<article class="col-xs-4 col-sm-2 col-sm-offset-1">
				<img src="<?php echo get_home_url(); ?>/img/Secciones-06.png" class="img-responsive"  width="100px">
			</article>
			<article class="col-xs-4 col-sm-2">
				<img src="<?php echo get_home_url(); ?>/img/Secciones-07.png" class="img-responsive"  width="100px">
			</article>
			<article class="col-xs-4 col-sm-2">
				<img src="<?php echo get_home_url(); ?>/img/Secciones-09.png" class="img-responsive"  width="100px">
			</article>
			<article class="col-xs-4 col-sm-2">
				<img src="<?php echo get_home_url(); ?>/img/Secciones-10.png" class="img-responsive"  width="100px">
			</article>
			<article class="col-xs-4 col-sm-2">
				<img src="<?php echo get_home_url(); ?>/img/Secciones-08.png" class="img-responsive"  width="100px">
			</article>
		</div>
	</aside>
</footer>

<?php get_footer();
