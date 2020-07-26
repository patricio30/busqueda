<!DOCTYPE html>
<html lang="es">
<?php 
include('head.php');
?>

<body>
  <?php 
  $fechaArchivo = "24-07-2020";
  include('navegacion.php');
  ?>
  
  <div class="container">
	<div class="content">
		<hr/>
    <div>
      <span style="float:right">
        <h5 style="color: #0072BC;">Datos actualizados con fecha: <?php echo $fechaArchivo;?></h5>
      </span>
      <h3>BUSQUEDA DE AFILIADO</h3>
    </div>
		<hr/>
		<form id="formularioBusqueda" class="form-inline" method="GET">

      <input type="text" class="form-control" id="fechaArchivo" name="fechaArchivo" hidden="hidden" value="<?php echo $fechaArchivo;?>" readonly>

			<input type="text" name="busqueda" id="busqueda" placeholder=" Ingresar numero de documento" maxlength="8" autocomplete="off" style="text-transform:uppercase; width:300px;height:40px">
      <!--input type="submit" id="botonBuscar" value="Buscar" class="btn btn-primary"-->
			<button class="btn btn-primary mx-sm-2" id="botonBuscar" style="height:40px; background-color:#0072BC">Buscar</button>
			<button class="btn btn-danger" id="botonLimpiar" style="height:40px;">Borrar</button>
		</form>
	</div>
  </div>

   <br>
   <br>
   <div id="tabla_resultado">
   </div>
</body>
</html>

<script type="text/javascript">
  $('#botonBuscar').click(function(evento){
    evento.preventDefault();
    var fechaArchivo = $("#fechaArchivo").val();
    var busqueda = $("#busqueda").val();
    //alert(fechaArchivo);
    if(busqueda != ''){
      $.ajax({
          url: 'busqueda.php',
          type:'POST',
          data: {"busqueda":busqueda, "fechaArchivo":fechaArchivo},
          success: function(data){
          }
      })
      .done(function(resultado){
        $("#tabla_resultado").html(resultado);
      })
      return false;
    }
  });

  $('#botonLimpiar').click(function(evento){
    evento.preventDefault();
    $("#formularioBusqueda")[0].reset();
    $("#tabla_resultado").html(""); 
  });

  function mensajeError($mensaje){
    swal.fire({
      title: $mensaje, 
      allowOutsideClick: false,
      imageUrl: 'imagenes/alerta2.jpg',
      imageWidth: '125px',
    });
  }

   function mensajeExito($mensaje){
    swal.fire({
        title: $mensaje, 
        //type: "success",
        allowOutsideClick: false,
        imageUrl: 'imagenes/okAzul3.jpg',
        imageWidth: '125px',
    });
  }
  </script>

  <style type="text/css">
  #footer {
     position:fixed;
    left:0px;
     bottom:0px;
     height:30px;
     width:100%;
     background:#999;
  }
 #busqueda{
  border-color: #0072BC;
  border-width: 1px;
  border-style: solid;
 }
</style>
