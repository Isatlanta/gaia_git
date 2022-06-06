<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Astra
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

get_header(); ?>

<article>
<img class="pic" src="" alt="">
<div>
<h3 class="artist"></h3>
<p class="tekst"></p>
</div>
</article>

<section id="primary" class="content-area">
<main id="main" class="site_main">

<script>

let inspiration;

const dbUrl = "https://isatlanta.dk/kea/10_eksamen/gaia_studio/wp-json/wp/v2/inspiration/"+<?php echo get_the_ID() ?>;

async function getJson() {
	const data = await fetch(dbUrl);
	inspiration = await data.json();
	console.log(inspiration);
	visInspiration();
}

function visInspiration() {
	const art = document.querySelector("article");
		art.querySelector(".pic").src = inspiration.billede.guid;
		art.querySelector(".artist").textContent = "By " + inspiration.artist;
		art.querySelector(".tekst").textContent = inspiration.beskrivelse;
		
	}

getJson();

</script>

</section> <!-- #primary -->


<style>
 h1 {
	 display: none;
 }

 .pic {
	 width: 1000px;
	 height: 1000px;
	 	 max-width:initial;
 }

 img {
	 max-width:initial;
 }

 footer {
	 display:block;
 }

/* header, #masthead {
display: block;
color:black;
background-image: url(pics/gaia_banner.png);
background-size: 100%;
}

header a, #masthead a{
display: block;
color:black;
} */

article {
	display:grid;
	height:900px;
}
</style>


<?php if ( astra_page_layout() == 'left-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?>

	<div id="primary" <?php astra_primary_class(); ?>>

		<?php astra_primary_content_top(); ?>

		<?php astra_content_page_loop(); ?>

		<?php astra_primary_content_bottom(); ?>

	</div><!-- #primary -->

<?php if ( astra_page_layout() == 'right-sidebar' ) : ?>

	<?php get_sidebar(); ?>

<?php endif ?> 


<?php get_footer(); ?>
