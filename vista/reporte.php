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
        <h2><i class="glyphicon glyphicon-user"></i> Reporte <?php 
		
		
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
      <div align="left"><a href="/?controller=front&action=reporte&id_action=2" class="btn btn-success">Agregar Reporte </a></div>
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
            <th width="17">
              <div align="center">#            </div></th>
            <th width="190">
              <div align="center">Estudiante            </div></th>
            <th width="95"><div align="center">Tipo</div></th>
            <th width="123"><div align="center">Fecha / Hora </div></th>
            <th colspan="4">
              <div align="center">Operaciones            </div></th>
          </tr>
        </thead>
        <tbody>
		 <?php 
            $numero=1;
			$nombre="";   
		foreach ($reportes as $dato):
         
		 foreach ($usuarios as $dato1):
		 if ($dato->id_usuario==$dato1->id_usuario)
		 {
		 $nombre=$dato1->nombre." ".$dato1->apellido;
		 }
		 endforeach;
		 
		 ?>
          <tr>
            <td>
              <div align="center"><?php echo $numero; ?></div></td>
            <td>
              <div align="center"><?php echo $nombre; ?></div></td>
            <td><div align="center"><?php if ($dato->id_tipo==1) {echo "CONSTANCIA";} else { echo "OTRO"; } ?></div></td>
            <td><div align="center"><?php echo $dato->fecha."-".$dato->hora; ?></div></td>
            <td width="43"><div align="center"><a href="?controller=front&action=imprimir_reporte&id_action=4&id=<?php echo $dato->id."&id_tipo=".$dato->id_tipo; ?>" class="btn btn-success"><i class="glyphicon glyphicon-print"></i> </a> </div></td>
            <td width="43"><div align="center"><a href="?controller=front&action=reporte&id_action=4&id=<?php echo $dato->id; ?>" class="btn btn-warning"><i class="glyphicon glyphicon-pencil"></i> </a> </div></td>
            <td width="44"><div align="center"><a href="?controller=front&action=reporte&id_action=7&id=<?php echo $dato->id; ?>" class="btn btn-danger "><i class="glyphicon glyphicon-trash"></i> </a> 
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
        <form action="?controller=reporte&action=registrar_reporte" method="post" name="Form1" class="form-group" id="Form1">
          <div class="col-xs-12 form-group">
          <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
              <input name="firma1" type="text" class="form-control" id="firma1" value="" placeholder="Firma Izquierda..." autocomplete="off" required="required">
          </div>
		  </div>
		  <div class="col-xs-12 form-group">
            <div class="input-group"> <span class="input-group-addon" id="basic-addon1"><i class="glyphicon glyphicon-globe"></i></span>
                <input name="firma2" type="text" class="form-control" id="firma2" value="" placeholder="Firma Derecha..." autocomplete="off" required="required">
            </div>
		    </div>
		  <div class="col-xs-12 form-group">
            <div class="input-group">
              <p>&nbsp;</p>
              <p>Estudiante:
                <select name="id_usuario" id="id_usuario">
                    <?php foreach ($usuarios as $dato): ?>
                    <option value="<?php echo $dato->id_usuario; ?>"><?php echo $dato->nombre. " ".$dato->apellido; ?></option>
                    <?php endforeach; ?>
                  </select>
              </p>
            </div>
		    </div>
		  <div class="col-xs-12 form-group">
            <div class="input-group">
              <p>&nbsp;</p>
              <p>Tipo:
                <select name="id_tipo" id="select">
                  <option value="1">CONSTANCIA</option>
                  <option value="2">OTRA</option>
                                     </select>
              </p>
            </div>
		    </div>
		  <p>&nbsp;</p>
          <div class="col-xs-12 form-group">
<table width="276" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
            <tr>
              <td width="91"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i> Guardar </button></td>
              <td width="72">&nbsp;</td>
              <td width="91"><button type="reset" id="logueame" class="btn btn-block btn-warning"><i class="glyphicon glyphicon-ok"></i> Limpiar </button></td>
            </tr>
          </table>
          </form>
        <p>&nbsp;</p>
      </div>
      <p>&nbsp;</p>
      <form name="form1" method="post" action="?controller=reporte&action=eliminar_reporte">
        <p class="Estilo6">&nbsp;</p>
        <p class="Estilo6">&iquest;Desea eliminar el reporte titulado
          <input name="id" type="hidden" id="id" value="<?php echo $_GET['id']; ?>">
          <strong><?php echo $_GET['id']; ?></strong>?, el mismo no podra ser recuperado.</p>
        <table width="250" border="1" bordercolor="#FFFFFF" bordercolorlight="#FFFFFF" bordercolordark="#FFFFFF" bgcolor="#FFFFFF">
          <tr>
            <td width="240"><button type="submit" id="logueame" class="btn btn-block btn-info"><i class="glyphicon glyphicon-ok"></i>&iexcl;Si, Deseo Eliminar Reporte! </button></td>
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