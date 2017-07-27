<?php
/* 
 *
 * Template Name: purchase 
 *
 */
?>
<?php  get_header(); ?>

<header class="row">
	<aside id="top-compra" class="text-center"> 
		<span id='title' class="compra-titulo">Selecciona el tamaño de tu perrhijo</span>
	</aside>
</header>

<button class="btn btn-sm-kmibox" 
		data-target="1" 
		data-action="prev">Prev.</button>


<div id="group-section" class="row">
	<!-- Fase #1 Tamaño -->
	<section 
		data-fase="1" 
		data-title="Selecciona el tamaño de tu perrhijo" 
		class="container animated" ></section>
	<!-- Fase #2 Producto -->
	<section 
		data-fase="2" 
		data-title="Elige el tipo de kmiBOX" 
		class="container hidden animated">
		<article class="col-sm-6 text-center ">
			<h2>2</h2>
			<div id="gallery-1" class="carousel slide" data-ride="carousel">
			
			  <!-- Wrapper for slides -->
			  <div class="carousel-inner" role="listbox">
			    <div class="item active">
			      <img src="http://box.kmimos/wp-content/uploads/2017/06/surf.jpg" class="img-thumbnail" width="70%">
			    </div>
			    <div class="item">
			      <img src="http://box.kmimos/wp-content/uploads/2017/06/surf.jpg"  class="img-thumbnail" width="70%">
			    </div>

			  </div>
			</div>
			
			<div class="col-sm-12">
				<!-- Indicators -->
				<ol class="carousel-indicators">
					<li data-target="#gallery-1" data-slide-to="1"></li>
					<li data-target="#gallery-1" data-slide-to="0"></li>
				</ol>
			</div>

			<div class="text-center">
				<label class="label-precio">$ 0.00</label>
				<button data-action="next"  data-target="2" data-type="" class="btn btn-sm-kmibox">Seleccionar</button>
			</div>
			<p style="text-align:left;">asdasdasdasd</p>
		</article>
	</section>
	<!-- Fase #3 Plan -->
	<section data-fase="3" class="container hidden animated">
		<article class="col-sm-6 text-center">
			<h2>3</h2>
			<img  src="<?php echo get_home_url(); ?>/img/pequeno.png" class="img-responsive" width="300px">
			<button data-action="next"  data-target="3" data-type="grande" class="btn btn-sm-kmibox">Seleccionar</button>
		</article>
	</section>
	<!-- Fase #4 Extras -->
	<section data-fase="4" class="container hidden animated">
		<article class="col-sm-12 text-center ">
			<h2>4</h2>
			<img src="<?php echo get_home_url(); ?>/img/pequeno.png"  class="img-responsive" width="300px">
			<button data-action="next"  data-target="4" class="btn btn-sm-kmibox">Seleccionar</button>
		</article>
	</section>
</div>

<div class="container text-center">
	<h2>Todos los articulos de la kmibox son suministrados por:</h2>
</div>
<section id="marcas" class="text-center row">
	<div class="container">	
		<article class="col-sm-2 col-sm-offset-1">
			<img src="<?php echo get_home_url(); ?>/img/Secciones-06.png" class="img-responsive"  width="200px">
		</article>
		<article class="col-sm-2">
			<img src="<?php echo get_home_url(); ?>/img/Secciones-07.png" class="img-responsive"  width="200px">
		</article>
		<article class="col-sm-2">
			<img src="<?php echo get_home_url(); ?>/img/Secciones-09.png" class="img-responsive"  width="200px">
		</article>
		<article class="col-sm-2">
			<img src="<?php echo get_home_url(); ?>/img/Secciones-10.png" class="img-responsive"  width="200px">
		</article>
		<article class="col-sm-2">
			<img src="<?php echo get_home_url(); ?>/img/Secciones-08.png" class="img-responsive"  width="200px">
		</article>
	</div>
</section>

<?php get_footer();
