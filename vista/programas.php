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
        <h2><i class="glyphicon glyphicon-user"></i> Programa <?php 
		
		
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
      <div align="left"><a href="/?controller=front&action=programa&id_action=2" class="btn btn-success">Agregar Programa</a></div>
      <div class="panel-body">
	  <p>
	    <?php if ($_GET['id_action']==1 or $_GET['id_action']==3 or $_GET['id_action']==5 or $_GET['id_action']==6)
	  {
	  
	  ?>
	  </p>
	  
      </div>
	  <table class="table">
        <thead>
          <tr>
            <th width="12">
              <div align="center">#            </div></th>
            <th width="174">
              <div align="center">Nombre            </div></th>
            <th width="123">
              <div align="center">Descripci&oacute;n            </div></th>
            <th width="99"><div align="center">Area</div></th>
            <th colspan="3">
              <div align="center">Operaciones            </div></th>
          </tr>
        </thead>
        <tbody>
		 <?php 
            $numero=1;   
		foreach ($programas as $dato):
         
		 ?>
          <tr>
            <td>
              <div align="center"><?php echo $numero; ?></div></td>
            <td>
              <div align="center"><?php echo $dato->nombre; ?></div></td>
            <td>
              <div align="center"><?php echo $dato->descripcion; ?></div></td>
            <td>			  <div align="center"><?php echo $dato->area; ?></div></td>
            <td width="2"><div align="center"><a href="?controller=front&action=programa&id_action=4&id=<?php echo $dato->id; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i> </a> </div></td>
            <td width="82"><div align="center"><a href="?controller=front&action=programa&id_action=7&id=<?php echo $dato->id."&nombre=".$dato->nombre; ?>" class="btn btn-danger "><i class="glyphicon glyphicon-trash"></i> </a> 
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
        <p>*Todos los datos son requeridos * </p>
        <form action="?controller=programa&action=registrar_programa" method="post" name="Form1" class="form-group" id="Form1">
		<div class="col-xs-12 form-group">
          <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope"></i></span>
              <input name="nombre" type="text" class="form-control" id="titulo2" maxlength="25" placeholder="Nombre..." autofocus autocomplete="off" required>
          </div>
		  </div>
		<div class="col-xs-12 form-group">
          <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
            <input name="area" type="text" class="form-control" id="titulo3" maxlength="25" placeholder="Area..." autofocus autocomplete="off" required>
          </div>
		  </div>
		<div class="col-xs-12 form-group">
          <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
              <textarea name="descripcion" rows="4" class="form-control" id="descripcion" placeholder="Descripcion..." autofocus="autofocus" autocomplete="off" required="required"></textarea>
          </div>
		  </div>
		<div class="col-xs-12 form-group">
            <div class="input-group">
              <p>&nbsp;</p>
              <p>Macroproyecto:
                <select name="id_macroproyecto" id="id_macroproyecto">
				<?php foreach ($macroproyectos as $dato): ?>
                  <option value="<?php echo $dato->id; ?>"><?php echo $dato->nombre; ?></option>
				  <?php endforeach; ?>
                  </select>
              </p>
            </div>
          </div>
          <div class="col-xs-12 form-group">
          <p>&nbsp;</p>
          <table width="276" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
            <tr>
              <td width="91"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i> Guardar </button></td>
              <td width="72">&nbsp;</td>
              <td width="91"><button type="reset" id="logueame" class="btn btn-block btn-warning"><i class="glyphicon glyphicon-ok"></i> Limpiar </button></td>
            </tr>
          </table>
          <p>&nbsp;</p>
        </form>
        <p>&nbsp;</p>
      </div>
      <p>
        <?php 
	  }
	  if ($_GET['id_action']==4)
	  {
	  foreach ($programas as $dato):
	  if ($_GET['id']==$dato->id)
	  {
	  ?>
    </p>
      <div align="center">
        <p>*Todos los datos son requeridos * </p>
        <form action="?controller=programa&action=modificar_programa" method="post" name="Form1" class="form-group" id="Form1">
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-envelope">
              <input name="id" type="hidden" id="id" value="<?php echo $_GET['id']; ?>">
            </i></span>
                <input name="nombre" type="text" class="form-control" id="nombre" value="<?php echo $dato->nombre; ?>" maxlength="25" placeholder="Nombre..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
                <input name="area" type="text" class="form-control" id="area" value="<?php echo $dato->area; ?>" maxlength="25" placeholder="Area..." autofocus autocomplete="off" required>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
                <textarea name="descripcion" rows="4" class="form-control" id="descripcion" placeholder="Descripcion..." autofocus="autofocus" autocomplete="off" required="required"><?php echo $dato->descripcion; ?></textarea>
            </div>
          </div>
          <div class="col-xs-12 form-group">
            <div class="input-group">
              <p>&nbsp;</p>
              <p>Macroproyecto:
                <select name="id_macroproyecto" id="id_macroproyecto">
                    <?php foreach ($macroproyectos as $dato): ?>
                    <option value="<?php echo $dato->id; ?>"><?php echo $dato->nombre; ?></option>
                    <?php endforeach; ?>
                  </select>
              </p>
            </div>
          </div>
          <div class="col-xs-12 form-group">
          <p>&nbsp;</p>
          <table width="276" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
            <tr>
              <td width="91"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i> Guardar </button></td>
              <td width="72">&nbsp;</td>
              <td width="91"><button type="reset" id="logueame" class="btn btn-block btn-warning"><i class="glyphicon glyphicon-ok"></i> Limpiar </button></td>
            </tr>
          </table>
          <p>&nbsp;</p>
        </form>
        <p>&nbsp;</p>
      </div>
      <p>&nbsp;</p>
      <p>    
        <?php 
		
		}
		endforeach;
	  }
	  if ($_GET['id_action']==7)
		{

	?>
      </p>
      <form name="form1" method="post" action="?controller=programa&action=eliminar_programa">
        <p class="Estilo6">&nbsp;</p>
        <p class="Estilo6">&iquest;Desea eliminar el programa titulado
          <input name="id" type="hidden" id="id" value="<?php echo $_GET['id']; ?>">
          <strong><?php echo $_GET['nombre']; ?></strong>?, el mismo no podra ser recuperado.</p>
        <table width="250" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
          <tr>
            <td width="240"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i>&iexcl;Si, Deseo Eliminar Programa! </button></td>
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