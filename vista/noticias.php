<?php session_start(); ?>
<?php if (!$_SESSION) header("location:?action=sesion&id_m=2");?>

<!DOCTYPE html>
<html lang="es">
<style type="text/css">
<!--
.Estilo3 {color: #33CC66; font-weight: bold; }
.Estilo4 {font-size: 16px}
.Estilo5 {color: #33CC66; font-weight: bold; font-size: 16px; }
.Estilo6 {font-size: 24px; }
-->
</style>
<?php require_once('vista/secciones/header.php');  

?>
<body data-spy="scroll">
<?php require_once('vista/secciones/menu.php'); ?>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p align="center">&nbsp;</p>
<div class="container">
  
  <div align="right">
    <?php require_once('vista/secciones/menu2.php'); ?>
    </div>
  <span class="Estilo5">
  <section class="col-sm-10">  </section>
  </span>
  <span class="Estilo4"><strong>
  <section class="col-sm-10"></section>
  </strong>
  <section class="col-sm-10"></section>
  </span>
  <span class="Estilo4">
  <section class="col-sm-10"></section>
  </span>
  <section class="col-sm-10"><div align="center" class="Estilo5">
      <!-- CAJA DONDE ESTA LA TABLA DE GESTION DE LOS INVESTIGADORES -->
    </div>
    <div class="col-sm-12">
      
      <div align="right">
        <span class="Estilo5">
        <?php
  if ($_GET['id_action']==3)
	  {
	  echo "Guardado Exitosamente...";
	  }
	  
  if ($_GET['id_action']==5)
	  {
	  echo "Modificado Exitosamente...";
	  }
	  
	  if ($_GET['id_action']==6)
	  {
	  echo "Eliminado Exitosamente...";
	  }
	  
	  ?>
      </span><span class="Estilo5">      </span><span class="Estilo3">      </span>            </div>
        <h2><i class="glyphicon glyphicon-user"></i>Noticias <?php 
		
		
		if ($_GET['id_action']==2)
		{
		echo "-> Nuevo";
		}
		 
		 if ($_GET['id_action']==4)
		{
		echo "-> Modificar";
		}
		
		if ($_GET['id_action']==7)
		{
		echo "-> Eliminar";
		}
		?>
		
		 </h2>
        <hr>
  </div>
    <div class="col-sm-12">
      <br>
      <div class="panel panel-default tabla">
      <!-- Default panel contents -->
      <div align="left"><a href="?controller=front&action=noticias&id_action=2" class="btn btn-success">Agregar Noticia </a></div>
      <div class="panel-body">
	  <p>
	    <?php if ($_GET['id_action']==1 or $_GET['id_action']==3 or $_GET['id_action']==5 or $_GET['id_action']==6)
	  {
	  
	  ?>
	  </p>
	  <p>Noticias Registradas</p>
      </div>
	  <table class="table">
        <thead>
          <tr>
            <th width="12">
              <div align="center">#            </div></th>
            <th width="174">
              <div align="center">Titulo            </div></th>
            <th width="123">
              <div align="center">Fecha / Hora         </div></th>
            <th width="99"><div align="center">Estado</div></th>
            <th colspan="3">
              <div align="center">Operaciones            </div></th>
          </tr>
        </thead>
        <tbody>
		 <?php 
            $numero=1;   
		foreach ($noticias as $dato):
         
		 ?>
          <tr>
            <td>
              <div align="center"><?php echo $numero; ?></div></td>
            <td>
              <div align="center"><?php echo $dato->titulo; ?></div></td>
            <td>
              <div align="center"><?php echo $dato->fecha." ".$dato->hora; ?></div></td>
            <td>			  <div align="center"><?php if ($dato->estado==1) {echo "Publico";}  if ($dato->estado==2) {echo "Oculto";}  if ($dato->estado==3) {echo "Borrador";}?></div></td>
            <td width="2"><div align="center"><a href="?controller=front&action=noticias&id_action=4&id_noticias=<?php echo $dato->id_noticias; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i> </a> </div></td>
            <td width="82"><div align="center"><a href="?controller=front&action=noticias&id_action=7&id_noticias=<?php echo $dato->id_noticias; ?>&titulo=<?php echo $dato->titulo; ?>" class="btn btn-danger "><i class="glyphicon glyphicon-trash"></i> </a> 
              </div></td>
            </tr>
			
			<?php 
			$numero++;
			endforeach;
			?>
        </tbody>
      </table>
      
	  <?php 
	  
	  }
	  if ($_GET['id_action']==2)
	  {
	  ?>
	  <div align="center">
        <p>*Todos los datos son requeridos *</p>
        <form action="?controller=noticia&action=registrar_noticia" method="post" name="Form1" class="form-group" id="Form1">
		<div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-credit-card"></i></span>
                <input name="titulo" type="text" class="form-control" id="titulo" size="30" maxlength="25" placeholder="Titulo..." autofocus autocomplete="off" required>
                <input name="usuario" type="hidden" id="usuario" value="<?php echo $_SESSION['id']; ?>">
            </div>
          </div>
		  <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-credit-card"></i></span>
                <textarea name="contenido" cols="60" rows="7" class="form-control" id="contenido" placeholder="Contenido..." autofocus="autofocus" autocomplete="off" required="required"></textarea>
            </div>
		    </div>
		  <div class="col-xs-12 form-group">
<div class="col-xs-12 form-group">
            <div class="input-group"> 
              <p>&nbsp;</p>
              <p>Estado: 
                <select name="estado" id="estado">
                  <option value="1" selected>Publico</option>
                  <option value="2">Oculto</option>
                  <option value="3">Borrador</option>
                </select>
              </p>
              <p>&nbsp;</p>
              <table width="276" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
                <tr>
                  <td width="91"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i> Guardar </button></td>
                  <td width="72">&nbsp;</td>
                  <td width="91"><button type="reset" id="logueame" class="btn btn-block btn-warning"><i class="glyphicon glyphicon-ok"></i> Limpiar </button></td>
                </tr>
              </table>
              <p>&nbsp;</p>
            </div>
          </div>
          </form>
        <p>&nbsp;</p>
      </div>
      <p>
        <?php 
	  }
	  if ($_GET['id_action']==4)
	  {
	  foreach ($noticias as $dato):
	  if ($_GET['id_noticias']==$dato->id_noticias)
	  {
	  ?>
    </p>
      <div align="center">
        <p>*Todos los datos son requeridos *</p>
        <form action="?controller=noticia&action=modificar_noticia" method="post" name="Form1" class="form-group" id="Form1">
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-credit-card"></i></span>
                <input name="titulo" type="text" class="form-control" id="titulo" value="<?php echo $dato->titulo; ?>" size="30" maxlength="25" placeholder="Titulo..." autofocus autocomplete="off" required>
                <input name="usuario" type="hidden" id="usuario" value="<?php echo $_SESSION['id']; ?>">
                <input name="id_noticias" type="hidden" id="id_noticias" value="<?php echo $dato->id_noticias; ?>">
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-credit-card"></i></span>
                <textarea name="contenido" cols="60" rows="7" class="form-control" id="contenido" placeholder="Contenido..." autofocus="autofocus" autocomplete="off" required="required"><?php echo $dato->contenido; ?></textarea>
            </div>
          </div>
          <div class="col-xs-12 form-group">
          <div class="col-xs-12 form-group">
            <div class="input-group">
              <p>&nbsp;</p>
              <p>Estado:
                <select name="estado" id="estado">
                    <option value="1" selected>Publico</option>
                    <option value="2">Oculto</option>
                    <option value="3">Borrador</option>
                  </select>
              </p>
              <p>&nbsp;</p>
              <table width="276" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
                <tr>
                  <td width="91"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i>Modificar</button></td>
                  <td width="72">&nbsp;</td>
                  <td width="91"><button type="reset" id="logueame" class="btn btn-block btn-warning"><i class="glyphicon glyphicon-ok"></i> Limpiar </button></td>
                </tr>
              </table>
              <p>&nbsp;</p>
            </div>
          </div>
        </form>
        <p>&nbsp;</p>
      </div>
      <p>    
        <?php 
		
		}
		endforeach;
	  }
	  if ($_GET['id_action']==7)
		{

	?>
      </p>
      <form name="form1" method="post" action="?controller=noticia&action=eliminar_noticia">
        <p class="Estilo6">&nbsp;</p>
        <p class="Estilo6">&iquest;Desea eliminar la noticia
          <input name="id_noticias" type="hidden" id="id_noticias" value="<?php echo $_GET['id_noticias']; ?>">
          <?php echo $_GET['titulo']; ?>?, la misma no podra ser recuperada</p>
        <table width="250" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
          <tr>
            <td width="240"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i>&iexcl;Si, Deseo Eliminar Noticia! </button></td>
            </tr>
        </table>
        <p class="Estilo6">
          <?php
		}
	  ?>
        </p>
      </form>
      </div>
</div>
</section>
</div>

<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>

</body>
<?php require_once('vista/secciones/footer.php'); ?>
<?php require_once('vista/secciones/scripts.php'); ?>

</html>