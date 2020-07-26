<header div class="container">
<nav class="navbar navbar-expand-lg navbar-dark" id="barra">
	<a class="navbar-brand text-white"><img src="imagenes/imagenpagina.jpg" height="75px"></a>
	
	<div class="collapse navbar-collapse" id="menu">
	<ul class="navbar-nav mr-auto">	</ul>
	</div>

	<span class="">
		<div class="container">
			<p id="fecha"><?php 
			date_default_timezone_set("America/Argentina/Buenos_Aires");
			$fecha = date("d-m-Y"); echo "Fecha actual: ".$fecha?></p>
		</div>
	</span>
  </nav>
</header>


<style type="text/css">
#fecha{
    height: 1px;
    font-weight: bold;
    color: white;
}
#barra{
	background: #0072BC;
}
</style>
