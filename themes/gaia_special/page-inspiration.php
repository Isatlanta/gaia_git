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


<template>
<article>
<img class="pic" src="" alt="">
<div>
<h2></h2>
<h3 class="artist"></h3>
<p class="tekst"></p>
</div>
</article>
</template>

<section id="primary" class="content-area">
<main id="main_inspi" class="site_main">
	<h1>Inspiration</h1>
<nav id="filtrering"><button data-inspo="alle">Alle</button></nav>
<section class="inspiration_container">
</section>

</main>
<footer>
	<section id="footer_grid">
		<div><h3>OPENING HOURS</H3>
	<p>Mon - Fri: 10am - 8pm <br> Saturday: 10am - 4pm <br> Sunday: Closed</p></div>

		<div><h3>ADDRESS</H3>
	<p>Studiestræde 35, <br> 1455 København K</p></div>

		<div><h3>CONTACT</H3>
	<a>Instagram - @gaia_kbh</a></div>

		<div><h4>Follow us on</h4><div>
			</section>
	</footer>

<script>

//variabler
let inspiration;
let categories;
let filterInspo = "alle";  

const dbUrl = "https://isatlanta.dk/kea/10_eksamen/gaia_studio/wp-json/wp/v2/inspiration?per_page=100";
const catUrl = "https://isatlanta.dk/kea/10_eksamen/gaia_studio/wp-json/wp/v2/categories";

async function getJson() {
	//fetcher URL
	const data = await fetch(dbUrl);
	const catdata = await fetch(catUrl);
	inspiration = await data.json();
	categories = await catdata.json();
	console.log(categories);
	visInspiration();
	opretKnapper();
}

//funktion til at oprette knapper
function opretKnapper(){

	categories.forEach(cat =>{
		//tilføj knap og data-attribut som kalder id'et fra kategorien. $ da det er variabel, ´´template literals for at lave en streng til knappen. id og name hentes fra url.
		document.querySelector("#filtrering").innerHTML += `<button class="filter" data-inspo="${cat.id}">${cat.name}</button>`;

	})


	//kald funktion
	addEventListenersToButtons();
}

//lave funktion der kan tilføje eventlisteners til knapper

function addEventListenersToButtons() {
	
	//find nav'en med id'et og alle button elementer. 
	//For hvert element tilføjes eventlistener(click) som filtrerer vha filtrering funktion
	document.querySelectorAll("#filtrering button").forEach(elm =>{
		console.log(elm);
		elm.addEventListener("click", filtrering);
	})
};

//funktion med filtrering med variabel der holder styr på hvilket filter vi har valgt (variabel bliver sat med dataset attribut)
function filtrering(){
filterInspo = this.dataset.inspo;
console.log(filterInspo);

//Kald VisInspiration funktion
visInspiration();
}


function visInspiration() {
	let temp = document.querySelector("template");
	let container = document.querySelector(".inspiration_container")
	container.innerHTML = "";
	inspiration.forEach(inspo => {
		//Indsæt if sætning i funktionen til visning af inspirationen, så scriptet viser den kategori der er valgt
		//Hvis filterInspo er lig med== "alle" eller|| er klikket på indeholder kategorien der er klikket på, skal den vises. 
		//parseint da attributterne bliver opfattet som tekst i javascript, og derfor skal ændres til at blive opfattet som tal, da det er tal hvilket man kan se under 
		if (filterInspo == "alle" || inspo.categories.includes(parseInt(filterInspo))){
		let klon = temp.cloneNode(true).content;
		klon.querySelector(".pic").src = inspo.billede.guid;
		klon.querySelector(".artist").textContent = "By " + inspo.artist;
		klon.querySelector(".tekst").textContent = inspo.beskrivelse;
		//Fjernes ved loop view, bruges til single view da det fører en til ny side:
		klon.querySelector("article").addEventListener("click", ()=> {location.href = inspo.link;})

		container.appendChild(klon);
		}
	})
}

getJson();

</script>

</section> <!-- #primary -->

<style>

	

#main_inspi {
	padding: 7rem;
	padding top: 20rem;
}

@media (min-width: 600px) {
	

.inspiration_container {
	display: grid;
	grid-template-columns: 1fr 1fr 1fr;
	gap: 1rem;
}

#footer_grid {
	display: grid;
	grid-template-columns: repeat(4, 1fr);
	padding: 50px;
	padding-left: 110px;
}
}

h1 {

}

/* footer {
	display: block;
	height: 
} */

	#masthead {
				width:100%;
				height: 100px;
				background-color: #4a4a4a;
				/* background-image: url(gaia_banner.jpeg); 
				background-size: contain;
				background-repeat: none; 
				aspect-ratio:;*/
			}

/* header, #masthead {
display: block;
color:black;
background-image: url(pics/gaia_banner.png);
background-size: 100%;
} */

	

footer {
	background-color: #4a4a4a;
	height: 200px;
}



	
</style>

<?php get_footer(); ?>
