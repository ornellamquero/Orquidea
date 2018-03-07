<!DOCTYPE html>
<html lang="es">
<?php require_once('vista/secciones/header.php'); ?>
<style type="text/css">
<!--
.Estilo1 {font-size: 24px}
-->
</style>
<body data-spy="scroll">
<?php require_once('vista/secciones/menu.php'); ?>
<div>	
  <blockquote>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p><span class="Estilo1"><strong>
      <?php 
						  foreach ($noticias as $dato):
						  if($_GET['id_noticias']==$dato->id_noticias)
						  {
						  ?>
    </strong> </span>    </p>
    <p class="Estilo1">
      <strong>
      <?php echo $dato->titulo; ?>        </strong> 
	  
	  
	  <?php echo $dato->contenido; ?></p>
    <p class="Estilo1">&nbsp;</p>
    <p class="Estilo1">&nbsp;</p>
    <p class="Estilo1">&nbsp;</p>
    <p class="Estilo1">&nbsp;</p>
    <p class="Estilo1">&nbsp;</p>
    <p class="Estilo1">&nbsp;</p>
    <p class="Estilo1">&nbsp;</p>
    <p class="Estilo1">&nbsp;</p>
    <p class="Estilo1">&nbsp;</p>
    <p class="Estilo1">&nbsp;</p>
    <p>
      <?php 
						  
						  }
						  endforeach;
						  						  ?>
    </p>
  </blockquote>
</div>
</body>
<?php require_once('vista/secciones/footer.php'); ?>
<?php require_once('vista/secciones/scripts.php'); ?>

</html>