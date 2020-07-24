
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script>
function descheckeo() {
	var mostrarsuper1 = document.getElementById("mostrar-super-1");
	var mostrarsuper2 = document.getElementById("mostrar-super-2");
	var mostrarsuper3 = document.getElementById("mostrar-super-3");
	var mostrarsuper4 = document.getElementById("mostrar-super-4");
	var mostrarsuper5 = document.getElementById("mostrar-super-5");
	var mostrarsuper6 = document.getElementById("mostrar-super-6");
	
	if (mostrarsuper1.checked == true){
    $("#mi-carro .super1").removeClass("no-mostrar");
  } else {
    $("#mi-carro .super1").addClass("no-mostrar");
  }
  	if (mostrarsuper2.checked == true){
    $("#mi-carro .super2").removeClass("no-mostrar");
  } else {
    $("#mi-carro .super2").addClass("no-mostrar");
  }
  	if (mostrarsuper3.checked == true){
    $("#mi-carro .super3").removeClass("no-mostrar");
  } else {
    $("#mi-carro .super3").addClass("no-mostrar");
	}
  	if (mostrarsuper4.checked == true){
    $("#mi-carro .super4").removeClass("no-mostrar");
  } else {
    $("#mi-carro .super4").addClass("no-mostrar");
	}
  	if (mostrarsuper5.checked == true){
    $("#mi-carro .super5").removeClass("no-mostrar");
  } else {
    $("#mi-carro .super5").addClass("no-mostrar");
	}
  	if (mostrarsuper6.checked == true){
    $("#mi-carro .super6").removeClass("no-mostrar");
  } else {
    $("#mi-carro .super6").addClass("no-mostrar");
	}
	
	
}

</script>

<label class="container">  	
    <input onclick="descheckeo()" type="checkbox" name="mostrar-super-1" class="mostrar-super" id="mostrar-super-1"> Mostrar los precios de <?php the_field("super_1"); ?> 
    <img src="http://localhost/tu-changuito/wp-content/uploads/2020/05/significado-logos-famosos-carrefour.jpg" class="w-25 d-block" alt="">
		<span class="checkmark"></span> 
  </label>
  <hr>
	<label class="container">
    <input onclick="descheckeo()" type="checkbox" name="mostrar-super-2" class="mostrar-super" id="mostrar-super-2"> Mostrar los precios de <?php the_field("super_2"); ?> 
    <img src="http://localhost/tu-changuito/wp-content/uploads/2020/05/vea-cencosud.png" class="w-25 d-block" alt="">			
		<span class="checkmark"></span>
  </label>
  <hr>
	<label class="container">
    <input onclick="descheckeo()" type="checkbox" name="mostrar-super-3" class="mostrar-super" id="mostrar-super-3"> Mostrar los precios de <?php the_field("super_3"); ?> 
    <img src="http://localhost/tu-changuito/wp-content/uploads/2020/05/logo-atomo.jpg" class="w-25 d-block" alt="">	
		<span class="checkmark"></span>
  </label>
  <hr>
	<label class="container">
    <input onclick="descheckeo()" type="checkbox" name="mostrar-super-4" class="mostrar-super" id="mostrar-super-4"> Mostrar los precios de <?php the_field("super_4"); ?> 
    <img src="http://localhost/tu-changuito/wp-content/uploads/2020/05/Walmart_logo_transparent_png.png" class="w-25 d-block" alt="">
		<span class="checkmark"></span>
  </label>
  <hr>
	<label class="container">
    <input onclick="descheckeo()" type="checkbox" name="mostrar-super-5" class="mostrar-super" id="mostrar-super-5"> Mostrar los precios de <?php the_field("super_5"); ?> 
    <img src="http://localhost/tu-changuito/wp-content/uploads/2020/05/logo-coto.png" class="w-25 d-block" alt="">			
		<span class="checkmark"></span>
  </label>
  <hr>
	<label class="container">
    <input onclick="descheckeo()" type="checkbox" name="mostrar-super-6" class="mostrar-super" id="mostrar-super-6"> Mostrar los precios de <?php the_field("super_6"); ?>
    <img src="http://localhost/tu-changuito/wp-content/uploads/2020/05/Logo_Jumbo_Cencosud.png" class="w-25 d-block" alt="Sports">			
		<span class="checkmark"></span>
	</label>